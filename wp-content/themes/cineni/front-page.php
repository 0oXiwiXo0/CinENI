<?php
$articles = new WP_Query([
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
    // 'post__not_in' => [get_the_category(['Non classé'])],
        'posts_per_page' => 3,
]);

$events = new WP_Query([
        'post_type' => 'evenement',
        'orderby' => 'date',
        'order' => 'asc',
]);

get_header();
?>

<?php include('includes/festitle.php'); ?>

<div class="front-about">
    <p>
        Il était une fois, dans les couloirs labyrinthiques de l’École d’Informatique ENI, deux esprits brillants
        qui
        rêvaient de fusionner le monde du code avec celui du cinéma. Leurs noms ? <strong>Professeur Octet</strong>
        et
        <strong>Ingénieur Hexadécimal</strong>.
        Ensemble, ils formèrent une alliance improbable, mélangeant des lignes de code avec des répliques cultes de
        films.
    </p>
    <p>
        Un jour pluvieux de 2020, alors que le Professeur Octet sirotait son café et que l’Ingénieur Hexadécimal
        débuggait un algorithme, ils eurent une révélation simultanée. Pourquoi ne pas créer un festival de cinéma
        unique, spécialement pour les étudiants en développement informatique ? Un endroit où les bits et les pixels
        se
        mêleraient aux bobines et aux pop-corn.<br>
        ...
    </p>
    <a href="about" class="btn-link">ENI Code Saga</a>
</div>

<div class="front-content">
    <h2><a href="mag">Le Mag</a></h2>

    <?php include('includes/mag.php'); ?>
</div>

<div class="front-content">
    <h2><a href="festival">la séléction du festival</a></h2>

    <div class="front-events-list">
        <?php if ($events->have_posts()) : ?>
            <?php while ($events->have_posts()) : $events->the_post(); ?>
                <div class="event">

                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>

    <div class="events-list">
        <?php if ($events->have_posts()) : ?>
            <?php while ($events->have_posts()) : $events->the_post(); ?>
                <div class="event" id="<?= get_post_field('post_name', get_the_ID()); ?>">
                    <div class="event-description">
                        <div class="event-day">
                            <?= get_post_meta(get_the_ID(), 'jour_evenement', true); ?>
                        </div>
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                        <div class="event-type">
                            <?= get_post_meta(get_the_ID(), 'type_film', true); ?>
                        </div>
                        <div class="event-movie">
                            <?= get_post_meta(get_the_ID(), 'titre_film', true); ?>
                        </div>
                        <div class="event-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <a href="<?= get_post_meta(get_the_ID(), 'url_film', true); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</div>

<div class="front-content front-salles">
    <h2 class="front-salles-title">les salles</h2>

    <p>
        Bienvenue dans l'univers décalé des salles de cinéma de l'ENI
    </p>

    <a href="salles" class="btn-link blue">Pixel Play</a>
</div>

<?php get_footer(); ?>
