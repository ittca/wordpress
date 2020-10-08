<?php include 'style2.php' ?>
<div class="wrap"><h2 style="text-align:center;">Editor Tiago's do menu automático de categorias de produtos</h2></div>
 <div>
  <br><br>
  <form action="<?php cor(); ?>" method="post">
    <label for="cor-primar">Cor principal: </label>
    <input type="text" name="cor-primar" id="cor-primar" value="<?php echo $cor_primaria ?>">
    <br><br>
    <input type="submit">
  </form>
 </div>
 <?php
function cor(){
  $cor_primaria = $_REQUEST['cor-primar'];
}
  ?>
