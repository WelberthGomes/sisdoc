<?php
require_once 'util/redirect.php';
require_once "model/UsuarioDao.class.php";
$usuarioDao = new UsuarioDao();
?>

<title>Usuários</title>

<div class="entry">

    <h2 class="title">Usuários</h2>

    <div id="tabela">
        <table >
            <tr>
                <th >Nome</th>
                <th >Login</th>                  
                <th >Email</th>                                
                <th >Perfil</th>                                
                <th >&nbsp;</th>                                
                <th >&nbsp;</th>                                
            </tr>
            <?php $i = 0; ?>
            <?php foreach($usuarioDao->selecionarTodosAtivo() as $u){ ?>
            <?php $i = $i + 1; ?>
            <tr style="background: <?php echo ($i % 2 == 0)?'#DDDEFF':''; ?>; color: #000;">
                <td><?php echo $u['NM_USU']; ?></td>
                <td><?php echo $u['TX_LGN_USU']; ?></td>
                <td><?php echo $u['TX_EML_USU']; ?></td>                                
                <td><?php echo ($u['VL_NVL_USU'] == 1)?'Usuário':'Gerente'; ?></td> 

                <td><a href="?p=admin/alt_usuario&id=<?php echo $u['CD_USU']; ?>"><img src="admin/imagens/editar.png" title="Editar <?php echo $u['NM_USU']; ?>" alt="Editar <?php echo $u['NM_USU']; ?>"></img></a></td>

                <td><a href="#" onclick="excluir('<?php echo $u['CD_USU']; ?>','usuario','<?php echo $u['NM_USU']; ?>')"><img src="admin/imagens/excluir.png" title="Excluir <?php echo $u['NM_USU']; ?>" alt="Excluir <?php echo $u['NM_USU']; ?>"></img></a></td>

            </tr>
            <?php } ?>

        </table>
    </div>
    <br>
    <a class="link-style" href="?p=admin/cad_usuario" title="Clique para adicionar novo usuário" alt="Clique para adicionar novo usuário">Adicionar novo</a>

</div> 

