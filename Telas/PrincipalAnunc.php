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
                              
                              <?php 
                              $query1 = "SELECT SUM(Quantidade) As Total FROM visualizacoes AS V WHERE V.Id_Anunc = $id";
                              $resultado1 = $dao->executaSQL($query1);
                              if(mysqli_num_rows($resultado1) > 0){ 

                              $dado1 = mysqli_fetch_assoc($resultado1);
                             
                              if($dado1['Total'] == null){ ?>
                                  <h4>
                                    <span class="num-Visualizacao">0</span>   
                                  </h4>
                               <?php }else{ ?> 
                                 <h4>
                                    <span class="num-Visualizacao"><?php echo $dado1['Total']; ?></span>   
                                  </h4>
                               <?php }} ?>
                               </div>
                            </td>
                            <td>
                                <div class="dados-anunc">
                                <?php 
                                $query2 = "SELECT COUNT(Quantidade) As Quantidade FROM visualizacoes AS V WHERE V.Id_Anunc = $id";
                                $resultado2 = $dao->executaSQL($query2);
                                if(mysqli_num_rows($resultado2) > 0){ $dado2 = mysqli_fetch_assoc($resultado2); ?>
                                    <h4>
                                      <span class="num-pontos"><?php echo $dado2['Quantidade']; ?></span>   
                                    </h4>
                                 <?php }else{ ?>
                                    <h4>
                                      <span class="num-pontos">0</span>   
                                    </h4>
                                 <?php } ?>
                                </div>
                            </td>
                      </tr>
                    </table>
                        
               </div>

               <div class="group-info">

                <nav class="nav-abas">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-visualizacoes" role="tab" aria-controls="nav-profile" aria-selected="false">Pontos Visitados<i class="fas fa-map-marker-alt" id="ptn"></i></a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-visualizacoes" role="tabpanel" aria-labelledby="nav-home-tab">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col-2">VISUALIZAÇÕES</th>
                            <th scope="col-2">ENDERECO</th>
                          </tr>
                        </thead>
                        <?php  $sql = "SELECT Quantidade,Endereco FROM visualizacoes as V INNER JOIN pontospublicidade as P ON V.Id_Ponto = P.IdPontoPublicidade WHERE V.Id_Anunc = $id"; $result = $dao->executaSQL($sql);  ?>
                        <?php if(mysqli_num_rows($result) > 0){  
                            while($dados = mysqli_fetch_object($result)){ ?>
                          <tbody>
                           
                            <tr>
                              <th><?php echo $dados->Quantidade; ?></th>
                              <td><?php echo $dados->Endereco; ?></td>
                            </tr>
                                
                          </tbody>
                         <?php } ?> 
                        <?php }else{ ?> 
                           <tbody>
                           
                            <tr>
                              <th>...</th>
                              <td>...</td>
                            </tr>
                                
                          </tbody>
                        <?php } ?> 
                      </table>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    Pontos Visitados...
                  </div>
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