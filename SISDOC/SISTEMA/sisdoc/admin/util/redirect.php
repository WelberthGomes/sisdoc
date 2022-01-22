<?php
/*
 * Caso não seja administrador, é redirecionado para página de login. 
 */

if(!isset($_SESSION)){session_start();}
if(!isset($_SESSION['VL_NVL_USU']) || $_SESSION['VL_NVL_USU'] == 1){
    header("Location: ?p=login");
}
?>