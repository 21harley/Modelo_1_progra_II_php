<div class="pos-fromB">
  <div class="formB">
      <input id="valorN" class="input-text"  type="text" name="valorN" placeholder="valor n" required="required" > 
      <input id="valorTt" class="input-text"  type="text" name="valorTt" placeholder="valor t" required="required" > 
      <input class="input-submit" type="submit" name="cargar" value="Enviar">
    <div>
<div>
<?php

  if(isset($_POST["valorN"])&&isset($_POST["valorTt"]))
  {
    $_SESSION["valorN"]=$_POST["valorN"];
    $_SESSION["valorTt"]=$_POST["valorTt"];
    $_SESSION["estado"]=1;
    header("location:juego.php");
  }

?>