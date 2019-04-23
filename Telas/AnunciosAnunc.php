<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

if(!isset($_SESSION['SESSION_ANUNC_EMAIL']) && !isset($_SESSION['SESSION_ANUNC_SENHA'])){
     header("Location: ../Telas/Login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	  <title>Anúncios</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
	  <link rel="stylesheet" type="text/css" href="../css/style_anuncios_anunc.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
</head>
<body>
  
    <?php include_once '../Util/MenuAnunc.php'; ?>

    <!-- SESSÃO DE CARREGAMENTO DAS PÁGINAS -->
    <section class="conteudo">

       <div class="caminho">
           <ul>
             <li id="li_caminho"><a href="../Telas/PrincipalAnunc.php" id="a_caminho"><i class="fas fa-home" id="icon-menu"></i>Inicio</a></li>
             <li id="li_caminho"><label id="a_caminho">>></label></li>
             <li id="li_caminho"><a href="../Telas/AnunciosAnunc.php" id="a_caminho">Anúncios</a></li>
           </ul>
       </div>
        
     
    </section>
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- -------- ------ ------- -->
</html>
