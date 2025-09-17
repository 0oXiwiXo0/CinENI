<?php

$order = 'DESC';

if (isset($_GET['order']) && in_array($_GET['order'], ['asc', 'desc'])) {
    $order = $_GET['order'];
}

$articles = new WP_Query([
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => $order,
]);

get_header();
?>

<h1 class="big-title biggest">le<br>mag</h1>

<div class="mag-right">
    <p>
        Le mag qui fusionne cinéma et code !
        <br>
        À l’occasion de notre festival <strong>ENI CODE</strong>, plongez dans l’univers où la magie du 7e art
        rencontre l’innovation
        numérique. Ici, nous célébrons les rencontres inattendues entre la créativité cinématographique et la
        précision
        du développement. Découvrez des interviews exclusives avec des réalisateurs et développeurs qui transforment
        leurs passions en œuvres d'art, où l’algorithme devient un partenaire de création.
    </p>
    <p>
        À chaque édition, <em>"Le Mag"</em> vous emmène dans les coulisses de films où les effets spéciaux sont
        aussi aboutis que
        les lignes de code, et où les outils numériques redéfinissent le storytelling. Suivez les récits fascinants
        de
        créateurs qui codent leurs visions cinématographiques et explorez comment les technologies de pointe
        influencent
        chaque aspect de la production.
    </p>
    <p>
        Nous vous invitons à voir le cinéma sous un nouvel angle, où chaque pixel compte. Préparez-vous à une
        immersion
        totale dans un festival aussi décalé qu’innovant, où l’art et la technologie se rencontrent pour créer des
        expériences uniques. <em>"Pixel Press"</em> est votre passeport pour un voyage au cœur d'un festival où
        l'avenir du
        cinéma se dessine <strong>pixel par pixel</strong>.
    </p>
</div>

<table>
    <thead>
    <tr class="trhead">
        <th class="mag-table-title">titre</th>
        <th colspan="2">
            catégorie/<span class="white">description</span>
            <a href="?order=asc" class="asc">▲</a>
            <a href="?order=desc" class="desc">▼</a>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php if ($articles->have_posts()) : ?>
        <?php while ($articles->have_posts()) : $articles->the_post(); ?>
            <tr>
                <td><h2><?php the_title(); ?></h2></td>
                <td>
                    <?php
                    $categories = get_the_category();

                    foreach ($categories as $category) {
                        echo '<a href="' . $category->slug . '" class="mag-link">' . $category->name . '</a>';
                    }
                    the_content();
                    ?>
                </td>
                <td>
                    <a href="<?php the_permalink() ?>">→</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php endif; ?>
    </tbody>
</table>

<?php include('includes/newsletter.php'); ?>

<?php get_footer(); ?>
