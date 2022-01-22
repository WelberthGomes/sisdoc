<?php
require_once "Conexao.class.php";
class DocumentoDao extends Conexao{
    public function __construct(){}
    
    const INSERIR = "INSERT INTO documento (CD_USU, CD_TIP_DOC, NR_DOC, TX_DESC_DOC, TX_DST_DOC, DT_DOC, CD_MAT_DOC) VALUES (:CD_USU, :CD_TIP_DOC, :NR_DOC, :TX_DESC_DOC, :TX_DST_DOC, :DT_DOC, :CD_MAT_DOC)";
    const BUSCA = "SELECT d.CD_DOC, t.NM_TIP_DOC, d.NR_DOC, d.CD_MAT_DOC, d.TX_DST_DOC, d.TX_DESC_DOC, u.TX_LGN_USU, d.DT_DOC  FROM documento d INNER JOIN usuario u ON d.CD_USU = u.CD_USU INNER JOIN tipo_documento t ON d.CD_TIP_DOC = t.CD_TIP_DOC ";
    const DELETAR = "DELETE FROM documento WHERE CD_DOC =";
    
    /*
     *  Função que insere um novo documento
     *  Usado em: admin/control/envia_documento
     */
    public function inserir($doc){
        try{
            $rs = false;
            $ins = parent::open()->prepare(self::INSERIR);
            $ins->bindValue(":CD_USU", $doc->CD_USU, PDO::PARAM_INT);
            $ins->bindValue(":CD_TIP_DOC", $doc->CD_TIP_DOC, PDO::PARAM_INT);
            $ins->bindValue(":NR_DOC", $doc->NR_DOC, PDO::PARAM_INT);
            $ins->bindValue(":TX_DESC_DOC", $doc->TX_DESC_DOC, PDO::PARAM_STR);
            $ins->bindValue(":TX_DST_DOC", $doc->TX_DST_DOC, PDO::PARAM_STR);
            $ins->bindValue(":DT_DOC", $doc->DT_DOC, PDO::PARAM_STR);
            $ins->bindValue(":CD_MAT_DOC", $doc->CD_MAT_DOC, PDO::PARAM_INT);           
            $rs = $ins->execute()?true:false;
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/inserir -> '.$e->getMessage();
        }
        parent::close();
        return $rs;
    }
    
    /*
     *  Função que retorna todos os documentos
     *  Usado em: admin/documentos
     */
    public function selecionarTodos(){
        try{
            $q = parent::open()->query(self::BUSCA. 'ORDER BY (CD_DOC) DESC LIMIT 0,5');
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/selecionarTodos -> '.$e->getMessage();
        }
        return $q;
        parent::close();
    }
    
        /*
     *  Função que retorna busca documentos
     *  Usado em: admin/control/busca.php
     */
    public function busca($q){
        try{
            $rs = parent::open()->query(self::BUSCA. "WHERE d.NR_DOC LIKE '%{$q}%' OR u.TX_LGN_USU LIKE '%{$q}%' ORDER BY (CD_DOC) DESC ");
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/selecionarTodos -> '.$e->getMessage();
        }
        return $rs;
        parent::close();
    }
  
     /*
     *  Função que exclui um documento
     *  Usado em: admin/control/busca.php
     *  Usado em: admin/documentos
     */
    
    public function deletar($doc) {
        try {
            $rs = parent::open()->exec(self::DELETAR.$doc->CD_DOC);
        }
        catch(PDOException $e) {
            echo 'Erro em model/UsuarioDao/deletar -> '.$e->getMessage();
        }
        parent::close();
        
        return $rs; //retorna o numero de linhas afetadas
    }
    
   
    
      
  
}

?>
