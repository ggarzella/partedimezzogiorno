<?php 
// FRANCESCA edit - per la gestione del title
$customTitle = "Parte di Mezzogiorno - Sito ufficiale";
$customSeparator = " ";
$dynamicTitlePart = wp_title( $customSeparator, false, 'right' );

$compare404 = __( 'Page not found' );

if(trim($dynamicTitlePart) != $compare404 && $dynamicTitlePart != "")
{
	$customTitle .= " - ".$dynamicTitlePart;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="title" content="<?php echo $customTitle; ?>">
        <meta name="description" content="<?php bloginfo('description'); ?>" />

        <title><?php echo $customTitle; ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>
        <script type="text/javascript" src="<?=get_template_directory_uri() ?>/js/header.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var templateUrl = '<?= get_bloginfo("template_url"); ?>';
                var images = [
                    'SFONDO_CAVALIERI1.jpg', 'SFONDO_CAVALIERI2.jpg', 'SFONDO_CELATINI1.jpg', 'SFONDO_CELATINI2.jpg', 'SFONDO_GCSC_FRONTE.jpg', 'SFONDO_GCSC_FRONTE2.jpg', 'SFONDO_GCSC_RETRO.jpg', 'SFONDO_PAGGE.jpg', 'SFONDO_SANTANTONIO.jpg', 'SFONDO_ALABARDIERI1.jpg', 'SFONDO_ALABARDIERI2.jpg'
                ];
                var image = images[Math.floor(Math.random()*images.length)];

                $('#gradient').css('background-image', 'linear-gradient(to top, rgba(39, 39, 39, 1), rgba(39, 39, 39, 0)), url("' + templateUrl + '/images/' + image + '")');
            });
        </script>
    </head>

    <body <?php body_class(); ?>>
        <div class="container-fluid">
            <?php mezzogiorno_show_menu_header('header'); ?>
            <div class="body-container">
                <?php get_template_part('includes/site', 'logo'); ?>