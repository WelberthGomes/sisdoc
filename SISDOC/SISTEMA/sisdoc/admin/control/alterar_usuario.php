<script type="text/javascript" src="../js/library.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<?php

/*  
 *  Página que captura os dados do usuario e altera no banco.
 *  Referente: admin/alt_usuario
 */
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    function __autoload($classe){
        require_once "../model/{$classe}.class.php";
    }
    require_once '../util/restrito.php';
    require_once '../util/limpaDado.php';
    
    $usu = new Usuario();
    $usu->CD_USU = $_POST['CD_USU'];
    $usu->NM_USU = limpaDado($_POST['nome']);
    $usu->TX_EML_USU = trim($_POST['email']);
    $usu->TX_LGN_USU = limpaDado($_POST['login']);
    $usu->VL_NVL_USU = (isset($_POST['nivel']))?2:1; 
    
    $usuDao = new UsuarioDao();
    if($usuDao->alterar($usu) == true){ ?>

        <script type="text/javascript">
            mensagem("Usuário alterado com sucesso!","../../index.php?p=admin/usuarios");
        </script>    

        <?php     
    }   
    else{ ?>

        <script type="text/javascript">
            mensagem("Falha ao alterar usuário!","../../index.php?p=admin/usuarios");
        </script>    

        <?php
    }
  
} //FIM REQUEST_METHOD


?>


