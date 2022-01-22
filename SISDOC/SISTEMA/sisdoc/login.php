<?php
    if(!isset($_SESSION)){session_start();} 
    if(isset($_SESSION['NM_USU'])){
    header("location: index.php?p=home");
}
?>

<div id="login">
       
        <form action="admin/control/validar_login.php" method="POST">
            <table > 
            <tr>
                <td>Login</td>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input type="password" name="senha"></td>
            </tr>           

            </table>
            
            <input class="link-style"type="submit" value="Entrar" />
            <label style="color: red;"><?php if (isset($_GET['rs'])){echo 'Dados incorretos';} ?></label>
        </form>
    
</div>

