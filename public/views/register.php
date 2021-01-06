<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/57045c6330.js" crossorigin="anonymous"></script>
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
                        <div class="input-div">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>Imię i nazwisko</h5>
                                <input name='name' type="text" class="input">
                            </div>
                        </div>

                        <div class="input-div">
                            <div class="i"> 
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="div">
                               <h5>E-mail</h5>
                               <input name="email" type="email" class="input">
                            </div>
                        </div>

                        <div class="input-div">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Hasło</h5>
                                <input name="password" type="password" class="input">
                            </div>
                        </div>

                        <div class="input-div">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Powtórz hasło</h5>
                                <input name="repeat-password" type="password" class="input">
                            </div>
                        </div>
                        <div id="signup-to-login-text-mobile">
                            <a href="login">Posiadasz już konto? Zaloguj się teraz</a>
                        </div>
                    <input type="submit" class="btn" value="Zarejestruj się">
                </form>
            </div>

            <div id="signup-img-shadow" class="login-img-shadow">
                <div class="login-img-text">
                    <h3>Witamy ponownie!</h3>
                    Aby przejść do dalszej sekcji zaloguj się ponownie
                </div>

                <a class="login-register-switch-button" href="login"><p>Zaloguj się</p></a>

                <div class="login-change-language">
                    Zmień język / Change language
                    <div class="login-flags">
                        <img alt="polish" src="public/img/login/Polish_flag.png">
                        <img alt="english" src="public/img/login/english_flag.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="login-flags-mobile">
            <img alt="polish" src="public/img/login/Polish_flag.png">
            <img alt="english" src="public/img/login/english_flag.png">
        </div>
     </div>
    <script type="text/javascript" src="public/scripts/loginv2.js"></script>
</body>