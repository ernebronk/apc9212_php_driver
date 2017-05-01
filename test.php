<?php

require_once('APC9212.php');
$controller = new APC9212("10.0.1.144", "private");
$controller->setOutlet(3, "off");

for($i = 1; $i <= 8; $i++) {
    echo $controller->getOutletName($i);
    echo " ";
    echo $controller->getOutletStatus($i);
    echo "<br>";
}

$controller->allOn();



?>
