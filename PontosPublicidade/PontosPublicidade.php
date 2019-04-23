<?php
require_once '../Util/baseBD.php';
/**
 *
 * @author Felipe
 */
class PontosPublicidade extends baseBD {
    
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "PONTOSPUBLICIDADE";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "ENDERECO" => NULL,
                "LATITUDE" => NULL,
                "LONGITUDE" => NULL,
                "ID_ANUNC" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDPONTOPUBLICIDADE";
    }

}
?>