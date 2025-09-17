<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

/*A retravailler la présentation pour que ce soit moins strong*/

<div>
    <strong>Ville :</strong> <?php echo get_post_meta(get_the_ID(), 'ville', true); ?><br>
    <strong>Places totales :</strong> <?php echo get_post_meta(get_the_ID(), 'places_total', true); ?><br>
    <strong>Places balcon :</strong> <?php echo get_post_meta(get_the_ID(), 'places_balcon', true); ?><br>
    <strong>Places zone A&B :</strong> <?php echo get_post_meta(get_the_ID(), 'places_ab', true); ?><br>
    <strong>Places PMR :</strong> <?php echo get_post_meta(get_the_ID(), 'places_pmr', true); ?><br>
    <strong>Prix balcon :</strong> <?php echo get_post_meta(get_the_ID(), 'prix_balcon', true); ?><br>
    <strong>Prix zone A&B :</strong> <?php echo get_post_meta(get_the_ID(), 'prix_ab', true); ?><br>
    <strong>Prix PMR :</strong> <?php echo get_post_meta(get_the_ID(), 'prix_pmr', true); ?><br>
    <strong>URL Tarif/disponibilité :</strong> <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'url', true)); ?>" target="_blank">Voir tarifs</a>
</div>

<div>
    <?php the_content(); ?>
</div>

<?php get_footer(); ?>
