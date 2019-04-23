<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

if(isset($_SESSION['SESSION_ANUNC_EMAIL']) && isset($_SESSION['SESSION_ANUNC_SENHA'])){
    header("Location: ../Telas/PrincipalAnunc.php");
}elseif(isset($_SESSION['SESSION_DESENV_EMAIL']) && isset($_SESSION['SESSION_DESENV_SENHA'])){
    header("Location: ../Telas/PrincipalDesen.php");
}


?>
<!DOCTYPE html>
<html>
<head>
      <title>PMD - Plataforma de Marketing Direcionado</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="../css/style_index.css">
</head>
<body>
      <div class="wrapper">
            <header>

                   <nav>
                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                             <a href="Index.html"> <img src="../Imagens/logo.png"></a>
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="../Telas/Index.php">HOME</a></li>
                                    <li><a href="../Telas/servicos.php">SERVIÇOS</a></li>
                                    <li><a href="../Telas/Contato.php">CONTATO</a></li>
                                    <li><a href="../Telas/CadastroDesenvolvedor.php">DESENVOLVEDORES</a></li>
                                    <li><a href="../Telas/CadastroAnunciante.php">ANUNCIANTE</a></li>
                                    <li><a href="../Telas/Login.php">LOGIN</a></li>                                                         
                              </ul>
                        </div>
                   </nav>

  <div class="pimg1">
    <div class="ptext">
      <a href="../Telas/Cadastro.php"><span class="border">SEJA UM MEMBRO</span></a>
      <p id="paragrafo">TENHA MAIS VISIBILIDADE NO SEU NEGÓCIO</p>
    </div>
  </div>

  <section class="section section-light">
    <h2>COMO PODEMOS AJUDAR SUA EMPRESA HOJE?</h2>
    <p>
      O marketing é considerado um dos ramos mais atrativos quando se trata de coquistar clientes através de uma marca. Pensando nisso, utilizar um conceito novo de tecnologia como a geolocalização atrelado ao marketing, favorece para a divulgação de uma marca, diferentemente de outros métodos comuns. Utilizando o conceito de geolocalização é possivel interagir e persuadir seu publico-alvo buscando divulgar o marketing de forma inovadora e dinâmica.  
    </p>
  </section>

  <div class="pimg2">
    <div class="ptext">
     <a href="../Telas/Servicos.php"><span class="border">SAIBA COMO</span></a>
    </div>
  </div>

  <section class="section section-dark">
    <h2>TEMOS A SOLUÇÃO PARA SEU PROBLEMA!</h2>
    <p>
     Nossos serviços são especializados e voltados para a publicidade online, partindo de uma idéia inovadora, na qual pontecializamos a visibilidade do seu negócio. Dessa forma, permite que a distribuição de anúncios seja visualizado por consumidores localizados aos arredores de sua empresa.
    </p>
  </section>

  <div class="pimg3">
    <div class="ptext">
     <a href="../Telas/Servicos.php"><span class="border">TORNE-SE NOSSO PARCEIRO</span></a>
    </div>
  </div>

  <section class="section section-dark">
    <h2>OPTE POR SER UM DE NOSSOS PARCEIROS</h2>
    <p>
      Integre sua aplicação a nossa plataforma e receba todos os beneficos sendo um de nossos parceiros. Veja como a tecnologia de geolocalização pode melhorar os resultados de publicidade e gerar mais receita. Nossa plataforma conta com as melhores formas de trabalho e pagamento destinados aos parceriros.   
    </p>
  </section>

  <div class="pimg1">
    <div class="ptext">
      <a href="../Telas/Servicos.php"><span class="border">NOS CONHEÇA UM POUCO MAIS</span></a>
    </div>
    <ul class="social-icon">
        <li><a href="#"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
        <li><a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li><a href="#"> <i class="fa fa-envelope" aria-hidden="true"></i></a></li>
        <li><a href="#"> <i class="fa fa-google-plus" aria-hidden="true"> </i></a></li>
    </ul>
  </div>

<?php include '../Util/rodape.php';  ?>

</header>
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- -------- ------ ------- -->
 <script type="text/javascript">

      //BOTÃO AO DIMINUIR TELA
      $(document).ready(function(){

            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
            
      });

      //EFEITO ROLAGEM DO MENU
      $(window).on("scroll", function(){
            if($(this).scrollTop()) {
                  $('nav').addClass('black');
            }else{
                  $('nav').removeClass('black');
            }
      });
  </script>
</html> 