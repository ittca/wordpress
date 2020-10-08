<div class="wrap">
  <h2 style="text-align:center;">Editor Tiago's do header</h2>
</div>
<form action="" method="post">
  <p>
    <h3>Header</h3>
    <input type="checkbox" value="largura-header">largura inteira
  </p>
  <input type="submit" name="botao-header" style="background:lightblue;border-radius:5px;" value="Validar">
</form>
<?php
if(isset($_POST['botao-header'])){
  if(isset($_POST['largura-header'])){
    echo '<p>não está selecionado</p>';
  }else{
    echo '<p>Muito bem!</p>';
  }
}
?>
