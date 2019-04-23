<?php

if(isset($_GET['valorId'])){

	$id_anunc = $_GET['valorId'];
}

?>
<!DOCTYPE html>
<html>
<head>
	  <title> Pagina antes de entrar na plataforma </title>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/style_pacotes.css">
	
</head>
<body>
            <header class="cabecalho">
                   <nav>
                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                             <a href="../Telas/Home.php"><img src="../Imagens/logo.png"></a>
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
            </header>     
            
        <div class="title-pacotes">
        	 <h3>Escolha seu Pacote</h3>
             <hr>
        </div>

		<div class="container1">

		   <div class="pacotes">
			
			<div class="coluna" id="plano_basico">
				<div class="title"><i class="fas fa-paper-plane"></i>
					<h2>Combo Básico</h2>
				</div>
					
					<div class="preço">
						<h4>R$<span>75</span>/Mês</h4>
					</div>
						
						<div class="opcao">
							<ul>
								<li><i class="fas fa-check"></i>3 Pontos Mapeados</li>
								<li><i class="fas fa-check"></i>2.500 Visualizações Mensais</li>
								<li><i class="fas fa-check"></i>Recarga</li>
								<li><i class="fas fa-check"></i>Migração de Pacote</li>
							</ul>
						</div>

				<button class="enviar" id="Plano-Basico">Adquirir Pacote</button>
			</div>

			<div class="coluna" id="plano_padrao">
				<div class="title"><i class="fas fa-map"></i>
					<h2>Combo Padrão</h2>
				</div>
					
					<div class="preço">
						<h4>R$<span>125</span>/Mês</h4>
					</div>
						
						<div class="opcao">
							<ul>
								<li><i class="fas fa-check"></i>5 Pontos Mapeados</li>
								<li><i class="fas fa-check"></i>4.000 Visualizações Mensais</li>
								<li><i class="fas fa-check"></i>Recarga</li>
								<li><i class="fas fa-check"></i>Migração de Pacote</li>
							</ul>
						</div>

			     <button class="enviar" id="Plano-Padrao">Adquirir Pacote</button>
			</div>	

			<div class="coluna" id="plano_premium">
				<div class="title"><i class="fas fa-trophy"></i>
					<h2>Combo Premium</h2>
				</div>
					
					<div class="preço">
						<h4>R$<span>270</span>/Mês</h4>
					</div>

					<div class="opcao">
					   <ul>
						  <li><i class="fas fa-check"></i>8 Pontos Mapeados</li>
						  <li><i class="fas fa-check"></i>10.000 Visualizações Mensais</li>
						  <li><i class="fas fa-check"></i>Recarga</li>
						  <li><i class="fas fa-check"></i>Migração de Pacote</li>
					   </ul>
				    </div>

				 <button class="enviar" id="Plano-Premium">Adquirir Pacote</button>
			</div>	

			<div class="coluna" id="plano_pre-pago">
				<div class="title"><i class="fas fa-trophy"></i>
					<h2>Combo Pré-Pago</h2>
				</div>
					
					<div class="preço">
						<h4>Mín R$<span>50</span>/Mês</h4>
					</div>

					<div class="opcao">
					   <ul>
						  <li><i class="fas fa-check"></i>Até 10 Pontos Mapeados</li>
						  <li><i class="fas fa-check"></i>0,5c por Visualização</li>
						  <li><i class="fas fa-check"></i>Pontos apenas 10R$</li>
						  <li><i class="fas fa-check"></i>Migração de Pacote e Recarga</li>
					   </ul>
				    </div>

				 <button class="enviar" id="Plano-Pre">Adquirir Pacote</button>
			</div>	

			<div class="coluna" id="plano_ilimitado">
				<div class="title"><i class="fas fa-trophy"></i>
					<h2>Combo Ilimitado</h2>
				</div>
					
					<div class="preço">
						<h4>R$<span>500</span>/Mês</h4>
					</div>

					<div class="opcao">
					   <ul>
						  <li><i class="fas fa-check"></i>Até 15 Pontos Mapeados</li>
						  <li><i class="fas fa-check"></i>Visualizações Ilimitadas</li>
						  <li><i class="fas fa-check"></i>Pontos apenas 10R$</li>
						  <li><i class="fas fa-check"></i>Migração de Pacote e Recarga</li>
					   </ul>
				    </div>

				 <button class="enviar" id="Plano-Ilimitado">Adquirir Pacote</button>
			</div>	
          </div>
	  </div>

<!----------------- MODAL ALERT ------------------->
<div class="modal fade" id="ModalAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-body" style="text-align: center;border-radius: 20px;" id="quadro">
        <span id="mensagem" style="font-weight: bold;"></span>
      </div>
    </div>
  </div>
</div>
<!----------------- FIM ALERT ------------------->
</body>
<!-- -------- SCRIPTS ------- -->    
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- ------------------------ -->  
<script type="text/javascript">

      // BOTÃO AO DIMINUIR TELA

      $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                 $("nav ul").toggleClass("showing");
            });
      });


      $('.coluna .enviar').click(function(e){

      	  var plano = e.target.id;
      	  var nomePacote,precoPacote,qtdPontosPacote;

      	  if(plano == 'Plano-Basico'){
      	  	  nomePacote = 'Combo Básico';
      	  	  precoPacote = 75;
      	  	  qtdPontosPacote = 3;

      	  }else if(plano == 'Plano-Padrao'){
      	  	  nomePacote = 'Combo Padrão';
      	  	  precoPacote = 125;
      	  	  qtdPontosPacote = 5;

      	  }else if(plano == 'Plano-Premium'){
      	  	  nomePacote = 'Combo Premium';
      	  	  precoPacote = 270;
      	  	  qtdPontosPacote = 8;

      	  }else if(plano == 'Plano-Pre'){
      	  	  nomePacote = 'Combo Pré-Pago';
      	  	  precoPacote = 50;
      	  	  qtdPontosPacote = 10;

      	  }else if(plano == 'Plano-Ilimitado'){
      	  	  nomePacote = 'Combo Ilimitado';
      	  	  precoPacote = 500;
      	  	  qtdPontosPacote = 15;
      	  }

      	SalvarPacote(nomePacote,precoPacote,qtdPontosPacote);

      });


     function SalvarPacote(nome,preco,qtd){

     	 var id = '<?php echo $id_anunc; ?>'

  	  	     $.ajax({
		          url: '../Pacotes/RegistraPacote.php',
		          type: 'POST',
		          dataType: 'JSON',
		          data: {
		          	     id_anunciante: id,
		          	     nomeCombo: nome,
		          	     precoCombo : preco,
		          	     qtdPontosCombo : qtd
		          	    },

		          success: function(response){

		            if(response.status){
		              
		                 $('#ModalAlert').modal('show');
                         $('#mensagem').text('PACOTE ATIVADO COM SUCESSO!!');
                         $('.modal-body').css('background','#D0F5A9'); 

                         window.setTimeout(function(){
                              $('#ModalAlert').modal('hide');
                         },2100);

                         window.history.back(0);

		            }else{

		                 $('#ModalAlert').modal('show');
                         $('#mensagem').text('ERRO AO ATIVAR PACOTE!!');
                         $('.modal-body').css('background','#FA5858'); 

                         window.setTimeout(function(){
                              $('#ModalAlert').modal('hide');
                         },2100);		              

		            }

		          },error: function(e){

		          }
             });
  	  }
  </script>
</html>