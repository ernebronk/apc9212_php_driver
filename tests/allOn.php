<?php

require_once('../APC9212.php');
$controller = new APC9212("10.0.1.144", "private");
$controller->allOn();

require_once('index.php');

?>
