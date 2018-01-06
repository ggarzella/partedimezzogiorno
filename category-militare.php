<?php get_header(); ?>

<?php

$categoryId = get_query_var('cat');

$category_query_args = array(
    'cat' => $categoryId,
    'post_type' => 'gruppi'
);

$query = new WP_Query($category_query_args);

?>

<div class="main-container generic">

    <div class="row app">

        <?php

        $counter = 0;

        while ($query->have_posts()):

            $query->the_post();

            ?>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="box-container">
                    <div class="content-container">
                        <div class="content">
                            <a href="<?php echo get_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail', array('class' => 'aligncenter img-responsive')); ?>
                            </a>
                        </div>
                    </div>
                    <div class="title-container">
                        <h2 class="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
            </div>

            <?php

        endwhile;

        wp_reset_postdata();

        ?>

    </div>

</div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>