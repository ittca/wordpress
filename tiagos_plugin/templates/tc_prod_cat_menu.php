<?php
$cor_primaria = 'orange';
$cor_secundaria= 'blue';
?>
<div class="tc-d-header">
<div class="tc-d-header-largura">
  <ul class="tc-menu-corpo">
    <span></span>
    <span></span>
    <span></span>
    <li>Categorias</li>
    <ul class="tc-menu-cat">
        <?php
        $taxonomy='product_cat';$orderby='name';$show_count=0;$pad_counts=0;$hierarchical=1;$title='';$empty= 0;
        $args = array('taxonomy'=>$taxonomy,'orderby'=>$orderby,'show_count'=>$show_count,'pad_counts'=>$pad_counts,'hierarchical'=>$hierarchical,'title_li'=>$title,'hide_empty'=>$empty);
        $categorias = get_categories( $args );
        foreach ($categorias as $cat) {
          if($cat->category_parent == 0) {$category_id = $cat->term_id;echo '<li><a class="tc-menu-1g">'.$cat->name.'</a>';}
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
                      echo  '<li class="inner-menu"><a href="'. get_term_link($sub_category->slug, 'product_cat') .'" class="tc-menu-2g">'.$sub_category->name.'</a><ul>';
                      $args3 = array('taxonomy'=>$taxonomy,'parent'=>$category_id2,'orderby'=>$orderby,'show_count'=>$show_count,'pad_counts'=>$pad_counts,'hierarchical'=>$hierarchical,'title_li'=>$title,'hide_empty'=>$empty);
                      $sub_cats2 = get_categories( $args3 );
                      if($sub_cats2) {
                          foreach($sub_cats2 as $sub_category2) {
                              echo  '<a href="'. get_term_link($sub_category2->slug, 'product_cat') .'" class="tc-menu-3g">'.$sub_category2->name.'</a><br>';
                          }
                      }
                      echo '</ul></li>';
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
</div>
<nav class="tc-menu-principal">
  <?php wp_nav_menu(array('theme_location'=> 'menu-principal')); ?>
</nav>
</div>
<style media="screen">
  .tc-d-header{
    background: <?php echo $cor_primaria ?>;
    width: 100%;
    height: 38px;
  }
  .tc-d-header-largura{
    max-width: 960px;
    margin:0 auto;
  }
  .tc-menu-principal li{
    list-style: none;
    float:left;
    padding-left: 25px;
    padding-top: 10px;
  }
  .tc-menu-principal a{
    text-decoration: none;
    padding-right: 20px;
    color: #fff;
  }
  .tc-menu-corpo{
    background:<?php echo $cor_secundaria ?>;
    width:150px;
    height: 33px;
    list-style: none;
    float:left;
    border-radius: 6px;
    margin-top:3px;
  }
  .tc-menu-corpo li{
      color: white;
      padding-top:8px;
      padding-left: 20px;
  }
  .tc-menu-corpo span{
    position: absolute;
    display: block;
    height: 1px;
    width: 10px;
    background:#fff;
    margin-left: -10px;
    margin-top: 13px;
  }
  .tc-menu-corpo span:nth-child(2){
    margin-top:16px;
  }
  .tc-menu-corpo span:nth-child(3){
    margin-top:19px;
  }
  .tc-menu-cat{
    position: relative;
    background: #fff;
    width: 150px;
    margin-top:9.5px;
    margin-left:-40px;
    text-align:left;
    display:none;
  }
  .tc-menu-cat a, .tc-menu-cat a:link, .tc-menu-cat a:visited, .tc-menu-cat a:focus{
    font-weight: bold;
    list-style: none;
    text-decoration:none;
  }
  .tc-menu-cat li{
    width: 170px;
    margin: 0 18px;
    display:block;
    color:#000;
    padding-bottom:10px;
    margin-left:-40px;
  }
  .tc-menu-corpo:hover > ul{
    display:block;
  }
  .tc-menu-cat li:hover .tc-menu-1g, .tc-menu-3g:hover, .tc-menu-2g{
    color:<?php echo $cor_primaria ?>!important;
  }
  .tc-menu-subcat{
    top:0;
    left: 190px;
    width: 564px;
    min-height: 100%;
    overflow:hidden;
    visibility:hidden;
    position: absolute;
    background:lightgray;
  }
  .tc-menu-cat li:hover .tc-menu-subcat{
      visibility: visible;
  }
  .tc-menu-1g{
    text-transform: uppercase;
    font-size: 13px;
  }
  .tc-menu-2g{
    text-transform: uppercase;
    font-size: 12px;
  }
  .tc-menu-subcat2 ul{
    margin-top: 7px;
    margin-left: 20px;
  }
  .tc-menu-subcat2 ul ul{
    margin-top:3px;
    margin-left: -35px;
  }
  .tc-menu-3g{
    font-size: 13px;
    color:#000 !important;
  }
  .inner-menu{
    width:20%;
    float:left;
  }
</style>
