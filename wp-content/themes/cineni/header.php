<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php use includes\NavWalker;

    wp_head(); ?>
</head>

<body>
<header>
    <a href="<?= home_url(); ?>" class="home">
        ENI
    </a>
    <nav>
        <?php
        require_once get_template_directory() . '/includes/NavWalker.php';
        wp_nav_menu([
                'theme_location' => 'main',
                'walker' => new NavWalker(),
        ]);
        ?>
    </nav>
</header>
<main>