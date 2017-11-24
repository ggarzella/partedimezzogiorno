<?php /* Template Name: lista */ ?>

<?php get_header(); ?>

    <?php if (have_posts()): ?>

        <div class="main-content generic">

            <?php while (have_posts()):

            the_post();

            ?>

            <div class="main-container">

                <!--<h2 class="title-container">
                    <span class="title"><?php mezzogiorno_get_the_title(); ?></span>
                </h2>-->

                <?php

                    $counter = 0;

                    $query = mezzogiorno_get_child_pages(get_the_ID());

                    while ($query->have_posts()):

                        $query->the_post();

                        if ($counter % 3 == 0) echo '<div class="row">';

                        ?>

                        <div class="col-md-4 equal-height">
                            <div class="title-container">
                                <h2 class="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="content-container">
                                <div class="content">
                                    <?php the_post_thumbnail('thumbnail', array('class' => 'aligncenter img-responsive')); ?>
                                    <br/>
                                    <p><?php echo get_excerpt(350); ?></p>
                                </div>
                            </div>
                            <div class="more-link text-left"><a href="<?php echo get_permalink(); ?>">Leggi tutto</a></div>
                        </div>

                        <?php

                        $counter++;

                        if ($counter % 3 == 0 || $counter == $query->post_count ) echo '</div>';

                    endwhile;

                    wp_reset_postdata();
                ?>

                <?php get_template_part('includes/other', 'posts'); ?>

            </div>

            <?php endwhile; ?>

        </div>

    <?php endif; ?>

</div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>