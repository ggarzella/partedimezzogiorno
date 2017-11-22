<?php get_header(); ?>

<?php if (have_posts()): ?>

    <div class="main-content generic">

<?php

    while (have_posts()):

        the_post();
?>
        <div class="box-container">
            <h2 class="title-container">
                <span class="title"><?php mezzogiorno_get_the_title(); ?></span>
            </h2>
            <div class="content">
                <?php the_content(); ?>
            </div>

            <?php get_template_part('includes/other', 'posts'); ?>
        </div>

    <?php endwhile; ?>

    </div>

<?php endif; ?>

</div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>
