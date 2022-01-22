<script type="text/javascript">

function excluir(id) {
    var num = document.getElementsByName(id)[0].value;
    var resp = confirm('Deseja realmente excluir o registro do documento Nº '+num+'?');
    if(resp){
        document.location = "admin/control/excluir_documento.php?id="+id;
    }
         
}
</script>

 <?php require_once '../util/restrito.php'; ?>

<?php
require_once "../model/DocumentoDao.class.php";
require_once "../util/converteData.php";
$docDao = new DocumentoDao();



$q = $_POST['busca'];

$i = $docDao->busca($q);
$cont = $i->rowCount();

if($cont == 0 ){
    $rs = "Nenhum resultado encontrado!";
}
else{
    
    if($_SESSION['VL_NVL_USU'] == 2){ //Se for gerente irá ter opção de excluir!
        
        $i = 0;
        $rs = "
                <table id='tabela4'>
                    <tr>
                        <th >Tipo </th>
                        <th >Número</th>                  
                        <th >Matrícula</th>                                
                        <th >Destinatário</th>                                
                        <th >Descrição</th>                                
                        <th >Criado por</th>                                
                        <th >em</th>                                
                        <th >&nbsp;</th>                                
                    </tr>
               ";

        foreach($docDao->busca($q) as $d){  
            $i = $i + 1;
            $background = ($i % 2 == 0)?'#DDDEFF':'';
            $rs .= "
                  <tr style='background: {$background };'>

                    <input type='hidden' name='".$d['CD_DOC']."' value='".$d['NR_DOC']."' >
                    <td>".$d['NM_TIP_DOC']."</td>
                    <td>".$d['NR_DOC']."</td>
                    <td>".$d['CD_MAT_DOC']."</td>
                    <td>".$d['TX_DST_DOC']."</td>
                    <td>".$d['TX_DESC_DOC']."</td>
                    <td>".$d['TX_LGN_USU']."</td>
                    <td>".converteData($d['DT_DOC'])."</td>

                    <td><a href='#' id='".$d['CD_DOC']."' onclick='excluir(this.id);'><img src='admin/imagens/excluir.png'></img></a></td>




                  </tr>
                  ";
        }
    
    }
    else{
        
        
        $i = 0;
        $rs = "
                <table id='tabela4'>
                    <tr>
                        <th >Tipo </th>
                        <th >Número</th>                  
                        <th >Matrícula</th>                                
                        <th >Destinatário</th>                                
                        <th >Descrição</th>                                
                        <th >Criado por</th>                                
                        <th >em</th>                                
                        <th >&nbsp;</th>                                
                    </tr>
               ";

        foreach($docDao->busca($q) as $d){  
            $i = $i + 1;
            $background = ($i % 2 == 0)?'#DDDEFF':'';
            $rs .= "
                  <tr style='background: {$background };'>

                    <input type='hidden' name='numero".$d['CD_DOC']."?' value='".$d['NR_DOC']."' >
                    <td>".$d['NM_TIP_DOC']."</td>
                    <td>".$d['NR_DOC']."</td>
                    <td>".$d['CD_MAT_DOC']."</td>
                    <td>".$d['TX_DST_DOC']."</td>
                    <td>".$d['TX_DESC_DOC']."</td>
                    <td>".$d['TX_LGN_USU']."</td>
                    <td>".converteData($d['DT_DOC'])."</td>
                        
                  </tr>
                  ";
        }
        
        
        
        
    }
    
    
}
echo $rs;
?>
