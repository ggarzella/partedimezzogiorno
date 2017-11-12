<?php

$args = array(
    'category_name' => 'eventi',
    'posts_per_page' => 4,
    'meta_key'   => 'meta-box-date',
    'orderby'    => 'meta_value',
    'meta_query' => array(
        array(
            'key'     => 'meta-box-date',
            'orderby' => 'meta_value'
        )
    )
);

global $the_query;
$the_query = new WP_Query($args);

if ($the_query->have_posts()):

    $category = get_category(get_cat_ID('eventi'));
    $total = $category->category_count;

    $count = 1;

    while($the_query->have_posts()):
        $the_query->the_post();
        $count++;

        //$tmp = explode(' ', mezzogiorno_the_post_date(get_the_ID()));
        //$postDate = $tmp[0] . ' ' . $tmp[1] . '<br/>' . $tmp[2];
    ?>

        <div class="home-container">
            <h2 class="title-container">
                <!--<span class="title-date col-md-2 col-sm-2 col-xs-2 text-center">
                    <?php echo $postDate; ?>
                </span>-->
                <span class="title">
                    <?php mezzogiorno_get_the_title(); ?>
                </span>
            </h2>
            <?php if (get_the_post_thumbnail()): ?>
                <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive pull-left')); ?>
            <?php endif; ?>
            <div class="content">
                <?php the_excerpt(80); ?>
            </div>
            <div class="more-link"><a href="<?php echo get_permalink(); ?>">Leggi tutto</a></div>
        </div>

    <?php endwhile; ?>

    <?php if ($count <= $total): ?>
        <h2 class="other-events"><span>Leggi altri eventi</span></h2>
    <?php endif; ?>

<?php endif; ?>