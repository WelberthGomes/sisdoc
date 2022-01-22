<?php

function limpaDado($dado){
    $dado = strip_tags($dado); //retira tags html
    $dado = preg_replace("(\"|\')","",$dado); // troca aspas por branco
    $dado = addslashes($dado); // acrescenta barra invertida antes de qualquer aspas simples ou duplas
    $dado = trim($dado); // a função trim retira os espaços em branco da direita e esquerda
    return $dado;
}
?>
