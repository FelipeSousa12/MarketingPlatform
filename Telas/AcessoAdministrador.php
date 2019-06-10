<?php
 sleep(1);
?>
<!DOCTYPE html>
<html>
<head>
    	<title>Acesso Administrador</title>
    	<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
      <link rel="stylesheet" type="text/css" href="../css/style_admin.css">
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>

  <div class="container">

      <div class="container-admin">
         <div class="group-title">
            <i class="fas fa-user-lock"></i><label>Acesso Administradores</label>
         </div> 

         <div class="group-acess">
            <div class="group">
                <h4>Anunciantes</h4>
                <i class="fas fa-store"></i>
            </div>
            <div class="group">
                <h4>Desenvolvedores</h4>
                <i class="fas fa-laptop-code"></i>
            </div>
            <div class="group">
                <h4>Relatórios</h4>
                <i class="fas fa-paste"></i>
            </div>
         </div>
         
      </div>

  </div>

</body>
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
<!-- -------- SCRIPTS ------- -->
 <script src="../js/jquery-3.3.1.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
 <script src="../js/jquerymask.js"></script>
<!-- ------------------------ -->
