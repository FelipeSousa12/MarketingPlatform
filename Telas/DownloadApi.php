<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

if(!isset($_SESSION['SESSION_DESENV_EMAIL']) && !isset($_SESSION['SESSION_DESENV_SENHA'])){
    header("Location: ../Telas/Login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	  <title>API</title>
	  <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
	  <link rel="stylesheet" type="text/css" href="../css/style_down_api.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
</head>
<body>
  
    <?php include_once '../Util/MenuDesen.php'; ?>

    <!-- SESSÃO DE CARREGAMENTO DAS PÁGINAS -->
    <section class="conteudo">

       <div class="caminho">
           <ul>
             <li id="li_caminho"><a href="../Telas/PrincipalAnunc.php" id="a_caminho"><i class="fas fa-home" id="icon-menu"></i>Inicio</a></li>
             <li id="li_caminho"><label id="a_caminho">>></label></li>
             <li id="li_caminho"><a href="../Telas/DownloadApi.php" id="a_caminho">Download API</a></li>
           </ul>
       </div>
        
         <div class="conteudo-container">
         
             <div class="group-conteudo">
                 <div class="group-title">
                    <h4><i class="far fa-file-alt"></i>Documentação</h4>
                    <div class="group-info">
                        <div class="info-0">
                            <h4><i class="fas fa-file-download"></i><a href="#">Download Api</a></h4>
                        </div>
                        <div class="info-0">
                             <h5>1.0.0</h5>
                        </div>
                    </div>
                 </div>
                
                <div class="group-document">
                    
                    <div id="group-linha">
                        <h3>Integração e Desenvolvimento com API</h3>
                        <div class="col-3">
                             <h3>1.0 Primeiros Passos</h3>
                        </div> 
                        <div class="col-10">
                             <p style="display: block;">A API da Plataforma disponibiliza ferramentas essenciais para a geração de anúncios.Todo monitoramento é realizado e segue da seguinte forma:</p>
                             <div style="display: block;border: 1px solid silver; width: 300px;height: 100px; background: silver;">
                                 
                             </div>
                        </div> 
                        <div class="col-5-sm">
           
                        </div>
                    </div>
                     <div id="group-linha">
                        <div class="col-5">
                        </div> 
                    </div>
                     <div id="group-linha">
                        <div class="col-4">
                             <h3>1.1 Instalação de Dependecias</h3>
                        </div> 
                    </div>
                     <div id="group-linha">
                        <div class="col-3">
                             <h3>1.2 Tratando Exceções</h3>
                        </div> 
                    </div>
                     <div id="group-linha">
                        <div class="col-3">
                             <h3>1.3 Criando Conexao</h3>
                        </div> 
                    </div>
                     <div id="group-linha">
                        <div class="col-3">
                             <h3>1.4 Setando Imagens</h3>
                        </div> 
                    </div>
                  
                </div>
                <div class="group-opc">
                    <div><button class="botao">Baixar Documentação</button></div>
                </div>

            </div>

        </div>
    </section>
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- -------- ------ ------- -->
</html>
