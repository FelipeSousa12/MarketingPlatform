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
    	<title>Cadastro Anunciante</title>
    	<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/style_cadastro_anunc.css">
</head>
<body>
            <header>
                  <nav>
                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                             <a href="../Telas/Home.php"><img src="../Imagens/logo.png"></a>
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
                       <h3 class="heading">Anunciante - Efetuar Cadastro</h3>
                       <hr style="width: 60%;margin-top: 0;">
                     </div>
                
                  <form id="form" method="POST">

                  <div class="bloco">  

                      <div class="group">
                        <div class="verifica_razao">
                           <input type="text" name="txtRazao" class="control" id="razao" autocomplete="off" required>
                           <label>Razão Social</label>
                           <i><img src="../Imagens/error.png" id="icon_error_razao" title="Preencher Campo Obrigatório!!"></i>
                        </div>
                      </div>

                      <div class="group">
                         <div class="verifica_email">
                            <input type="text" name="txtEmail" class="control" id="email" autocomplete="off" required>
                            <label>E-mail</label>
                            <i><img src="../Imagens/error.png" id="icon_error_email" title="Preencher Campo Obrigatório!!"></i>
                         </div> 
                      </div>

                      <div class="group">
                         <div class="verifica_senha">
                            <input type="password" name="txtSenha" class="control" id="senha" autocomplete="off" required>
                            <label>Senha</label>
                            <i><img src="../Imagens/error.png" id="icon_error_senha" title="Preencher Campo Obrigatório!!"></i>
                            <span class="msg_senha" style="visibility: hidden;color: red; font-size: 14px; font-style: italic; position:absolute; bottom: -48%;">*Senhas Nao Conferem*</span>
                         </div>
                         <span class="msg_senha"></span>
                      </div>
                      
                  </div>

                   
                  <div class="bloco">
                    
                    <div class="group">
                        <div class="verifica_cnpj">
                           <input type="text" name="txtCnpj" class="control" id="cnpj" autocomplete="off" required>
                           <label>Cnpj</label>
                           <i><img src="../Imagens/error.png" id="icon_error_cnpj" title="Preencher Campo Obrigatório!!"></i>
                        </div>
                    </div>
                  
                    <div class="group">
                         <div class="verifica_telefone">
                            <input type="text" name="txtTelefone" class="control" id="telefone" autocomplete="off" required>
                            <label>Telefone</label>
                            <i><img src="../Imagens/error.png" id="icon_error_telefone" title="Preencher Campo Obrigatório!!"></i>
                         </div> 
                    </div>  

                    <div class="group">
                       <div class="verifica_confirm">
                          <input type="password" name="txtConfirm" class="control" id="confirm" autocomplete="off" required>
                          <label>Confirmar Senha</label>
                          <i><img src="../Imagens/error.png" id="icon_error_confirm" title="Preencher Campo Obrigatório!!"></i>
                          <span class="msg_confirm" style="visibility: hidden;color: red; font-size: 14px; font-style: italic; position:absolute; bottom: -48%;">*Senhas Nao Conferem*</span>
                      </div>
                  </div>

                  </div>
                
                        <div class="group m20">
                          <input type="button" name="btnCadastrar" class="botao" value="Criar Conta &rarr;">
                        </div>
                  </form>

                         <div class="group m20">
                          <a href="../Telas/Login.php" class="link">Já possui uma conta?</a>
                         </div>
                  </div> 
                </div>           
        
      </div>

<!----------------- MODAL FORM ------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
 <script src="../js/jquerymask.js"></script>
