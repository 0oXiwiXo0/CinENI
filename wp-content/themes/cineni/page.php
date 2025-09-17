<?php
get_header(); ?>

<h1><?php the_title() ?></h1>
<main>
    <?php the_content() ?>
</main>


<?php
$query = new WP_Query( array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'));

?>

<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <p>Catégorie/Description <?php $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    foreach ( $categories as $category ) {
                        echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
                    }
                } else {
                    echo 'Aucune';
                }
                ?>
            </p>

            <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
        </article>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>Aucun article trouvé.</p>
<?php endif; ?>










<?php get_footer(); ?>

