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
    	<title>Contato</title>
    	<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style_contato.css">
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
                
         </div>      
            
                 <div class="form">
                    
                    <div class="card-img" id="img01"></div>

                     <div class="form-section">

                              <div class="group_title">
                                 <h3 class="heading">Tire sua dúvida</h3>
                                 <hr style="width: 50%;margin-top: 0;">
                              </div>
                      
                              <form action="../Util/email.php" method="POST" id="form">
                       
                               <div class="group">
                                 <div class="verifica_nome">
                                   <input type="text" name="nome" class="control" autocomplete="off" required>
                                   <label>Nome</label>
                                   <i><img src="../Imagens/error.png" id="icon_error_nome" title="Preencher Campo Obrigatório!!"></i>
                                 </div>
                               </div>

                               <div class="group">
                                 <div class="verifica_email">
                                    <input type="text" name="email" class="control" autocomplete="off" required>
                                    <label>E-mail</label>
                                    <i><img src="../Imagens/error.png" id="icon_error_email" title="Preencher Campo Obrigatório!!"></i>
                                 </div>
                               </div>

                               <div class="group">
                                  <select class="control" name="assunto" id="select-assunto">
                                    <option value="">Assunto:</option>
                                    <option value="Anúncios">Anúncios</option>
                                    <option value="Plataforma">Plataforma</option>
                                    <option value="Marketing">Marketing</option>
                                  </select>
                               </div>

                               <div class="group">
                                 <div class="verifica_msg">
                                   <textarea class="control" autocomplete="off" name="mensagem" id="msg" required></textarea>
                                   <label>Descrição..</label>
                                   <i><img src="../Imagens/error.png" id="icon_error_msg" title="Preencher Campo Obrigatório!!"></i>
                                 </div> 
                               </div>

                              <div class="group m20">
                                <input type="button" name="Enviar" class="botao" value="Enviar &rarr;">
                              </div>

                              </form>
                      </div>
                 </div>
          
 </div>

 <!----------------- MODAL FORM ------------------->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- -------- ------ ------- -->
<script type="text/javascript">

      // BOTÃO AO DIMINUIR TELA
      $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // EFEITO ROLAGEM DO MENU
      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }else {
                  $('nav').removeClass('black');
            }
      });

      //CLIQUE DE AÇÃO DE ENVIO DO EMAIL
      $('.botao').click(function(){

        var nome = $('input[name="nome"]').val();
        var email = $('input[name="email"]').val();
        var assunto = $('#select-assunto').val();
        var msg = $('#msg').val();

        var valores = $('#form').serialize();

        if(nome == ''){
          mostrar($('.verifica_nome'),$('#icon_error_nome'));
        }else{
          retirar($('.verifica_nome'),$('#icon_error_nome'));

          if(email == ''){
             mostrar($('.verifica_email'),$('#icon_error_email'));
          }else{
             retirar($('.verifica_email'),$('#icon_error_email'));
             
             if(assunto == ''){
                $('#select-assunto').css('border','1px solid red');
             }else{
                $('#select-assunto').css('border','1px solid silver');

                if(msg == ''){
                   mostrar($('.verifica_msg'),$('#icon_error_msg'));
                }else{
                   retirar($('.verifica_msg'),$('#icon_error_msg'));

                   $('#modal').modal('show');
                   $('#mensagem').text('Enviando Mensagem...');
                   $('.modal-body').css('background','#D0F5A9');
                  
                  $.ajax({
                    
                    url: '../Util/teste.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: valores,

                  success: function(response){

                     if(response.status == true){

                      $('#mensagem').text('Email Enviado com Sucesso!!');

                       window.setTimeout(function(){
                          $('#modal').modal('hide');
                       },2100);

                       //LIMPAR CAMPOS AUTOMATICAMENTE
                       var elements = document.getElementById('form').elements;
                       for (var i = 0; i < elements.length-1; i++) {
                                elements[i].value = '';  
                        }
            
                     }else{

                       $('#modal').modal('show');
                       $('#mensagem').text('Falha ao Enviar Mensagem... \n Verifique Seu Email');
                       $('.modal-body').css('background','#FA5858');

                        window.setTimeout(function(){
                          $('#modal').modal('hide');
                        },2180);

                     }

                  },error: function(data){
                     //ERRO DE ENVIO
                     console.log(data.responseText);
                  }

                  });

                }
             }
          }
        }
    });
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

     $('input[name="nome"]').keyup(function(){
        if($(this).val() == ''){
           mostrar($('.verifica_nome'),$('#icon_error_nome'));
        }else{
           retirar($('.verifica_nome'),$('#icon_error_nome'));
        }
     });

      $('input[name="email"]').keyup(function(){
        if($(this).val() == ''){
          mostrar($('.verifica_email'),$('#icon_error_email'));
        }else{
          retirar($('.verifica_email'),$('#icon_error_email'));
        }
      });

     $('#msg').keyup(function(){
        if($(this).val() == ''){
           mostrar($('.verifica_msg'),$('#icon_error_msg'));
         }else{
           retirar($('.verifica_msg'),$('#icon_error_msg'));
         }
     });

     $('#select-assunto').change(function(){
       if($(this).val() == ''){
         $('#select-assunto').css('border','1px solid red');
       }else{
         $('#select-assunto').css('border','1px solid silver');
       }
     });
  </script>
</html>