<!--SE ESTIVER LOGADO FAÇA-->
<?php if(isset($_SESSION['NM_USU'])){ ?>
<ul>
    <li <?php echo ($_GET['p'] == 'home')?"class='current_page_item'":""; ?>>
        <a href="?p=home">Home</a>
    </li>

<!--    EXIBE APENAS SE FOR GERENTE-->
    <?php if($_SESSION['VL_NVL_USU'] == 2){ ?>

        <li <?php echo ($_GET['p'] == 'admin/usuarios' || $_GET['p'] == 'admin/cad_usuario')?"class='current_page_item'":""; ?> >
            <a href="?p=admin/usuarios">Usuários</a>
        </li>

    <?php } ?>

    <li <?php echo ($_GET['p'] == 'admin/documentos' || $_GET['p'] == 'admin/cad_documento')?"class='current_page_item'":""; ?> >
        <a href="?p=admin/documentos">Documentos</a>
    </li>
    
    <!--    EXIBE APENAS SE FOR GERENTE-->
    <?php if($_SESSION['VL_NVL_USU'] == 2){ ?>
    
    <li <?php echo ($_GET['p'] == 'admin/tipos' || $_GET['p'] == 'admin/cad_tipo')?"class='current_page_item'":""; ?> >
        <a href="?p=admin/tipos">Tipo de Documento</a>
    </li>
    
    <?php } ?>
    
    <li <?php echo ($_GET['p'] == 'admin/alt_senha')?"class='current_page_item'":""; ?> >
        <a href="?p=admin/alt_senha">Alterar Senha</a>
    </li>
    <li >
        <a href="admin/util/sair.php">Sair</a>
    </li>
</ul>

<!--SE NÃO ESTIVER LOGADO FAÇA-->
<?php } else {?>
<ul>
    <li style="float: left;" class="current_page_item"><a href="?p=login">Login</a></li>
</ul>        
<?php } ?>