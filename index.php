<?php session_start();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/styles.css">
  </head>
  <body>
  <style>
  body{
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100vh;
}

.formA{
  display: grid;
  width: 300px;
  height: 350px;
  background-color:blue;
  border-radius: 25px;
  grid-template-rows: repeat(4,25%);
  place-items: center;
  text-align: center;
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
  height: 20%;
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
<?php
  include('php/formulario.php');   
?>
<script src="script/script.js"></script>
  </body>
</html>
