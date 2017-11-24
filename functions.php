<?php

/*function mezzogiorno_init() {
    $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
    if (strpos($url_path, 'membro') !== false) {
        $load = locate_template('membro.php', true);
        if ($load) exit;
    }
}
add_action( 'init', 'mezzogiorno_init' );*/

add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, array('center', 'top'));

function mezzogiorno_add_inclusions() {

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-theme-css', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/jquery/jquery.min.js' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js' );
}
add_action('wp_enqueue_scripts', 'mezzogiorno_add_inclusions');



function all_plugin_admin_init()
{
    //wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');
}
add_action('admin_init', 'all_plugin_admin_init');



function mezzogiorno_tinymce_settings($tinymce_init_settings) {

    $tinymce_init_settings['forced_root_block'] = false;
    $tinymce_init_settings['wpautop'] = false;
    $tinymce_init_settings['force_br_newlines'] = true;
    $tinymce_init_settings['convert_newlines_to_brs'] = true;
    $tinymce_init_settings['remove_linebreaks'] = false;
    $tinymce_init_settings['remove_redundant_brs'] = false;
    return $tinymce_init_settings;
}
add_filter('tiny_mce_before_init', 'mezzogiorno_tinymce_settings');
remove_filter('the_content', 'wpautop');



function remove_admin_login_header() {

    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');



function mezzogiorno_register_menu() {

    register_nav_menu('header', __( 'Mezzogiorno Header Menu' ));
    register_nav_menu('footer', __( 'Mezzogiorno Footer Menu' ));
}
add_action( 'after_setup_theme', 'mezzogiorno_register_menu' );



function mezzogiorno_excerpt_length($length) {

    return $length;
}
add_filter('excerpt_length', 'mezzogiorno_excerpt_length', 999);



/*function mezzogiorno_modify_read_more_link() {
    return '<div class="more-link"><a href="' . get_permalink() . '">Leggi tutto</a></div>';
}
add_filter( 'the_content_more_link', 'mezzogiorno_modify_read_more_link' );*/



function mezzogiorno_modify_excerpt_more($more) {

    return '...';
}
add_filter('excerpt_more', 'mezzogiorno_modify_excerpt_more');



function mezzogiorno_show_menu_header($themeName) {

    wp_nav_menu(
        array(
            'theme_location' => $themeName,
            'container_id' => 'mezzogiorno-navbar-header',
            'container_class' => 'menu-container navbar navbar-inverse navbar-fixed-top',
            'menu_class' => 'nav navbar-nav',
            'walker' => new Mezzogiorno_Nav_Walker(),
            'depth' => 0,
            'items_wrap' => '<div class="navbar-header">
                                  <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                  </button>
                              </div>
                              <div class="collapse navbar-collapse">
                                  <ul class="%2$s">%3$s</ul>
                              </div>'
        )
    );
}



class Mezzogiorno_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        /*var_dump($depth);
        var_dump($item->title);
        var_dump($item->attr_title);*/

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {
            $class_names = $value = '';
            $classes = empty($item->classes) ? array() : (array)$item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

            if ($args->has_children && $depth !== 0)
                $class_names .= ' dropdown-submenu';

            if (in_array('current-menu-item', $classes))
                $class_names .= ' active';

            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names . '>';

            $atts = array();
            $atts['title'] = !empty($item->title) ? $item->title : '';
            $atts['target'] = !empty($item->target) ? $item->target : '';
            $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';

            //var_dump($item->title);
            //var_dump($args->has_children);
            //var_dump($depth);

            if ($args->has_children && $depth === 0) {
                $atts['href'] = '#';
                $atts['data-toggle'] = 'dropdown';
                $atts['class'] = 'dropdown-toggle';
                $atts['aria-haspopup'] = 'true';
            } else
                $atts['href'] = !empty($item->url) ? $item->url : '';

            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
            $attributes = '';

            foreach ($atts as $attr => $value) {
                if (!empty($value)) {
                    $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            /*
             * Glyphicons
             * ===========
             * Since the the menu item is NOT a Divider or Header we check the see
             * if there is a value in the attr_title property. If the attr_title
             * property is NOT null we apply it as the class name for the glyphicon.
             */
            if (!empty($item->attr_title))
                $item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr($item->attr_title) . '"></span>&nbsp;';
            else
                $item_output .= '<a' . $attributes . '>';

            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= ($args->has_children) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
    }

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {

        if(!$element)
            return;

        $id_field = $this->db_fields['id'];

        if(is_object($args[0]))
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

    }
}



function mezzogiorno_the_post_date($postID) {

    $post_meta_date = get_post_meta($postID, "meta-box-date", true);
    return date_i18n('d M Y', strtotime($post_meta_date));
}



function mezzogiorno_image_class_filter($class, $id, $align, $size) {

    return 'center-block img-responsive';
}
add_filter('get_image_tag_class', 'mezzogiorno_image_class_filter', 0, 4);



/*function fb_img_caption_shortcode($attr, $content = null) {
    $output = apply_filters('img_caption_shortcode', '', $attr, $content);
    if ( $output != '' )
        return $output;

    extract(shortcode_atts(array(
        'align'	=> 'alignnone',
        'width'	=> ''
    ), $attr));

    var_dump($caption);

    return '<div class="wp-caption ' . $align . '">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
add_shortcode('wp_caption', 'fb_img_caption_shortcode');
add_shortcode('caption', 'fb_img_caption_shortcode');*/



function remove_caption_padding( $width ) {

    return $width - 10;
}
add_filter( 'img_caption_shortcode_width', 'remove_caption_padding' );



function mezzogiorno_get_child_pages($postID) {

    $args = array(
        'post_parent' => $postID,
        'post_type'   => 'page',
        'posts_per_page'   => -1
    );

    $children = new WP_Query($args);

    return $children;
}



function mezzogiorno_get_related_pages($postID, $max = 3) {

    $parentID = wp_get_post_parent_id($postID);

    $args = array(
        'post_parent' => $parentID,
        'post_type'   => 'page',
        'posts_per_page'   => $max,
        'post__not_in' => array($postID)
    );

    $related = new WP_Query($args);

    return $related;
}



function mezzogiorno_get_related_posts($postID, $categoryID, $max = 3) {

    $args = array(
        'cat' => $categoryID[0]->cat_ID,
        'post_type'   => 'post',
        'posts_per_page' => $max,
        'orderby' => 'meta_value',
        'meta_key' => 'meta-box-date',
        'post__not_in' => array($postID)
    );

    $related = new WP_Query($args);

    return $related;
}



function get_excerpt($length) {

    $excerpt = get_the_content();
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $length);
    $excerpt = $excerpt . '...';
    return $excerpt;
}



function get_custom_image($id, $meta_name = null) {

    if (!$meta_name)
        $meta_name = "meta-box-image";

    $image_id = get_post_meta($id, $meta_name, true);
    $custom_image = wp_get_attachment_image_src($image_id, 'thumbnail');

    return $custom_image[0];
}



function mezzogiorno_get_the_title() {

    $title = is_user_logged_in() ? '<a href="' . get_edit_post_link(get_the_ID()) . '">' . get_the_title() . '</a>' : the_title();
    echo $title;
}



// [membro ruolo="generale" immagine="path"]
function member_func( $atts ) {

    $a = shortcode_atts( array(
        'ruolo' => 'something',
        'immagine' => 'something else',
    ), $atts );

    return "foo = {$a['foo']}";
}
add_shortcode( 'bartag', 'bartag_func' );



function mezzogiorno_custom_excerpt($string, $length_in_words) {

    return preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length_in_words)) . '...';
}



