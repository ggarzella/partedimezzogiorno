<?php

//include('wp-load.php');

get_header();

$postId = get_query_var('groupid');
$keyId = get_query_var('memberid') - 1;

$post = get_post($postId);

$role = get_post_meta($postId, 'role'.$keyId)[0];
$name = get_post_meta($postId, 'name'.$keyId)[0] . ' ' . get_post_meta($postId, 'lastname'.$keyId)[0];
$description = get_post_meta($postId, 'description'.$keyId)[0];
$imageId = get_post_meta($postId, 'imageId'.$keyId)[0];
$image_src = wp_get_attachment_image_src($imageId, 'large');
$image_src = $image_src[0];

$group = $post->post_title;
?>

<?php if ($role): ?>

    <div class="main-container generic">
        <div class="box-container">
            <h2 class="title-container">
                <span class="title title-role"><?php echo $role?>&nbsp;<?php echo $group;  ?></span>
                <br/>
                <span class="title title-name"><?php echo $name?></span>
            </h2>
            <div class="content-container">
                <img class="center-block img-responsive" src="<?php echo $image_src; ?>">
                <div class="content">
                    <p><?php echo $description; ?></p>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

</div>

<?php get_template_part('includes/teams', 'carousel'); ?>

<?php get_footer(); ?>