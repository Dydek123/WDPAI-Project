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
        <header id="raport-header">
            <nav id ="main-topnav" class="topnav">
                <div class="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div class="logo">
                    <a href="index"><img alt="logo" src="public/img/main-page/logo-light.svg"></a>
                </div>

                <div class="nav-links-mobile-only">
                    <a href="#" class="navigation-back-arrow nav-links-item">
                        <i class="fas fa-arrow-left"></i>
                    </a>
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

            <div class="raport-header-img">
                <h2>Witamy na stronie</h2>
                <h3>Zachęcamy do wybrania odpowiedniej kategorii</h3>
            </div>
        </header>

        <article class="raports-cotainer">
            <h1>Raporty</h1>
            <div class="raports-content">
                <?php foreach ($categories as $category): ?>
                    <?php if ($category->getCategory() === $_GET['type']): ?>
                        <div class="raports-card">
                            <div class="raports-card-img" style="background-image: url('public/uploads/Category/<?= $category->getBackground() ?>');">
                                <div class="raports-card-icon"><i class="fas <?= $category->getIcon() ?>"></i></div>
                                <h2><?= $category->getTitle() ?></h2>
                                <h3><?= $category->getDescription() ?></h3>
                            </div>
                            <form class="raports-links" method="get" action="finances">
                                <?php foreach ($links as $link): ?>
                                    <?php if ($link->getCategory() === $category->getTitle()):?>
                                            <input type="submit" name="category" value="<?= $link->getCategory() ?>;<?= $link->getTitle() ?>" class="get-raports-button">
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <a href="addCategory" class="raports-card">
                    <div id="new-raports" class="raports-card-img">
                        <div class="raports-card-icon"><i class="fas fa-plus"></i></div>
                        <div id="add-new-raports">
                            <h2>Dodaj nową kategorię</h2>
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </a>
            </div>
        </article>

        <script src="public/scripts/app.js"></script>
    </body>
</html>
