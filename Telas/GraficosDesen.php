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
	  <title>Anúncios</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
	  <link rel="stylesheet" type="text/css" href="../css/style_grafico_desen.css">
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
             <li id="li_caminho"><a href="../Telas/GraficosDesen.php" id="a_caminho">Gráficos Desenvolvedor</a></li>
           </ul>
       </div>
        
         <div class="conteudo-container">
         
             <div class="group-conteudo">

                <div class="group-title">
                    <h4><i class="fas fa-chart-bar"></i>Monitoramento Gráficos</h4>
                </div>

                <div class="group-graficos">
                  <canvas class="grafico-linha" height="7" width="8"></canvas>
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
<!-- Start CDN do chart.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<!-- Start CDN do chart.js (fim) -->

<script type="text/javascript">
    var ctx = document.getElementsByClassName("grafico-linha");

  var myLineChart = new Chart(ctx, {
    type: 'line',
    data:{
      labels: ["JAN","FEV","MAR","ABRIL","MAIO","JUN","JUL","AGO","SET","OUT","NOV","DEZ"],

    datasets:[{
      label: "SALDO POR MÊS",
      data: [100,50,90,100,120,400,1000,1220,1700,1999,2000,3000],
      borderWidth: 3,
      borderColor: 'Black',
      backgroundColor: 'transparent',
      lineTension: 0.2,
      pointHoverBackgroundColor: "#FF7F00",
      pointHoverBorderColor:"#FF7F00",
      pointRotation: 1,
      pointStyle: "rectRounded",
      pointBorderWidth: 8,
       }],
    }
});

    
    let chart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        layout: {
            padding: {
                left: 50,
                right: 0,
                top: 0,
                bottom: 0
            }
        }
    }
});

</script>
<script type="text/javascript">

    var ctx = document.getElementsByClassName("grafico-bar");
    var myLineChart = new Chart(ctx, {
    type: 'bar',
    data:{
        labels: ["JAN","FEV","MAR","ABRIL","MAIO","JUN","JUL","AGO","SET","OUT","NOV","DEZ"],

    datasets:[{
        label: "VISUALIZAÇÕES",
        data: [200,50,90,100,120,400,1000,1220,1400,1999,2000,3000],
        borderWidth: 3,
        borderColor: 'transparent',
        backgroundColor: '#D56D05',
        lineTension: 0.1,
        pointHoverBackgroundColor: '#5F9EA0',
        pointHoverBorderColor:'#5F9EA0',
        pointRotation: 1,
        pointStyle: 'rectRounded',
        pointBorderWidth: 8,

     }],
  }

});
</script>
</html>
