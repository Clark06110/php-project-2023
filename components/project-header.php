<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php if (isset($title)): ?>
                <?= $title ?>
            <?php else : ?>
                <?= "Titre Casual" ?>
            <?php endif ?>

        </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
    </head>
    <body>
        <div class="Navbar">
            <a href="/">Accueil</a>
            <a href="/">Contact</a>
        </div>