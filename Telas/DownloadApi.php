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
                   
                   <div class="documentacao" style="padding: 15px;margin: 0 auto;"> 

                    <div id="group-linha">
                        <h3>Integração e Desenvolvimento com API</h3>
         
                        <div class="row" style="margin-left: 3px; margin-top: 20px;">
                             <h3>1.0 Primeiros Passos</h3>
                        </div>     
                
                        <div class="row" style="margin-left: 5px;text-align: left;">
                              <div>A API da Plataforma disponibiliza ferramentas essenciais para a geração de anúncios.Todo monitoramento é realizado pelos dados que a API possui.Para Começar a usá-la certifique-se de possuir um aplicativo cadastrado na plataforma.</div>
                        </div>
 
                    </div>
                    <div id="group-linha">
                        <div class="row" style="margin-left: 3px; margin-top: 10px;">
                             <h3>1.1 Inserindo Layout de Anúncios</h3>
                        </div> 
                         <div class="row" style="margin-left: 3px; margin-top: 10px;">
                             <p>Para exibição dos anúncios no aplicativo escolhido é necessário a inserção de dois tipos de anúncios:</p>
                        </div> 
                        <div class="row" style="margin-left: 3px; margin-top: 10px;">
                             <p>BANNER:</p>
                        </div> 
                        <div class="row" id="group-codigo" style="margin-left: 3px; margin-top: 10px; background: rgba(0,0,0,0.1);height: 200px;width: 600px;">
                            <div>
                               <!---- CODIGO AQUI ---> 
                            </div>
                        </div> 
                        <div class="row" style="margin-left: 3px; margin-top: 10px;">
                             <p>RODAPÉ:</p>
                        </div> 
                        <div class="row"  id="group-codigo" style="margin-left: 3px; margin-top: 10px; background: rgba(0,0,0,0.1);height: 200px;width: 600px;">
                              <div>
                               <!---- CODIGO AQUI ---> 
                            </div>
                        </div> 
                        <div class="row" style="margin-left: 3px; margin-top: 10px;text-align: left;">
                             <p>Seguindo a amostra de códigos, deve-se criar dois arquivos respectivos de layouts que devem ser adicionados no projeto, na pasta de <strong>layouts</strong>, na qual possam ser invocados para exibição dos anúncios.</p>
                        </div>
                    </div>
                    <div id="group-linha">
                        <div class="row"  style="margin-left: 3px; margin-top: 10px;">
                             <h3>1.2 Inserindo Permissões</h3>
                        </div> 
                        <div class="row" style="margin-left: 3px; margin-top: 10px;text-align: left;">
                             <p>A API em sem ambiente de funcionamento necessita de conexao com a internet e entre outros utilitários. Neste caso,é necessário a inserção de permissões no projeto. As pemissões devem ser adicionadas no <strong>AndroidManisfest.xml</strong> do projeto seguindo o exemplo a abaixo:</p>
                        </div>
                        <div class="row" id="group-codigo" style="margin-left: 3px; margin-top: 10px; background: rgba(0,0,0,0.1);height: 30px;width: 600px;">
                            <p style="padding: 5px;margin: 0 auto;">uses-permission android:name="android.permission.INTERNET"</p>
                        </div>
                        <div class="row" id="group-codigo" style="margin-left: 3px; margin-top: 10px; background: rgba(0,0,0,0.1);height: 30px;width: 600px;">
                            <p style="padding: 5px;margin: 0 auto;">uses-permission android:name="android.permission.ACCESS_NETWORK_STATE</p>
                        </div>
                        <div class="row" id="group-codigo" style="margin-left: 3px; margin-top: 10px; background: rgba(0,0,0,0.1);height: 30px;width: 600px;">
                            <p style="padding: 5px;margin: 0 auto;">uses-permission android:name="android.permission.ACCESS_FINE_LOCATION"</p>
                        </div> 
                        <div class="row" id="group-codigo" style="margin-left: 3px; margin-top: 10px; background: rgba(0,0,0,0.1);height: 30px;width: 600px;">
                            <p style="padding: 5px;margin: 0 auto;">uses-permission android:name="android.permission.ACCESS_CORSE_LOCATION"</p>
                        </div> 
                    </div>
                    <div id="group-linha">
                        <div class="row"  style="margin-left: 3px; margin-top: 10px;">
                             <h3>1.3 Iniciando Conexao com API</h3>
                        </div>
                         <div class="row" style="margin-left: 3px; margin-top: 10px;text-align: left;">
                             <p>Ao efetuar o download da API acima, o próximo passo é adicionar a biblioteca na pasta <strong>libs</strong> do projeto e sincronizar para reconhecimento dos metódos fornecidos pela biblioteca.</p>
                        </div> 
                    </div>
                     <div id="group-linha">
                        <div class="row"  style="margin-left: 3px; margin-top: 10px;">
                             <h3>1.4 Setando Imagens</h3>
                        </div> 
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
