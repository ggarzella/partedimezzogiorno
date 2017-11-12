<?php get_header(); ?>

    <div class="category">

        <?php get_template_part('includes/site', 'logo'); exit; ?>

        <?php //if (have_posts()): ?>

            <div class="main-content generic">

                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>Categoria

                <?php /*

                while (have_posts()):

                    the_post();
                    ?>

                    <div class="page-container">
                        <h2 class="row nopadding title-container">
                            <span class="col-md-11 col-sm-11 col-xs-11 title"><?php the_title(); ?></span>
                            <?php if (is_user_logged_in()): ?>
                                <?php mezzogiorno_get_edit_link_post(get_the_ID()); ?>
                            <?php endif; ?>
                        </h2>
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <?php get_template_part('includes/other', 'posts'); ?>

                <?php endwhile; */ ?>

            </div>

        <?php //endif; ?>

    </div>

</div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>