<?php
    define('PROJECT_NAME', 'Имя проекта' );
?>
<!DOCTYPE html>
<html>
<?= require_once ('include/head.php');?>
<body>
<div class="header">
    <h1>Заголовок</h1>
</div>
<div class="content">
</div>

<?php

define('SECONDS_IN_DAY', 86400);

$currentDate = time();
$yesterday = $currentDate - SECONDS_IN_DAY * 7;

echo $currentDate . "<br />";
echo date('d.m.Y H:i:s') . "<br />";
echo date('d.m.Y H:i:s', $yesterday);

require_once('template.php');
?>

</body>
</html>
