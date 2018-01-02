<?php /* Template Name: civile-paggi */ ?>

<?php get_header(); ?>

<?php if (have_posts()): ?>

    <div class="main-container generic">

        <?php

        while (have_posts()):

            global $post;

            the_post();

            $group = mezzogiorno_get_group_by_conf($post->post_name);

            $index = 0;

            ?>

            <div class="main row">
                <div class="col-md-4 col-sm-12">
                    <div class="title-container">
                        <h2 class="title">
                            <?php mezzogiorno_get_the_title(); ?><br/>Gioco del Ponte&nbsp;<?php echo date("Y"); ?>
                        </h2>
                        <!--<div><?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive pull-right')); ?></div>-->
                    </div>
                </div>
                <?php

                for ($index=0; $index<2; $index++):
                    $imageId = get_post_meta(get_the_ID(), "imageId".$index, true);

                    $image_src = wp_get_attachment_image_src($imageId, 'thumbnail');
                    $image_src = $image_src[0];

                    if (get_post_meta(get_the_ID(), "role".$index, true)):
                        ?>
                        <div class="col-md-4 col-sm-12 equal-height">
                            <div class="box-container">
                                <h4 class="title-container">
                                    <span class="title-role"><?php echo get_post_meta(get_the_ID(), "role".$index, true); ?></span>&nbsp;&nbsp;
                                    <span class="title-name"><?php echo (get_post_meta(get_the_ID(), "name".$index, true) . " " . get_post_meta(get_the_ID(), "lastname".$index, true)); ?></span>
                                </h4>
                                <div class="content-container">
                                    <img class="center-block img-responsive" src="<? echo $image_src; ?>"/>
                                    <div class="content">
                                        <p>
                                            <?php echo mezzogiorno_custom_excerpt(get_post_meta(get_the_ID(), "description".$index, true), 300); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="more-link"><a href="<?php echo get_permalink() . get_the_ID() . '/' . ($index + 1); ?>">Leggi tutto</a></div>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endfor; ?>
            </div>

            <?php

            $counter = 0; ?>

            <!--<div class="title-container minor">
                <h2 class="title">Le guardie</h2>
            </div>-->

            <?php

            $current_role = "";
            $number = 0;

            while ($role = get_post_meta(get_the_ID(), "role".$index, true)):

                $col_number = 4;

                if ($role !== $current_role):
                    $current_role = $role;
                    $number = $group[$role];
                    $counter = 0;
                    ?>

                    <div class="title-container minor">
                        <h2 class="title"><?=$current_role; ?></h2>
                    </div>

                    <?php

                endif;

                if ($counter % 3 == 0) echo '<div class="minor row">';

                if ($number === 2 && $counter === 0)
                    $counter = 1;

                ?>
                <div class="col-md-<?=$col_number; ?>">
                    <div class="box-container">
                        <h4 class="title-container">
                            <span class="title-name"><?php echo (get_post_meta(get_the_ID(), "name".$index, true) . " " . get_post_meta(get_the_ID(), "lastname".$index, true)); ?></span>
                        </h4>
                    </div>
                </div>

                <?php

                $index++;

                $counter++;

                if ($counter % 3 == 0) echo '</div>';

            endwhile;

            if ($counter % 3 != 0)
                echo '</div>';

            ?>

            <div class="description box-container">
                <div class="content-container">
                    <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive pull-left')); ?>
                    <div class="content"><?php the_content(); ?></div>
                </div>
            </div>

            <?php get_template_part('includes/other', 'posts'); ?>

        <?php endwhile; ?>

    </div>

<?php endif; ?>

    </div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>