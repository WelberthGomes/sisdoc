<?php

class TipoDocumento {
    private $CD_TIP_DOC;     //COD DO TIPO DE DOCUMENTO
    private $NM_TIP_DOC;    //NOME DO TIPO DE DOCUMENTO
    
    public function __set($propriedade, $valor){
        $this->$propriedade = $valor;
    }
    
    public function __get($propriedade){
        return $this->$propriedade;
    }
}

?>
