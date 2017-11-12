<?php

$args = array('category_name' => 'notizie', 'posts_per_page' => 3, 'orderby' => 'meta_value', 'meta_key' => 'meta-box-date');

$the_query = new WP_Query($args);

if ($the_query->have_posts()): ?>

    <div class="news-container">

        <h2 class="title">Notizie</h2>

        <?php while ($the_query->have_posts()):

            $the_query->the_post();

            ?>

            <div class="news-single-container">
                <a href="<?php the_permalink(); ?>">
                    <p class="title-date">
                        <?php echo mezzogiorno_the_post_date(get_the_ID()); ?>
                    </p>
                    <p class="content">
                        <?php the_title(); ?>
                    </p>
                </a>
            </div>

        <?php endwhile; ?>

    </div>

    <span class="separator30"></span>

<?php endif; ?>