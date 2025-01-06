<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/assets/logo2.png">
    <title>Catch Zone - Add Post</title>
</head>
<body>
<div class="shape1"></div>
<div class="shape2"></div>
<div class="shape3"></div>
<div class="shape4"></div>
<div class="shape5"></div>

<div class="logo-container">
    <img src="public/assets/logo2.png" alt="Logo" class="logo-image">
    <div class="logo-text">
        <h1>CATCH ZONE</h1>
        <p>FORUM WĘDKARSKIE</p>
    </div>
</div>

<div class="register-container">
    <form class="register-form" action="addPost" method="POST" enctype="multipart/form-data">
        <div class="messages">
            <?php
            if(isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>

        <label for="title">Tytuł</label>
        <input type="text" id="title" name="title" placeholder="Tytuł" required>

        <label for="content">Treść</label>
        <textarea id="content" name="content" rows="10" placeholder="Treść" required></textarea>

        <label for="file">Zdjęcie</label>
        <input type="file" name="file">

        <input type="hidden" name="category_id" value="<?php echo $_GET['category_id']; ?>">

        <button type="submit">Dodaj wpis</button>
    </form>
</div>
</body>
</html>