<!-- ------------------------ -->
<script type="text/javascript">

          $(document).ready(function(){

              //MASKARAS DO FORM
              $('#cnpj').mask('00.000.000/0000-00'); 
              $('#telefone').mask('(00) 0.0000-0000'); 
              //----------------------------------

              //BOTÃO AO DIMINUIR TELA  
              $(".menu-icon").on("click", function() {
                      $("nav ul").toggleClass("showing");
                });

              // EFEITO ROLAGEM DO MENU
              $(window).on("scroll", function(){
                    if($(window).scrollTop()) {
                          $('nav').addClass('black');
                    }else {
                          $('nav').removeClass('black');
                    }
              });
              
          });

        

           //CLIQUE DO BOTAO FORMULARIO
           $('.botao').click(function(){ 

                var razao = $('#razao').val();
                var cnpj = $('#cnpj').val();     
                var email = $('#email').val();
                var telefone = $('#telefone').val(); 
                var senha = $('#senha').val();
                var confirm = $('#confirm').val();

                var form =  $('#form').serialize();

            if(razao == ''){
                   mostrar($('.verifica_razao'),$('#icon_error_razao'));
                   $('#razao').focus();
               }else{
                   retirar($('.verifica_razao'),$('#icon_error_razao'));

                  if(cnpj == ''){
                      mostrar($('.verifica_cnpj'),$('#icon_error_cnpj'));
                      $('#cnpj').focus();
                  }else{
                      retirar($('.verifica_cnpj'),$('#icon_error_cnpj'));

                    if(email == ''){
                          mostrar($('.verifica_email'),$('#icon_error_email'));
                          $('#email').focus();
                      }else{
                           retirar($('.verifica_email'),$('#icon_error_email'));
                        
                        if(telefone == ''){
                             mostrar($('.verifica_telefone'),$('#icon_error_telefone'));
                            $('#telefone').focus();
                        }else{
                             retirar($('.verifica_telefone'),$('#icon_error_telefone'));

                        if(senha == ''){
                             mostrar($('.verifica_senha'),$('#icon_error_senha'));  
                            $('#senha').focus();
                        }else{
                             retirar($('.verifica_senha'),$('#icon_error_senha')); 
                          
                          if(confirm == ''){
                             mostrar($('.verifica_confirm'),$('#icon_error_confirm'));
                            $('#confirm').focus();
                          }else{
                              retirar($('.verifica_confirm'),$('#icon_error_confirm'));

                              if(senha != confirm){
                                $('.msg_senha').css('visibility','visible');
                                $('.msg_confirm').css('visibility','visible');
                                mostrar($('.verifica_senha'),$('#icon_error_senha'));
                                mostrar($('.verifica_confirm'),$('#icon_error_confirm'));
                                return false;
                              }else{

                                 retirar($('.verifica_senha'),$('#icon_error_senha'));
                                 retirar($('.verifica_confirm'),$('#icon_error_confirm'));

                                 $.ajax({
                                  url: '../Anunciante/RegistraAnunciante.php',
                                  type: 'POST',
                                  dataType: 'JSON',
                                  data: form,
                                  success: function(response){

                                    if(response.status == true){

                                      $('#exampleModal').modal('show');
                                      $('#mensagem').text('CADASTRADO COM SUCESSO!!');
                                      $('.modal-body').css('background','#D0F5A9'); 

                                      window.setTimeout(function(){
                                        $('#exampleModal').modal('hide');
                                      },2100);

                                      //LIMPAR CAMPOS AUTOMATICAMENTE
                                      var elements = document.getElementById('form').elements;
                                      for (var i = 0; i < elements.length-1; i++) {
                                           elements[i].value = '';
                                      }

                                      $('#exampleModal').on('hidden.bs.modal', function (e){
                                          $('#ExemploModalCentralizado').modal('show');
                                      });
      
                                    
                                    }else{

                                      $('#exampleModal').modal('show');
                                      $('#mensagem').text('ERRO AO EFETUAR CADASTRO!!');
                                      $('.modal-body').css('background','#FA5858'); 

                                      window.setTimeout(function(){
                                        $('#exampleModal').modal('hide');
                                      },2100);

                                    }

                                  },error: function(e){
                                         console.log(e);
                                         $('#exampleModal').modal('show');
                                         $('#mensagem').text('*ERROR DE ENVIO*: '+e.responseText+'/n *CODIGO*: '+e.status);
                                         $('.modal-body').css('background','#FA5858'); 
                                   }
                                });

                                 return true;
                             }
                           }
                         }
                       }
                     }
                  }   
               }

            });
