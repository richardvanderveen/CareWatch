<?php
include_once("classes/sensor.php");

$sensor = Sensor::Instance($_GET['id']);
echo json_encode($sensor,JSON_PRETTY_PRINT);
?>
