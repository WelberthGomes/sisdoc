<?php require_once 'util/redirect.php'; ?>

<script type="text/javascript" src="admin/js/jquery.validate.js"></script>
<script>
  $(function() {
      
    $("#cancelar").click(function(){
       document.location = '?p=admin/usuarios'; 
    });
   
    $("#formCadastro").validate({
			rules:{
				nome:{				
					required: true                                        
				},
                                email:{	
                                        email: true,
					required: true                                        
				},
                                login:{				
					required: true
                                        
				},
                                senha1:{				
					required: true,
                                        minlength: 5,
                                        maxlength: 15
                                        
				},
                                senha2:{				
					required: true,
                                        equalTo: "#senha1"
				}
                                
			},
			messages:{
				nome:{
					required: "Campo em branco"
				},
                                email:{
                                        email: "E-mail inválido",
					required: "Campo em branco"
				},
                                login:{
					required: "Campo em branco"
				},
                                senha1:{
					required: "Campo em branco",
                                        minlength: 'Min 5 e Max 15 caracteres',
                                        maxlength: 'Min 5 e Max 15 caracteres'
				},
                                senha2:{
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


<h2 class="title">Cadastro de Usuário</h2>
<div id="tabela2">
    Preencha todos os campos.<br><br>
    <form id="formCadastro" action="admin/control/envia_usuario.php" method="post">
        
        
        <table>
            
            <tr>
                <td>Nome</td>
                <td><input type="text" name="nome" maxlength="100"/></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="text" name="email" maxlength="100"/></td>
            </tr>
            <tr>
                <td>Login</td>
                <td><input type="text" name="login" maxlength="30"/></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input type="password" name="senha1" id="senha1" maxlength="15"/></td>
            </tr>
            <tr>
                <td>Confirme a senha</td>
                <td><input type="password" name="senha2" id="senha2" maxlength="15"/></td>
            </tr>
            
            <tr>
                <td><input type="checkbox"  id="nivel" name="nivel" value="2" /> <label for="gerente" >Gerente</label></td>                
                <td></td>
            </tr>

        </table>
        
            <tr>
                <td><br><input class="link-style" type="submit" value="Cadastrar" id="cadastrar"/></td>
                <input type="button" class="link-style" id="cancelar" value="Cancelar"/>
            </tr>

    </form>
</div>
