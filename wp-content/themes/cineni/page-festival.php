<?php

$events = new WP_Query([
        'post_type' => 'evenements',
        'orderby' => 'date',
        'order' => 'desc',
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



<?php include('includes/newsletter.php'); ?>

<?php get_footer(); ?>
