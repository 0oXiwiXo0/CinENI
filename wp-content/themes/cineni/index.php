<?php get_header(); ?>

<?php
$query = new WP_Query( array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'));

?>

<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_post_thumbnail(); ?>
            <?php the_content(); ?>
            <p>Publié le <?php the_time('F j, Y'); ?> par <?php the_author(); ?></p>
            <a href="<?php the_permalink(); ?>">Lire la suite</a>
        </article>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>Aucun article trouvé.</p>
<?php endif; ?>

<?php get_footer(); ?>