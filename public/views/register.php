<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/assets/logo2.png">
    <title>Catch Zone - Register</title>
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
    <form class="register-form" action="register" method="POST">
        <div class="messages"> <?php
            if(isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required>
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" required>
        <label>Surname</label>
        <input type="text" name="surname" placeholder="Surname" required>
        <button type="submit">Register</button>
        <a href="login">Masz już konto? Zaloguj się</a>
    </form>
</div>
</body>
</html>