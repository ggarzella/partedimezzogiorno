<?php

/*if ($the_query->have_posts()):

    while($the_query->have_posts()):
        $the_query->the_post();*/

        //$tmp = explode(' ', mezzogiorno_the_post_date(get_the_ID()));
        //$postDate = $tmp[0] . ' ' . $tmp[1] . '<br/>' . $tmp[2];
        ?>


        <div class="box-container">
            <h2 class="title-container">
                <!--<span class="title-date col-md-2 col-sm-2 col-xs-2 text-center">
                    <?php echo $postDate; ?>
                </span>-->
                <span class="title">
                    <?php mezzogiorno_get_the_title(); ?>
                </span>
            </h2>
            <div class="content-container">
                <?php if (get_the_post_thumbnail()): ?>
                    <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive pull-left')); ?>
                <?php endif; ?>
                <div class="content">
                    <?php the_excerpt(80); ?>
                </div>
            </div>
            <div class="more-link"><a href="<?php echo get_permalink(); ?>">Leggi tutto</a></div>
        </div>

    <?php /*endwhile; ?>

    <h2 class="other-events">
        <?php if ($the_query->max_num_pages > 1): ?>
            <span class="loadmore">Leggi altro</span>
        <?php endif; ?>
    </h2>

<?php endif;*/ ?>