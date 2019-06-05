<?php
require_once '../Util/baseBD.php';


class Aplicativo extends baseBD {
    
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "APLICATIVO";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "NOMEAPP" => NULL,
                "CATEGORIAAPP" => NULL,
                "IDENTIFICADORAPP" => NULL,
                "ID_DESEN" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDAPP";
    }

}

?>