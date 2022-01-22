<?php

function converteData($data){
    $data = explode("-", $data);
    $data = array_reverse($data);
    $data = implode("/", $data);
    return $data;
}
?>
