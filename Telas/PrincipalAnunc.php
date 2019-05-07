<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

require '../Util/daoGenerico.php';

$dao = new daoGenerico();

sleep(1);

if(!isset($_SESSION['SESSION_ANUNC_EMAIL']) && !isset($_SESSION['SESSION_ANUNC_SENHA'])){
     header("Location: ../Telas/Login.php");
}else{

     $id = $_SESSION['SESSION_ANUNC_ID'];

     $sqlPacote = "SELECT * FROM PACOTES WHERE Id_Anunc = '$id'";
     $resultQuery = $dao->executaSQL($sqlPacote);

     if(mysqli_num_rows($resultQuery) > 0){
        $contratado = 'true';
     }else{
        $contratado = 'false';
     }
    
}

?>
<!DOCTYPE html>
<html>
<head>
	  <title>Inicio</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet"> 
	  <link rel="stylesheet" type="text/css" href="../css/style_principal_anunc.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
</head>
<body>
 
  
    <?php include_once '../Util/MenuAnunc.php'; ?>

    <!-- SESSÃO DE CARREGAMENTO DAS PÁGINAS -->
    <section class="conteudo">

       <div class="caminho">
           <ul>
             <li id="li_caminho">
               <a href="../Telas/PrincipalAnunc.php" id="a_caminho"><i class="fas fa-home" id="icon-menu"></i>Inicio</a>
             </li>
           </ul>
       </div>

       <div class="conteudo-container">
         
           <div class="group-conteudo">

               <div class="title-escolha"></div>

                <div class="group-dados">

                    <table  class="tabela" cellpadding="0" cellspacing="0">
                      <tr>
                        <td id="titulo">Visualizações<i class="fas fa-eye"></i></td><td id="titulo">Pontos Visitados<i class="fas fa-map-marker-alt"></i></td>
                      </tr>
                      <tr>
                            <td>
                               <div class="dados-anunc">
                                  <h4>
                                    <span class="num-Visualizacoes">0</span>     
                                  </h4>
                               </div>
                            </td>
                            <td>
                                <div class="dados-anunc">
                                  <h4>
                                    <span class="num-pontos">0</span>
                                  </h4>
                                </div>
                            </td>
                      </tr>
                    </table>
                        
               </div>

               <div class="group-info">

                <nav class="nav-abas">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Visualizações</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pontos Visitados<i class="fas fa-map-marker-alt" id="ptn"></i></a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Visualizações...</div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Pontos Visitados...</div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                </div>

               </div>
 
            </div>

         </div>
    </section>

<!----------------- MODAL FORM ------------------->
<div class="modal fade" id="ModalNotificacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-body" style="text-align: center;border-radius: 20px;" id="quadro">
        <span id="mensagem" style="font-weight: bold;"></span>
      </div>
    </div>
  </div>
</div>
<!----------------- MODAL FORM ------------------->   

<!----------------- MODAL BONUS ------------------->
<div class="modal fade" id="ModalBonus" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado" style="font-weight: 800;color: #D56D05;">BÔNUS GRATUITO</h5>
            <button type="button" class="close" id="fecharModalBonus" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="body-info">
             <strong>PARABÉNS!!</strong> A partir de agora voçê passará a ter acesso gratuito da plataforma com bônus de <strong>R$ 1,00</strong>. Ao final do periodo, é obrigatório a escolha de um pacote para a continuar utilização de nossos serviços.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnAceitar">Aceitar Bônus</button>
            <button type="button" class="btn btn-primary" id="btnContratarPacoteBonus">Contratar Pacote</button>
          </div>
        </div>
    </div>
</div>
<!--------------- FIM MODAL BONUS ---------------->


<!----------------- MODAL AVISO ------------------->
<div class="modal fade" id="ModalAviso" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado" style="font-weight: 800;color: #D56D05;">ATENÇÃO</h5>
            <button type="button" class="close" id="fecharModalAviso" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="body-info">
             <strong>Seu Bônus Expirou!!</strong></br>Contrate um novo Pacote para voltar a utilização de nossos serviços.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnContratarPacoteAviso">Contratar Pacote</button>
          </div>
        </div>
    </div>
</div>
<!--------------- FIM MODAL AVISO ---------------->
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- -------- ------ ------- -->
<script type="text/javascript">
  $(document).ready(function(){


    var valorContratado =  '<?php echo $contratado; ?>'
    var id = '<?php echo $_SESSION['SESSION_ANUNC_ID']; ?>';
  
  
     $('#btnAceitar').click(function(){

       $.ajax({
            url: '../Bonus/RegistraBonus.php',
            type: 'POST',
            dataType: 'JSON',
            data: {campoId:id},
            success: function(response){

              if(response.status){

                 $('#ModalNotificacao').modal('show');
                 $('#mensagem').text('BÔNUS ATIVADO COM SUCESSO!!');
                 $('#quadro').css('background','#D0F5A9'); 

                 window.setTimeout(function(){
                    $('#ModalNotificacao').modal('hide');
                    $('#ModalBonus').modal('hide');
                    window.location.reload();
                 },2100);

              }else{

                 $('#ModalNotificacao').modal('show');
                 $('#mensagem').text('ERRO NA ATIVAÇÃO DO BÔNUS!!');
                 $('#quadro').css('background','#FA5858'); 

                 window.setTimeout(function(){
                    $('#ModalNotificacao').modal('hide');
                    $('#ModalBonus').modal('hide');
                 },2000);
              }

            },error: function(e){
                $('#ModalNotificacao').modal('show');
                $('#mensagem').text('*ERROR DE ENVIO*: '+e.responseText+'/n *CODIGO*: '+e.status);
                $('#quadro').css('background','#FA5858'); 
            }
       });
     });  


     if(valorContratado == 'false'){
       //AÇÃO DO EVENTO VERIFICAR BONUS
        verificarBonusAnunciante(id);
     }
       
});


  function verificarBonusAnunciante(numId){
     $.ajax({
          url: '../Bonus/ConsultarBonus.php',
          type: 'POST',
          dataType: 'JSON',
          data: {campo: numId},
          success: function(response){

            if(response.status){

              if(response.valor >= 20){
                 $('#ModalAviso').modal('show');
              }else{
                 $('.num-Visualizacoes').html(response.valor);
              }
             
            }else{
               $('#ModalBonus').modal('show');
            }

          },error: function(){

          }
     });
  }
</script>
<script type="text/javascript">
 
    //AÇAO DOS BOTÕES DO MODAL
    $('#btnContratarPacoteBonus, #btnContratarPacoteAviso').on('click',function(){
        window.location = "../Telas/TelaPacotes.php?valorId=<?php echo $_SESSION['SESSION_ANUNC_ID'];?>";
    });

    //EVENTO AO FECHAR OS MODAIS
    $('#fecharModalBonus, #fecharModalAviso').click(function(){
          if(confirm('Deseja sair?')){
            $('#ModalBonus').modal('hide');
             window.location = '../Login/LogoutAnunc.php';
          }
    });
    
</script>
</html>