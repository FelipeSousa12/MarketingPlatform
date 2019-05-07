<?php

// Constantes
define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

// Verificando se selecionou alguma imagem
if (isset($_FILES['foto'])){

// Recupera os dados dos campos
$foto = $_FILES['foto'];
$nome = $foto['name'];
$tipo = $foto['type'];
$tamanho = $foto['size'];

echo var_dump($_FILES);


}
