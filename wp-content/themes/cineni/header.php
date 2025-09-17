<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
<header>
    <div>
        <a href="<?= home_url(); ?>">
            Youhou
        </a>
        <h1>ENI Fait Son Cinéma !</h1>
    </div>
    <nav>
        <?php wp_nav_menu(['theme_location' => 'main']); ?>
    </nav>
</header>
