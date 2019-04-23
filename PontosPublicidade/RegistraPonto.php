<?php
require '../Util/daoGenerico.php';

$dao = new daoGenerico();
$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
if (isset($metodo["array"])){
      
   $arrayDados = $metodo['array'];
   $id = $metodo['IdAnunc'];

   $sql = 'INSERT INTO PONTOSPUBLICIDADE (ENDERECO,LATITUDE,LONGITUDE,ID_ANUNC) VALUES';

   for ($i=0; $i < count($arrayDados); $i++){

        $end = $arrayDados[$i]['Endereco'];
        $lat = $arrayDados[$i]['Latitude'];
        $long = $arrayDados[$i]['Longitude'];
       
       $sql .= "('$end','$lat','$long',$id)";

          if($i < (count($arrayDados)-1)){
               $sql .=",";
          }else{
               $sql .=";";
          }
   }

   $resultado = $dao->inserirPontos($sql);

   if($resultado){
     echo 'true'; 
   }else{
     echo 'false'; 
   }

}


?>