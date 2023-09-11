<?php get_header(); ?>

<main class="<?php echo (get_post_type() === 'students') ? 'students-template' : 'article-post'; ?>">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            if (get_post_type() === 'students') :
    ?>
                <section id="presentation">
                    <figure>
                        <img src="<?php echo esc_url(get_field('portrait')['url']); ?>" alt="<?php echo esc_attr(get_field('portrait')['alt']); ?>">
                        <figcaption>
                            <div>
                                <a href="<?php echo esc_url(get_field('github')); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/github.svg" alt="Lien vers le GitHub">
                                </a>
                                <a href="<?php echo esc_url(get_field('linkedin')); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/linkedin.svg" alt="Lien vers le LinkedIn">
                                </a>
                            </div>
                            <button href="<?php echo esc_url(get_field('portfolio')); ?>">Portfolio</button>
                        </figcaption>
                    </figure>
                    <section>
                        <h1><?php echo esc_html(get_field('names')); ?></h1>
                        <div class="socials">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/hearts.svg" alt="Like">
                                <figcaption>
                                    <p><?php echo esc_html(get_field('likes')); ?></p>
                                </figcaption>
                            </figure>
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/dislike.svg" alt="Dislike">
                                <figcaption>
                                    <p><?php echo esc_html(get_field('dislikes')); ?></p>
                                </figcaption>
                            </figure>
                        </div>
                        <p><?php echo esc_html(get_field('description')); ?></p>
                    </section>
                <?php
            else :
                ?>
                    <section id="article">
                        <figure>
                            <?php the_post_thumbnail() ?>
                            <figcaption>
                                <h1><?php the_title(); ?></h1>
                                <div>
                                    <h2><?php the_author() ?></h2>
                                    <h3 class="date"><?php echo get_the_date(); ?></h3>
                                </div>
                            </figcaption>
                        </figure>

                        <section>
                            <p><?php the_content(); ?></p>
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
                        </section>
                    </section>
        <?php
            endif;
        endwhile;
    else :
        echo '<p>No posts found.</p>';
    endif;
        ?>
</main>

<?php get_footer(); ?>