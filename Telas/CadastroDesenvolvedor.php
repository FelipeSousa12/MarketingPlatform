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
    	<title>Cadastro Desenvolvedor</title>
    	<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/style_cadastro_desen.css">
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
                       <h3 class="heading">Desenvolvedor - Efetuar Cadastro</h3>
                       <hr style="width: 60%;margin-top: 0;">
                     </div>
                
                  <form id="form" method="POST">

                  <div class="bloco">  

                      <div class="group">
                        <div class="verifica-documento">

                          <div class="group-radio">
                             <input type="radio" name="radioDocumento" class="radioDocCpf" value="Cpf" required checked>
                             <label>CPF</label>
                          </div>

                          <div class="group-radio">
                             <input type="radio" name="radioDocumento" class="radioDocCnpj" value="Cnpj" required>
                             <label>CNPJ</label>
                          </div>
                      
                        </div>
                      </div>

                      <div class="group">
                         <div class="verifica_email">
                            <input type="text" name="txtEmail" class="control" id="email" autocomplete="off" required>
                            <label>Email</label>
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
                        <div class="verifica_nome">
                           <input type="text" name="txtDescricaoNome" class="control" id="DescricaoNome" autocomplete="off" required>
                           <label id="escolha_nome">Nome</label>
                           <i><img src="../Imagens/error.png" id="icon_error_nome" title="Preencher Campo Obrigatório!!"></i>
                        </div>
                    </div>
                  
                    <div class="group">
                         <div class="verifica_numero">
                            <input type="text" name="txtNumero" class="control" id="numero" autocomplete="off" required>
                            <label id="escolha_Documento">Cpf</label>
                            <i><img src="../Imagens/error.png" id="icon_error_numero" title="Preencher Campo Obrigatório!!"></i>
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

          $(document).ready(function() {

              //MASKARAS DO FORM
              $('#numero').mask('000.000.000-00'); 
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

            //FUNCAO MUDA CAMPOS A PARTIR DA ESCOLHA DE DOCUMENTO
             $('input[type="radio"]').click(function(e){
                
                if($(this)[0].checked){

                  if($(this)[0].defaultValue == "Cnpj"){
                   
                     $('#numero').mask('00.000.000/0000-00');
                     $('#escolha_Documento').html($(this)[0].defaultValue);
                     $('#escolha_nome').html('Razão Social');
                  }else{
         
                     $('#numero').mask('000.000.000-00');
                     $('#escolha_Documento').html($(this)[0].defaultValue);
                     $('#escolha_nome').html('Nome');
                  }
                  $('#escolha').html($(this)[0].defaultValue);
                }
               
             });

        
              /*$("#caixaTermoDeUso").click( function() {
                  if($(this).is(":checked")){
                    alert('checou');
                  }
              });*/
              

          });

        

           //CLIQUE DO BOTAO FORMULARIO
           $('.botao').click(function(){ 

                var numero = $('#numero').val();     
                var DescricaoNome = $('#DescricaoNome').val();
                var Email = $('#email').val();
                var senha = $('#senha').val();
                var confirm = $('#confirm').val();

                var form =  $('#form').serialize();

            if($('input[class="radioDocCpf"]').is(":checked") || $('input[class="radioDocCnpj"]').is(":checked")){
               
                    $('.verifica-documento').css('border-bottom','1px solid rgba(0,0,0,0.1)');

                  if(DescricaoNome == ''){
                      mostrar($('.verifica_nome'),$('#icon_error_nome'));
                      $('#DescricaoNome').focus();
                  }else{
                      retirar($('.verifica_nome'),$('#icon_error_nome'));

                    if(Email == ''){
                          mostrar($('.verifica_email'),$('#icon_error_email'));
                          $('#email').focus();
                      }else{
                           retirar($('.verifica_email'),$('#icon_error_email'));
                        
                        if(numero == ''){
                             mostrar($('.verifica_numero'),$('#icon_error_numero'));
                            $('#numero').focus();
                        }else{
                             retirar($('.verifica_numero'),$('#icon_error_numero'));

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

                              if(senha != confirm || confirm != senha){
                                $('.msg_senha').css('visibility','visible');
                                $('.msg_confirm').css('visibility','visible');
                                mostrar($('.verifica_senha'),$('#icon_error_senha'));
                                mostrar($('.verifica_confirm'),$('#icon_error_confirm'));
                                return false;

                              }else{

                                 retirar($('.verifica_senha'),$('#icon_error_senha'));
                                 retirar($('.verifica_confirm'),$('#icon_error_confirm'));

                                 $.ajax({
                                  url: '../Desenvolvedor/RegistraDesenvolvedor.php',
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
                                      $('#form')[0].reset();
                                    
                                    }else{

                                        $('#exampleModal').modal('show');
                                        $('#mensagem').text('ERROR AO CADASTRAR!!');
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

               }else{
                    $('.verifica-documento').css('border-bottom','1px solid red');
               }

            });
</script>
</html>
<script type="text/javascript">
   
</script>
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
            $('#DescricaoNome').keyup(function(){

                  if($('#DescricaoNome').val() != ''){
                     retirar($('.verifica_nome'),$('#icon_error_nome'));
                  }else{
                     mostrar($('.verifica_nome'),$('#icon_error_nome'));
                  }
            });

             $('#email').keyup(function(){

                  if($('#email').val() == ''){
                     mostrar($('.verifica_email'),$('#icon_error_email'));
                  }else{
                     retirar($('.verifica_email'),$('#icon_error_email'));
                  }
            });

              $('#numero').keyup(function(){

                  if($('#numero').val() == ''){
                     mostrar($('.verifica_numero'),$('#icon_error_numero'));
                  }else{
                     retirar($('.verifica_numero'),$('#icon_error_numero'));
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
