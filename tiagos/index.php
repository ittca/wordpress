<?php
get_header();                 /* vai buscar automaticamente o header.php */
if (have_posts()):            /* serve para ir buscar todos os artigos publicados, também vai ser usado nas páginas */
  while(have_posts()): the_post(); ?>
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php the_content(); ?>
  <?php endwhile;
else:
  echo '<p>Não foi encontrado conteúdo</p>';
endif;                        /* fim da função para apresentar todos os artigos */
?><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><?php
get_footer();                 /*vai buscar automaticamento o footer.php */
 ?>
