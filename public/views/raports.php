<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "public/components/head_template.php"?>
        <link rel="stylesheet" type="text/css" href="public/css/main-style.css">
        <script type="text/javascript" src="public/scripts/app.js" defer></script>
        <title><?=$_GET['type']?></title>
    </head>

    <body>
        <header id="raport-header">
            <?php include 'public/components/topnav.php'?>
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
                                        <button name="category" value="<?= $link->getCategory() ?>;<?= $link->getTitle() ?>" class="get-raports-button"><?= $link->getTitle()?></button>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if(isset($_COOKIE['user'])):?>
                    <a href="addCategory" class="raports-card">
                        <div id="new-raports" class="raports-card-img">
                            <div class="raports-card-icon"><i class="fas fa-plus"></i></div>
                            <div id="add-new-raports">
                                <h2>Dodaj nową kategorię</h2>
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </article>
    </body>
</html>
