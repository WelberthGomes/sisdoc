<script type="text/javascript" src="../js/library.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<?php
/*  
 *  Página que captura a senha e altera no banco.
 *  Referente: alt_senha
 */
?>
                
<?php
require_once '../util/restrito.php';
function __autoload($classe){
       require_once "../model/{$classe}.class.php";
}
require_once '../util/limpaDado.php';

$atual = limpaDado($_POST['atual']);
$nova1 = limpaDado($_POST['nova1']);
$nova2 = limpaDado($_POST['nova2']);


$usu = new Usuario();
$usu->CD_USU = $_SESSION['CD_USU'];
$usu->TX_SNH_USU = $atual;

$usuDao = new UsuarioDao();

if($nova1 != $nova2){
    $msg = "Confirmação de senha não confere!";
}
else{
    if($usuDao->verificaSenha($usu) == 1){
        $usu->TX_SNH_USU = $nova1;

        if($usuDao->alterar_senha($usu) == true){
            $msg = "Senha alterada com sucesso!";
        }
        else{
            $msg = "Falha ao alterar senha!";
        }

    }
    else{
        $msg = "Sua senha atual não confere!";
    }
}

?>
<script type="text/javascript">
    mensagem("<?php echo $msg; ?>","../../index.php?p=admin/alt_senha");
</script> 