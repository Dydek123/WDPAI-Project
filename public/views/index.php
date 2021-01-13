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
        
        <section class="get-in-touch">
            <div class="get-in-touch-shadow">
                <h1>Kontakt</h1>
                <div class="get-in-touch-container">
                    <div class="get-in-touch-item">
                        <i class="fas fa-envelope"></i>
                        <p>examle@email.com</p>
                        <p>examle@email.com</p>
                    </div>
                    <div class="get-in-touch-item">
                        <i class="fas fa-phone-alt"></i>
                        <p>123 456 789</p>
                        <p>795 487 654</p>
                    </div>
                    <div class="get-in-touch-item">
                        <i class="fas fa-map-marked-alt"></i>
                        <p>Kraków</p>
                        <p>ul. Przykładowa 1</p>
                    </div>
                    <div class="get-in-touch-item">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.760629375549!2d19.940602051466815!3d50.0720443793238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b04a4a0d5bf%3A0x41a815e1860a19eb!2sPolitechnika%20Krakowska%20im.%20Tadeusza%20Ko%C5%9Bciuszki!5e0!3m2!1spl!2spl!4v1606382356244!5m2!1spl!2spl" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                
                <div class="social-links">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-twitter-square"></i>
                    <i class="fab fa-linkedin-square"></i>
                </div>

            </div>
        </section>
    </body>
</html>
