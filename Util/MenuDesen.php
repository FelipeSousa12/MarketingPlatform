<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
	  <link rel="stylesheet" type="text/css" href="../css/style_menu_desen.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet"> 
</head>
<body>
    <header class="cabecalho">

            <?php if(isset($_SESSION['SESSION_DESENV_EMAIL'])){ ?>

            <label class="session-logado"><?php echo $_SESSION['SESSION_DESENV_DESENVOLVEDOR']; ?></label>

            <?php } ?>

            <div class="icon-login">
               <i class="fas fa-laptop-code" id="icon-user"></i>
            </div>
    
    </header>
    
    <input type="checkbox" id="chk">
    <label for="chk" class="icon-barra">&#9776;</label>

    <nav class="menu" id="principal">
    	
        <div class="img">
            <img src="../Imagens/Logo.png" id="icon-logo">
        </div>

        <ul id="ul-top">
          <li id="li-top"><a href="../Telas/PrincipalDesen.php" id="a-top"><i class="fas fa-home" id="icon-menu"></i>Inicio</a></li>
          <li id="li-top"><a href="../Login/LogoutDesen.php" id="a-top"><i class="fas fa-power-off" id="icon-menu"></i>sair</a></li>
        </ul>

        <ul id="ul-bottom">
      		<li id="li-bottom"><a class="select">-- Developer --</a></li>
      		<li id="li-bottom"><a href="#" id="a-caminho"><i class="fas fa-mobile-alt" id="icon-menu"></i>Aplicativos</a></li>
          <li id="li-bottom"><a href="#" id="a-caminho"><i class="fas fa-file-code" id="icon-menu"></i>API</a></li>
      		<li id="li-bottom"><a href="#" id="a-caminho"><i class="fas fa-chart-bar" id="icon-menu"></i>Gráficos</a></li>
      		<li id="li-bottom"><a href="#" id="a-caminho"><i class="fas fa-scroll" id="icon-menu"></i>Relatórios</a></li>
      	</ul>

        <ul id="ul-bottom">
          <li id="li-bottom"><a class="select">-- Conta --</a></li>
          <li id="li-bottom"><a href="#" id="a-caminho"><i class="fas fa-hand-holding-usd" id="icon-menu"></i>Pagamentos</a></li>
          <li id="li-bottom"><a href="#" id="a-caminho"><i class="fas fa-cog" id="icon-menu"></i>Configurações</a></li>
        </ul>
        
    </nav>

</body>
</html>
