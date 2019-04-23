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
      <title>Servicos</title>
	   <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../css/style_servicos.css">
</head>
<body>
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

                 
                 <div class="slide active">
                        <div class="card">
                              <div class="card-img" id="img01"></div>
                              <div class="card-content">
                                    <p class="card-theme">LOCALIZAÇÃO</p>
                                    <h2 class="card-header">Torne sua empresa visivel</h2>
                                    <p class="card-para" style="text-align: justify;">Através da plataforma integrada, é possivel
                                    tornar seu estabelecimento presente nas mãos de milhões de usuarios conectados, permitindo a divulgação de sua marca por qualquer lugar. Seu uso é simples,após realizar o cadatro e concordar em ser um anunciante,utilize recursos e um mapa na plataforma com opções de pontos especificos que podem ser marcados pelo próprio usuário. Assim, pode escolher entre um ponto mais próximo da empresa ou onde concentram seus públicos-alvo.</p>
                              <a href="../Telas/CadastroAnunciante.php" class="card-link" style="text-transform: uppercase;font-size: 15px;">Realizar Cadastro</a>
                              </div>
                        </div>
                  </div>
                  <div class="slide">
                        <div class="card">
                              <div class="card-img" id="img02"></div>
                              <div class="card-content">
                                    <p class="card-theme">CLIENTES</p>
                                    <h2 class="card-header">Encontre seu clientes</h2>
                                    <p class="card-para" style="text-align: justify;">Com o uso da tecnologia de geolocalização é possivel mapear locais que atendem a uma grande demanda de usuários conectados a dispositivos móveis.Dessa forma,o impacto de possiveis clientes é possível e aproximam cada vez mais o mesmo a sua marca através da tela do celular.</p>
                              <a  href="../Telas/CadastroAnunciante.php" class="card-link" style="text-transform: uppercase;font-size: 15px;">Proximo</a>
                              </div>
                        </div>
                  </div>
                  <div class="slide">
                        <div class="card">
                              <div class="card-img" id="img03"></div>
                              <div class="card-content">
                                    <p class="card-theme">DESENVOLVEDORES</p>
                                    <h2 class="card-header">Torne-se Nosso Parceiro</h2>
                                    <p class="card-para" style="text-align: justify;">Quer lucrar através dos seus próprios aplicativos?
                                       A Plataforma conta com um time de parcerias com desenvolvedores que permitem a divulgação de marketing através de aplicativos criados pelos mesmos, que integram a API da plataforma e concordam em fazer parte do clube de desenvolvedores. Como vantagem, voçê pode escolher as melhores formas de pagamento e ainda sair lucrando utilizando também nossos serviços de geolocalização.
                                    </p>
                              <a  href="../Telas/CadastroDesenvolvedor.php"  class="card-link" style="text-transform: uppercase;font-size: 15px;">Realizar Cadastro</a>
                              </div>
                        </div>
                  </div>
                  <div class="prevnext">
                        <button class="pn-btn" id="prev"></button>
                        <button class="pn-btn" id="next"></button>
                  </div>
                 

            </header>

            <?php include '../Util/rodape.php';  ?>

