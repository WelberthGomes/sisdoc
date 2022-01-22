<?php
/*
 * Caso o usuário não esteja logado, é redirecionado para página de login. 
 */

if(!isset($_SESSION)){session_start();}
if(!isset($_SESSION['NM_USU'])){
    header("Location: ../?p=login");
}
?>