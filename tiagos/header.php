<!DOCTYPE html>
<html <?php language_attributes(); ?>>                    <!-- escolha da linguagem nativa a ser utilizada -->
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">        <!-- para optimizar os caractéres -->
    <meta name="viewport" content="width=device-width">   <!-- para ser responsivo -->
    <title><?php bloginfo('name'); ?></title>             <!-- mostra o título do site, necessita de ser optimizado -->
    <?php wp_head(); ?>                                   <!-- o wp adiciona o que quiser -->
  </head>
<body <?php body_class(); ?>>
  <div class="layout-header">
    <header class="tc-header">                            <!-- layout do header -->
      <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
      <h5><?php bloginfo('description'); ?></h5>
    </header>                                             <!-- fim do header geral -->
    <?php echo do_shortcode("[tc_produtos_cat_menu]"); ?>
  </div>                                                  <!-- fim do layout header -->
  <div class="layout-corpo">                              <!-- layout do corpo -->
    <div class="tc-corpo">
