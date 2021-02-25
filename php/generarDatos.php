<?php
    $nombre=$_SESSION["nombre"];
    $valor=$_SESSION["valorN"];
    $valorTt=$_SESSION["valorTt"];
    $_SESSION["estado"]=2;
    $_SESSION["giroIzq"]=0;
    $_SESSION["giroDer"]=0;
    $calculo=round(($valor/2)+1,0,PHP_ROUND_HALF_DOWN);
      if($valor>2&&$valor<=20&&$valorTt<=$calculo){
        /*valor inicial*/
        $valorT=$valorTt;
        $_SESSION["valorT"]=$valorT;

        /*mostrar pantalla*/
        $giro=" 
         <input type='radio' id='giro1' name='giro' value='Izq' checked><label>Izq</label><input type='radio' id='giro2' name='giro' value='Der' ><label>Der</label><br/>
        ";
        $name="<h3 class='title'>".$nombre."</h3><br/>";
        $puntaje="<h4 class='title'>".$_SESSION["giroIzq"]."--".$_SESSION["giroDer"]."</h4>";
        $body="";
        
        $matris[]=$valor;
        $cont=0;
        /*genero matris y numeros*/
        for($i=0;$i<$valor;$i++){
          $matris[$i]=array();
          for($j=0;$j<$valor;$j++){
            $cont++;
            $matris[$i][$j]=$cont;
          }
        }
        $_SESSION["matrisR"]=$matris;    
        /*los se revuelven*/
        
        for($i=0;$i<$valor;$i++){;
          for($j=0;$j<$valor;$j++){
            $aux=0;
            $auxJ=rand(0,$valor-1);
            $auxI=rand(0,$valor-1);
            $auxJ1=rand(0,$valor-1);
            $auxI1=rand(0,$valor-1);
            $aux=$matris[$auxJ][$auxI];
            $matris[$auxJ][$auxI]=$matris[$auxJ1][$auxI1];
            $matris[$auxJ1][$auxI1]=$aux;
          }
        }
        
        $matrisT=[];
        for($i=0;$i<$valorT;$i++){;
          for($j=0;$j<$valorT;$j++){
            $matrisT[$i][$j]=$matris[$i][$j];
          }
        }        
        /*cuadrante giro */
        $sub=1;  
        /*mostrar matriz*/
        $_SESSION["matris"]=$matris;
        $_SESSION["matrisT"]=$matrisT;
        $valorE=$valor-$valorT;
        echo $name;
        echo $puntaje;
        echo $giro;
        for($i=0;$i<$valor;$i++){
          for($j=0;$j<$valor;$j++){
            $aux=$matris[$i][$j];
            if($i<$valorT&&$j<$valorT){
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
        echo "registro no valido";
        header("location:../index.php");
        die();
      }
     
?>
