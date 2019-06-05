<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();


if(!isset($_SESSION['SESSION_ANUNC_EMAIL']) && !isset($_SESSION['SESSION_ANUNC_SENHA'])){
     header("Location: ../Telas/Login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	  <title>Anúncios</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
	  <link rel="stylesheet" type="text/css" href="../css/style_anuncios_anunc.css">
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
             <li id="li_caminho"><a href="../Telas/AnunciosAnunc.php" id="a_caminho">Anúncios</a></li>
           </ul>
       </div>

       <div class="conteudo-container">

         <div class="group-conteudo">

           <div class="upload"> 

              
             <div class="upload-0">         
           
               <div class="group">
                    <div class="campo">
                        <input type="text" name="nome" class="control" autocomplete="off" required>
                        <label>Nome</label>
                    </div> 
                    <div class="campo">
                        <select class="control" id="selectTipo" required>
                          <option>---</option>
                          <option>Banner</option>
                          <option>Rodapé</option>
                        </select> 
                        <label>Tipo</label>
                    </div> 
                    <div class="campo">
                      <h5>Direcionamento</h5>
                    </div>
                    <div class="campo">
                        <div class="campo-acao">
                           SITE<input type="radio" name="TipoAcao" class="control" autocomplete="off" required>
                        </div>
                        <div class="campo-acao">
                           GPS<input type="radio" name="TipoAcao" class="control" autocomplete="off" required>
                        </div>
                    </div>  
                     <div class="campo">
                        <input type="text" name="link" class="control" autocomplete="off" required>
                        <label>Link</label>
                    </div>  
               </div>

               <div class="group">
                  <div class="group-img">
                      <div class="marcador">
                          <img class="preview-img"/>
                      </div>
                  </div>
               </div>

             </div>

              <div class="upload-0">    

                      <div class="group-botao">
                         <label for="imagem" id="btnUpload"><i class="fas fa-upload"></i>Upload Arquivo</label>
                         <input type="file" name="foto" id="imagem">
                      </div>

                      <div class="group-botao">
                           <button class="botao" id="btnSalvarAnunc">Salvar Anúncio</button>
                      </div>

                      <div class="group-botao">
                           <button class="botao" id="btnPesquisarAnunc">Pesquisar</button>
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
<!----------------- MODAL PESQUISA ANUNCIO ------------------->
<div class="modal fade" id="ModalPesquisaAnuncios" tabindex="-1" role="dialog"  aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado" style="font-weight: 800;color: #D56D05;">ANÚNCIOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="body-info" style="height: 340px; width: 490px;">
        <div class="row"><!----RESULTADOS AQUII---></div>
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
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- -------- ------ ------- -->
<script type="text/javascript">
  $(document).ready(function(){

      var id = '<?php echo $_SESSION['SESSION_ANUNC_ID']; ?>';

        $('#selectTipo').on('change',function(){
            if($(this).val() == 'Rodapé'){
              $(".preview-img").replaceWith('<img class="preview-img" style="width:400px;height:90px;transition: .6s;">');
            }else{
              if($(this).val() == 'Banner'){
                 $(".preview-img").replaceWith('<img class="preview-img">');
              }
            }
        });


        //UPLOAD DA IMAGEM NO QUADRO
          $('#imagem').on('change',function(e){
            file = e.target.files[0];
            
            var reader = new FileReader(); //CARREGA O UPLOAD DA IMAGEM
            var imagem = new Image(); //VERIFICA A DIMENSAO DA IMAGEM
            var largura;
            var altura;


              reader.onload = function(){

                  imagem.onload = function(){

                      if(this.width > 1200){
                        alert('largura grande!');
                        console.log('Largura: ' + this.width);
                        console.log('Altura: ' + this.height);
                        $('.marcador').css('border','1px solid red');
                      }else{
                        $('.preview-img').attr("src",reader.result);
                        $('.marcador').css('border','1px solid #3CB371');
                      }
                    
                }
              
              imagem.src = reader.result;

              }

            reader.readAsDataURL(file);

          });

            

            $('#btnSalvarAnunc').click(function(){

              var qtdImgSelecionadas = $('#imagem')[0].files.length;
              var formData = new FormData();
              
              if(qtdImgSelecionadas <= 0){

                 alert('Selecione uma imagem');

              }else{

                 formData.append('file', $('#imagem')[0].files[0]);
                 formData.append('ModeloAnuncio', $('#selectTipo').val());
                 formData.append('id', id);

                    $.ajax({
                          url: '../Anuncio/Upload.php',
                          method: 'POST',
                          dataType: 'JSON',
                          data: formData,
                          processData: false,  
                          contentType: false,
                          success: function(response){

                            if(response.status){

                                $('#ModalAlert').modal('show');
                                $('#mensagem').text(response.valor);
                                $('#quadro').css('background','#D0F5A9'); 

                                window.setTimeout(function(){
                                    $('#ModalAlert').modal('hide');
                                 },2100);

                                $('#selectTipo').val($("#selectTipo option:first").val());
                                $(".preview-img").replaceWith('<img class="preview-img">');

                                $('#imagem').val('');
                                console.log($('#imagem')[0].files.length);

                            }else{

                               $('#ModalAlert').modal('show');
                               $('#mensagem').text(response.valor);
                               $('#quadro').css('background','#FA5858'); 

                               window.setTimeout(function(){
                                    $('#ModalAlert').modal('hide');
                               },2100);

                            }
          

                          },error: function(error){

                          }
                      });
                  
              }

            });


            // ABIR ANUNCIOS
            $('#btnPesquisarAnunc').click(function(){
               $('#ModalPesquisaAnuncios').modal('show');
            });
     
    });
</script>
<script type="text/javascript">

       var identificador = '<?php echo $_SESSION['SESSION_ANUNC_ID']; ?>';

        //PESQUISAR AO APARECER O MODAL DE PESQUISA
       $('#ModalPesquisaAnuncios').on('show.bs.modal',function (e){

         // REMOVER DADOS ANTES DE ABRIR MODAL ---------------->
           var qtd = $('.modal-body .row')[0].childElementCount;
           var pai = $('.modal-body .row')[0];
           var filhos = $('.modal-body .row')[0].children;

          for (var i = 0; i < qtd; i++) {
            if(filhos.length >= 0){
             pai.removeChild(filhos[0]);
            }
          }
        //------------------------- ---------------->
            
             $.ajax({
                url: '../Anuncio/PesquisarAnuncios.php',
                type: 'POST',
                datatype: 'JSON',
                data: {IdAnunc: identificador},
                success: function(response){

                  console.log(response);

                  response.forEach(function(element){

                    var div = document.createElement('div');

                    $(div).attr('class','col');
                    $(div).html(element.Anuncio);

                    $('.modal-body .row').append(div);

                 });

                },error: function(data){
                    console.log(data);
                }
            });
        
      });
  
</script>
</html>
