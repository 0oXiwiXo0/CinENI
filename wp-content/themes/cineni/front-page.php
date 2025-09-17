<?php
$articles = new WP_Query([
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        // 'post__not_in' => [get_the_category(['Non classé'])],
        'posts_per_page' => 3,
]);

get_header();
?>

<?php include('includes/festitle.php');?>

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

    <div class="front-mag-articles">
        <?php if ($articles->have_posts()): ?>
            <?php while ($articles->have_posts()): ?>
                <?php $articles->the_post(); ?>
                <article class="front-article">
                    <?php the_post_thumbnail(); ?>
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        foreach ( $categories as $cat ) {
                            echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="article-category">' . esc_html( $cat->name ) . '</a>';
                        }
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>" class="article-title"><?php the_title(); ?></a>
                    <div class="article-excerpt"><?php the_excerpt(); ?></div>
                    <div class="article-author">Par <?php the_author(); ?></div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>
                Pas d'article pour le moment !
            </p>
        <?php endif; ?>
    </div>
</div>

<div class="front-content">
    <h2><a href="festival">la séléction du festival</a></h2>

    <?php
    // Affichage du programme --> une fois le plugin créé
    ?>
</div>

<div class="front-content front-salles">
    <h2 class="front-salles-title">les salles</h2>

    <p>
        Bienvenue dans l'univers décalé des salles de cinéma de l'ENI
    </p>

    <a href="salles" class="btn-link blue">Pixel Play</a>
</div>

<?php get_footer(); ?>
