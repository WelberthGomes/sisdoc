<?php if(!isset($_SESSION)){session_start();}  ?>

<div id="logo">
    <h1><a href="?p=home">SisDoc</a></h1>
    
    <?php if(isset($_SESSION['NM_USU'])){ ?>
    
        <p>Seja Bem Vindo(a) <?php echo $_SESSION['NM_USU']; ?>! </p>
        
    <?php }  ?>
</div>