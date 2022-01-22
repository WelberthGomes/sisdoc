<?php

class Usuario {
    private $CD_USU;        //COD DO USUARIO
    private $NM_USU;        //NOME DO USUARIO
    private $TX_LGN_USU;    //LOGIN DO USUARIO
    private $TX_SNH_USU;    //SENHA DO USUARIO
    private $TX_EML_USU;    //EMAIL DO USUARIO
    private $VL_NVL_USU = 1;  //NÍVEL DO USUARIO {1 - USUARIO COMUM; 2 - GERENTE}
    private $VL_STT_USU = 'A'; //STATUS DO USUARIO {A - ATIVO; I - INATIVO}
    
    public function __set($propriedade, $valor){
        $this->$propriedade = $valor;
    }
    
    public function __get($propriedade){
        return $this->$propriedade;
    }
}

?>
