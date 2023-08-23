<?php
require_once('./BladeOne.php');
require_once('./config.php');

use eftec\bladeone\BladeOne;

$views = __DIR__ . "/views";
$cache = __DIR__ . "/cache";

$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
echo $blade->run('details');
?>