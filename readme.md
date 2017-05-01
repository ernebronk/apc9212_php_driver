APC9212 PHP Driver
===================

This is the PHP driver for the APC9212 MasterSwitch.

## Installation

Include the APC9212 file and create a new APC9212 object.

## Latest Release

No release yet.

## Documentation and Demo
No live demo available yet.

## Usage

```php
<?php

require_once('APC9212.php');
$controller = new APC9212("192.144.144.144", "private");
$controller->setOutlet(3,"on");

?>

```
## License

No licence information yet.

## Contributors
* Erné Bronkhorst
