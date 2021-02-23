<?php
/*
* Plugin Name:  procamiao_menu
* Author:       Tiago Anastácio @ id4
* Author uri: http://www.id4software.com
* License:      GPLv2 or later
*/

if(!defined('ABSPATH')) die;

function tc_ativar(){                     // plugin ativar
  flush_rewrite_rules();
}
function tc_desativar(){                  // plugin desativar
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'tc_ativar');
register_deactivation_hook( __FILE__,'tc_desativar');

function procamiao_menu(){
  require_once plugin_dir_path(__FILE__).'templates/tc_prod_cat_menu.php';
}
add_shortcode('procamiao_menu', 'procamiao_menu');


 ?>
