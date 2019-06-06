<?php

require_once '../Util/baseBD.php';


class Anuncio extends baseBD {
    
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "ANUNCIO";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "NOMEANUNCIO" => NULL,
                "MODELOANUNCIO" => NULL,
                "TIPOARQUIVO" => NULL,
                "DIRECANUNCIO" => NULL,
                "CAMINHOANUNCIO" => NULL,
                "ANUNCIO" => NULL,
                "ID_ANUNC" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDANUNCIO";
    }

}


?>