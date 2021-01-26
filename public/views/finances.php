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
                <?php include 'public/components/topnav.php'?>
            </div>
        </header>

        <section class="documentation-box">
            <h1><?php echo explode(';',$_GET['category'])[1] ?></h1>
            <div class="sidemenu">
                <div id="cta">
                    <span class="arrow primera next "></span>
                </div>
            </div>
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
                                    <a id="new-content-link" href="addContent"><span>Dodaj nowy dokument <i class="fas fa-plus"></i></span></a>
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
                                    <?php foreach ($docText as $text): ?>
                                        <p><?php echo $text; ?></p>
                                    <?php endforeach; ?>

                                    <?php if ($docImg): ?>
                                        <?php foreach($docImg as $img): ?>
                                            <a href="#img<?= $img ?>-active">
                                                <img src="public/uploads/docimages/<?= $img ?>" id="img<?= $img ?>" alt="<?= $img ?>">
                                            </a>

                                            <a href="#img<?= $img ?>" class="lightbox" id="img<?= $img ?>-active">
                                                <span style="background-image: url('public/uploads/docimages/<?= $img ?>')"></span>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <h2>Poprzednie wersje</h2>
                                    <div class="previous-version" >
                                    <?php foreach ($versions as $version): ?>
                                        <?php if(explode(';',$_GET['category'])[1] === $version->getDocument()): ?>
                                            <form class="version-description" method="post" action="deleteVersion">
                                                <a id="enable-to-download" href="public/uploads/Documents/<?= $version->getId()?>_<?= $version->getFile()?>" download>
                                                    <?= $version->getDatetime()?> (<?= $version->getAuthorName()?> <?= $version->getAuthorSurname()?>)
                                                </a>
                                                <?php if ($user>1):?>
                                                <button name="version" value="<?= $version->getId()?>"><i class="fas fa-minus"></i></button>
                                                <?php endif; ?>
                                            </form>
                                        <?php endif; ?>
                                    <? endforeach; ?>
                                    </div>
                                    <h4>Komentarze</h4>
                                    <form method="POST" action="newComment" class="new-comment">
                                        <textarea name="new-comment" id="comment" placeholder="Dodaj nowy komentarz..." minlength="1" required></textarea>
                                        <input name="category" value="<?=explode(';',$_GET['category'])[1]?>" class="invisible">
                                        <button class="new-comment-button" type="submit">Dodaj</button>
                                    </form>

                                    <div class="comments-section">
                                        <?php foreach ($comments as $comment): ?>
                                        <div class="one-comment">
                                            <div class="comments-heading">
                                                <span class="comments-author"><?= $comment->getAuthorName()?> <?= $comment->getAuthorSurname()?></span>
                                                <span class="comments-date"><?= $comment->getDate()?></span>
                                            </div>
                                            <div class="comment-content"><?= $comment->getComment()?></div>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
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
