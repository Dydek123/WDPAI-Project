<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "public/components/head_template.php"?>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="public/scripts/login-script.js" defer></script>
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-img">
                <img src="public/img/login/login_img.jpg">
            </div>

            <div class="login-img-shadow">
                <div class="login-img-text">
                    <h3>Miło Cię widzieć!</h3>
                    Jeśli nie masz jeszcze założonego konta, dołącz do nas teraz
                </div>

                <a class="login-register-switch-button" href="register"><p>Zarejestruj się</p></a>

                <?php include 'public/components/login-panel__change-language.php'?>
            </div>

            <div id="login-content" class="content">
                <form action="login_user" method="POST">
                    <div class="logo">
                        <a href="index"><img src="public/img/login/logo-dark.svg"></a>
                    </div>
                    <h2>Logowanie</h2>
                       <div class="input-div">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>Login</h5>
                                <input type="text" class="input" name="email">
                            </div>
                       </div>

                       <div class="input-div">
                          <div class="i"> 
                               <i class="fas fa-lock"></i>
                          </div>
                          <div class="div">
                               <h5>Hasło</h5>
                               <input type="password" class="input" name="password">
                       </div>

                    </div>

                    <a href="#">Zapomniałeś hasła?</a>

                    <input type="submit" class="btn" value="Login">

                    <div id="login-to-signup-text-mobile">
                        Nie masz jeszcze konta?<a href="register">Dołącz do nas teraz</a>
                    </div>

                    <div class="message">
                        <?php if (isset($messages)) {
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="login-flags-mobile">
            <img alt="polish" src="public/img/login/Polish_flag.png">
            <img alt="english" src="public/img/login/english_flag.png">
        </div>

    </div>
</body>