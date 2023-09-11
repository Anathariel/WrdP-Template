<?php get_header(); ?>
<main>
<section id="introduction">
            <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/asset/media/pictures/v535batch2-mynt-30.jpg" alt="Image temporaire">
                <figcaption>
                    <h1>Team 180</h1>
                    <p>Cupidatat nulla pariatur ipsum ea aute labore. Commodo exercitation non ullamco deserunt laborum
                        et eu ad nulla occaecat voluptate id. Incididunt eiusmod fugiat irure mollit. Id nostrud eiusmod
                        tempor eiusmod officia fugiat exercitation ullamco quis exercitation Lorem. Excepteur laboris
                        laborum id ea elit et est culpa est nisi occaecat. Veniam nostrud sint occaecat qui quis
                        voluptate velit dolore excepteur adipisicing aliquip eu ex quis.</p>
                </figcaption>
            </figure>
        </section>

    <section id="features">
        <div class="text-container">
            <h2>La promo 180</h2>
            <p>Consectetur commodo aliquip cillum ipsum eu laborum aliqua amet laborum labore cillum. Ullamco
                reprehenderit deserunt ut deserunt. Magna proident sint labore culpa. Proident duis reprehenderit
                non laboris est non aliqua velit veniam fugiat eu deserunt cillum aliqua. Cillum magna consectetur
                id excepteur fugiat irure. Voluptate eu culpa pariatur anim officia. Proident reprehenderit
                incididunt culpa officia enim elit dolore.</p>
        </div>

        <div class="infinite-carousel">
            <div class="items">
                <?php
                $args = array(
                    'post_type' => 'students',
                    'posts_per_page' => -1,
                );

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                        $names = get_field('names');
                        $portrait = get_field('portrait');
                ?>
                        <figure class="item">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($portrait['url']); ?>" alt="<?php echo esc_attr($portrait['alt']); ?>">
                            </a>
                            <figcaption>
                                <p><?php echo esc_html($names); ?></p>
                            </figcaption>
                        </figure>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
                <div class="button-container">
                    <div class="button">
                        <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/alt-arrow-left.svg">
                    </div>
                    <div class="button">
                        <img src="<?php echo get_template_directory_uri(); ?>/asset/media/icons/alt-arrow-right.svg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news">
        <h2>Actualités</h2>
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
        <a href="<?php echo get_permalink(2); ?>">En savoir plus . . .</a>
    </section>
</main>
<?php get_footer(); ?>