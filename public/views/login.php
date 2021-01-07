<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="public/scripts/login-script.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/57045c6330.js" crossorigin="anonymous"></script>
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

                <div class="login-change-language">
                    Zmień język / Change language
                    <div class="login-flags">
                        <img alt="polish" src="public/img/login/Polish_flag.png">
                        <img alt="english" src="public/img/login/english_flag.png">
                    </div>
                </div>
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
                                <h5>Username</h5>
                                <input type="text" class="input" name="email">
                            </div>
                       </div>

                       <div class="input-div">
                          <div class="i"> 
                               <i class="fas fa-lock"></i>
                          </div>
                          <div class="div">
                               <h5>Password</h5>
                               <input type="password" class="input" name="password">
                       </div>

                    </div>

                    <a href="#">Forgot Password?</a>

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