<?php
require_once "Conexao.class.php";
class UsuarioDao extends Conexao{
    public function __construct(){}
    
    const INSERIR = "INSERT INTO usuario (NM_USU, TX_EML_USU, TX_LGN_USU, TX_SNH_USU, VL_NVL_USU, VL_STT_USU) VALUES (:NM_USU, :TX_EML_USU, :TX_LGN_USU, :TX_SNH_USU, :VL_NVL_USU, :VL_STT_USU)";
    const SELECIONAR_USUARIO = "SELECT * FROM usuario WHERE CD_USU = ";
    const ATUALIZAR= "UPDATE usuario SET NM_USU = :NM_USU, TX_LGN_USU = :TX_LGN_USU, TX_EML_USU = :TX_EML_USU, VL_NVL_USU = :VL_NVL_USU WHERE CD_USU = :CD_USU";
    const ATUALIZAR_SENHA= "UPDATE usuario SET TX_SNH_USU = :TX_SNH_USU WHERE CD_USU = :CD_USU";
    const BUSCA = "SELECT * FROM usuario ";
    //const DELETAR = "DELETE FROM usuario WHERE CD_USU =";
    const DELETAR = "UPDATE usuario SET VL_STT_USU = :VL_STT_USU WHERE CD_USU = :CD_USU";
    /*
     *  Função que insere um novo usuário
     *  Usado em: admin/control/envia_usuário
     */
    public function inserir($usu){
        try{
            $rs = false;
            $ins = parent::open()->prepare(self::INSERIR);
            $ins->bindValue(":NM_USU", $usu->NM_USU, PDO::PARAM_STR);
            $ins->bindValue(":TX_EML_USU", $usu->TX_EML_USU, PDO::PARAM_STR);
            $ins->bindValue(":TX_LGN_USU", $usu->TX_LGN_USU, PDO::PARAM_STR);
            $ins->bindValue(":TX_SNH_USU", $usu->TX_SNH_USU, PDO::PARAM_STR);
            $ins->bindValue(":VL_NVL_USU", $usu->VL_NVL_USU, PDO::PARAM_INT);           
            $ins->bindValue(":VL_STT_USU", $usu->VL_STT_USU, PDO::PARAM_STR);           
            $rs = $ins->execute()?true:false;
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/inserir -> '.$e->getMessage();
        }
        parent::close();
        return $rs;
    }
    
    /*
     *  Função que retorna todos os Usuários Ativos
     *  Usado em: admin/usuários
     */
    public function selecionarTodosAtivo(){
        try{
            $q = parent::open()->query(self::BUSCA. "WHERE VL_STT_USU = 'A' ORDER BY (NM_USU) ASC");
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/selecionarTodos -> '.$e->getMessage();
        }
        return $q;
        parent::close();
    }
    
    /*
     *  Função que retorna um usuario em especifico
     *  Usado em: admin/alt_usuario
     *  Usado em: admin/alt_senha
     */
    public function selecionar($usu){
        try{
            $sel = parent::open()->query(self::SELECIONAR_USUARIO.$usu->CD_USU);
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/selecionar -> '.$e->getMessage();
        }
        return $sel;
        parent::close();
    }
    
    /*
     *  Função que altera os dados do usuário
     *  Usado em: admin/control/alterar_usuario
     */
    public function alterar($usu){
        try{
            $rs = false;
            $alt = parent::open()->prepare(self::ATUALIZAR);
            $alt->bindValue(":CD_USU", $usu->CD_USU, PDO::PARAM_INT);
            $alt->bindValue(":NM_USU", $usu->NM_USU, PDO::PARAM_STR);
            $alt->bindValue(":TX_LGN_USU", $usu->TX_LGN_USU, PDO::PARAM_STR);
            $alt->bindValue(":TX_EML_USU", $usu->TX_EML_USU, PDO::PARAM_STR);
            $alt->bindValue(":VL_NVL_USU", $usu->VL_NVL_USU, PDO::PARAM_INT);
            $rs = $alt->execute()?true:false;             
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/alterar -> '.$e->getMessage();
        }
        parent::close();
        return $rs;
    }
    
    /*
     *  Função que altera a senha dos usuários
     *  Usado em: admin/control/alterar_senha
     */
    public function alterar_senha($usu){
        try{
            $rs = false;
            $alt = parent::open()->prepare(self::ATUALIZAR_SENHA);
            $alt->bindValue(":CD_USU", $usu->CD_USU, PDO::PARAM_INT);
            $alt->bindValue(":TX_SNH_USU", $usu->TX_SNH_USU, PDO::PARAM_STR);
            $rs = $alt->execute()?true:false;             
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/alterar_senha -> '.$e->getMessage();
        }
        parent::close();
        return $rs;
    }
 
    
    /*
     *  Função que INATIVA um usuário
     *  Usado em: admin/control/excluir_usuario
     */
    public function deletar($usu){
        try{
            $rs = false;
            $alt = parent::open()->prepare(self::DELETAR);
            $alt->bindValue(":CD_USU", $usu->CD_USU, PDO::PARAM_INT);
            $alt->bindValue(":VL_STT_USU", $usu->VL_STT_USU, PDO::PARAM_STR);
            $rs = $alt->execute()?true:false;             
        }
        catch(PDOException $e){
            echo 'Erro em model/UsuarioDao/alterar_senha -> '.$e->getMessage();
        }
        parent::close();
        return $rs;
    }
    
    /*
     *  Função que valida login
     *  Usado em: admin/control/validar_login
     */
    public function logar($usu) {
        try {
            $rs = parent::open()->query("SELECT * FROM usuario WHERE TX_LGN_USU = '{$usu->TX_LGN_USU}' AND TX_SNH_USU = '{$usu->TX_SNH_USU}'");        
        }
        catch(PDOException $e) {
            echo 'Erro em model/UsuarioDao/logar -> '.$e->getMessage();
        }
        return $rs;
    }
    
      
        /*
     *  Função que valida login
     *  Usado em: admin/control/alterar_senha
     */
    public function verificaSenha($usu) {
        try {
            $rs = parent::open()->query("SELECT * FROM usuario WHERE CD_USU = {$usu->CD_USU} AND TX_SNH_USU = '{$usu->TX_SNH_USU}'");        
            $i = $rs->rowCount();
            
        }
        catch(PDOException $e) {
            echo 'Erro em model/UsuarioDao/logar -> '.$e->getMessage();
        }
        return $i;
    }
  
}

?>
