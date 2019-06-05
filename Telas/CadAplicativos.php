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
	  <title>Aplicativos</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
	  <link rel="stylesheet" type="text/css" href="../css/style_cad_aplicativos.css">
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
             <li id="li_caminho"><a href="../Telas/CadAplicativos.php" id="a_caminho">Aplicativos</a></li>
           </ul>
       </div>
        
         <div class="conteudo-container">
         
             <div class="group-conteudo">
                <div class="group-title">
                    <h4><i class="fab fa-android"></i>Cadastro Aplicativos</h4>
                </div>
                
                <div class="group-cadastro">
                    <div class="group-0">

                      <div class="icone-cel">
                         <i class="fab fa-android"></i>
                      </div>
                       
                    </div>

                     <div class="group-0">

                        <div class="form">
                            <input type="text" name="nomeApp" class="campo" id="txtNome" autocomplete="off" required>
                            <label>Nome App</label>
                        </div> 
                        <div class="form">
                            <input type="text" name="IdApp" class="campo" id="txtId" autocomplete="off" required>
                            <label>Identificador</label>
                        </div>
                        <div class="form">
                            <select class="campo" id="selectCategoria">
                              <option value="">---</option>
                              <option value="Esportes">Esportes</option>
                              <option value="Luta">Luta</option>
                              <option value="Entreterimento">Entreterimento</option>
                            </select>
                            <label>Categoria</label>
                        </div> 
                        <div class="form">
                          <button class="botao" id="btnCadastrar">Cadastrar</button>
                          <button class="botao" id="btnPesquisar"><i class="fas fa-search"></i></button>
                        </div>
                    
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
<!----------------- MODAL PESQUISA APP------------------->
<div class="modal fade" id="ModalPesquisaApp" tabindex="-1" role="dialog"  aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document"  style="height: 340px; width: 700px;">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado" style="font-weight: 800;color: #D56D05;">APLICATIVOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="body-info" style="height: 340px;">
        <div class="blocoMenu">
            <tr>
              <th scope="col">IDENT.</th>
              <th scope="col">NOME</th>
              <th scope="col">CATEGORIA</th>
              <th scope="col">AÇÃO</th>
            </tr>
        </div>
        <div class="bloco0" style="display: block;">
           <table class="table table-striped" >
             <thead>
                  <tr>
                    <th scope="col">IDENT.</th>
                    <th scope="col">NOME</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">AÇÃO</th>
                  </tr>
              </thead>
               <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                   <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>    
              </tbody>
           
          </table>
        </div>

      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-primary" id="btnAceitarTermo">Aceitar Termo</button> -->
      </div>
    </div>
  </div>
</div>
<!----------------- FIM MODAL ------------------->    
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<!-- -------- ------ ------- -->
<script type="text/javascript">
  $(document).ready(function(){

    var id = "<?php echo $_SESSION['SESSION_DESENV_ID']; ?>";


            $('#btnCadastrar').click(function(){

              var nomeApp =  $('#txtNome').val();
              var Ident =  $('#txtId').val();
              var categoria = $('#selectCategoria').val();

              if(nomeApp == ''){
                 $('#txtNome').focus();
                 $('#txtNome').css('border-bottom','1px solid red');
              }else{
                if(Ident == ''){
                   $('#txtId').focus();
                   $('#txtId').css('border-bottom','1px solid red');
                }else{
                  if(categoria == ''){
                    $('#selectCategoria').focus();
                    $('#selectCategoria').css('border-bottom','1px solid red');
                  }else{

                     $.ajax({
                          url: '../Aplicativo/RegistraAplicativo.php',
                          method: 'POST',
                          datatype: 'JSON',
                          data: {Nome: nomeApp, 
                                Identificador: Ident,
                                Categoria : categoria,
                                idDesen: id},    
                          success: function(resposta){

                            if(resposta.status){

                               $('#ModalAlert').modal('show');
                               $('#mensagem').text(resposta.msg);
                               $('#quadro').css('background','#D0F5A9'); 

                              window.setTimeout(function(){
                                    $('#ModalAlert').modal('hide');
                               },2100);

                              $('#txtNome,#txtId').val('');
                              $('#selectCategoria').val($('#selectCategoria option:first-child').val());

                            }else{

                               $('#ModalAlert').modal('show');
                               $('#mensagem').text(resposta.msg);
                               $('#quadro').css('background','#FA5858'); 

                                window.setTimeout(function(){
                                     $('#ModalAlert').modal('hide');
                                },2100);

                            }

                          },error: function(error){

                          }
                      });

                  }

                }
              }
            
            });

     
  });


   $('#btnPesquisar').click(function(){
             $('#ModalPesquisaApp').modal('show');
    });


  
</script>
<script type="text/javascript">
  

  $('#selectCategoria').change(function(){
      if($(this).val() != ''){
         $(this).css('border-bottom','1px solid silver'); 
      }
  });

  $('#txtNome,#txtId').keyup(function(){
    if($(this).val() != ''){
       $(this).css('border-bottom','1px solid silver'); 
    }
  })
</script>
</html>
