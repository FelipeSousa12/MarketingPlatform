<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

if(isset($_SESSION['SESSION_ANUNC_EMAIL']) && isset($_SESSION['SESSION_ANUNC_SENHA'])){
    header("Location: ../Telas/PrincipalAnunc.php");
}elseif(isset($_SESSION['SESSION_DESENV_EMAIL']) && isset($_SESSION['SESSION_DESENV_SENHA'])){
    header("Location: ../Telas/PrincipalDesen.php");
}


?>
<!DOCTYPE html>
<html>
<head>
      <title>Login</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../css/style_login.css">
</head>
<body>

        <header>
              <nav>
                  <div class="menu-icon">
                      <i class="fa fa-bars fa-2x"></i>
                  </div>

                  <div class="logo">
                      <a href="Index.html"> <img src="../Imagens/logo.png"></a>
                  </div>

                  <div class="menu">
                        <ul>
                              <li><a href="../Telas/Index.php">HOME</a></li>
                              <li><a href="../Telas/servicos.php">SERVIÇOS</a></li>
                              <li><a href="../Telas/Contato.php">CONTATO</a></li>
                              <li><a href="../Telas/CadastroDesenvolvedor.php">DESENVOLVEDORES</a></li>
                              <li><a href="../Telas/CadastroAnunciante.php">ANUNCIANTE</a></li>
                              <li><a href="../Telas/Login.php">LOGIN</a></li>                 
                        </ul>          
                   </div>
             </nav>
        </header>

          <div class="tela">
              <div class="card">
                  <div class="card-img" id="img01"></div>
              </div>

                <div class="form">
                        
                         <div class="form-section">

                           <div class="group_title">
                                  <h3 class="heading">LOGIN</h3>
                                  <hr style="width: 50%;margin-top: 0;">
                           </div>
                           
                            <form id="formulario">
                         
                                 <div class="group">
                                   <div class="verifica_email">
                                      <input type="text" name="txtEmail" class="control" id="campo_email" autocomplete="off" required>
                                      <label>E-mail</label>
                                      <i><img src="../Imagens/error.png" id="icon_error_email" title="Preencher Campo Obrigatório!!"></i>
                                   </div>
                                 </div>
                                 
                                 <div class="group">
                                   <div class="verifica_senha">
                                      <input type="password" name="txtSenha" class="control" id="campo_senha" autocomplete="off" required>
                                      <label>Senha</label>
                                      <i><img src="../Imagens/error.png" id="icon_error_senha" title="Preencher Campo Obrigatório!!"></i>
                                   </div>
                                 </div>

                             
                                 <div class="group m20">
                                    <input type="button" name="btn" class="botao" value="Login &rarr;">
                                 </div>

                            </form>

                            <div class="group m20">
                               <a href="../Telas/Cadastro.php" class="link">Deseja criar uma conta?</a>
                            </div>

                         </div>
                </div>                   
             
           </div>

<!----------------- MODAL FORM ------------------->
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-body" style="text-align: center;border-radius: 20px;" id="quadro">
        <span id="mensagem" style="font-weight: bold;"></span>
      </div>
    </div>
  </div>
</div>
<!----------------- MODAL FORM ------------------->

<?php include '../Util/rodape.php';  ?>

</body>
<!-- -------- SCRIPTS ------- -->    
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
<!-- ------------------------ -->    
<script type="text/javascript">

      // BOTÃO AO DIMINUIR TELA
      $(document).ready(function() {
            $(".menu-icon").on("click", function(){
                  $("nav ul").toggleClass("showing");
            });
      });

      //FUNCÃO PARA MOSTRA MENSAGEM DE ERRO NOS CAMPOS
        function mostrar(element,error){
          element.css('border-bottom','1px solid red');
          element.css('border-radius','5px');
          error.css('visibility','visible');  
       }

      //FUNCÃO PARA RETIRAR MENSAGEM DE ERRO NOS CAMPOS
       function retirar(element,error){
           element.css('border','none');
           error.css('visibility','hidden'); 
       }


      $('.botao').click(function(){

        var email = $('#campo_email').val();
        var senha = $('#campo_senha').val();

        var form =  $('#formulario').serialize();

        if(email == ''){
          mostrar($('.verifica_email'),$('#icon_error_email'));
          $('#campo_email').focus();
        }else{
          retirar($('.verifica_email'),$('#icon_error_email'));
          if(senha == ''){
              mostrar($('.verifica_senha'),$('#icon_error_senha'));
              $('#campo_senha').focus();
          }else{
              retirar($('.verifica_senha'),$('#icon_error_senha'));
            
              $.ajax({
                        url: '../Login/AutenticarLogin.php',
                        method: 'POST',
                        dataType: 'JSON',
                        data: form,
                        success: function(response){

                          if(response.status == false){

                               //SE HOUVER ERRO AO LOGAR
                               $('#modalConfirm').modal('show');
                               $('#mensagem').text('EMAIL E/OU SENHA INCORRETOS!!');
                               $('.modal-body').css('background','#FF4000'); 

                               window.setTimeout(function(){
                                $('#modalConfirm').modal('hide');
                               },2000);     

                          }else{

                             if(response.tipoUser == 'Anunciante'){ 

                                 //SE O LOGIN FOR EFETUADO COM SUCESSO
                                 $('#modalConfirm').modal('show');
                                 $('#mensagem').text('LOGADO!!');
                                 $('.modal-body').css('background','#D0F5A9'); 

                                 window.setTimeout(function(){
                                    $('#modalConfirm').modal('hide');
                                 },2100);

                                 //LIMPAR CAMPOS AUTOMATICAMENTE
                                 $('#formulario')[0].reset();

                                  //CAMINHO PARA ANUNCINATE LOGAR NA CONTA COM SUCESSO
                                   window.location = '../Telas/PrincipalAnunc.php';

                             }else{

                                  //SE O LOGIN FOR EFETUADO COM SUCESSO
                                   $('#modalConfirm').modal('show');
                                   $('#mensagem').text('LOGADO!!');
                                   $('.modal-body').css('background','#D0F5A9'); 

                                   window.setTimeout(function(){
                                    $('#modalConfirm').modal('hide');
                                   },2100);

                                  //LIMPAR CAMPOS AUTOMATICAMENTE
                                  $('#formulario')[0].reset();

                                  //CAMINHO PARA DESENVOLVEDOR LOGAR NA CONTA COM SUCESSO
                                  window.location = '../Telas/PrincipalDesen.php';

                             } 
                             
                          }        

                       },error: function(e){
                               $('#exampleModal').modal('show');
                               $('#mensagem').text('*ERROR DE ENVIO*: '+e.responseText+'/n *CODIGO*: '+e.status);
                               $('.modal-body').css('background','#FA5858'); 
                        }
                 });
              }
           }
       });
  </script>
  <script type="text/javascript">
      //EVENTO DOS CAMPOS DO FORMULARIO CASO ESTEJA VAZIO OU NAO
            $('#campo_email').keyup(function(){

                  if($('#campo_email').val() == ''){
                     mostrar($('.verifica_email'),$('#icon_error_email'));
                  }else{
                     retirar($('.verifica_email'),$('#icon_error_email'));
                  }
            });

             $('#campo_senha').keyup(function(){

                  if($('#campo_senha').val() == ''){
                     mostrar($('.verifica_senha'),$('#icon_error_senha'));
                  }else{
                     retirar($('.verifica_senha'),$('#icon_error_senha')); 
                  }
            });
      //-----------------------------------------
  </script>
</html>