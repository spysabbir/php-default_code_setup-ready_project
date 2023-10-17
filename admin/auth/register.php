<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    
    <form action="register_post.php" method="POST">

        <input type="text" name="name" placeholder="Name" value="<?= (isset($_SESSION['old_name'])) ? $_SESSION['old_name'] : '' ?>">
        <?php if(isset($_SESSION['name_error'])) : ?>
            <span><?= $_SESSION['name_error'] ?></span>
        <?php endif; ?>

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
        <?php if(isset($_SESSION['password_match_error'])) : ?>
            <span><?= $_SESSION['password_match_error'] ?></span>
        <?php endif; ?>

        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <?php if(isset($_SESSION['confirm_password_error'])) : ?>
            <span><?= $_SESSION['confirm_password_error'] ?></span>
        <?php endif; ?>

        <div>
            <input type="radio" name="gender" value="Male" <?php echo (isset($_SESSION['old_gender']) && $_SESSION['old_gender'] === 'Male') ? 'checked' : ''; ?>>Male
            <input type="radio" name="gender" value="Female" <?php echo (isset($_SESSION['old_gender']) && $_SESSION['old_gender'] === 'Female') ? 'checked' : ''; ?>>Female
            <input type="radio" name="gender" value="Other" <?php echo (isset($_SESSION['old_gender']) && $_SESSION['old_gender'] === 'Other') ? 'checked' : ''; ?>>Other
            <?php if(isset($_SESSION['gender_error'])) : ?>
                <span><?= $_SESSION['gender_error'] ?></span>
            <?php endif; ?>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php
    session_unset();
?>