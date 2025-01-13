<?php
require_once 'AppController.php';
require_once __DIR__.'/../repositories/PostRepository.php';
require_once __DIR__.'/../repositories/CommentRepository.php';
require_once __DIR__.'/../repositories/UserRepository.php';
require_once __DIR__.'/../repositories/CategoryRepository.php';
require_once __DIR__.'/../models/CommentDto.php';
require_once __DIR__.'/../models/PostDto.php';
class PostController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function post() {
        $postId = $_GET['id'];
        $postRepository = new PostRepository();
        $commentRepository = new CommentRepository();
        $post = $postRepository->getPostById($postId);
        $comments = $commentRepository->getCommentsByPostId($postId);

        $categoryRepository = new CategoryRepository();
        $categoryName = $categoryRepository->findCategoryNameById($post->getCategoryId());

        $userRepository = new UserRepository();

        $postDto = new PostDto(
            $post->getId(),
            $post->getCategoryId(),
            $post->getTitle(),
            $post->getContent(),
            $post->getAuthorId(),
            $post->getCreatedAt(),
            $userRepository->findUserById($post->getAuthorId())->getName(),
            $userRepository->findUserById($post->getAuthorId())->getSurname(),
            $post->getImagePath()
        );

        $commentsDto = [];
        foreach($comments as $comment) {
            $user = $userRepository->findUserById($comment->getAuthorId());
            $commentsDto[] = new CommentDto(
                $comment->getId(),
                $comment->getPostId(),
                $comment->getContent(),
                $comment->getAuthorId(),
                $comment->getCreatedAt(),
                $user->getName(),
                $user->getSurname()
            );
        }

        return $this->render('post', ['post' => $postDto, 'comments' => $commentsDto, 'categoryName' => $categoryName]);
    }

    public function addPost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagePath = "";

            if(is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
                move_uploaded_file($_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);
                $imagePath = $_FILES['file']['name'];
            }

            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryId = $_POST['category_id'];
            $authorId = $_SESSION['user']['id'];

            $postRepository = new PostRepository();
            $postRepository->addPost($title, $content, $categoryId, $authorId, $imagePath);

            header("Location: /category?id=$categoryId");
        }
    }

    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $postRepository = new PostRepository();

            $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
            if($contentType === "application/json") {
                $content = trim(file_get_contents("php://input"));
                $decoded = json_decode($content, true);


                header('Content-type: application/json');
                http_response_code(200);
                echo json_encode($postRepository->getPostByTitleOrContent($decoded['search']));
            }
        }
    }

    private function validate(array $file): bool {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported.';
            return false;
        }

        return true;
    }
}