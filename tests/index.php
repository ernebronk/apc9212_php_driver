<?php

require_once('buttons.php');
    echo "<table><thead><tr><th>Socket</th><th>Name</th><th>Status</th></tr></thead><tbody>";
    for($i = 1; $i <= 8; $i++) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $controller->getOutletName($i) . "</td>";
        echo "<td>" . $controller->getOutletStatus($i) . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
?>
