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

           <div class="upload">          
           
               <div class="group">
                    <div class="campo">
                        <input type="text" name="nome" class="control" autocomplete="off" required>
                        <label>Nome</label>
                    </div>
                    <div class="campo">
                        <input type="text" name="nome" class="control" autocomplete="off" required> 
                        <label>Tamanho</label>
                    </div>   
                     <div class="campo">
                        <select class="control" required>
                          <option>---</option>
                          <option>Banner</option>
                          <option>Rodapé</option>
                          <option>Interstial</option>
                        </select> 
                        <label>Tipo</label>
                    </div>   
               </div>

               <div class="group">
                 
                 <div class="mostrar-img"></div>

                  <form id="formulario" action="">

                       <input type="file" name="foto" id="imagem">

                       <div class="botoes">

                          <div class="group-btn">
                             <input type="button" name="botao" class="botao" value="Salvar Anúncio" id="btnSalvarAnunc">
                          </div>

                          <div class="group-btn">
                              <input type="button" name="botao" class="botao" value="Pesquisar Anúncios">
                          </div>

                       </div>

                  </form>
                 
               </div>

          </div>

         
       </div>
        
     
    </section>
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
            
            $('#btnSalvarAnunc').click(function(){

              var img = new FormData();
              img.append('file', $('#imagem'));

                $.ajax({
                    url: '../Util/Upload/Upload.php',
                    method: 'POST',
                    datatype: 'json',
                    data: img,
                    success: function (retorno) {

                      
                    }, // Se houver algum erro na requisição
                    error: function (){

                    }

                });

            });
     
    });
</script>
</html>
