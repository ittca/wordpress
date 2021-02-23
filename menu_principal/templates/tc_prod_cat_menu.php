<div class="tc-d-header">
<div class="tc-d-header-largura">
<div class="tc-menu-botao">
<ul class="tc-menu-corpo">
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<li>Categorias</li>
<ul class="tc-menu-cat">
  <?php
  $taxonomy='product_cat';$orderby='name';$show_count=1;$pad_counts=0;$hierarchical=1;$title='';$empty= 0;
  $args = array('taxonomy'=>$taxonomy,'orderby'=>$orderby,'show_count'=>$show_count,'pad_counts'=>$pad_counts,'hierarchical'=>$hierarchical,'title_li'=>$title,'hide_empty'=>$empty);
  $categorias = get_categories( $args );
  foreach ($categorias as $cat) {
      if($cat->category_parent == 0 && $cat->category_count > 0) { $category_id = $cat->term_id; echo '<li><a class="tc-menu-1g setas" href="'. get_term_link($cat->slug, 'product_cat') .'"><span></span><span></span>'.$cat->name.'</a>';}
  ?>
  <div class="tc-menu-subcat">
    <div class="tc-menu-subcat2">
      <ul>
        <?php
        $args2 = array('taxonomy'=>$taxonomy,'child_of'=>0,'parent'=>$category_id,'orderby'=>$orderby,'show_count'=>$show_count,'pad_counts'=>$pad_counts,'hierarchical'=>$hierarchical,'title_li'=>$title,'hide_empty'=>$empty);
        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
            foreach($sub_cats as $sub_category) {
                $category_id2 = $sub_category->term_id;
                if($sub_category->category_count > 0) {
                  echo  '<li class="inner-menu"><a href="'. get_term_link($sub_category->slug, 'product_cat') .'" class="tc-menu-2g">'.$sub_category->name.'</a><ul>';
                  $args3 = array('taxonomy'=>$taxonomy,'parent'=>$category_id2,'orderby'=>$orderby,'show_count'=>$show_count,'pad_counts'=>$pad_counts,'hierarchical'=>$hierarchical,'title_li'=>$title,'hide_empty'=>$empty);
                  $sub_cats2 = get_categories( $args3 );
                  if($sub_cats2) {
                    foreach($sub_cats2 as $sub_category2) {
                        if($sub_category2->category_count > 0) echo  '<a href="'. get_term_link($sub_category2->slug, 'product_cat') .'" class="tc-menu-3g">'.$sub_category2->name.'</a><br>';
                    }
                }
                echo '</ul></li>';
                }
            }
        }
        ?>
      </ul>
    </div>
  </div>
<?php }
?>
</li>
</ul>
</ul>
</div>
</div>
<nav class="tc-menu-principal">
  <?php wp_nav_menu(array('theme_location'=> 'primary-nav'));?>
</nav>
<div class="tc-side-bar">
  <?php dynamic_sidebar('sidebar-1');?>
</div>
</div>