function custom_rewrite_rule()
{
    global $wp_rewrite;

    add_rewrite_rule('civile/([a-zA-Z]+)/([a-zA-Z]+)/([0-9]+)/([0-9]+)/?', 'index.php?groupname=$matches[2]&pagename=membro&groupid=$matches[3]&memberid=$matches[4]', 'top');

    add_rewrite_rule('comando/([a-zA-Z-]+)/([0-9]+)/([0-9]+)/?', 'index.php?groupname=$matches[1]&pagename=membro&groupid=$matches[2]&memberid=$matches[3]', 'top');

    add_rewrite_rule('notizie/?', 'index.php?pagename=notizie', 'top');
    //add_rewrite_rule('([a-zA-Z]+/){3}membro/([0-9]+)/([0-9]+)/?', 'index.php?root=$matches[1]&pagename=membro&group_id=$matches[2]&member_id=$matches[3]', 'top');
    //add_rewrite_rule('(([^/]*)/)*membro/([0-9]+)/([0-9]+)/?', 'index.php?root=$matches[1]&pagename=membro&group_id=$matches[2]&member_id=$matches[3]', 'top');

    add_rewrite_endpoint(get_query_var('pagename'), EP_PERMALINK | EP_PAGES);

    $wp_rewrite->flush_rules();
}
add_action('init', 'custom_rewrite_rule');



function custom_rewrite_tag()
{
    add_rewrite_tag('%groupname%', '([a-zA-Z]+)');
    add_rewrite_tag('%groupid%', '([0-9]+)');
    add_rewrite_tag('%memberid%', '([0-9]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);



/*function prefix_url_rewrite_templates() {

    if (get_query_var('group_id') && get_query_var('member_id') && mezzogiorno_url_contain_param('membro')) {
        add_filter( 'template_include', function() {
            $page = 'page-membro.php';
            $GLOBALS['current_page_template'] = $page;
            return get_template_directory() . "/$page";
        });
    }

    if (!is_user_logged_in()) {
        add_filter( 'template_include', function() {
            $page = 'page-courtesy.php';
            $GLOBALS['current_page_template'] = $page;
            return get_template_directory() . "/$page";
        });
    }
}
add_action('template_redirect', 'prefix_url_rewrite_templates');*/



function mezzogiorno_page_template($template)
{
    if (!is_user_logged_in())
    {
        set_query_var('pagename', 'courtesy');
        $page = 'page-courtesy.php';
    }
    else
    {
        $pagename = get_query_var('pagename');
        $page = "page-$pagename.php";
    }

    $new_template = locate_template(array($page)); //sennò get_template_directory() . "/$page";

    if ('' != $new_template)
        return $new_template;

    return $template;
}
add_filter('template_include', 'mezzogiorno_page_template', 99);



function mezzogiorno_remove_class($className, &$classes)
{
    foreach ($classes as $index => $class)
        if ($class === $className)
            unset($classes[$index]);
}



function mezzogiorno_is_page($name)
{
    if (get_query_var('pagename') === $name)
        return true;

    return false;
}



function mezzogiorno_body_class($classes)
{
    mezzogiorno_remove_class('home', $classes);

    if (is_page_template('page-gruppo-civile.php') || is_page_template('page-comando.php'))
        $class = 'group';
    else if (is_page_template('page-lista.php')) /* implementare come membro e courtesy */
        $class = 'list';
    else if (mezzogiorno_is_page('courtesy'))
        $class = 'courtesy';
    else if (mezzogiorno_is_page('membro'))
        $class = 'member';
    else if (mezzogiorno_is_page('notizie'))
        $class = 'news';
    else if (!(is_page() && is_singular()) && is_home())
        $class = 'home';

    $classes[] = $class;

    return $classes;
}
add_filter('body_class', 'mezzogiorno_body_class');