</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
<!-- -------- ------ ------- -->     
<script type="text/javascript">

            // BOTÃO AO DIMINUIR TELA
            $(document).ready(function() {
                  $(".menu-icon").on("click", function() {
                        $("nav ul").toggleClass("showing");
                  });
            });            
      </script>
      
      <script type="text/javascript">
      
      //EFEITO SLIDE DE TELA SERVICOS
      var $activeSlide = $('.active'),
      $homeSlide = $(".slide"),
      $slideNavPrev = $("#prev"),
      $slideNavNext = $("#next");

      function init() {
            TweenMax.set($homeSlide.not($activeSlide), {autoAlpha: 0});
            TweenMax.set($slideNavPrev, {autoAlpha: 0.2});
      }

      init();

      function goToNextSlide(slideOut, slideIn, slideInAll) {
            var t1 = new TimelineLite(),
            slideOutContent = slideOut.find('.card-content'),
            slideInContent = slideIn.find('.card-content'),
            slideOutImg = slideOut.find('.card-img'),
            slideInImg = slideIn.find('.card-img'),
            index = slideIn.index(),
            size = $homeSlide.length;
            console.log(index);

            if(slideIn.length !== 0) {
            t1
            .set(slideIn, {autoAlpha: 1, className: '+=active'})
            .set(slideOut, {className: '-=active'})
            .to(slideOutContent, 0.65, {y: "+=40px", ease: Power3.easeInOut}, 0)
            .to(slideOutImg, 0.65, {backgroundPosition :'bottom', ease: Power3.easeInOut}, 0)
            .to(slideInAll, 1, {y: "-=100%", ease: Power3.easeInOut}, 0)
            .fromTo(slideInContent, 0.65, {y: '-=40px'}, {y : 0, ease: Power3.easeInOut}, "-=0.7")
            .fromTo(slideInImg, 0.65, {backgroundPosition: 'top'}, {backgroundPosition: 'bottom', ease: Power3.easeInOut}, '-=0.7')
            }

            TweenMax.set($slideNavPrev, {autoAlpha: 1});

            if(index === size - 1){
                  TweenMax.to($slideNavNext, 0.3, {autoAlpha: 0.2, ease:Linear.easeNone});
            }
      };

      // SEGUIR PARA IMAGEM POSTERIOR
      $slideNavNext.click(function(e) {
            e.preventDefault();

            var slideOut = $('.slide.active'),
            slideIn = $('.slide.active').next('.slide'),
            slideInAll = $('.slide');

            goToNextSlide(slideOut, slideIn, slideInAll);

      });


      function goToPrevSlide(slideOut, slideIn, slideInAll) {
            var t1 = new TimelineLite(),
            slideOutContent = slideOut.find('.card-content'),
            slideInContent = slideIn.find('.card-content'),
            slideOutImg = slideOut.find('.card-img'),
            slideInImg = slideIn.find('.card-img'),
            index = slideIn.index(),
            size = $homeSlide.length;

            if(slideIn.length !== 0) {
            t1
            .set(slideIn, {autoAlpha: 1, className: '+=active'})
            .set(slideOut, {className: '-=active'})
            .to(slideOutContent, 0.65, {y: "-=40px", ease: Power3.easeInOut}, 0)
            .to(slideOutImg, 0.65, {backgroundPosition :'top', ease: Power3.easeInOut}, 0)
            .to(slideInAll, 1, {y: "+=100%", ease: Power3.easeInOut}, 0)
            .fromTo(slideInContent, 0.65, {y: '+=40px'}, {y : 0, ease: Power3.easeInOut}, "-=0.7")
            .fromTo(slideInImg, 0.65, {backgroundPosition: 'bottom'}, {backgroundPosition: 'top', ease: Power3.easeInOut}, '-=0.7')
            }

            TweenMax.set($slideNavPrev, {autoAlpha: 1});

            if(index === 0){
                  TweenMax.to($slideNavPrev, 0.3, {autoAlpha: 0.2, ease:Linear.easeNone});
            }
      };

      // SEGUIR PARA IMAGEM ANTERIOR
      $slideNavPrev.click(function(e) {
            e.preventDefault();

            var slideOut = $('.slide.active'),
            slideIn = $('.slide.active').prev('.slide'),
            slideInAll = $('.slide');

            goToPrevSlide(slideOut, slideIn, slideInAll);
      
      });

      // EVENTO DE SETAS DO TECLADO
        $(document).keydown(function(e){

                    if(e.wich == 40 || e.keyCode == 40){

                          var slideOut = $('.slide.active'),
                          slideIn = $('.slide.active').next('.slide'),
                          slideInAll = $('.slide');

                          goToNextSlide(slideOut, slideIn, slideInAll);

                    }else{
                        if(e.wich == 38 || e.keyCode == 38){

                          var slideOut = $('.slide.active'),
                          slideIn = $('.slide.active').prev('.slide'),
                          slideInAll = $('.slide');

                          goToPrevSlide(slideOut, slideIn, slideInAll);
                   }
                 }
         });             
            
      </script>
</html>