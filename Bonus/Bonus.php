<?php
require_once '../Util/baseBD.php';
/**
 *
 * @author Felipe
 */
class Bonus extends baseBD {
    
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "BONUS";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "STATUSBONUS" => NULL,
                "QTDVISUALIZACOES" => NULL,
                "ID_ANUNC" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDBONUS";
    }

}
?>