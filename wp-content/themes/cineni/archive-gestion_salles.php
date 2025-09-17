<?php
$articles = new WP_Query([
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
    // 'post__not_in' => [get_the_category(['Non classé'])],
        'posts_per_page' => 3,
]);

$salles = new WP_Query([
        'post_type' => 'gestion_salles',
        'orderby' => 'name',
    'order' => 'ASC',
]);

get_header();
?>

<h1 class="big-title bigger">les<br>salles</h1>

<?php if ($salles->have_posts()) : ?>
    <?php while ($salles->have_posts()) : $salles->the_post(); ?>
        <div class="salle">
            <div class="salle-title">
                <h2><?= get_post_meta(get_the_ID(), 'ville', true); ?></h2>
                <p>
                    <?php the_title(); ?>
                </p>
            </div>
            <div class="salle-content">
                <p>
                    <?php the_content(); ?>
                </p>
                <div class="places">
                    <p>
                        <?= get_post_meta(get_the_ID(), 'places_total', true); ?> places
                        -
                        <?= get_post_meta(get_the_ID(), 'places_pmr', true); ?> PMR
                    </p>
                    <a href="<?= esc_url(get_post_meta(get_the_ID(), 'url', true)); ?>"
                       target="_blank" class="btn-link blue">Tarifs/Disponibilités</a>
                </div>
            </div>
            <div class="salle-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<div class="front-content">
    <h2><a href="mag">Le Mag</a></h2>

    <?php include('includes/mag.php'); ?>
</div>

<?php include('includes/festitle.php'); ?>

<?php get_footer(); ?>
