<?php get_header(); ?>

<?php if (have_posts()): ?>

    <div class="main-container generic">

    <?php

        while (have_posts()):

            the_post();

    ?>

            <div class="box-container">
                <h2 class="title-container">
                    <span class="title"><?php mezzogiorno_get_the_title(); ?></span>
                </h2>
                <div class="title-date-container">
                    <span class="title-date">
                        <span class="fa fa-calendar">&nbsp;</span>
                        <?php echo mezzogiorno_the_post_date(get_the_ID()); ?>
                    </span>
                </div>
                <div class="content-container">
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <?php get_template_part('includes/other', 'posts'); ?>

        <?php endwhile; ?>
    </div>

<?php endif; ?>

</div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>