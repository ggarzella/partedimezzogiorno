<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
        <meta name="description" content="<?php bloginfo('description'); ?>" />

        <title><?php wp_title( '|', true, 'right' ); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>
        <script type="text/javascript" src="<?=get_template_directory_uri() ?>/js/header.js"></script>
    </head>

    <body <?php body_class(); ?>>
        <div class="container-fluid">
            <?php mezzogiorno_show_menu_header('header'); ?>
            <div class="body-container">

                <?php get_template_part('includes/site', 'logo'); ?>
