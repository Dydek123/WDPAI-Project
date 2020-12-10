<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="public/css/main-style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/57045c6330.js" crossorigin="anonymous"></script>
        <title>Login Page</title>
    </head>

    <body>
        <header id="main-header">
            <div class="main-header-shadow">
                <nav class="topnav">
                    <div class="logo">
                        <a href=""><img alt="logo" src="public/img/main-page/logo.svg"></a>
                    </div>
                    <form class="search-button">
                        <input type="text" placeholder="Szukaj..." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="change-language">
                        <img src="public/img/main-page/Polish_flag.png">
                    </div>
                </nav>

                <div class="header-motto">
                    <div class="motto">
                        <h1>THINK</h1>
                        <h2>OUTSIDE</h2>
                        <h3>THE BOX</h3>
                    </div>
                    <a href="login">Zaloguj się</a>
                </div>
            </div>
        </header>

        <!-- ########################## PRZEMYŚLEĆ TOPNAVA ######################## -->

        <article class="materials">
            <h1>Materiały</h1>

            <div class="carousel">
                
                <div id="other-left" class="carousel-item">
                    <i class="fas fa-arrow-circle-left"></i>
                </div>

                <div id="documentation" class="carousel-item">
                    <div id="documentation-img" class="carousel-img">
                        <div class="carousel-circle">
                            <i class="fas fa-book-open"></i>
                        </div>
                    </div>
                    <div class="carousel-text">
                        <h2>Dokumentacja</h2>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <a href="#">
                        <span>
                            Read more
                        </span>    
                    </a>
                </div>

                <div id="raports" class="carousel-item">
                    <div id="raports-img" class="carousel-img">
                        <div class="carousel-circle">
                            <i class="fas fa-file"></i>
                        </div>
                    </div>
                    <div class="carousel-text">
                        <h2>Raporty</h2>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <a href="#">
                        <span>
                            Read more
                        </span>    
                    </a>
                </div>

                <div id="faq" class="carousel-item">
                    <div id="faq-img" class="carousel-img">
                        <div class="carousel-circle">
                            <i class="fas fa-question"></i>
                        </div>
                    </div>
                    <div class="carousel-text">
                        <h2>FAQ</h2>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <a href="#">
                        <span>
                            Read more
                        </span>    
                    </a>
                </div>

                <div id="other-right" class="carousel-item">
                    <i class="fas fa-arrow-circle-right"></i>
                </div>
            </div>
        </article>

        <section class="about-us">
            <h1>O nas</h1>
            <div class="about-us-container">
                <article class="about-us-text">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet
                    <a href="#">O nas</a>
                </article>
                <div class="about-us-container-img"><img alt="Our team" src="public/img/main-page/Our-team.jpg"></div>
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