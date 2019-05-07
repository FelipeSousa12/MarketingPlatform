<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

require '../Util/daoGenerico.php';
$dao = new daoGenerico();

if(!isset($_SESSION['SESSION_ANUNC_EMAIL']) && !isset($_SESSION['SESSION_ANUNC_SENHA'])){
     header("Location: ../Telas/Login.php");
}else{

     $id = $_SESSION['SESSION_ANUNC_ID'];

     $sql = "SELECT QTDPONTOS AS Quantidade FROM PACOTES WHERE Id_Anunc = '$id'";

     $resultado = $dao->executaSQL($sql);
}

?>
<!DOCTYPE html>
<html>
<head>
      <title>Mapa</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">  
      <link rel="stylesheet" type="text/css" href="../css/style_mapa_anunc.css">
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
</head>
<body>

    <?php include_once '../Util/MenuAnunc.php'; ?>

    <section class="conteudo">

       <div class="caminho">
           <ul>
             <li id="li_caminho"><a href="../Telas/PrincipalAnunc.php" id="a_caminho"><i class="fas fa-home" id="icon-menu"></i>Inicio</a></li>
             <li id="li_caminho"><label id="a_caminho">>></label></li>
             <li id="li_caminho"><a href="../Telas/MapaAnunc.php" id="a_caminho">Pontos Mapa</a></li>
           </ul>
       </div>

       <div class="container-body">

            <div class="container-group">

              <div class="cont-0">

                <div class="group-1">
                   <input type="text" name="cxPosicao" id="latlng" class="campo" required>
                   <label>Endereço</label>
                </div>
              

                <div class="group-1">
                    <button name="botaoPes" id="botao" class="btnPesquisa">Pesquisar</button>
                </div>

              </div>
              
              <div class="cont-1">

                <div class="group-2">
                   <button name="botaoSalvarPontos" id="botao" class="btnSalvarPontos">Salvar Pontos</button>
                   <button name="botaoPes" id="botao" class="btnListar">Listar</button>
                </div>

                <div class="group-2">
                   <?php  if(mysqli_num_rows($resultado) > 0){ $numero = mysqli_fetch_object($resultado) ?>

                    <?php $sqlVerifica = "SELECT COUNT(Id_Anunc) AS Qtd FROM pontospublicidade WHERE Id_Anunc = '$id'"; 
                      $resultVerifica = $dao->executaSQL($sqlVerifica); $value = mysqli_fetch_object($resultVerifica);
                      if($value->Qtd > 0){ 
                    ?>
                    <span class="QtdPontos" id="num-pontos" style=""><i class="fas fa-check" style="color: #008000;"></i></span>

                     <?php }else{ ?>
                    
                    <span class="QtdPontos" id="num-pontos"><?php echo $numero->Quantidade; ?></span>

                   <?php }?>
                   <?php }else{ ?>

                   <span class="QtdPontos" id="num-pontos">2</span>

                   <?php }?>
                </div>

              </div>

                <div id="map"></div>

            </div>
         
       </div>

    </section>
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
<!----------------- FIM MODAL ALERT ------------------->   
</body>
<!-- -------- SCRIPTS ------- -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNShMFKHm554D-kvg7IfJXCJtxGX_ANHo&callback=initMap">
</script>
<!-- ------------------------ -->
<script>

    var lat_long = [];
    var mapa;
    var id = '<?php echo $_SESSION['SESSION_ANUNC_ID']; ?>';
    var object;

      //EVENTO PESQUISAR NO MAPA
       $('.btnPesquisa').click(function(){
            carregarNoMapa($('#latlng').val(),mapa);
       });


      //CARREGAR PONTOS LATITUDE E LONGITUDE ATRAVES DO ENDERECO
      function carregarNoMapa(endereco,map) {

        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]){
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    if(latitude == '-14.235004' && longitude == '-51.92527999999999'){

                         alert('LOCALIZAÇÃO NÃO ENCONTRADA!');
                    
                    }else{
                        console.log(results[0].formatted_address);

                        var localizacao = new google.maps.LatLng(latitude, longitude);
                        
                        /*var marker = new google.maps.Marker({
                          position: localizacao,
                          map: map
                        });*/

                        map.setZoom(15);
                        map.setCenter(localizacao);
                        
                        //infowindow.setContent(results[0].formatted_address);
                        //infowindow.open(map,marker);
                    }
                   
                }
            }
        });
      }


      $('.btnSalvarPontos').on('click',function(){
          
          if($('#num-pontos').html() != 0){

            alert('MARQUE TODOS OS PONTOS');

          }else{

           object = JSON.parse(localStorage.getItem('Array'));

           $.ajax({
            url:'../PontosPublicidade/RegistraPonto.php',
            type: 'POST',
            datatype: 'html',
            data: {array : object, IdAnunc : id},

            success: function(response){

              if(response == 'true'){
                $('#ModalAlert').modal('show');
                $('#mensagem').text('PONTOS CADASTRADOS COM SUCESSO!!');
                $('#quadro').css('background','#D0F5A9'); 

                window.setTimeout(function(){
                    $('#ModalAlert').modal('hide');
                    localStorage.removeItem('Array');
                     window.location.reload();
                 },2100);
              }else{

                $('#ModalAlert').modal('show');
                $('#mensagem').text('ERRO NO CADASTRO DOS PONTOS!!');
                $('#quadro').css('background','#FA5858'); 

                window.setTimeout(function(){
                    $('#ModalAlert').modal('hide');
                 },2100);
              }

            },error: function(e){

            }

           });
        }
      });



   
    function initMap(){

        var marker = new google.maps.Marker;
        var infowindow = new google.maps.InfoWindow;
        var geocoder = new google.maps.Geocoder;
    
        var map = new google.maps.Map(document.getElementById('map'),{
          zoom: 14,
          center: {lat: -6.405189740865475, lng: -38.85924263008599}
          //mapTypeId: google.maps.MapTypeId.SATELLITE
        });

        mapa = map;

        MarcarPontosAutomatico(map);


      //MARCA PONTOS NO MAPA ----------------------------------------- / 
      map.addListener('click', function(e){
          //placeMarkerAndPanTo(e.latLng, map);
          //marcarPontoComEndereco(e.latLng,map);
             if($('.QtdPontos').children().length != 0){
                alert('VOCE JA POSSUI PONTOS MARCADOS!!');
            }else{

               if($('.QtdPontos').html() != 0){
                   geocodeLatLng(e.latLng.lat(),e.latLng.lng(),map);
                }else{
                   alert('IMPOSSIVEL MARCAR OUTRO PONTO!!');
                }
               
            }
          
      });


      //MARCAR PONTO NO MAPA COM ENDERECO ATRAVES DO CLIQUE
      function geocodeLatLng(latitude,longitude,map){

        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;
        var marker = new google.maps.Marker;
        var valor = $('.QtdPontos').html();
        var endereco;

        //EXCLUIR PONTO E TIRAR DO ARRAY
        marker.addListener("dblclick", function(){
             marker.setMap(null);

             ApagarPontosArray(marker.getPosition().lat(),marker.getPosition().lng());

             var num = $('.QtdPontos').html();
             num++;
             $('.QtdPontos').html(num);
        });
    
        var local = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
        
        geocoder.geocode({'location': local}, function(results,status){
          if (status === google.maps.GeocoderStatus.OK) {
            if (results[0]) {

                  marker.setPosition(local);
                  marker.setMap(map);
                  valor--;
                  $('.QtdPontos').html(valor);

                  infowindow.setContent(results[0].formatted_address);
                  infowindow.open(map,marker);

                  endereco = results[0].formatted_address;

                  setarPontosArray(endereco,latitude,longitude);

            }else{
               alert('NENHUM RESULTADO ENCONTRADO!');
            }

          }else{
               alert('Geocoder failed: ' + status);
          }

        });
      }



      function setarPontosArray(End,Lat,Long){

          if(localStorage.getItem('Array') != null){

            object = JSON.parse(localStorage.getItem('Array'));

            var valores =  {'Endereco':End,'Latitude':Lat,'Longitude':Long };

              object.push(valores);

              localStorage.setItem('Array',JSON.stringify(object));

              console.log(object);
          
          }else{

            var valores =  {'Endereco':End,'Latitude':Lat,'Longitude':Long };

            lat_long.push(valores);

            localStorage.setItem('Array',JSON.stringify(lat_long));
            console.log('colocou primeiro valor');
          }

      }


      function ApagarPontosArray(Lat,Long){

            object = JSON.parse(localStorage.getItem('Array'));

            object.filter(function(i,index){

            if(i.Latitude == Lat && i.Longitude == Long){
              console.log('é o indice '+index);
        
              object.splice(index,1);

              localStorage.setItem('Array',JSON.stringify(object));

              console.log(object);
            }else{
              console.log('nao tem');
            }

        });
     }



        function MarcarPontosAutomatico(map){

        var geocoder = new google.maps.Geocoder;
        object = JSON.parse(localStorage.getItem('Array'));

          if(object != null){

               object.forEach(function(i){
               
                  var local = {lat: i.Latitude,lng: i.Longitude};

                  geocoder.geocode({'location': local}, function(results,status){
                      if (status === google.maps.GeocoderStatus.OK) {
                        if (results[0]) {

                              var marcador = new google.maps.Marker({
                                position: local,
                                map: map
                              });

                               var infowindow = new google.maps.InfoWindow({
                                 content: results[0].formatted_address
                               });

                               infowindow.open(map,marcador);                      
                        }

                      }

                    });

               });
                    
          }
        }


    
    }
     /*---- Fim da função ----*/


      /*CRIAR CIRCULO DE UM RAIO DENTRO DO MAPA
        function setMarkers(map,locations){

            var marker, i;

            for (i = 0; i < locations.length; i++) {  

                var loan = locations[i][0];
                var lat = locations[i][1];
                var long = locations[i][2];
                var add =  locations[i][3];

                latlngset = new google.maps.LatLng(lat, long);

                var marker = new google.maps.Marker({  
                    map: map,
                    title: loan,
                    position: latlngset,
                });

                var circulo = new google.maps.Circle({
                  map: map,
                  center: new google.maps.LatLng(lat, long),
                  radius: 50, // 1000 metros = 1k.
                  strokeColor: "#818c99",
                  fillColor: "#ffffff",
                  fillOpacity: 0.30
                });

                map.setCenter(marker.getPosition());
                map.setZoom(11);

                var content = "<h5>" + loan + '</h5>' + "<strong>Endereço:</strong> " + add;

                var infowindow = new google.maps.InfoWindow();

                google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
                    return function(){
                        infowindow.setContent(content);
                        infowindow.open(map,marker);
                    };
                })(marker,content,infowindow));

            }
        }
        */

 
      function placeMarkerAndPanTo(latLng, map){} 


     /* function mapDivClicked(event){
                var target = document.getElementById('map'),
                    posx = event.pageX - target.offsetLeft,
                    posy = event.pageY - target.offsetTop,
                    bounds = map.getBounds(),
                    neLatlng = bounds.getNorthEast(),
                    swLatlng = bounds.getSouthWest(),
                    startLat = neLatlng.latitude(),
                    endLng = neLatlng.longitude(),
                    endLat = swLatlng.latitude(),
                    startLng = swLatlng.longitude();

                document.getElementById('posX').value = posx;
                document.getElementById('posY').value = posy;
                document.getElementById('latitude').value = startLat + ((posy/350) * (endLat - startLat));
                document.getElementById('longitude').value = startLng + ((posx/500) * (endLng - startLng));
      };*/


      /*Pegar dados e setar nos campos de texto 
      google.maps.event.addListener(map, 'click', function(event) {
          
          document.getElementById('latMap').value = event.latLng.lat();
          document.getElementById('lngMap').value = event.latLng.lng();

           var evento = {
                        'Endereco': 'Icó-CE',
                         'Latitude': event.latLng.lat(),
                         'Longitude': event.latLng.lng()
                        };
             
           lat_long.push(evento);

           console.log(lat_long);          

      });*/

    </script>
</html>
