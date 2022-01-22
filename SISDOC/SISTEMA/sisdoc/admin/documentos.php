<?php
require_once 'util/restrito.php';
require_once "model/DocumentoDao.class.php";
require_once "util/converteData.php";
$docDao = new DocumentoDao();
?>

<script>
  $(function() {
      $("#carregando").hide();
    $( "#ir" ).click(function(){
        var query = $("#q").val();
        
        $.ajax({
           url: "admin/control/busca.php",
           dataType: 'html',
           data: {busca: query},
           type: "POST",
           
           beforeSend: function(){
               $("#ultimosDocumentos").hide();
               $("#carregando").show();            
               
           },
           success: function(data){
               $("#carregando").hide();
                    $("#resultado").html("<label style='color: #064C8A;'><b> Resultado da busca</label> </b><br><br>"+data);
           }
        });
        
    });
    
    
    
    
  });
</script>
<title>Documentos</title>

<div class="entry">
    
        <div id="pequisar">
            <form >
                Pesquisar  <input type="text" id="q" name="q" title="Nº do documento ou Login do usuário" onkeypress="return event.keyCode!=13"/> <input type="button" id="ir" class="link-style" value="Ir" />
            </form>
        </div>
    
    <h2 class="title">Documentos</h2>

    <div id="ultimosDocumentos">
        
        <?php $cont = $docDao->selecionarTodos(); ?>
        <?php if( $cont->rowCount() == 0){
            echo "Nenhum documento registrado!";
        } else {?>
        
        <div id="tabela4">
            
            <label id="legenda">Últimos documentos registrados.</label><br><br>
            <table >
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
                <?php $i = 0; ?>
                <?php foreach($docDao->selecionarTodos() as $d){ ?>
                <?php $i = $i + 1; ?>
                <tr style="background: <?php echo ($i % 2 == 0)?'#DDDEFF':''; ?>; color: #000;">
                    <td><?php echo $d['NM_TIP_DOC']; ?></td>
                    <td><?php echo $d['NR_DOC']; ?></td>
                    <td><?php echo $d['CD_MAT_DOC']; ?></td>                                
                    <td><?php echo $d['TX_DST_DOC']; ?></td> 
                    <td><?php echo $d['TX_DESC_DOC']; ?></td> 
                    <td><?php echo $d['TX_LGN_USU']; ?></td> 
                    <td><?php echo converteData($d['DT_DOC']); ?></td> 

                    <?php if($_SESSION['VL_NVL_USU'] == 2){ ?>
                    <td><a href="#" onclick="excluir('<?php echo $d['CD_DOC']; ?>','documento','<?php echo $d['NR_DOC']; ?>')"><img src="admin/imagens/excluir.png" title="Excluir registro de documento nº <?php echo $d['NR_DOC']; ?>" alt="Excluir registro de documento nº <?php echo $d['NR_DOC']; ?>"></img></a></td>
                    <?php } ?>

                </tr>
                <?php } ?>

            </table>
        </div>
        <?php } ?>
    </div>
    
    
    <div id="carregando">
        Carregando...
    </div>
    
    
    <div id="resultado">
        
        
    </div>
    
    <br>
    <a class="link-style" href="?p=admin/cad_documento">Registrar novo</a>

</div> 

