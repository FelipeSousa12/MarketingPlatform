<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

require '../Util/daoGenerico.php';

$dao = new daoGenerico();

if(!isset($_SESSION['session_email']) && isset($_SESSION['session_senha'])){
     header("Location: ../Telas/Login.php");
}else{

   $sql = "SELECT a.RAZAOSOCIAL,p.NOMEPACOTE,p.VALORPACOTE FROM anunciante AS a JOIN pacotes AS p ON a.Id_anunciante = p.Id_anunc WHERE ID_ANUNCIANTE = $_SESSION['session_razao']";

   $query = $dao->executaSQL($sql);

   $dados = mysqli_fetch_array($query);
}

?>
<!DOCTYPE html>
<html>
<head>
      <title>Mapa</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
      <link rel="stylesheet" type="text/css" href="../css/style_mapa.css">
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
</head>
<body>

    <section id="conteudo">

       <div class="caminho">
           <ul>
             <li id="li_caminho"><a href="../Telas/Principal.php" id="a_caminho"><i class="fas fa-home" id="icon-menu"></i>Inicio</a></li>
             <li id="li_caminho"><label id="a_caminho">>></label></li>
             <li id="li_caminho"><a href="../Telas/Config.php" id="a_caminho">Configuração</a></li>
           </ul>
       </div>

       <div class="group_button">
         <div class="group" style="margin-bottom: 10%;">
           <h3>Configurações</h3>
         </div>

         <p>
         <div class="group">
             <div>NOME:</div><input type="text" name="cxLatitude" id="latMap" class="campo" value="<?php echo $dados['RAZAOSOCIAL']; ?>" required>
         </div>
         </p>

          <div class="group">
            <div>PACOTE CONTRATADO:</div><input type="text" name="cxLongitude" id="lngMap" class="campo" required value="<?php echo $dados['NOMEPACOTE']; ?>">
          </div>

          <div class="group">
             <div>VALOR:</div><input type="text" name="cxPosicao" id="latlng" class="campo" style="width: 110%" required value="<?php echo $dados['VALORPACOTE']; ?>">
          </div>
       </div>

          <div id="map"></div>

    </section>
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNShMFKHm554D-kvg7IfJXCJtxGX_ANHo&callback=initMap">
</script>
<!-- ------------------------ -->
<script type="text/javascript">
    $(document).ready(function(){

      var li = $('ul #li_caminho:last-child');
      $(li[0].firstChild).css('border-bottom','1px solid silver');

       //FUNÇÃO DE CAMINHO DA PAGINA
        $('ul #li_caminho').click(function(e){

          var index = $(this).index();

          if(index != 0){

             if((index % 2) == 1){

              e.preventDefault();

            }else{

              e.preventDefault();
              
              var prox_element = $(this)[0].firstChild;

              $('#recebe_conteudo').load($(prox_element).attr('href'));
              
            }
           
          }

        });
 
    });
</script>
</html>
