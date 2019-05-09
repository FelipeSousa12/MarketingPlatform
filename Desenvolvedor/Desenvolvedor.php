<?php
require_once '../Util/baseBD.php';
/**
 * Description of Paciente
 *
 * @author Felipe
 */
class Desenvolvedor extends baseBD {
    
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "DESENVOLVEDOR";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "DESCRICAONOME" => NULL,
                "DOCUMENTO" => NULL,
                "NUMERO" => NULL,
                "EMAIL" => NULL,
                "SENHA" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDDESENVOLVEDOR";
    }

}
?>