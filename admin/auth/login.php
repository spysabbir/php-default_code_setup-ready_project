<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php if(isset($_SESSION['register_success'])) : ?>
        <span><?= $_SESSION['register_success'] ?></span>
    <?php endif; ?>

    <?php if(isset($_SESSION['login_error'])) : ?>
        <span><?= $_SESSION['login_error'] ?></span>
    <?php endif; ?>


    <form action="login_post.php" method="POST">
        <input type="email" name="email" placeholder="Email" value="<?= (isset($_SESSION['old_email'])) ? $_SESSION['old_email'] : '' ?>">
        <?php if(isset($_SESSION['email_error'])) : ?>
            <span><?= $_SESSION['email_error'] ?></span>
        <?php endif; ?>
        <?php if(isset($_SESSION['email_exists_error'])) : ?>
            <span><?= $_SESSION['email_exists_error'] ?></span>
        <?php endif; ?>

        <input type="password" name="password" placeholder="Password">
        <?php if(isset($_SESSION['password_error'])) : ?>
            <span><?= $_SESSION['password_error'] ?></span>
        <?php endif; ?>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php
    session_unset();
?>