<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

sleep(1);

require '../Util/daoGenerico.php';
$dao = new daoGenerico();

if(!isset($_SESSION['SESSION_DESENV_EMAIL']) && !isset($_SESSION['SESSION_DESENV_SENHA'])){
    header("Location: ../Telas/Login.php");
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
	  <link rel="stylesheet" type="text/css" href="../css/style_principal_desen.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
</head>
<body>
  
    <?php include_once '../Util/MenuDesen.php'; ?>

    <!-- SESSÃO DE CARREGAMENTO DAS PÁGINAS -->
    <section class="conteudo">

       <div class="caminho">
           <ul>
             <li id="li_caminho"><a href="../Telas/PrincipalDesen.php" id="a_caminho"><i class="fas fa-home" id="icon-menu"></i>Inicio</a></li>
           </ul>
       </div>

       <div class="conteudo-container">
         
           <div class="group-conteudo">

               <div class="title-escolha"></div>

                <div class="group-dados">

                    <table  class="tabela" cellpadding="0" cellspacing="0">
                      <tr>
                        <td id="titulo">Saldo<i class="fas fa-coins"></i></td>
                      </tr>
                      <tr>
                            <td>
                                <div class="dados-anunc">
                                  <h4>R$<span>0</span></h4>
                                </div>
                            </td>
                      </tr>
                    </table>
                        
               </div>

               <div class="group-info"></div>

           </div>

       </div>
        
     
  </section>

<!----------------- MODAL TERMOS DE USO ------------------->
<div class="modal fade" id="ModalTermoDeUso" tabindex="-1" role="dialog"  data-backdrop="static" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado" style="font-weight: 800;color: #D56D05;">TERMOS DE USO</h5>
        <button type="button" class="close" id="fecharModalTermoDeUso" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="body-info">
      <strong class="title-termo">Termo de Uso da Plataforma de Marketing Direcionado</strong>
      <br><br>
      <strong>Bem Vindo (a). Obrigado por utilizar a Plataforma de Marketing Direcionado!</strong>
      Esta aplicação e seu conteúdo são controlados e operados pela própria PMD.
      Todos os direitos reservados.
      Estes termos de uso têm por objetivo definir as regras a serem seguidas para a utilização da PMD (“Termo de Uso”), sem prejuízo da aplicação da legislação vigente.<br>
      Ao utilizar a plataforma de Marketing Direcionado, você concorda com estes termos de uso, responsabilizando-se por todos e quaisquer atos praticados por você na PMD ou em serviços a ela relacionados. Caso não concorde com qualquer dos termos estabelecidos a baixo, você não deve utilizar a plataforma. Você também concorda com a política de privacidade da empresa.<br><br>
      <strong>1 - O QUE É A PLATAFORMA DE MARKETING DIRECIONADO</strong><br>
      <strong>1.1 Serviçõs.</strong> É uma plataforma que oferece os seguintes serviços: Distribuição de Marketing Direcionado por meio da tecnologia de Geolocalização, em parceria com desenvolvedores de aplicativos.<br>
      <strong>1.2 Acesso. </strong> Para acessar a plataforma e utilizar seus serviços é necessário efetuar um cadastro onde você fornecera algumas informações pessoais.<br>
      <strong>1.3 Idade de utilização. </strong> Para utilizar a plataforma o usuário deve ter a idade mínima de 18 anos.<br><br>
      <strong>2 - COMO SÃO EFETUADOS OS PAGAMENTOS DA PLATAFORMA</strong><br>
      <strong>2.1 Meio de pagamento.</strong> Os pagamentos efetuados ao desenvolvedor na plataforma será realizado dentro da aplicação por meio de transferências bancárias ou depósitos.<br>
      <strong>2.2 Calculo de pagamento da plataforma para com o DESENVOLVEDOR.</strong>O Desenvolvedor recebera o valor correspondente a soma de 15% do valor total de visualizações de anúncios dentro do seus aplicativos cadastrados na plataforma. Cada visualização tem um custo de 0,03 centavos.<br><strong>EXEMPLO: 15*1000=15000/100=150.</strong><br><br>
      <strong>3 - Informações relevantes </strong><br>
      <strong>3.1 CONSENTIMENTO PARA COLETA E USO DE DADOS</strong><br> 
      Você concorda que a Plataforma pode coletar e usar dados técnicos de seu dispositivo tais como especificações, configurações, versões de sistema operacional, tipo de conexão à internet e afins.<br>
      <strong>3.2 ISENÇÃO DE GARANTIAS E LIMITAÇÕES DE RESPONSABILIDADE</strong><br>
      Esta aplicação estará em contínuo desenvolvimento e pode conter erros e, por isso, o uso é fornecido "no estado em que se encontra" e sob risco do usuário final. Na extensão máxima permitida pela legislação aplicável a PMD isenta-se de quaisquer garantias e condições expressas ou implícitas incluindo, sem limitação, garantias de comercialização, adequação a um propósito específico, titularidade e não violação no que diz respeito ao aplicativo e qualquer um de seus componentes ou ainda à prestação ou não de serviços de suporte.<br>
      <strong>3.3 API PARA DOWNLOAD</strong><br>
      A Plataforma de Marketing Direcionado disponibiliza a API para que os desenvolvedores façam o download e alterem configurações necessárias para que aconteça a interligação entre plataforma e aplicativo.
      </div>
      <div class="modal-footer">
        <div class="termo">
          <input type="checkbox" name="caixa" id="caixaTermoDeUso">
          <label for="caixaTermoDeUso" id="labelTermo" data-toggle="popover" data-placement="left" data-content="Marque a Caixa">Li e Concordo com todos os Termos e Condições.</label>
        </div>
        <button type="button" class="btn btn-primary" id="btnAceitarTermo">Aceitar Termo</button>
      </div>
    </div>
  </div>
</div>
<!----------------- FIM MODAL INFORMAÇÕES ------------------->

<!----------------- MODAL NOTIFICACAO ------------------->
<div class="modal fade" id="ModalNotificacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-body" style="text-align: center;border-radius: 20px;" id="quadro">
        <span id="mensagem" style="font-weight: bold;"></span>
      </div>
    </div>
  </div>
</div>
<!----------------- MODAL NOTIFICACAO ------------------->   
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- -------- ------ ------- -->
<script type="text/javascript">
   $(document).ready(function(){

     $('[data-toggle="popover"]').popover();


     $('#btnAceitarTermo').on('click',function(){

       var id = '<?php echo $_SESSION['SESSION_DESENV_ID']; ?>';

        if($('#caixaTermoDeUso').is(':checked')){

                $.ajax({
                    url: '../TermoDesenvolvedor/RegistraTermo.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {IdDesenvolvedor:id},
                    success: function(response){

                      if(response.status){

                         $('#ModalNotificacao').modal('show');
                         $('#mensagem').text('TERMO ACEITO COM SUCESSO!!');
                         $('#quadro').css('background','#D0F5A9'); 

                         window.setTimeout(function(){
                            $('#ModalNotificacao').modal('hide');
                            $('#ModalTermoDeUso').modal('hide');
                            window.location.reload();
                         },2000);

                      }else{

                         $('#ModalNotificacao').modal('show');
                         $('#mensagem').text('ERRO AO ACEITAR TERMO!!');
                         $('#quadro').css('background','#FA5858'); 

                         window.setTimeout(function(){
                            $('#ModalNotificacao').modal('hide');
                         },2000);
                       
                      }

                    },error: function(){

                    }
                });

            }else{

                   $('#labelTermo').popover('show');
            }
        });


       $('#fecharModalTermoDeUso').click(function(){
          if(confirm('Deseja Sair?')){
              $('#ModalTermoDeUso').modal('hide');
               window.location = '../Login/LogoutDesen.php';
            }
       });


      //SE MARCAR A CAIXA O ERRO DESAPARECE
      $('#labelTermo').click(function(){
         $('#labelTermo').popover('hide');   
      });

   });

  
</script>
</html>
<?php

if(isset($_SESSION['SESSION_DESENV_EMAIL']) && isset($_SESSION['SESSION_DESENV_SENHA'])){

      $id = $_SESSION['SESSION_DESENV_ID'];

      $sql = "SELECT * FROM termo_desenvolvedor WHERE Id_Desen = '$id'";

      $query = $dao->executaSQL($sql);

      if(mysqli_num_rows($query) > 0){ 

      }else{
           echo "<script>$('#ModalTermoDeUso').modal('show');</script>";
      }
}

?>
