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