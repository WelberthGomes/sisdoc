<?php
require_once "Conexao.class.php";
class TipoDocumentoDao extends Conexao{
   public function __construct(){}
   
    const INSERIR = "INSERT INTO tipo_documento (NM_TIP_DOC) VALUES (:NM_TIP_DOC)";  
    const BUSCA = "SELECT * FROM tipo_documento ";

    
    /*
     *  Função que insere um novo tipo de documento
     *  Usado em: admin/control/envia_tipo
     */
    public function inserir($tip){
        try{
            $rs = false;
            $ins = parent::open()->prepare(self::INSERIR);
            $ins->bindValue(":NM_TIP_DOC", $tip->NM_TIP_DOC, PDO::PARAM_STR);        
            $rs = $ins->execute()?true:false;
        }
        catch(PDOException $e){
            echo 'Erro em model/TipoTarefaDao/inserir -> '.$e->getMessage();
        }
        parent::close();
        return $rs;
    }
    
    /*
     *  Função que retorna todos os tipos de documento
     *  Usado em: tipos.php
     */
    public function selecionarTodos(){
        try{
            $q = parent::open()->query(self::BUSCA. 'ORDER BY (NM_TIP_DOC) ASC');
        }
        catch(PDOException $e){
            echo 'Erro em model/TipoTarefaDao/selecionarTodos -> '.$e->getMessage();
        }
        return $q;
        parent::close();
    }
  
    
}

?>