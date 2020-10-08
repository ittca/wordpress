<?php
function tc_css(){                            /* adiciona os ficheiros .css */
  wp_enqueue_style('style', get_stylesheet_directory_uri().'/css/style.css', array(), 1.0);
  wp_enqueue_style ('tc_header', get_stylesheet_directory_uri().'/css/tc_header.css', array(), 1.0);
  wp_enqueue_style ('tc_footer', get_stylesheet_directory_uri().'/css/tc_footer.css', array(), 1.0);
}
add_action('wp_enqueue_scripts', 'tc_css', 10);

register_nav_menus(array(                         /* adicionar os menus*/
  'menu-principal' => __('Primary Menu'),
));
 ?>
