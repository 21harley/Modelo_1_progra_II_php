<?php 
session_start();
if(!isset($_SESSION["nombre"])||!is_numeric ($_SESSION["valorN"])||!is_numeric ($_SESSION["valorTt"]))
{
    echo "registro no valido";
    header("location:../index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego</title>
</head>
<body>
<script type="text/javascript">
function jugar(i,j)
{
  document.tabla.fila.value=i;
	document.tabla.columna.value=j;
	document.tabla.submit();
  console.log(i+" "+j);
}
function reiniciar()
{
  document.tabla.estado.value="4";
	document.tabla.submit();
}
function nuevoJugo()
{
  document.tabla.estado.value="3";
	document.tabla.submit();
}
</script>
<style>
  body{
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100vh;
}

.formA{
  display: grid;
  width:100%;
  height: 100%;
  background-color:blue;
  grid-template-rows: repeat(4,25%);
  place-items: center;
  text-align: center;
}
.formB{
  display: grid;
  width: 300px;
  height: 150px;
  background-color:blue;
  grid-template-rows: repeat(3,33.3%);
  place-items: center;
  text-align: center;
}
.formC{
  position:relative;
  width: 300px;
  height: 80px;
  margin:auto;
}
.pos-fromB{
  width: 100%;
  height: 100%;
  display:grid;
  place-items: center;
}

.input-text{
  border-radius: 15px;
  text-align: center;
}

.input-submit{
  width: 80%;
  height: 30px;
  background-color: none;
  border:none;
  border-radius: 15px;
}

.title{
  height: 0;
}

.tabla{
  width: 100%;
  height: 100%;
  text-align: center;
}

.item,.item1{
  width: 40px;
  height: 40px;
}
.item1{
 color:green;
}

.vt{
 background-color: none;
}
</style>  
   <form id='tabla' name="tabla" class='tabla' action='' method='post'>

    <?php
      if(isset($_POST["estado"])){
        if(is_numeric($_POST["estado"])){
          switch($_POST["estado"]){
            case 3:$_SESSION["estado"]=3;break;
            case 4:$_SESSION["estado"]=4;break;
          }
        }
      }
      switch($_SESSION["estado"]){
          case 1:
            include("generarDatos.php");
          break;
          case 2;
            include("mostrarDatos.php");
          break;
          case 3:
            include("cambioMatriz.php");
          break;
          case 4:
            include("generarDatos.php");
          break;
      }
    ?>
    <input id="fila" name="fila" type="hidden" value="" />
    <input id="columna" name="columna" type="hidden" value="" />
    <input id="estado" name="estado" type="hidden" value="" />
    <?php
      if($_SESSION["estado"]!=3){
       echo '<div class="formC">';
       echo '<button onclick="nuevoJugo()">Juego Nuevo</button>';
       echo '<button onclick="reiniciar()">Reiniciar</button>';
       echo '<div>';
      }
   ?>
    </form>
</body>
</html>