<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "public/components/head_template.php"?>
    <link rel="stylesheet" type="text/css" href="public/css/upload.css">
    <script type="text/javascript" src="public/scripts/upload.js" defer></script>
    <title>Cboard - zapomniane hasło</title>
</head>

<body>
<div class="upload-container">
    <div class="upload-box">
        <div class="login-content">
            <?php if (isset($_POST['email'])): ?>
            <form action="setNewPassword" method="POST">
            <?php else: ?>
            <form action="forgotPassword" method="POST">
            <?php endif; ?>
                <div class="logo">
                    <a href="index"><img src="public/img/login/logo-dark.svg"></a>
                </div>
                <h2>Odzyskaj hasło</h2>

                <h3>Wprowadź swój email, na który zostanie wysłany kod potwierdzający</h3>

                <div class="input-div">
                    <div>
                        <h5>Email</h5>
                        <?php if (isset($_POST['email'])): ?>
                        <input name="email" type="email" class="input" value="<?= $_POST['email'] ?>">
                        <?php else: ?>
                        <input name="email" type="email" class="input">
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (isset($_POST['email'])): ?>
                    <div class="input-div">
                        <div>
                            <h5>Kod potwierdzający</h5>
                            <input name="key"  type="text" class="input">
                        </div>
                    </div>

                    <div class="input-div">
                        <div>
                            <h5>Wprowadź nowe hasło</h5>
                            <input name="password"  type="password" class="input">
                        </div>
                    </div>

                    <div class="input-div">
                        <div>
                            <h5>Potwierdź hasło</h5>
                            <input name="repeat-password"  type="password" class="input">
                        </div>
                    </div>
                <? endif; ?>

                <div class="message">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>

                <?php if (!isset($_POST['email'])): ?>
                    <button name="send-email" type="submit" class="btn">Wyślij email</button>
                <?php else: ?>
                    <button name="new-password" type="submit" class="btn">Ustaw nowe hasło</button>
                <? endif; ?>

            </form>
        </div>
    </div>
</div>
</body>