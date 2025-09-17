<?php get_header(); ?>

<h1>Catégorie : <?php single_cat_title(); ?></h1>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
            <p>Publié le <?php the_time('j F Y'); ?></p>
        </article>
    <?php endwhile; ?>


    <div class="pagination">
        <?php
        the_posts_pagination( array(
            'mid_size' => 2,
            'prev_text' => __('« Précédent'),
            'next_text' => __('Suivant »'),
        ) );
        ?>
    </div>

<?php else : ?>
    <p>Aucun article trouvé dans cette catégorie.</p>
<?php endif; ?>

<?php get_footer(); ?>
