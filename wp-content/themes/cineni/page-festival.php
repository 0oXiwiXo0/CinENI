<?php

$events = new WP_Query([
        'post_type' => 'evenement',
        'orderby' => 'date',
        'order' => 'asc',
]);

$salles = new WP_Query([
        'post_type' => 'gestion_salles',
        'orderby' => 'name',
        'order' => 'ASC',
]);

get_header();
?>

<h1 class="big-title biggest">le<br>festival</h1>

<div class="mag-right">
    <p>
        Bienvenue à la nouvelle édition du Festival <strong>ENI CODE</strong>.
    </p>
    <p>
        Préparez-vous à plonger dans un univers où les pixels dansent, les algorithmes chantent et les écrans prennent
        vie ! Cette année, notre festival promet d’être plus épique qu’une mise à jour de Windows en plein milieu d’une
        présentation importante.
    </p>
    <p>
        Au programme : des courts-métrages qui vous feront rire, pleurer, et peut-être même reconsidérer votre choix de
        mot de passe. Des débats enflammés sur le meilleur langage de programmation pour réaliser un film (Python ou
        JavaScript ?), et bien sûr, des rencontres avec des réalisateurs qui ont troqué leur clavier pour une caméra.
    </p>
    <p>
        Alors, sortez vos lunettes 3D, préparez vos pop-corns et rejoignez-nous pour une aventure cinématographique
        inoubliable, où l’informatique et le cinéma fusionnent pour créer de la magie pure !
    </p>
    <p>
        Les 23, 24, 25 & 26 décembre, <strong>Action</strong> !
    </p>
</div>

<div class="events-list">
    <?php if ($events->have_posts()) : ?>
        <?php while ($events->have_posts()) : $events->the_post(); ?>
            <div class="event ancre" id="<?= get_post_field('post_name', get_the_ID()); ?>">
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
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>

<div class="front-content front-salles" id="enterprice">
    <h2 class="front-salles-title">enter price</h2>

    <div class="festival-salles-list">
        <?php if ($salles->have_posts()) : ?>
            <?php while ($salles->have_posts()) : $salles->the_post(); ?>
                <div class="festival-salle">
                    <h3><?= get_post_meta(get_the_ID(), 'ville', true); ?></h3>
                    <div class="places">
                        <?= get_post_meta(get_the_ID(), 'places_total', true); ?>
                        places
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>balcon</th>
                            <th>zone a & b</th>
                            <th>pmr</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="row-title"><td colspan="3">disponibilité</td></tr>
                        <tr>
                            <td>
                                <?= get_post_meta(get_the_ID(), 'places_balcon', true); ?>
                            </td>
                            <td>
                                <?= get_post_meta(get_the_ID(), 'places_ab', true); ?>
                            </td>
                            <td>
                                <?= get_post_meta(get_the_ID(), 'places_pmr', true); ?>
                            </td>
                        </tr>
                        <tr class="row-title"><td colspan="3">tarifs</td></tr>
                        <tr>
                            <td>
                                <?= get_post_meta(get_the_ID(), 'prix_balcon', true); ?>
                            </td>
                            <td>
                                <?= get_post_meta(get_the_ID(), 'prix_ab', true); ?>
                            </td>
                            <td>
                                <?= get_post_meta(get_the_ID(), 'prix_pmr', true); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>

    <a href="salles" class="btn-link blue">Je Réserve</a>
</div>

<?php include('includes/newsletter.php'); ?>

<?php get_footer(); ?>
