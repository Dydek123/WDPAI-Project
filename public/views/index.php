<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "public/components/head_template.php"?>
        <link rel="stylesheet" type="text/css" href="public/css/main-style.css">
        <script type="text/javascript" src="public/scripts/scroll.js" defer></script>
        <script type="text/javascript" src="public/scripts/app.js" defer></script>
        <title>Cboard</title>
    </head>

    <body>
        <header id="main-header">
            <div class="main-header-shadow">

                <?php include 'public/components/topnav.php'?>

                <div class="header-motto">
                    <div class="motto">
                        <h1>THINK</h1>
                        <h2>OUTSIDE</h2>
                        <h3>THE BOX</h3>
                    </div>
                    <?php if(!isset($_COOKIE['user'])):?>
                        <a href="login">Zaloguj się</a>
                    <?php else: ?>
                        <h5>Witaj ponownie</h5>
                    <?php endif; ?>
                </div>

                <section id="main-scroll" class="scroll">
                    <a href="#to-scroll"><span></span>Scroll</a>
                </section>
            </div>
        </header>

        <article class="materials">
            <span id="to-scroll"></span>
            <h1>Materiały</h1>
            
            <form class="materials_box" method="get" action="raports">
                <div class="materials-item">
                    <div id="documentation-img" class="materials-img">
                        <div class="materials-circle">
                            <i class="fas fa-book-open"></i>
                        </div>
                    </div>
                    <div class="materials-text">
                        <h2>Dokumentacja</h2>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <span>
                        <hr>
                        <button name="type" value="Dokumentacja" class="get-category-button">Zobacz więcej</button>
                    </span>
                </div>

                <div class="materials-item">
                    <div id="raports-img" class="materials-img">
                        <div class="materials-circle">
                            <i class="fas fa-file"></i>
                        </div>
                    </div>
                    <div class="materials-text">
                        <h2>Raporty</h2>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <span>
                        <hr>
                        <button name="type" value="Raporty" class="get-category-button">Zobacz więcej</button>
                    </span>
                </div>

                <div class="materials-item">
                    <div id="faq-img" class="materials-img">
                        <div class="materials-circle">
                            <i class="fas fa-question"></i>
                        </div>
                    </div>
                    <div class="materials-text">
                        <h2>FAQ</h2>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <span>
                        <hr>
                        <button name="type" value="FAQ" class="get-category-button">Zobacz więcej</button>
                    </span>
                </div>
            </form>
        </article>

        <section class="about-us">
            <h1>O nas</h1>
            <div class="about-us-container">
                <article class="about-us-text">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet
                    <a href="https://intersys.pl/#o-nas" target="_blank">O nas</a>
                </article>
                <a href="https://intersys.pl/#o-nas" target="_blank" class="about-us-container-img"><img alt="Our team" src="public/img/main-page/Our-team.jpg"></a>
            </div>
        </section>
        
        <?php include 'public/components/footer.php' ?>
    </body>
</html>
