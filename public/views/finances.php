<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "public/components/head_template.php"?>
        <link rel="stylesheet" type="text/css" href="public/css/main-style.css">
        <script type="text/javascript" src="public/scripts/app.js" defer></script>
        <script type="text/javascript" src="public/scripts/search.js" defer></script>

        <title>Cboard - <?=explode(';',$_GET['category'])[1]?></title>
    </head>

    <body onload="setBackground('<?=explode(';',$_GET['category'])[2]?>')">
        <header id="finances-header">
            <div id="finances-header-shadow" class="main-header-shadow">

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
                        <?php foreach ($categoryList as $category): ?>
                            <?php if(explode(';',$_GET['category'])[0] === $category): ?>
                                <div class="nav__link">
                                    <p class="collapse__link">
                                        <span><?= $category?></span>
                                        <i class="fas fa-caret-down"></i>
                                    </p>
                                    <ul class="collapse__menu">
                                        <?php foreach ($contents as $content): ?>
                                            <?php if($content->getCategory() === $category): ?>
                                                <input type="submit" value="<?= $content->getTitle()?>" class="collapse__sublink">
                                            <? endif; ?>
                                        <? endforeach; ?>
                                    </ul>
                                </div>
                            <? endif; ?>
                        <? endforeach; ?>
                        <div class="nav__link">
                            <a id="new-content-link" href="addContent"><span >Dodaj nowy dokument <i class="fas fa-plus"></i></span></a>
                        </div>

                        <div id="search-button-mobile" class="search-button nav-links-item">
                            <input type="text" placeholder="Szukaj.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="change-language">
                        <img src="public/img/main-page/Polish_flag.png">
                    </div>

                    <?php if(isset($_COOKIE['user'])):?>
                        <form class="logout_form" method="get" action="logout">
                            <button name="logout" value="true" class="logout_button">Wyloguj się</button>
                        </form>
                    <?php else: ?>
                        <a href="login" class="topnav__login">Zaloguj sie</a>
                    <?php endif; ?>
                </nav>

            </div>
        </header>

        <section class="documentation-box">
            <h1><?php echo explode(';',$_GET['category'])[1] ?></h1>
            <div class="documentation-content">
                <div class="menu">
                    <div>
                        <form class="documentation-menu" action="finances" method="GET">
                            <div id="nav__sticky">
                                <?php foreach ($categoryList as $category): ?>
                                    <?php if(explode(';',$_GET['category'])[0] === $category): ?>
                                        <div class="nav__link">
                                            <p class="collapse__link">
                                                <span><?= $category?></span>
                                                <i class="fas fa-caret-down"></i>
                                            </p>
                                            <ul class="collapse__menu">
                                                <?php foreach ($contents as $content): ?>
                                                    <?php if($content->getCategory() === $category): ?>
                                                        <button name="category" value="<?= $category ?>;<?= $content->getTitle() ?>;<?=$content->getBackground()?>" class="collapse__sublink"><?= $content->getTitle()?></button>
                                                    <? endif; ?>
                                                <? endforeach; ?>
                                            </ul>
                                        </div>
                                    <? endif; ?>
                                <? endforeach; ?>
                            </div>
                            <?php if(isset($_COOKIE['user'])):?>
                                <div class="nav__link nav__link-document">
                                    <a id="new-content-link" href="addContent"><span >Dodaj nowy dokument <i class="fas fa-plus"></i></span></a>
                                </div>
                            <? endif; ?>
                        </form>
                        <div class="search-div">
                            <input type="text" placeholder="Szukaj..." class="search-btn">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <div class="documentation-text">
                    <?php
                        foreach ($contents as $content){
                            if ($content->getTitle() === explode(';',$_GET['category'])[1]){
                                if ($content->showCondition()){ ?>
                                    <h2>Lorem ipsum</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur laoreet massa felis, eu tincidunt nibh tincidunt nec. Aliquam vitae elit vestibulum, pharetra ipsum nec, aliquam tortor. Donec eleifend nibh quis dui aliquam varius. Pellentesque porta tincidunt tortor id fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean aliquam ornare justo. Integer suscipit bibendum elit, at tincidunt risus fringilla at. Suspendisse velit ex, feugiat vel lacinia et, sodales ut odio. Fusce tristique sapien mattis viverra pellentesque. Mauris sodales, massa id vulputate condimentum, elit ex cursus lacus, et ornare nibh libero vitae libero. Nam iaculis ligula sit amet vulputate vulputate. Quisque faucibus felis scelerisque euismod dignissim. Praesent id tempor sem. Etiam id nisi quam. Duis sed sem id massa cursus luctus vitae id nunc.</p>
                                    <p>Pellentesque maximus mauris vitae orci ullamcorper fringilla. Maecenas in imperdiet elit, non rhoncus urna. In eu libero ut erat rutrum hendrerit in quis tortor. Cras iaculis ex quis commodo euismod. Pellentesque risus libero, efficitur eu fermentum eu, posuere at turpis. Donec congue libero in risus laoreet, ut sagittis ante porttitor. Donec ornare, erat in sollicitudin bibendum, nunc ligula maximus quam, in cursus tellus tortor ac enim. Sed gravida neque sodales, vehicula tortor at, ornare orci. Vestibulum nec fringilla justo. Donec at enim eu arcu ullamcorper ultricies.</p>
                                    <p>Morbi leo ligula, ullamcorper vel feugiat ac, auctor quis massa. Suspendisse non massa nulla. Fusce nec purus ut purus rutrum tincidunt. Aliquam justo metus, bibendum ac lectus at, molestie semper erat. Nulla magna nisi, tincidunt sit amet tincidunt sed, ultricies at tortor. Vestibulum commodo luctus tempus. Donec non orci magna. Proin ut lacinia ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam ac nisi ut purus ullamcorper placerat. Phasellus eu consectetur lectus, a bibendum tortor. Aliquam convallis maximus purus et accumsan. Mauris sed velit sodales elit vestibulum auctor eget eu diam. Cras sodales diam nec lacus condimentum, ut convallis lectus accumsan. Suspendisse pharetra dolor a mauris hendrerit, sed mattis ante malesuada. Donec fermentum est tincidunt nulla gravida cursus.</p>
                                    <a href="#img1-active">
                                        <img src="public/img/login/login_img.jpg" id="img1" alt="1">
                                    </a>

                                    <a href="#img1" class="lightbox" id="img1-active">
                                        <span style="background-image: url('public/img/login/login_img.jpg')"></span>
                                    </a>

                                    <h2>Poprzednie wersje</h2>
                                    <div class="previous-version">
                                    <?php foreach ($versions as $version): ?>
                                        <?php if(explode(';',$_GET['category'])[1] === $version->getDocument()): ?>
                                            <a id="enable-to-download" href="public/uploads/Documents/<?= $version->getFile()?>" download>
                                                <?= $version->getDatetime()?>
                                            </a>
                                        <?php endif; ?>
                                    <? endforeach; ?>
                                <?php }
                                else{
                                    echo '<h2 id="guest-information">Dokument dostępny tylko dla zalogowanych użytkowników</h2>';
                                }
                                break;
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </section>
    </body>

<template id="content-template">
    <div class="nav__link">
        <p class="collapse__link">
            <span>category</span>
            <i class="fas fa-caret-down"></i>
        </p>
        <ul class="collapse__menu">
        </ul>
    </div>
</template>

<template id="content-template-list-element">
    <button name="category" value="category;title" class="collapse__sublink">title</button>
</template>
</html>
