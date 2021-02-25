
<form class="formA" action="" method="post">
      <input id="name" class="input-text"  type="text" name="nombre" placeholder="name" required="required">
      <input id="valorN" class="input-text"  type="text" name="valorN" placeholder="valor n" required="required" > 
      <input id="valorTt" class="input-text"  type="text" name="valorTt" placeholder="valor t" required="required" > 
      <input class="input-submit" type="submit" name="cargar" value="Enviar">
</form>
<?php
  if(isset($_POST["nombre"])&&isset($_POST["valorN"])&&isset($_POST["valorTt"]))
  {
    $_SESSION["nombre"]=$_POST["nombre"];
    $_SESSION["valorN"]=$_POST["valorN"];
    $_SESSION["valorTt"]=$_POST["valorTt"];
    $_SESSION["estado"]=1;
    header("location:php/juego.php");
  }

?>