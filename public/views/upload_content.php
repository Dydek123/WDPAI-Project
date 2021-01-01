<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="public/css/upload.css">

    <title>Login Page</title>
</head>

<body>
<div class="upload-container">
    <div class="upload-box">
        <div class="login-content">
            <form action="addContent" method="POST" ENCTYPE="multipart/form-data">
                <div class="logo">
                    <a href="index"><img src="public/img/login/logo.svg"></a>
                </div>
                <h2>Nowy dokument</h2>

                <div class="select">
                    <select name="category" id="slct" class="slct-content" onchange="changeMe(this); checkNew();">
                        <option selected disabled>Wybierz dokument</option>
                        <option value="new">Stwórz nowy</option>
                        <optgroup label="Obsługa podatku VAT">
                            <option value="VAT;raports">Raporty</option>
                            <option value="VAT;documentation">Dokumentacja</option>
                            <option value="VAT;faq">FAQ</option>
                        </optgroup>
                        <optgroup label="Obsługa księgi głównej">
                            <option value="VAT;raports">Raporty</option>
                            <option value="VAT;documentation">Dokumentacja</option>
                            <option value="VAT;faq">FAQ</option>
                        </optgroup>
                        <optgroup label="Obsługa należności">
                            <option value="VAT;raports">Raporty</option>
                            <option value="VAT;documentation">Dokumentacja</option>
                            <option value="VAT;faq">FAQ</option>
                        </optgroup>
                    </select>
                </div>

                <div class="select select-new">
                    <select name="category" id="slct" onchange="changeMe(this)">
                      <option selected disabled>Wybierz kategorie</option>
                      <option value="raports">Raporty</option>
                      <option value="documentation">Dokumentacja</option>
                      <option value="faq">FAQ</option>
                    </select>
                </div>

                <div class="input-div new-input">
                    <div>
                        <h5>Tytuł</h5>
                        <input name="title" type="text" class="input">
                    </div>
                </div>

                <div class="input-div">
                    <div>
                        <h5>Plik</h5>
                        <input name="file"  type="File" class="file-upload input">
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
<script type="text/javascript" src="public/scripts/upload.js"></script>
</body>