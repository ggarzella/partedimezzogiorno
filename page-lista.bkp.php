<?php /* Template Name: lista */ ?>

<?php get_header(); ?>

    <?php if (have_posts()): ?>

        <div class="main-container generic">

            <?php while (have_posts()):

            the_post();

            ?>

                <div class="row">

                <?php

                    $counter = 0;

                    $query = mezzogiorno_get_child_pages(get_the_ID());

                    while ($query->have_posts()):

                        $query->the_post();

                        ?>

                        <div class="col-md-4 col-sm-6 col-xs-6 equal-height">
                            <div class="box-container">
                                <div class="title-container">
                                    <h2 class="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <div class="content-container">
                                    <div class="content">
                                        <?php the_post_thumbnail('thumbnail', array('class' => 'aligncenter img-responsive')); ?>
                                        <p class="hidden-xs"><?php echo get_excerpt(150); ?></p>
                                    </div>
                                </div>
                                <div class="more-link text-left"><a href="<?php echo get_permalink(); ?>">Leggi tutto</a></div>
                            </div>
                        </div>

                        <?php

                    endwhile;

                    wp_reset_postdata();
                ?>

                </div>

                <?php get_template_part('includes/other', 'posts'); ?>

            <?php endwhile; ?>


        </div>

    <?php endif; ?>

</div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>