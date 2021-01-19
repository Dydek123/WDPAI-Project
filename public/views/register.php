<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "public/components/head_template.php"?>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="public/scripts/validate.js" defer></script>
    <title>Sign up</title>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-img">
                <img src="public/img/login/login_img.jpg">
            </div>

            <div id="signup-content" class="content">
                <form method="POST" action="addUser">
                    <div class="logo">
                        <a href="index"><img src="public/img/login/logo-dark.svg"></a>
                    </div>
                    <h2>Rejestracja</h2>
                        <?php
                            include 'public/components/registration_inputs.php';
                            $list = new InputList();
                            $listItems = $list->getInputList();
                            foreach ($list->getInputList() as $item):
                        ?>
                            <?php if (isset($_POST[$item->getName()])): ?>
                            <div class="input-div focus">
                            <?php else: ?>
                            <div class="input-div">
                            <?php endif; ?>
                                <div class="i">
                                    <i class="fas fa-<?= $item->getIcon() ?>"></i>
                                </div>
                                <div class="div">
                                    <h5><?= $item->getHeader() ?></h5>
                                    <?php if (isset($_POST[$item->getName()])): ?>
                                    <input name='<?= $item->getName() ?>' type="<?= $item->getType() ?>" value="<?=$item->getName()?>" class="input">
                                    <?php else: ?>
                                    <input name='<?= $item->getName() ?>' type="<?= $item->getType() ?>" class="input">
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php if (isset($messages)): ?>
                        <div class="message">
                            <?php
                            foreach ($messages as $message){
                                echo $message;
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                    <input type="submit" class="btn" value="Zarejestruj się">
                </form>
            </div>

            <div id="signup-img-shadow" class="login-img-shadow">
                <div class="login-img-text">
                    <h3>Witamy ponownie!</h3>
                    Aby przejść do dalszej sekcji zaloguj się ponownie
                </div>

                <a class="login-register-switch-button" href="login"><p>Zaloguj się</p></a>

                <?php include 'public/components/login-panel__change-language.php'?>
            </div>
        </div>
        <div class="login-flags-mobile">
            <img alt="polish" src="public/img/login/Polish_flag.png">
            <img alt="english" src="public/img/login/english_flag.png">
        </div>
     </div>
</body>