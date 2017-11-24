<?php get_header(); ?>

    <div class="main-container generic">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12" id="home-block-center">
                <h2 class="main title-container">
                    <span class="title">Eventi</span>
                </h2>
                <?php get_template_part('includes/home', 'center'); ?>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12" id="home-block-side">
                <?php get_template_part('includes/home', 'sidebar'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>