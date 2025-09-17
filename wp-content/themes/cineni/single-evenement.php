<?php get_header(); ?>
    <h1><?php the_title(); ?></h1>
    <div>
    <strong>Jour de l'évènement:</strong> <?php echo get_post_meta(get_the_ID(), 'jour_evenement', true); ?><br>
    <strong>Titre de l'évènement:</strong> <?php echo get_post_meta(get_the_ID(), 'titre_evenement', true); ?><br>
    <strong>Titre du film:</strong> <?php echo get_post_meta(get_the_ID(), 'titre_film', true); ?><br>
    <strong>Type de film:</strong> <?php echo get_post_meta(get_the_ID(), 'type_film', true); ?><br>
    <strong>Contenu du film:</strong> <?php echo get_post_meta(get_the_ID(), 'contenu_film', true); ?><br>
    <strong>Url du film:</strong> <?php echo get_post_meta(get_the_ID(), 'url_film', true); ?><br>
    <div>
        <?php the_content(); ?>
    </div>
<?php get_footer(); ?>