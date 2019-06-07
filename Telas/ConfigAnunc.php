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
    <title>Aplicativos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="../css/style_config_anunc.css">
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
             <li id="li_caminho"><a href="../Telas/ConfigAnunc.php" id="a_caminho">Configurações</a></li>
           </ul>
       </div>
        
         <div class="conteudo-container">
         
             <div class="group-conteudo">
                <div class="group-title">
                    <h4><i class="fas fa-user-cog"></i>Configurações De Conta</h4>
                </div>
                
                <div class="group-cadastro">
                    <div class="group-0">

                     
                       
                    </div>

                     <div class="group-0">

                      
                    
                    </div>
                </div>

            </div>

        </div>
    </section>
<!----------------- MODAL FORM ------------------->
<div class="modal fade" id="ModalAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-body" style="text-align: center;border-radius: 20px;" id="quadro">
        <span id="mensagem" style="font-weight: bold;"></span>
      </div>
    </div>
  </div>
</div>
<!----------------- MODAL FORM ------------------->   
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- -------- ------ ------- -->
</html>
