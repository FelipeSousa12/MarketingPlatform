<?php
require_once '../Util/baseBD.php';
/**
 * 
 *
 * @author Felipe
 */
class Pacotes extends baseBD {
    
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "PACOTES";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "NOMEPACOTE" => NULL,
                "VALORPACOTE" => NULL,
                "QTDPONTOS" => NULL,
                "DATACONTRATACAO" => NULL,
                "ID_ANUNC" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDPACOTE";
    }

}
?>