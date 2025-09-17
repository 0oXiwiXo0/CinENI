<div class="front-mag-articles">
    <?php if ($articles->have_posts()): ?>
        <?php while ($articles->have_posts()): ?>
            <?php $articles->the_post(); ?>
            <article class="front-article">
                <?php the_post_thumbnail(); ?>
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    foreach ($categories as $cat) {
                        echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="article-category">' . esc_html($cat->name) . '</a>';
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