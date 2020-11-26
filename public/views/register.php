<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">

	<title>Sign Up</title>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-img">
                <img src="public/img/login/login_img.jpg">
            </div>

            <div id="signup-form" class="login-form">
                <div class="logo">
                    <img src="public/img/login/logo.svg">
                </div>
        
                <form>
                    <input id="signup-user" name="username" type="text" placeholder="Nazwa użytkownika">
                    <input id="signup-mail" name="email" type="text" placeholder="E-mail">
                    <input id="signup-password" name="password" type="password" placeholder="Hasło">
                    <input id="signup-repeat-password" name="password" type="password" placeholder="Powtórz hasło">
                    <button>Zarejestruj się</button>
                </form>

                <div id="signup-to-login-text-mobile">
                    Posiadasz już konto?<a href="login">Zaloguj się teraz</a>
                </div>
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

        <div class="signup-flags-mobile">
            <img alt="polish" src="public/img/login/Polish_flag.png">
            <img alt="english" src="public/img/login/english_flag.png">
        </div>
    </div>
</body>