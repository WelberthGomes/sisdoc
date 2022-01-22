<?php

class Conexao extends PDO {
    private $conn;

    
    public function __construct($dns, $user, $pass, $utf){
        parent::__construct($dns, $user, $pass, $utf);
    }
    
    public static function open(){
        try{
            $conn = new Conexao("mysql: host=localhost; dbname=db_sisdoc","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
        }
        catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        return $conn;
    }
    
    public static function close(){
        if(isset($conn)){
            $conn = null;
        }
    }
}

?>
