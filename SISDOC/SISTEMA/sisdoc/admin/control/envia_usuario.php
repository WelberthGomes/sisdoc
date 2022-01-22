<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/library.js"></script>

    <?php
if($_SERVER['REQUEST_METHOD'] == "POST"){    
    function __autoload($classe){
        require_once "../model/{$classe}.class.php";
    }
    require_once '../util/restrito.php';
    require_once '../util/limpaDado.php';
    
    $usu = new Usuario;
    $usu->NM_USU = $_POST['nome'];
    $usu->TX_EML_USU = $_POST['email'];
    $usu->TX_LGN_USU = limpaDado($_POST['login']);
    $usu->TX_SNH_USU = limpaDado($_POST['senha1']);
    $usu->VL_STT_USU = 'A';
    $usu->VL_NVL_USU = (isset($_POST['nivel']))?2:1;    
            
    $usuDao = new UsuarioDao;

    if ($usuDao->inserir($usu) == true){?>

        <script type="text/javascript">
            mensagem("Usuário inserido com sucesso!","../../index.php?p=admin/usuarios");
        </script>    

        <?php
    }
    else{?>

        <script type="text/javascript">
            mensagem("Falha ao inserir usuário!","../../index.php?p=admin/usuarios");
        </script>    

        <?php
    }
    
} //FIM DO REQUEST_METHOD
?>
