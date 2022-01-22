<?php
/*  
 *  Página que captura login e senha e autentica no banco.
 *  Referente: login.php
 */
?>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/library.js"></script>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    function __autoload($classe) {
        require_once "../model/{$classe}.class.php";
    }
    
    require_once '../util/limpaDado.php';
    $usu = new Usuario;
    $usu->TX_LGN_USU = limpaDado($_POST['login']);
    $usu->TX_SNH_USU = limpaDado($_POST['senha']);   
    
    $usuDao = new UsuarioDao();
    $rs = $usuDao->logar($usu);

    $u = $rs->fetch(PDO::FETCH_ASSOC);
    $i = $rs->rowCount(); 
    
    if($i == 1) {	
        session_start();
        $_SESSION['CD_USU']     = $u['CD_USU'];     //Código do usuário
        $_SESSION['NM_USU']     = $u['NM_USU'];     //Nome do usuário
        $_SESSION['TX_EML_USU'] = $u['TX_EML_USU'];   //Email do usuário
        $_SESSION['TX_LGN_USU'] = $u['TX_LGN_USU'];   //login do usuário
        $_SESSION['VL_STT_USU'] = $u['VL_STT_USU'];   //Status do usuário
        $_SESSION['VL_NVL_USU'] = $u['VL_NVL_USU'];   //Nivel do usuário
        header("location: ../../index.php?p=home");
    }
    else {
        echo'<script type="text/javascript">';
        echo"document.location = '../../index.php?p=login&rs=1'";
        echo'</script> ';
    }
}


?>

