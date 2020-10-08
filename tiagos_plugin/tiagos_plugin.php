<?php
/**
* @package      tiagosEditor
*/
/*
* Plugin Name:  Tiago's editor
* Plugin URI:
* Description:  Menu Wordpress simplificado para poder fazer o que se pretende
* Version:      0.0.1
* Author:       Tiago Calado
* Author URI:
* License:      GPLv2 or later
* Text Domain:  tiagos-editor
*/

if(!defined('ABSPATH')) die;
$nome = plugin_basename(__FILE__);
function tc_ad_separador(){
  add_menu_page('Tiago\'s', 'Tiago\'s editor', 'manage_options', 'tc_plugin_inicio', 'tc_index','dashicons-coffee', 4);
  add_submenu_page('tc_plugin_inicio', 'separador_header', 'Header', 'manage_options', 'editor_header', 'tc_header');
  add_submenu_page('tc_plugin_inicio', 'separador_footer', 'Footer', 'manage_options', 'editor_footer', 'tc_footer');
  add_submenu_page('tc_plugin_inicio', 'separador_contact_form', 'Contact form', 'manage_options', 'editor_contactos', 'tc_contactos');
  add_submenu_page('tc_plugin_inicio', 'separador_product_category_menu', 'Product category menu', 'manage_options', 'editor_prod_cat_menu', 'tc_prod_cat_menu');

}
function tc_wp_separador(){               // adicionar separador
  register_post_type('book',['public' => true, 'label' => 'livros']);
}
function tc_ad_ficheiros(){               // adicionar ficheiros
  wp_enqueue_style('tc_plugin_style', plugins_url('/templates/tc_style.css', __FILE__));
  wp_enqueue_script('tc_script', plugins_url('/templates/tc_script.js', __FILE__));
}
function tc_settings_link($t){            // adicionar links no plugins
  $t_link = '<a href="admin.php?page=tc_plugin_inicio">editar</a>';
  array_push($t, $t_link);
  return $t;
}
function tc_ativar(){                     // plugin ativar
  tc_ad_separador();
  flush_rewrite_rules();
}
function tc_desativar(){                  // plugin desativar
  flush_rewrite_rules();
}

// funções chamadas acima
function tc_index(){
  echo '<div class="wrap"><h2 style="text-align:center;">Benvindo ao editor Tiago\'s</h2></div>';
  echo '<p><h3>Corpo</h3> largura inteira <input type="checkbox" id="largura-corpo"></p>';
  echo '<p><h3>Footer</h3> largura inteira <input type="checkbox" id="largura-footer"></p>';
}
function tc_header(){                     /* chama o ficheiro tc_plugin_header.php onde se configura a pagina*/
  require_once plugin_dir_path(__FILE__).'templates/tc_plugin_header.php';
}
function tc_footer(){
  echo '<div class="wrap"><h2 style="text-align:center;">Editor Tiago\'s do footer</h2></div>';
}
function tc_contactos(){
  echo '<div class="wrap"><h2 style="text-align:center;">Editor Tiago\'s do formulário de contacto</h2></div>';
}
function tc_prod_cat_menu(){
  require_once plugin_dir_path(__FILE__).'templates/tc_menu.php';
}

// ativação das funções acima mencionadas
add_action('admin_menu','tc_ad_separador');
add_action('init','tc_wp_separador');
add_action('admin_enqueue_scripts', 'tc_ad_ficheiros');
add_filter("plugin_action_links_$nome",'tc_settings_link');
register_activation_hook( __FILE__, 'tc_ativar');
register_deactivation_hook( __FILE__,'tc_desativar');


function tc_cat_menu(){
  require_once plugin_dir_path(__FILE__).'templates/tc_prod_cat_menu.php';
}
add_shortcode('tc_produtos_cat_menu', 'tc_cat_menu');








/* simples formulário contacto, pode ser chamado por [formulario_contacto] */

function tc_formulario_contacto(){
  $conteudo = '';
  $conteudo .= '<h2>Contacte-nos</h2>';
  $conteudo .= '<form method="post" action="http://localhost/index.php/email/">';
  $conteudo .= '<label id="formulario_nome" for="nome_formulario">Nome</label><br>';
  $conteudo .= '<input type="text" id="formulario_caixa_nome" name="nome_formulario" placeholder="Escreva o seu nome" /><br>';
  $conteudo .= '<label id="formulario_email" for="email_formulario">Email</label><br>';
  $conteudo .= '<input type="text" id="formulario_caixa_email" name="email_formulario" placeholder="Escreva o seu email" /><br>';
  $conteudo .= '<label id="formulario_mensagem" for="mensagem_formulario">Mensagem</label><br>';
  $conteudo .= '<textarea id="formulario_caixa_mensagem" name="mensagem_formulario" placeholder="Escreva a sua mensagem..."></textarea><br>';
  $conteudo .= '<input type="submit" id="formulario_enviar" name="enviar_formulario" value="Enviar" />';
  $conteudo .= '</form>';
  return $conteudo;
}
// add_shortcode('formulario_contacto', 'tc_formulario_contacto');

function tc_capturar_formulario(){
  if (isset($_POST['enviar_formulario'])){
    $nome = sanitize_text_field($_POST['nome_formulario']);
    $email = sanitize_text_field($_POST['email_formulario']);
    $msg = sanitize_textarea_field($_POST['mensagem_formulario']);
    $para = 'tiagocalado22@gmail.com';
    $assunto = 'formulário wp';
    $mensagem = ''.$nome.' - '.$email.' - '.$msg;

    wp_mail($para,$assunto,$mensagem);
  }
}
// add_action('wp_head', 'tc_capturar_formulario');

/* fim de formulário contacto */
 ?>
