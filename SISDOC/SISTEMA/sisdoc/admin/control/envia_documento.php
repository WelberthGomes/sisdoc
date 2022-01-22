<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/library.js"></script>

    <?php
if($_SERVER['REQUEST_METHOD'] == "POST"){    
    function __autoload($classe){
        require_once "../model/{$classe}.class.php";
    }
    require_once '../util/restrito.php';
    require_once '../util/limpaDado.php';
    
    $doc = new Documento();
    $doc->CD_USU = $_SESSION['CD_USU'];
    $doc->CD_TIP_DOC = $_POST['CD_TIP_DOC'];
    $doc->NR_DOC = $_POST['NR_DOC'];
    $doc->TX_DESC_DOC = $_POST['TX_DESC_DOC'];
    $doc->TX_DST_DOC = $_POST['TX_DST_DOC'];
    $doc->DT_DOC = date("Y-m-d");   
    $doc->CD_MAT_DOC = $_POST['CD_MAT_DOC'];   
            
    $docDao = new DocumentoDao;

    if ($docDao->inserir($doc) == true){?>

        <script type="text/javascript">
            mensagem("Documento registrado com sucesso!","../../index.php?p=admin/documentos");
        </script>    

        <?php
    }
    else{?>

        <script type="text/javascript">
            mensagem("Falha ao registrar documento!","../../index.php?p=admin/documentos");
        </script>    

        <?php
    }
    
} //FIM DO REQUEST_METHOD
?>
