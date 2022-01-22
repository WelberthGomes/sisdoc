<script type="text/javascript" src="../js/library.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
/*  
 *  Página que responsavel por inativar usuário.
 *  Referente: admin/usuarios
 */
?>
<?php
function __autoload($classe) {
    require_once "../model/{$classe}.class.php";
}
require_once '../util/restrito.php';
$usu = new Usuario();
$usu->CD_USU = $_GET['id'];
$usu->VL_STT_USU = 'I';

$usuDao = new UsuarioDao();
if ($usuDao->deletar($usu) == true){ ?>
        <script type="text/javascript">

            mensagem("Usuário excluido com sucesso!", "../../index.php?p=admin/usuarios");
            
        </script>
<?php
    
}
else{ ?>
        <script type="text/javascript">

            mensagem("Falha ao excluir usuário!", "../../index.php?p=admin/usuarios");
            
        </script>
<?php
    
}
?>