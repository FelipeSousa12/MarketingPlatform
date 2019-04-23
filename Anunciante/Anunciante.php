<?php
require_once '../Util/baseBD.php';
/**
 *
 *
 * @author Felipe
 */
class Anunciante extends baseBD {
    
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "ANUNCIANTE";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "RAZAOSOCIAL" => NULL,
                "CNPJ" => NULL,
                "TELEFONE" => NULL,
                "EMAIL" => NULL,
                "SENHA" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="ID_ANUNCIANTE";
    }

}
?>