<?php

class Documento {
    private $CD_DOC;        //CODIGO DO DOCUMENTO
    private $CD_USU;        //CODIGO DO USUARIO
    private $CD_TIP_DOC;    //CODIGO DO TIPO DE DOCUMENTO
    private $NR_DOC;        //NUMERO DO DOCUMENTO
    private $TX_DESC_DOC;   //DESCRIÇÃO DO DOCUMENTO
    private $TX_DST_DOC;    //DESTINARIO DO DOCUMENTO
    private $DT_DOC;        //DATA DE CADASTRO DO DOCUMENTO
    private $CD_MAT_DOC;    //MATRICULA DO DOCUMENTO
    
    public function __set($propriedade, $valor){
        $this->$propriedade = $valor;
    }
    
    public function __get($propriedade){
        return $this->$propriedade;
    }
}

?>
