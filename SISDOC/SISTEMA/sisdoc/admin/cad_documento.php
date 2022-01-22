<?php require_once 'util/restrito.php'; ?>
<script type="text/javascript" src="admin/js/jquery.validate.js"></script>
<script>
  $(function() {
      
    $("#cancelar").click(function(){
       document.location = '?p=admin/documentos'; 
    });
   
    $("#formCadastro").validate({
			rules:{
				CD_TIP_DOC:{				
					required: true                                        
				},
                                NR_DOC:{	
					required: true                                        
				},
                                CD_MAT_DOC:{				
					required: true                                        
				},
                                TX_DST_DOC:{				
					required: true                                        
				}
                                
			},
			messages:{
				CD_TIP_DOC:{
					required: "Selecione um tipo de documento"
				},
                                NR_DOC:{
					required: "Campo em branco"
				},
                                CD_MAT_DOC:{
					required: "Campo em branco"
				},
                                TX_DST_DOC:{
					required: "Campo em branco"
				}
			}
		});
  });
  </script>
  
<style>
       label.error {color: red; margin-left: 15px; font-size: 12px;}
</style>

<?php
require_once "model/TipoDocumentoDao.class.php";
$tipDao = new TipoDocumentoDao();
?>
<h2 class="title">Novo Registro</h2>
<div id="tabela3">
    Campos obrigatórios (<label style="color: red;">*</label>)<br><br>
    <form id="formCadastro" action="admin/control/envia_documento.php" method="post">
        
        
        <table>
            
            <tr>
                <td><label style="color: red;">*</label>Tipo de Documento</td>
                
                <td>
                    <select name="CD_TIP_DOC">
                        <option value="">Selecione</option>
                        <?php foreach($tipDao->selecionarTodos() as $d){ ?>
                        <option value="<?php echo $d['CD_TIP_DOC'] ?>"><?php echo $d['NM_TIP_DOC'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            
            
            <tr>
                <td><label style="color: red;">*</label>Número de autorização</td>
                <td><input type="text" name="NR_DOC" /></td>
            </tr>
            
            <tr>
                <td><label style="color: red;">*</label>Matrícula</td>
                <td><input type="matricula" name="CD_MAT_DOC" /></td>
            </tr>
            
            <tr>
                <td><label style="color: red;">*</label>Destinatário</td>
                <td><input type="text" name="TX_DST_DOC" maxlength="30"/></td>
            </tr>           
            
        </table>
        
         <br>&nbsp; Descrição<br>
        
        &nbsp;<textarea name="TX_DESC_DOC" ></textarea><br>
        
        <label id="legenda">&nbsp; <?php echo $_SESSION['TX_LGN_USU']; ?> em <?php echo date("d/m/Y"); ?></label>
        
        <br><input class="link-style" type="submit" value="Cadastrar" id="cadastrar"/>
        
        <input type="button" class="link-style" id="cancelar" value="Cancelar"/>
            

    </form>
</div>
