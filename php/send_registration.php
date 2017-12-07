<?php
include 'dbhinc.php';
include_once("classes/naw.php");

$naw = NAW::Create($_POST);
$conn->close();
?>
