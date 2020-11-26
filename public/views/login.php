<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="public/css/style.css">

	<title>Login Page</title>
</head>

<body>
    <div class="login-container">
        <div class="message">
            <?php if (isset($messages)) {
                foreach ($messages as $message){
                    echo $message;
                }
            }
            ?>
        </div>
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

            <div class="login-form">
                <div class="logo">
                    <img src="public/img/login/logo.svg" alt="logo">
                </div>
        
                <form>
                    <input id="login-user" name="username" type="text" placeholder="Nazwa użytkownika">
                    <input id="login-password" name="password" type="password" placeholder="Hasło">
                    <button>Zaloguj się</button>
                </form>

                <div id="login-to-signup-text-mobile">
                    Nie masz jeszcze konta?<a href="register">Dołącz do nas teraz</a>
                </div>
            </div>
        </div>

        <div class="login-flags-mobile">
            <img alt="polish" src="public/img/login/Polish_flag.png">
            <img alt="english" src="public/img/login/english_flag.png">
        </div>
    </div>
</body>