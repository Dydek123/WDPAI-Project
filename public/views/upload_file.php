<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="public/css/upload.css">
    <script type="text/javascript" src="public/scripts/upload.js" defer></script>

    <title>Login Page</title>
</head>

<body>
    <div class="upload-container">
        <div class="upload-box">
            <div class="login-content">
                <form action="addCategory" method="POST" ENCTYPE="multipart/form-data">
                    <div class="logo">
                        <a href="index"><img src="public/img/login/logo-dark.svg"></a>
                    </div>
                    <h2>Utwórz nową kategorie</h2>

                    <div class="input-div">
                        <div>
                            <h5>Tytuł</h5>
                            <input name="title" type="text" class="input">
                        </div>
                    </div>

                    <div class="input-div">
                        <div>
                            <h5>Krótki opis</h5>
                            <input name="description"  type="text" class="input">
                        </div>
                    </div>

                    <div class="select">
                        <select name="category" id="slct2" onchange="changeMe(this)">
                            <option selected disabled>Wybierz kategorie</option>
                            <option value="raports">Raporty</option>
                            <option value="documentation">Dokumentacja</option>
                        </select>
                    </div>

                    <div class="select">
                        <select name="icon" id="slct2" onchange="changeMe(this)">
                            <option selected disabled>Wybierz ikonke</option>
                            <option value="dolar">Dolar</option>
                            <option value="user">Użytkownik</option>
                            <option value="mail">Koperta</option>
                            <option value="book">Książka</option>
                        </select>
                    </div>

                    <div class="input-div">
                        <div>
                            <h5>Tło</h5>
                            <input name="background"  type="File" class="file-upload input">
                        </div>
                    </div>

                    <div class="message">
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