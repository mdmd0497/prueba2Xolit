<?php 
require("business/Administrador.php");
require("business/LogAdministrador.php");
require("business/Cliente.php");
$pid=base64_decode($_GET['pid']);
include($pid);
?>
