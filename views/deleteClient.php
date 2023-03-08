<?php
require "../controllers/clientC.php";
$clientC = new ClientC();
$clientC->deleteClient($_GET["idClient"]);
header('location: listClient.php')


?>