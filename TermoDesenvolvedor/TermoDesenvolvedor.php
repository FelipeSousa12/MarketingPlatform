<?php
require_once '../Util/baseBD.php';
/**
 *
 * @author Felipe
 */
class TermoDesenvolvedor extends baseBD {
    
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "TERMO_DESENVOLVEDOR";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "STATUSTERMO" => NULL,
                "DATATERMO" => NULL,
                "ID_DESEN" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDTERMO";
    }

}
?>