<?php get_header(); ?>

<main>
    <?php
    if (is_page('About Us')) :
    ?>
        <h1>About Our Company</h1>
        <p>This is hardcoded information about our company.</p>
    <?php
    elseif (is_page('Blog')) :
    ?>
        <section id="blog">
            <h1>Actualités</h1>
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
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                );
                $post_query = new WP_Query($args);

                if ($post_query->have_posts()) {
                    while ($post_query->have_posts()) : $post_query->the_post();
                        $thumbnail_id = get_post_thumbnail_id();
                        $thumbnail_array = wp_get_attachment_image_src($thumbnail_id, 'full');
                        $thumbnail_url = $thumbnail_array ? $thumbnail_array[0] : '';
                ?>
                        <a class="card" href="<?php the_permalink() ?>" style="--bg-img: url(<?php echo esc_url($thumbnail_url); ?>)">
                            <div>
                                <h1><?php the_title() ?></h1>
                                <p><?php the_excerpt() ?></p>
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
                <?php
                    endwhile;
                    wp_reset_postdata();
                } else {
                    echo "<p>Pas d'\articles à afficher pour le moment.</p>";
                }
                ?>
            </div>
        </section>
    <?php
    elseif (is_page('Team')) :
    ?>
        <section id="team-page">
            <h1>Stagiaires</h1>
            <div class="hr-container">
                <hr class="stylized-hr">
            </div>

            <div class="container-cards">
                <?php
                $args = array(
                    'post_type' => 'students',
                    'posts_per_page' => -1
                );

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                ?>

                        <div class="card" data-href="<?php the_permalink(); ?>">
                            <div class="person">
                                <div class="image">
                                    <figure class="container-inner">
                                        <img class="circle" src="<?php echo get_template_directory_uri(); ?>/asset/media/pictures/v535batch2-mynt-30.jpg" />
                                        <figcaption>
                                            <img class="img img1" src="<?php echo esc_url(get_field('portrait')['url']); ?>" alt="<?php echo esc_attr(get_field('portrait')['alt']); ?>" />
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="infos">
                                    <h2><?php echo esc_html(get_field('names')); ?></h2>
                                    <div class="like">
                                        <figure>
                                            <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/hearts.svg" alt="Like icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/dislike.svg" alt="Dislike icon">
                                        </figure>
                                        <div>
                                            <p><?php echo esc_html(get_field('likes')); ?></p>
                                            <p><?php echo esc_html(get_field('dislikes')); ?></p>
                                        </div>
                                    </div>
                                    <div class="socials">
                                        <a href="<?php echo esc_url(get_field('github')); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/github.svg" alt="Github link">
                                        </a>
                                        <a href="<?php echo esc_url(get_field('linkedin')); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/linkedin.svg" alt="LinkedIn link">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="presentation">
                                <p><?php echo esc_html(get_field('extract')); ?></p>
                            </div>
                        </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No students found.</p>';
                endif;
                ?>
            </div>
        </section>


    <?php
    else :
        echo '<p>No content found</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>