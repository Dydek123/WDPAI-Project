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
        <header id="finances-header">
            <div id="finances-header-shadow" class="main-header-shadow">

                <nav id ="main-topnav" class="topnav">
                    <div class="hamburger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                    <div class="logo">
                        <a href="index.php"><img alt="logo" src="public/img/main-page/logo.svg"></a>
                    </div>

                    <div class="nav-links-mobile-only">
                        <div class="nav__link">
                            <p class="collapse__link">
                                <span><?= $newContent->getCategory() ?></span>
                                <i class="fas fa-caret-down"></i>
                            </p>
                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">VAT 1</a>
                                <a href="#" class="collapse__sublink">Group</a>
                                <a href="#" class="collapse__sublink"><?= $newContent->getTitle() ?></a>
                            </ul>
                        </div>

                        <div class="nav__link">
                            <p class="collapse__link">
                                <span>Obsługa księgi głównej</span>
                                <i class="fas fa-caret-down"></i>
                            </p>
                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">Data</a>
                                <a href="#" class="collapse__sublink">Group</a>
                                <a href="#" class="collapse__sublink">Members</a>
                            </ul>
                        </div>
                        <div class="nav__link">
                            <a href="#"><span>Obsługa należności</span></a>
                        </div>

                        <form id="search-button-mobile" class="search-button nav-links-item">
                            <input type="text" placeholder="Szukaj..." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    

                    <form class="search-button">
                        <input type="text" placeholder="Szukaj..." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="change-language">
                        <img src="public/img/main-page/Polish_flag.png">
                    </div>
                </nav>

            </div>
        </header>

        <section class="documentation-box">
            <h1>Finanse</h1>
            <div class="documentation-content">
                <nav class="documentation-menu">
                    <div id="nav__sticky">
                        <div class="nav__link">
                            <p class="collapse__link">
                                <span>Obsługa podatku VAT</span>
                                <i class="fas fa-caret-down"></i>
                            </p>
                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">VAT 1</a>
                                <a href="#" class="collapse__sublink">Group</a>
                                <a href="#" class="collapse__sublink">Members</a>
                            </ul>
                        </div>

                        <div class="nav__link">
                            <p class="collapse__link">
                                <span>Obsługa księgi głównej</span>
                                <i class="fas fa-caret-down"></i>
                            </p>
                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">Data</a>
                                <a href="#" class="collapse__sublink">Group</a>
                                <a href="#" class="collapse__sublink">Members</a>
                            </ul>
                        </div>
                        <div class="nav__link">
                        <span> <a href="#">Obsługa należności</a></span>
                        </div>
                    </div>
                </nav>
                <div class="documentation-text">
                    <h2>Lorem ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur laoreet massa felis, eu tincidunt nibh tincidunt nec. Aliquam vitae elit vestibulum, pharetra ipsum nec, aliquam tortor. Donec eleifend nibh quis dui aliquam varius. Pellentesque porta tincidunt tortor id fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean aliquam ornare justo. Integer suscipit bibendum elit, at tincidunt risus fringilla at. Suspendisse velit ex, feugiat vel lacinia et, sodales ut odio. Fusce tristique sapien mattis viverra pellentesque. Mauris sodales, massa id vulputate condimentum, elit ex cursus lacus, et ornare nibh libero vitae libero. Nam iaculis ligula sit amet vulputate vulputate. Quisque faucibus felis scelerisque euismod dignissim. Praesent id tempor sem. Etiam id nisi quam. Duis sed sem id massa cursus luctus vitae id nunc.</p>
                    <p>Pellentesque maximus mauris vitae orci ullamcorper fringilla. Maecenas in imperdiet elit, non rhoncus urna. In eu libero ut erat rutrum hendrerit in quis tortor. Cras iaculis ex quis commodo euismod. Pellentesque risus libero, efficitur eu fermentum eu, posuere at turpis. Donec congue libero in risus laoreet, ut sagittis ante porttitor. Donec ornare, erat in sollicitudin bibendum, nunc ligula maximus quam, in cursus tellus tortor ac enim. Sed gravida neque sodales, vehicula tortor at, ornare orci. Vestibulum nec fringilla justo. Donec at enim eu arcu ullamcorper ultricies.</p>
                    <p>Morbi leo ligula, ullamcorper vel feugiat ac, auctor quis massa. Suspendisse non massa nulla. Fusce nec purus ut purus rutrum tincidunt. Aliquam justo metus, bibendum ac lectus at, molestie semper erat. Nulla magna nisi, tincidunt sit amet tincidunt sed, ultricies at tortor. Vestibulum commodo luctus tempus. Donec non orci magna. Proin ut lacinia ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam ac nisi ut purus ullamcorper placerat. Phasellus eu consectetur lectus, a bibendum tortor. Aliquam convallis maximus purus et accumsan. Mauris sed velit sodales elit vestibulum auctor eget eu diam. Cras sodales diam nec lacus condimentum, ut convallis lectus accumsan. Suspendisse pharetra dolor a mauris hendrerit, sed mattis ante malesuada. Donec fermentum est tincidunt nulla gravida cursus.</p>
                    <img src="public/img/login/login_img.jpg" alt="1">

                    <h2>Poprzednie wersje</h2>
                    <div class="previous-version">
                        <a href="#">10.10.2020(opis)</a>
                        <a href="#">8.10.2020(opis)</a>
                        <a href="#">6.10.2020(opis)</a>
                    </div>
                </div>
            </div>
        </section>

        <script src="public/scripts/app.js"></script>
    </body>
</html>
