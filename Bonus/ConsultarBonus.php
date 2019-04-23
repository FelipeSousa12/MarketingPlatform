<?php

require '../Util/daoGenerico.php';

$dao = new daoGenerico();

if(isset($_POST['campo'])){

      $id = $_POST['campo'];

      $sql = "SELECT QtdVisualizacoes AS Quantidade FROM BONUS WHERE Id_Anunc = '$id'";

      $query = $dao->executaSQL($sql);

      if(mysqli_num_rows($query) > 0){ 

        $valueBanco = mysqli_fetch_object($query);

        echo json_encode(array('status'=> true,'valor' => $valueBanco->Quantidade));
    
      }else{
      	echo json_encode(array('status'=> false,'valor' => null));
      }
}

?>