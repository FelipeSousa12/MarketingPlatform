<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="../css/style_menu_anunc.css">
</head>
<body>
    <header class="cabecalho">
      <div class="cabec-login">
        <div class="login">
            <?php if(isset($_SESSION['SESSION_ANUNC_EMAIL'])){ ?>
            <label class="session-logado"><?php echo $_SESSION['SESSION_ANUNC_RAZAO']; ?></label>
            <?php } ?>
        </div>    

        <div class="login">
             <i class="fas fa-store-alt" id="icon-user"></i>
        </div>
      </div>
    </header>
    
    <input type="checkbox" id="chk">
    <label for="chk" class="icon-barra">&#9776;</label>

    <nav class="menu" id="principal">
    	
        <div class="img">
            <img src="../Imagens/Logo.png" id="icon-logo">
            <img src="../Imagens/logo_planeta.png" id="logo-reserva">
        </div>

        <ul id="ul-top">
          <li id="li-top"><a href="../Telas/PrincipalAnunc.php" id="a-top"><i class="fas fa-home" id="icon-menu"></i><label>Inicio</label></a></li>
          <li id="li-top"><a href="../Login/LogoutAnunc.php" id="a-top"><i class="fas fa-power-off" id="icon-menu"></i><label>sair</label></a></li>
        </ul>

        <ul id="ul-bottom">
      		<li id="li-bottom"><a class="select">-- Acesso --</a></li>
      		<li id="li-bottom">
            <a href="../Telas/MapaAnunc.php" id="a-caminho" class="disabled">
              <i class="fas fa-map-marked-alt icoPonto" id="icon-menu" data-toggle="popover" data-placement="left" data-content="Pontos"></i>
              <label id="texto">Pontos</label>
            </a>
          </li>
      		<li id="li-bottom">
            <a href="../Telas/AnunciosAnunc.php" id="a-caminho">
              <i class="far fa-file-image icoAnunc" id="icon-menu" data-toggle="popover" data-placement="left" data-content="Anúncios"></i>
              <label>Anúncios</label>
            </a>
          </li>
      		<li id="li-bottom">
            <a href="../Telas/GraficosAnunc.php" id="a-caminho">
              <i class="far fa-chart-bar icoGrafic" id="icon-menu" data-toggle="popover" data-placement="left" data-content="Gráficos"></i>
              <label>Gráficos</label>
            </a>
          </li>
      		<li id="li-bottom">
            <a href="../Telas/RelatorioAnunc.php" id="a-caminho">
              <i class="fas fa-scroll icoRelat" id="icon-menu" data-toggle="popover" data-placement="left" data-content="Relatórios"></i>
              <label>Relatórios</label>
            </a>
          </li>
      	</ul>

        <ul id="ul-bottom">
          <li id="li-bottom"><a class="select">-- Conta --</a></li>
          <li id="li-bottom">
            <a href="" id="a-caminho">
              <i class="fas fa-hand-holding-usd icoPag" id="icon-menu" data-toggle="popover" data-placement="left" data-content="Pagamentos"></i>
              <label>Pagamentos</label>
            </a>
          </li>
          <li id="li-bottom">
            <a href="" id="a-caminho">
              <i class="fas fa-cog icoConfig" id="icon-menu" data-toggle="popover" data-placement="left" data-content="Configuração"></i>
              <label>Configuração</label>
            </a>
          </li>
        </ul>
        
    </nav>
    
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ------------------------ -->
<script type="text/javascript">

             $("#li-bottom #a-caminho").hover(
                    function(){

                      var elemento = $(this)[0].lastElementChild.innerText;
                       
                        //Ao posicionar o cursor sobre a div
                        if($('#principal').width() > 150){

                           $(this).css(
                           {
                           'background-color':'rgba(0,0,0,0.2)',
                           'border-left':'solid 8px #D56D05',
                           'padding-left':'37px'
                            }
                         );

                        }else{

                           $(this).css(
                               {
                               'background-color':'rgba(0,0,0,0.2)',
                               'border-left':'none',
                                }
                            );

                           mostrar(elemento);

                        }
                    },
                    function(){
                        //Ao remover o cursor da div
                        $(".icoPonto").popover('hide');
                        $(".icoAnunc").popover('hide');
                        $(".icoGrafic").popover('hide');
                        $(".icoRelat").popover('hide');
                        $(".icoPag").popover('hide');
                        $(".icoConfig").popover('hide');

                        $(this).css(
                           {
                           'background-color':'#222',
                           'border-left':'none',
                           'padding-left':'14px'
                            }
                        );
                    }
             );

          function mostrar(elemento){
            switch (elemento){
                case 'PONTOS':
                    $(".icoPonto").popover('show');
                break;
                case 'ANÚNCIOS':
                    $(".icoAnunc").popover('show');
                break;
                case 'GRÁFICOS':
                    $(".icoGrafic").popover('show');
                break;
                case 'RELATÓRIOS':
                    $(".icoRelat").popover('show');
                break;
                case 'PAGAMENTOS':
                    $(".icoPag").popover('show');
                break;
                case 'CONFIGURAÇÃO':
                    $(".icoConfig").popover('show');
                break;
                }
          }         

</script>
</html>
