<script type="text/javascript" src="../js/library.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
/*  
 *  Página que responsavel por excluir um registro de documento.
 *  Referente: admin/documentos
 *  Referente: admin/control/busca.php
 */
?>
<?php
function __autoload($classe) {
    require_once "../model/{$classe}.class.php";
}

require_once '../util/restrito.php';
$doc = new Documento();
$doc->CD_DOC = $_GET['id'];

$docDao = new DocumentoDao();
if ($docDao->deletar($doc) == 1){ ?>
        <script type="text/javascript">

            mensagem("Registro de documento excluído com sucesso!", "../../index.php?p=admin/documentos");
            
        </script>
<?php
    
}
else{ ?>
        <script type="text/javascript">

            mensagem("Falha ao excluir registro de documento!", "../../index.php?p=admin/documentos");
            
        </script>
<?php
    
}
?>