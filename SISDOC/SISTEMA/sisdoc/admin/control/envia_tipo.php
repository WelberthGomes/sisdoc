<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/library.js"></script>

    <?php
if($_SERVER['REQUEST_METHOD'] == "POST"){    
    function __autoload($classe){
        require_once "../model/{$classe}.class.php";
    }
    require_once '../util/restrito.php';
    
    $tip = new TipoDocumento();
    $tip->NM_TIP_DOC = $_POST['nome'];
  
            
    $tipDao = new TipoDocumentoDao();

    if ($tipDao->inserir($tip) == true){?>

        <script type="text/javascript">
            mensagem("Tipo de documento cadastrado com sucesso!","../../index.php?p=admin/tipos");
        </script>    

        <?php
    }
    else{?>

        <script type="text/javascript">
            mensagem("Falha ao cadastrar tipo de documento!","../../index.php?p=admin/tipos");
        </script>    

        <?php
    }
    
} //FIM DO REQUEST_METHOD
?>
