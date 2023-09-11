<?php get_header(); ?>

<main>
    <section id="blog">
        <h1>Tag: <?php single_tag_title(); ?></h1>
        <div class="hr-container">
            <hr class="stylized-hr">
        </div>
        <div class="categories-container">
            <h3>Catégories :</h3>
            <div class="categories">
                <?php
                $tags = get_tags();
                if ($tags) :
                    $count = count($tags);
                    $i = 0;
                    foreach ($tags as $tag) :
                        $i++;
                ?>
                        <p>
                            <a href="<?php echo get_tag_link($tag->term_id); ?>"> <!-- Link to tag archive -->
                                <?php echo esc_html($tag->name); ?>
                            </a>
                            <?php if ($i !== $count) : ?>
                                <span>|</span>
                            <?php endif; ?>
                        </p>
                    <?php
                    endforeach;
                else :
                    ?>
                    <p>No tags found.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="cards-wrapper">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                    $thumbnail_id = get_post_thumbnail_id();
                    $thumbnail_array = wp_get_attachment_image_src($thumbnail_id, 'full');
                    $thumbnail_url = $thumbnail_array ? $thumbnail_array[0] : '';
                ?>
                    <a class="card" href="<?php the_permalink() ?>" style="--bg-img: url(<?php echo esc_url($thumbnail_url); ?>)">
                        <div>
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_excerpt(); ?></p>
                            <div class="date"><?php echo get_the_date(); ?></div>
                            <div class="tags">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                    foreach ($tags as $tag) {
                                        echo '<div class="tag">' . esc_html($tag->name) . '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>Pas d'articles à afficher pour le moment.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>