</script>
</html>
<script type="text/javascript">

    //FUNCÃO PARA MOSTRA MENSAGEM DE ERRO NOS CAMPOS
     function mostrar(element,error){
        element.css({'border-bottom':'1px solid red',
                     'border-radius':'5px'
                    });
        error.css('visibility','visible');
     }
     
     //FUNCÃO PARA RETIRAR MENSAGEM DE ERRO NOS CAMPOS
     function retirar(element,error){
        element.css('border-bottom','none');
        error.css('visibility','hidden');
     }

  //EVENTO DOS CAMPOS DO FORMULARIO CASO ESTEJA VAZIO OU NAO
            $('#razao').keyup(function(){

                  if($('#razao').val() != ''){
                     retirar($('.verifica_razao'),$('#icon_error_razao'));
                  }else{
                     mostrar($('.verifica_razao'),$('#icon_error_razao'));
                  }
            });

             $('#cnpj').keyup(function(){

                  if($('#cnpj').val() == ''){
                     mostrar($('.verifica_cnpj'),$('#icon_error_cnpj'));
                  }else{
                     retirar($('.verifica_cnpj'),$('#icon_error_cnpj'));
                  }
            });

              $('#telefone').keyup(function(){

                  if($('#telefone').val() == ''){
                     mostrar($('.verifica_telefone'),$('#icon_error_telefone'));
                  }else{
                     retirar($('.verifica_telefone'),$('#icon_error_telefone'));
                  }
            });

             $('#email').keyup(function(){

                  if($('#email').val() == ''){
                     mostrar($('.verifica_email'),$('#icon_error_email'));
                  }else{
                     retirar($('.verifica_email'),$('#icon_error_email'));
                  }
            });

             $('#senha').keyup(function(){

                  if($('#senha').val() == ''){
                     mostrar($('.verifica_senha'),$('#icon_error_senha'));
                  }else{
                      retirar($('.verifica_senha'),$('#icon_error_senha'));

                     if(this.value != $('#confirm').val()){
                         $('.msg_senha').css('visibility','visible');
                         $('.msg_confirm').css('visibility','visible');
                         mostrar($('.verifica_senha'),$('#icon_error_senha'));
                         mostrar($('.verifica_confirm'),$('#icon_error_confirm')); 
                     }else{
                        retirar($('.verifica_senha'),$('#icon_error_senha'));
                        retirar($('.verifica_confirm'),$('#icon_error_confirm'));
                        $('.msg_senha').css('visibility','hidden');
                        $('.msg_confirm').css('visibility','hidden'); 
                     } 
                  }

            });
    //-----------------------------------------


     //VERIFICAR AUTENTICAÇÃO DOS CAMPOS SENHA E CONFIRMAR SENHA   
           $('#confirm').keyup(function(){

              var valor_senha = $('#senha').val();

              if(valor_senha == ""){
                      $('.msg_senha').css('visibility','visible');
                      $('.msg_confirm').css('visibility','visible');
                      mostrar($('.verifica_senha'),$('#icon_error_senha'));
                      mostrar($('.verifica_confirm'),$('#icon_error_confirm'));   
              }else{
                 if(valor_senha !== this.value){
                      $('.msg_senha').css('visibility','visible');
                      $('.msg_confirm').css('visibility','visible');
                      mostrar($('.verifica_senha'),$('#icon_error_senha'));
                      mostrar($('.verifica_confirm'),$('#icon_error_confirm'));        
                 }else{
                      retirar($('.verifica_senha'),$('#icon_error_senha'));
                      retirar($('.verifica_confirm'),$('#icon_error_confirm'));
                      $('.msg_senha').css('visibility','hidden');
                      $('.msg_confirm').css('visibility','hidden'); 
                 }
              }   
           });
            //-----------------------------------------------  
                  
</script>
