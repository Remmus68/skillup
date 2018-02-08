<!DOCTYPE html>
<html>
	<head>
	    <title><?= $pageTitle . ' | ' .PROJECT_NAME ?></title>
	    <link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
	    <div class="container">
			<div class="header">
			    <div class="logotip">
			        <img src="image/logo.png" />
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