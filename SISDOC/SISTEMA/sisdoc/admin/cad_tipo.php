<?php require_once 'util/redirect.php'; ?>
<script type="text/javascript" src="admin/js/jquery.validate.js"></script>
<script>
  $(function() {
      
    $("#cancelar").click(function(){
       document.location = '?p=admin/tipos'; 
    });
   
    $("#formCadastro").validate({
			rules:{
				nome:{				
					required: true                                        
				}
                                
			},
			messages:{
				nome:{
					required: "Campo em branco"
				}
			}
		});
  });
  </script>
  
<style>
       label.error {color: red; margin-left: 15px; font-size: 12px;}
</style>


<h2 class="title">Cadastro de Tipo de Documento</h2>

<div id="tabela2">
    
    <form id="formCadastro" action="admin/control/envia_tipo.php" method="post">
        
        
        <table>
            
            <tr>
                <td>Nome</td>
                <td><input type="text" name="nome" maxlength="100"/></td>
            </tr>
            

        </table>
        
            <tr>
                <td><br><input class="link-style" type="submit" value="Cadastrar" id="cadastrar"/></td>
                <input type="button" class="link-style" id="cancelar" value="Cancelar"/>
            </tr>

    </form>
</div>
