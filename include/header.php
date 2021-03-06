<?php
	define('PROJECT_NAME', 'Red eyes');
?>

<!DOCTYPE html>
<html>
	<head>
	    <title><?= $pageTitle . ' | ' .PROJECT_NAME ?></title>
        <link rel="stylesheet" href="css/style.css?<?= filemtime('css/style.css') ?>" data-date="<?= date('d.m.Y H:i:s', filemtime('css/style.css')) ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="include/script.js?<?=filemtime('include/script.js')?>"></script>
	</head>
	<body>
	    <div class="container">
			<div class="header">
			    <div id="logotip">
			    	<a href="../skillup/posts.php">
			        	<img src="image/logo.png" />
			    	</a>
			    </div>
			    <div class="navigator">
			        <ul>
			            <li><a href="#">Лента</a></li>
			            <li><a href="#">Добавить запись</a></li>
			            <li><a href="#">О проекте</a></li>
			        </ul>
			        <form id="search">
			            <input type="text" name="request" placeholder="Поиск...">
			            <input type="submit" value="">
			        </form>
			    </div>
			</div>
        <div class="content">