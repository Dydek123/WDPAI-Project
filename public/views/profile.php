<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "public/components/head_template.php"?>
    <link rel="stylesheet" type="text/css" href="public/css/upload.css">
    <script type="text/javascript" src="public/scripts/upload.js" defer></script>
    <title>Cboard - upload document</title>
</head>

<body>
<div class="upload-container">
    <div class="upload-box">
        <div class="login-content">
            <div>
                <div class="logo">
                    <a href="index"><img src="public/img/login/logo-dark.svg"></a>
                </div>
                <h2><?= $user->getName(); ?> <?= $user->getSurname(); ?></h2>
                <div class="profile-links">
                    <a href="change_password">Zmień hasło</a>
                    <a href="change_email">Zmień email</a>
                    <?php if ($user->getRole()>1):?>
                        <a href="delete_user">Usuń użytkownika</a>
                    <?php endif; ?>
                </div>

                <?php if (isset($messages)): ?>
                    <div class="message-<?=$status?>">
                        <?php
                        foreach ($messages as $message){
                            echo $message;
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>