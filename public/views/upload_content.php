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
            <form action="addContent" method="POST" ENCTYPE="multipart/form-data">
                <div class="logo">
                    <a href="index"><img src="public/img/login/logo-dark.svg"></a>
                </div>
                <h2>Nowy dokument</h2>

                <div class="select">
                    <select name="category" id="slct" onchange="changeMe(this); showDocumentsType();">
                        <option selected disabled>Wybierz kategorie</option>
                        <option value="raports">Raporty</option>
                        <option value="documentation">Dokumentacja</option>
                        <option value="faq">FAQ</option>
                    </select>
                </div>

                <div class="select select-new">
                    <select name="document-type" id="slct" onchange="changeMe(this); ">
                        <option selected disabled>Wybierz podkategorie</option>
                        <option value="Obsługa podatku VAT">Obsługa podatku VAT</option>
                        <option value="HR">HR</option>
                    </select>
                </div>

                <div class="select">
                    <select name="document-name" id="slct" class="slct-content" onchange="changeMe(this); checkNew();">
                        <option selected disabled>Wybierz dokument</option>
                        <option value="Jak liczyć podatek VAT">Jak liczyć podatek VAT</option>
                        <option value="Rozliczenia podatku">Rozliczenia podatku</option>
                        <option value="new">Stwórz nowy dokument</option>
                    </select>
                </div>

                <div class="select public-select">
                    <select name="public" id="slct" onchange="changeMe(this);">
                        <option selected disabled>Wybierz widoczność</option>
                        <option value="1">Publiczne</option>
                        <option value="0">Prywatne</option>
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
</body>