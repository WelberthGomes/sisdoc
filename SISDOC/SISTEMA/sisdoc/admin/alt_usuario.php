<?php require_once 'util/redirect.php'; ?>
<script type="text/javascript" src="admin/js/jquery.validate.js"></script>
<script>
$(function() {
    $("#cancelar").click(function(){
        document.location = '?p=admin/usuarios'; 
    });
    
    $("#formAltera").validate({
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
				}
			}
		});
  });
  </script>
  
<style>
       label.error {color: red; margin-left: 15px; font-size: 12px;}
</style>

<h2 class="title">Alteração de Usuário</h2>

<?php
if(isset($_GET['id'])){
     if(is_numeric($_GET['id'])){ //SE GET ID FOR NUMERO
         
         function __autoload($classe){
            require_once "model/{$classe}.class.php";
        }
        
        $usu = new Usuario();
        $usu->CD_USU = $_GET['id'];
        $usuDao = new UsuarioDao();
        $rs = $usuDao->selecionar($usu);
        $u = $rs->fetch(PDO::FETCH_ASSOC);
        ?>
        
        <div id="tabela2">
            Preencha todos os campos.<br><br>
            <form id="formAltera" action="admin/control/alterar_usuario.php" method="post">
                
                <table>
                    <input type="hidden" name="CD_USU" value="<?php echo $u['CD_USU']; ?>">
                    <tr>
                        <td>Nome</td>
                        <td><input type="text" name="nome" maxlength="100" value="<?php echo $u['NM_USU']; ?>"/></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="text" name="email" maxlength="100" value="<?php echo $u['TX_EML_USU']; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Login</td>
                        <td><input type="text" name="login" maxlength="30" value="<?php echo $u['TX_LGN_USU']; ?>"/></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox"  id="nivel" name="nivel" value="2" <?php echo ($u['VL_NVL_USU'] == 2)?'CHECKED':''; ?>/> <label for="gerente" >Gerente</label></td>                
                        <td></td>
                    </tr>

            </table>
            <tr>
                <td><br><input class="link-style" type="submit" value="Alterar" id="alterar"/></td>
                <input type="button" class="link-style" id="cancelar" value="Cancelar"/>
            </tr>
                
            </form>

        </div>


        <?php
        
     }
}


?>

