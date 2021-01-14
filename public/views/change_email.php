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
            <form action="change_email" method="POST">
                <div class="logo">
                    <a href="index"><img src="public/img/login/logo-dark.svg"></a>
                </div>
                <h2>Zmień email</h2>


                <div class="input-div">
                    <div>
                        <h5>E-mail</h5>
                        <input name="email"  type="email" class="file-upload input">
                    </div>
                </div>

                <div class="message-error">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>

                <button type="submit" class="btn">Prześlij</button>
            </form>
        </div>
    </div>
</div>
</body>