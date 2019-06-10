<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

require '../Util/daoGenerico.php';

$dao = new daoGenerico();

if(!isset($_SESSION['SESSION_ANUNC_EMAIL']) && !isset($_SESSION['SESSION_ANUNC_SENHA'])){
     header("Location: ../Telas/Login.php");
}else{

 $id = $_SESSION['SESSION_ANUNC_ID'];

 $sql = "SELECT * FROM ANUNCIANTE WHERE IdAnunciante = $id";
 
 $result = $dao->executaSQL($sql);

  if(mysqli_num_rows($result) > 0){
       $dados = mysqli_fetch_object($result);
  }else{
       $dados = '';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Configurações Conta</title>
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
             <li id="li_caminho"><a href="../Telas/ConfigAnunc.php" id="a_caminho">Configurações Anunciante</a></li>
           </ul>
       </div>
        
         <div class="conteudo-container">
         
             <div class="group-conteudo">
                <div class="group-title">
                    <h4><i class="fas fa-user-cog"></i>Configurações De Conta</h4>
                </div>
                
                <div class="group-config">

                <form id="formulario">  
                  <div class="group-0">
                    
                     <div class="form">
                       <input type="text" name="razao" class="campo" id="txtRazao" value="<?php echo $dados->RazaoSocial; ?>" autocomplete="off">
                       <input type="hidden" name="id" value="<?php echo $id;?>">
                       <label id="escolha_nome">Razao Social</label>
                     </div>

                     <div class="form">
                       <input type="text" name="email" class="campo" id="txtEmail" value="<?php echo $dados->Email; ?>" autocomplete="off">
                       <label>Email</label>
                     </div>

                    <div class="form">
                      <input type="text" name="telefone" class="campo" id="txtTelefone" value="<?php echo $dados->Telefone; ?>" autocomplete="off">
                       <label>Telefone</label>
                     </div>
                       
                    </div>

                     <div class="group-0">

                     <div class="form">
                       <input type="text" name="cnpj" class="campo" id="txtCnpj" value="<?php echo $dados->Cnpj; ?>" autocomplete="off">
                       <label>Cnpj</label>
                     </div>
                     <div class="form">
                       <input type="password" name="senha" class="campo" value="<?php echo $dados->Senha; ?>" id="txtSenha">
                       <label>Senha</label>
                     </div>
                    
                     </div>

                  </form> 
                </div>
                <div class="group-confirm-config">

                      <div>
                        <button class="botao" id="AtualizarDados">Alterar Dados</button>
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
<script src="../js/jquerymask.js"></script>
<!-- -------- ------ ------- -->
<script type="text/javascript">
 $(document).ready(function(e){

             //MASKARAS DO FORM
              $('#txtCnpj').mask('00.000.000/0000-00'); 
              $('#txtTelefone').mask('(00) 0.0000-0000'); 
              //-----------------------------------


            $('#AtualizarDados').click(function(e){

              var form = $('#formulario').serialize();

                $.ajax({
                        url: '../Anunciante/AtualizarAnunciante.php',
                        type: 'POST',
                        dataType: 'JSON',
                        data: $('#formulario').serialize(),
                        success: function(response){

                          if(response.status){

                            $('#ModalAlert').modal('show');
                             $('#mensagem').text(response.msg);
                             $('#quadro').css('background','#D0F5A9'); 

                             window.setTimeout(function(){
                                $('#ModalAlert').modal('hide');
                                window.location.reload();
                             },2100);

                          }else{

                             $('#ModalAlert').modal('show');
                             $('#mensagem').text(response.msg);
                             $('#quadro').css('background','#FA5858'); 

                             window.setTimeout(function(){
                                $('#ModalAlert').modal('hide');
                             },2000);
                          }

                        },error: function(e){
                            $('#ModalAlert').modal('show');
                            $('#mensagem').text('*ERROR DE ENVIO*: '+e.responseText+'/n *CODIGO*: '+e.status);
                            $('#quadro').css('background','#FA5858'); 
                        }
                 });
           });  

 });
 
</script>
</html>
