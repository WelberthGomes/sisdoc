<?php
session_start();
// função para destruir a sessão
session_destroy();
header("location: ../../index.php?p=login");
?>