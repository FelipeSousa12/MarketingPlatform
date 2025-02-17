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
                        <input type="text" name="nome" id="nomeAnuncio" class="control" autocomplete="off" required>
                        <label>Nome</label>
                    </div> 
                    <div class="campo">
                        <select class="control" id="selectModelo" required>
                          <option value=""></option>
                          <option value="Banner">Banner</option>
                          <option value="Rodape">Rodapé</option>
                        </select> 
                        <label>Modelo</label>
                    </div> 
                    <div class="campo">
                      <h5>Direcionamento</h5>
                    </div>
                    <div class="campo">
                        <div class="campo-acao">
                           SITE<input type="radio" name="TipoDirec" value="SITE"  class="control" autocomplete="off" required checked>
                        </div>
                        <div class="campo-acao">
                           GPS<input type="radio" name="TipoDirec" value="GPS"  class="control" autocomplete="off" required>
                        </div>
                    </div>  
                     <div class="campo">
                        <input type="text" name="caminho" class="control" id="tipoCaminho" autocomplete="off" required>
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
      <div class="modal-body" id="body-info" style="height: 340px; width: 500px;">
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

        $('#selectModelo').on('change',function(){
            if($(this).val() == 'Rodape'){
              if($(window).width() > 1000){
                 $(".preview-img").replaceWith('<img class="preview-img" style="width:400px;height:90px;transition: .6s;margin-top:100px;">');
                 $('.group:nth-child(1)').css('width','25%');
              }
             
            }else{
              if($(this).val() == 'Banner'){
                 $(".preview-img").replaceWith('<img class="preview-img">');
                    $('.group:nth-child(1)').css('width','40%');
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
                        //$('.marcador').css('border','1px solid red');
                      }else{
                        $('.preview-img').attr("src",reader.result);
                        //$('.marcador').css('border','1px solid #3CB371');
                      }
                    
                }
              
               imagem.src = reader.result;
               e.target.files[0] = null;
              }

            reader.readAsDataURL(file);

          });

            

            $('#btnSalvarAnunc').click(function(){

              var qtdImgSelecionadas = $('#imagem')[0].files.length;
              var formData = new FormData();

 
              
              if($('#nomeAnuncio').val() == ''){
                 $('#nomeAnuncio').focus();
                 $('#nomeAnuncio').css('border-bottom','1px solid red');
              }else{
                if($('#selectModelo').val() == ''){
                  $('#selectModelo').css('border-bottom','1px solid red');
                }else{
                    if(!$('input[type="radio"]').is(':checked')){
                      $('.campo:nth-child(4)').css('border-bottom','1px solid red');
                    }else{
                      if($('#tipoCaminho').val() == ''){
                        $('#tipoCaminho').focus();
                        $('#tipoCaminho').css('border-bottom','1px solid red');
                      }else{

                          if(qtdImgSelecionadas <= 0){

                             alert('Selecione uma imagem');

                          }else{

                             formData.append('file', $('#imagem')[0].files[0]);
                             formData.append('Nome', $('#nomeAnuncio').val());
                             formData.append('ModeloAnuncio', $('#selectModelo').val());
                             formData.append('TipoDirecionamento',$('input[type="radio"]:checked').val());
                             formData.append('Caminho', $('#tipoCaminho').val());
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

                                            $('#imagem,#nomeAnuncio,#tipoCaminho').val('');
                                            $('#selectModelo').val( $('#selectModelo option:first-child').val());
                                            $('input[value="SITE"]').attr('checked');
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
                      }

                    }
                }
              }
            });

            //MUDANÇA DE NOME CAMPO CAMINHO
             $('input[type="radio"]').click(function(e){
                   if($(this)[0].checked){
                     if($(this)[0].defaultValue == 'GPS'){
                         $('.campo:nth-child(5) > label').html('Endereco');
                     }else{
                         $('.campo:nth-child(5) > label').html('Link');
                     }
                   }
              });


            // ABIR ANUNCIOS
            $('#btnPesquisarAnunc').click(function(){
               $('#ModalPesquisaAnuncios').modal('show');
            });

            $('#nomeAnuncio,#tipoCaminho').keyup(function(e){
              if($(this).val() != ''){
                $(this).css('border-bottom','1px solid silver');
              }
            });

            $('#selectModelo').change(function(e){
              if($(this).val() != ''){
                 $(this).css('border-bottom','1px solid silver');
              }
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
                    var divExcluir = document.createElement('div');
                    var button = '<button style="margin-top:10px;color:#D56D05;background:white;border:1px solid #D56D05;padding:5px;cursor:pointer;border-radius:10px;" class="btnExcluirAnuncio">Excluir</button>'
                    var hidden = '<input type="hidden" value="'+element.Id+'">';

                    $(divExcluir).attr('class','col');
                    $(divExcluir).append(button);
                    $(divExcluir).append(hidden);

                    $(div).attr('class','col');
                    $(div).html(element.Anuncio);
                    $(div).append(divExcluir);

                    $('.modal-body .row').append(div);

                 });

                },error: function(data){
                    console.log(data);
                }
            });
        
      });

  
  
</script>
</html>
