<?php

$currentDate = time();
$yesterday = $currentDate - 24 * 60 * 60;

echo $currentDate . "<br />";
echo date('d.m.Y H:i:s') . "<br />";
echo date('d.m.Y H:i:s', $yesterday);

require_once('template.php');