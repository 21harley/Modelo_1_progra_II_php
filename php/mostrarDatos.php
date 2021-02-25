
<?php

function game($matris,$matrisR,$valor){
  $res=0;
  for($i=0;$i<$valor;$i++){
    for($j=0;$j<$valor;$j++){
     if($matrisR[$i][$j]!==$matris[$i][$j]){
        $res=1; break;
     }
    }
  }
  return ($res!==1);
}
function exite($m,$v,$b){
  $res=0;
    for($i=0;$i<$v;$i++){
      for($j=0;$j<$v;$j++){
        if($b===$m[$i][$j]){
          $res=1; break;
        }
      }
      if($res===1){
        break;
      }
    }
  return $res;
}
function tomarCuadrante($ma,$matris,$a,$b,$c,$d,$valor){
  $k=0; $h=0; $aux=0;
  for($i=0;$i<$valor;$i++){
    for($j=0;$j<$valor;$j++){
      if($i>=$a&&$j>=$b&&$i<=$c&&$j<=$d){
        $ma[$k][$h]=$matris[$i][$j];$h++;$aux=1;
      }
    }
    if($aux===1){
      $k++;$aux=0;$h=0;
    }
  }
  return $ma;
}
   
    $nombre=$_SESSION["nombre"];
    $valor=$_SESSION["valorN"];
    $_SESSION["estado"]=2;
    $valorT=$_SESSION["valorT"];
    $matrisR=$_SESSION["matrisR"]; 
    $valorE=$valor-$valorT;
    $tipoGiro=$_POST['giro'];
    $x=$_POST['fila'];
    $y=$_POST['columna'];
        /*mostrar pantalla*/
        if($tipoGiro==='Izq'){
          $giro=" 
          <input type='radio' id='giro1' name='giro' value='Izq' checked><label>Izq</label><input type='radio' id='giro2' name='giro' value='Der' ><label>Der</label><br/>
         ";
        }else{
          $giro=" 
          <input type='radio' id='giro1' name='giro' value='Izq' ><label>Izq</label><input type='radio' id='giro2' name='giro' value='Der' checked><label>Der</label><br/>
         ";
        }
        $name="<h3 class='title'>".$nombre."</h3><br/>";
        $body="";
 
        $matris=$_SESSION["matris"];
        $matrisT=$_SESSION["matrisT"];
        
        /*calcular la dimencion de la matriz*/
        $a=0;$b=0;$c=0;$d=0;//variables que se usaran como grid
        
        $n=$valorT-1;//caculo espacio
         
        if($x+$n<$valor&&$y+$n<$valor){

          $a=$x; $b=$y; $c=$x+$n; $d=$y+$n; 

        }else  if($x-$n>=0&&$y-$n>=0){

          $a=$x-$n; $b=$y-$n; $c=$x; $d=$y; 

        }else  if($x-$n>=0&&$y+$n<$valor){

          $a=$x-$n; $b=$y; $c=$x; $d=$y+$n; 

        }else  if($x+$n>=0&&$y-$n>0){
            $a=$x; $b=$y-$n; $c=$x+$n; $d=$y; 
        }
        $res=0;
        $ma=[];
        /* validar si exite el valor en la sub matriz*/ 
        if(exite($matrisT,$valorT,$matris[$x][$y])===1){

            //tomar un cuadrante 
            $ma=tomarCuadrante($ma,$matris,$a,$b,$c,$d,$valor);
             
            /*giro*/
            $re=[];
            if($tipoGiro==='Der'){
              $_SESSION["giroDer"]+=1;
              for ($i = 0; $i < $valorT; ++$i) {
                for ($j = 0; $j < $valorT; ++$j) {
                    $re[$i][$j] = $ma[$valorT-$j-1][$i];
                }
              }
            }else{
              $_SESSION["giroIzq"]+=1;
              for ($i = 0; $i < $valorT; ++$i) {
                for ($j = 0; $j < $valorT; ++$j) {
                    $re[$i][$j] = $ma[$j][$valorT-$i-1];
                }
              }            
            }

            //cambiar la posicion del cuadrante 
            $k=0; $h=0; $aux=0;
            for($i=0;$i<$valor;$i++){
              for($j=0;$j<$valor;$j++){
                if($i>=$a&&$j>=$b&&$i<=$c&&$j<=$d){
                  $matris[$i][$j]=$re[$k][$h];$h++;$aux=1;
                }
              }
              if($aux===1){
                $k++;$aux=0;$h=0;
              }
            }
            $k=0; $h=0; $aux=0;
            $matrisT=$re;
        }else{
          $ma=tomarCuadrante($ma,$matris,$a,$b,$c,$d,$valor);
          $matrisT=$ma;          
        }

        
        $puntaje="<h4 class='title'>Giro Izq:".$_SESSION["giroIzq"]."---- Giro Der:".$_SESSION["giroDer"]."</h4>";
        /*mostrar matriz*/
        echo $name;
        echo $puntaje;
        echo $giro;
        if(!game($matris,$matrisR,$valor)){
          for($i=0;$i<$valor;$i++){
            for($j=0;$j<$valor;$j++){
              $aux=$matris[$i][$j];
              if($i>=$a&&$j>=$b&&$i<=$c&&$j<=$d){
                if($aux<10){
                  echo "<input onclick='jugar(".$i.",".$j.")'  type='button' class='item1'  value='0$aux' />";
                }else{
                  echo "<input onclick='jugar(".$i.",".$j.")'  type='button' class='item1'  value='$aux' />";
                }
              }else{
                if($aux<10){
                  echo "<input onclick='jugar(".$i.",".$j.")'  type='button' class='item'  value='0$aux' />";
                }else{
                  echo "<input onclick='jugar(".$i.",".$j.")'  type='button' class='item'  value='$aux' />";
                }
              }      
            } 
            echo "<br/>";
          }
        }else{
          echo "<h3>Gano</h3><br/>";
          for($i=0;$i<$valor;$i++){
            for($j=0;$j<$valor;$j++){
              $aux=$matris[$i][$j];
              if($i>=$a&&$j>=$b&&$i<=$c&&$j<=$d){
                if($aux<10){
                  echo "<input   type='button' class='item1'  value='0$aux' />";
                }else{
                  echo "<input   type='button' class='item1'  value='$aux' />";
                }
              }else{
                if($aux<10){
                  echo "<input   type='button' class='item'  value='0$aux' />";
                }else{
                  echo "<input   type='button' class='item'  value='$aux' />";
                }
              }      
            } 
            echo "<br/>";
          }
        }
        $_SESSION["matris"]=$matris;
        $_SESSION["matrisT"]=$matrisT;
   

?>
