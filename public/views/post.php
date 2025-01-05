<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/mainPageStyle.css">
    <link rel="icon" href="public/assets/logo2.png">
    <title>Catch Zone - Post</title>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="public/assets/logo2.png" alt="Logo" class="logo-image">
        <div class="logo-text">
            <h1>CATCH ZONE</h1>
            <p>FORUM WĘDKARSKIE</p>
        </div>
    </div>
    <div class="header-right">
        <div class="search-bar">
            <input type="text" placeholder="Szukaj wpisów...">
            <button>Szukaj</button>
        </div>
        <div class="auth-buttons">
            <?php if(isset($_SESSION['user'])): ?>
                <span>Witaj, <?php echo $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname']; ?></span>
                <a href="logout" class="btn">Wyloguj się</a>
            <?php else: ?>
                <a href="login" class="btn">Zaloguj się</a>
                <a href="register" class="btn">Zarejestruj się</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<nav class="breadcrumbs">
    <a href="forum">Strona główna</a> > <a href="category?id=<?php echo $post->getCategoryId(); ?>"><?php echo $post->getCategoryId(); ?></a> > <?php echo $post->getTitle(); ?>
</nav>
<main>
    <section class="post">
        <h2><?php echo $post->getTitle(); ?></h2>
        <p><?php echo $post->getContent(); ?></p>
        <p><small>By <?php echo $post->getAuthor(); ?> on <?php echo $post->getCreatedAt(); ?></small></p>
    </section>
    <section class="comments">
        <h3>Comments</h3>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><?php echo $comment->getContent(); ?></p>
                <p><small>By <?php echo $comment->getAuthor(); ?> on <?php echo $comment->getCreatedAt(); ?></small></p>
            </div>
        <?php endforeach; ?>
    </section>
    <div class="comment-form">
        <?php if (isset($_SESSION['user'])): ?>
            <h3>Dodaj komentarz</h3>
            <form action="/addComment" method="post">
                <input type="hidden" name="post_id" value="<?= $post->getId() ?>">
                <textarea name="content" rows="4" cols="50" placeholder="Twój komentarz"></textarea><br>
                <button type="submit">Opublikuj</button>
            </form>
        <?php else: ?>
            <p>Musisz być zalogowany, aby dodać komentarz.</p>
        <?php endif; ?>
    </div>
</main>
<footer>
    <p>&copy; 2025 Catch Zone. Wszystkie prawa zastrzeżone.</p>
    <p>Kontakt: kontakt@catchzone.pl | Regulamin | Polityka Prywatności</p>
</footer>
</body>
</html>