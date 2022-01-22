<?php require_once 'util/restrito.php'; ?>
<script type="text/javascript" src="admin/js/jquery.validate.js"></script>
<script>
  $(function() {
   
    $("#formAlterar").validate({
			rules:{
                                atual:{				
					required: true,
                                        minlength: 5,
                                        maxlength: 15
				},
                                nova1:{				
					required: true,
                                        minlength: 5,
                                        maxlength: 15
                                        
				},
                                nova2:{				
					required: true,
                                        equalTo: "#nova1"
				}
                                
			},
			messages:{
				atual:{
					required: "Campo em branco",
                                        minlength: 'Min 5 e Max 15 caracteres',
                                        maxlength: 'Min 5 e Max 15 caracteres'
				},
                                nova1:{
					required: "Campo em branco",
                                        minlength: 'Min 5 e Max 15 caracteres',
                                        maxlength: 'Min 5 e Max 15 caracteres'
				},
                                nova2:{
					required: "Campo em branco",
                                        equalTo: "As senhas não correspondem"
				}
			}
		});
  });
  </script>
  
<style>
       label.error {color: red; margin-left: 15px; font-size: 12px;}
</style>


<h2 class="title">Alteração de Senha</h2>
<div id="tabela2">
    Preencha todos os campos.<br><br>
    <form id="formAlterar" action="admin/control/alterar_senha.php" method="post">
        
        
        <table>
            
            <tr>
                <td>Senha atual</td>
                <td><input type="password" name="atual" maxlength="15"/></td>
            </tr>
            <tr>
                <td>Nova senha</td>
                <td><input type="password" name="nova1" id="nova1" maxlength="15"/></td>
            </tr>
            <tr>
                <td>Confirme a nova senha</td>
                <td><input type="password" name="nova2" id="nova2" maxlength="15"/></td>
            </tr>


        </table>
        
            <tr>
                <td><br><input class="link-style" type="submit" value="Alterar" id="alterar"/></td>
            </tr>

    </form>
</div>
