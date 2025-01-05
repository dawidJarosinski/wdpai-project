<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/mainPageStyle.css">
    <link rel="icon" href="public/assets/logo2.png">
    <title>Catch Zone - Category</title>
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
    <a href="forum">Strona główna</a> > <?php echo $category->getName(); ?>
</nav>
<main>
    <div class="add-post-btn">
        <?php if (isset($_SESSION['user'])): ?>
            <a href="addPostForm?category_id=<?php echo $category->getId(); ?>" class="add-post-btn">Dodaj wpis</a>
        <?php else: ?>
            <p>Musisz być zalogowany, aby dodać wpis.</p>
        <?php endif; ?>
    </div>
    <section class="categories">
        <?php foreach ($posts as $post): ?>
            <a href="post?id=<?php echo $post->getId(); ?>">
                <div class="category">
                    <h2><?php echo $post->getTitle(); ?></h2>
                    <p><?php echo $post->getContent(); ?></p>
                    <p><small>By <?php echo $post->getAuthor(); ?> on <?php echo $post->getCreatedAt(); ?></small></p>
                </div>
            </a>
        <?php endforeach; ?>
    </section>
</main>
<footer>
    <p>&copy; 2025 Catch Zone. Wszystkie prawa zastrzeżone.</p>
    <p>Kontakt: kontakt@catchzone.pl | Regulamin | Polityka Prywatności</p>
</footer>
</body>
</html>