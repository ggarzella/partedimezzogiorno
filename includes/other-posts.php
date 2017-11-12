<div class="row other-posts">

    <?php

    $length = 250;

    if (is_page())
        $the_query = mezzogiorno_get_related_pages(get_the_ID());
    else if (is_single())
        $the_query = mezzogiorno_get_related_posts(get_the_ID(), get_the_category());

    $count = $the_query->post_count;

    if ($count == 1)
        $cols = 'col-md-12 col-sm-12 col-xs-12';
    else if ($count == 2)
        $cols = 'col-md-6 col-sm-12 col-xs-12';
    else if ($count == 3)
        $cols = 'col-md-4 col-sm-12 col-xs-12';

    while ($the_query->have_posts()):

        $the_query->the_post();

        ?>

        <div class="<?=$cols;?> other-posts-container equal-height">
            <div class="title-container">
                <h2 class="title align-middle"><?php the_title(); ?></h2>
            </div>
            <div class="content-container">
                <?php if ($date = mezzogiorno_the_post_date(get_the_ID())): ?>
                    <p class="title-date"><?php echo $date; ?></p>
                <?php endif; ?>
                <p class="content"><?php echo get_excerpt($length); ?></p>
            </div>
            <div class="more-link"><a href="<?php the_permalink(); ?>">Leggi tutto</a></div>
        </div>

    <?php endwhile; ?>

</div>