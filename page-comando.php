<?php /* Template Name: comando */ ?>

<?php get_header(); ?>

<?php if (have_posts()): ?>

    <div class="main-content generic">

        <?php

        while (have_posts()):

            the_post();

            $index = 0;

            $imageId = get_post_meta(get_the_ID(), "imageId".$index, true);

            $image_src = wp_get_attachment_image_src($imageId, 'medium');
            $image_src = $image_src[0];

            ?>

            <div class="main-container">

                <div class="main row">
                    <div class="col-md-4">
                        <div class="title-container">
                            <h2 class="title"><?php mezzogiorno_get_the_title(); ?></h2>
                            <div class="subtitle">Composizione del Comando di Mezzogiorno per l'edizione 2017</div>
                        </div>
                    </div>
                    <?php
                        if (get_post_meta(get_the_ID(), "role".$index, true)):
                    ?>
                    <div class="col-md-8">
                        <div class="box-container">
                            <h4 class="title-container">
                                <span class="title-role"><?php echo get_post_meta(get_the_ID(), "role".$index, true); ?></span>&nbsp;&nbsp;
                                <span class="title-name"><?php echo (get_post_meta(get_the_ID(), "name".$index, true) . " " . get_post_meta(get_the_ID(), "lastname".$index, true)); ?></span>
                            </h4>
                            <img class="img-responsive pull-left" src="<? echo $image_src; ?>"/>
                            <div class="content">
                                <p><?php echo mezzogiorno_custom_excerpt(get_post_meta(get_the_ID(), "description".$index, true), 750); ?></p>
                            </div>
                            <div class="more-link text-left"><a href="<?php echo get_permalink() . get_the_ID() . '/' . ($index + 1); ?>">Leggi tutto</a>
                            </div>
                        </div>
                    </div>
                        <?php endif; ?>
                </div>

                <?php

                $index++;

                $counter = 0;

                while (get_post_meta(get_the_ID(), "role".$index, true)):

                    $imageId = get_post_meta(get_the_ID(), "imageId".$index, true);

                    $image_src = wp_get_attachment_image_src($imageId, 'thumbnail');
                    $image_src = $image_src[0];

                    if ($counter % 2 == 0)
                        echo '<div class="row">';
                ?>
                    <div class="col-md-6">
                        <div class="box-container equal-height">
                            <h4 class="title-container">
                                <span class="title-role"><?php echo get_post_meta(get_the_ID(), "role".$index, true); ?></span>&nbsp;&nbsp;
                                <span class="title-name"><?php echo (get_post_meta(get_the_ID(), "name".$index, true) . " " . get_post_meta(get_the_ID(), "lastname".$index, true)); ?></span>
                            </h4>
                            <img class="img-responsive pull-left" src="<? echo $image_src; ?>"/>
                            <div class="content">
                                <p><?php echo mezzogiorno_custom_excerpt(get_post_meta(get_the_ID(), "description".$index, true), 400); ?></p>
                            </div>
                            <div class="more-link text-left"><a href="<?php echo get_permalink() . get_the_ID() . '/' . ($index + 1); ?>">Leggi tutto</a></div>
                        </div>
                    </div>

                <?php

                    $counter++;

                    if ($counter % 2 == 0)
                        echo '</div>';

                    $index++;

                endwhile;

                if ($counter % 2 != 0)
                    echo '</div>';

                ?>

                <?php get_template_part('includes/other', 'posts'); ?>

            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>

</div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>