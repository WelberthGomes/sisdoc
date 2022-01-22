<?php
require_once 'util/redirect.php';
require_once "model/TipoDocumentoDao.class.php";
$tipDao = new TipoDocumentoDao();
?>

<title>Tipos de Documentos</title>

<div class="entry">

    <h2 class="title">Tipos de Documentos</h2>

    <div id="tabela">
        <table >
            <tr>
                <th >TIPOS</th>                           
            </tr>
            <?php $i = 0; ?>
            <?php foreach($tipDao->selecionarTodos() as $t){ ?>
            <?php $i = $i + 1; ?>
            <tr style="background: <?php echo ($i % 2 == 0)?'#DDDEFF':''; ?>; color: #000;">
                <td><?php echo $t['NM_TIP_DOC']; ?></td>
            </tr>
            <?php } ?>

        </table>
    </div>
    <br>
    <a class="link-style" href="?p=admin/cad_tipo" >Adicionar novo</a>

</div> 

