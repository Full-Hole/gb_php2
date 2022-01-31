<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Читать текст</a> |
		<a href="index.php?c=page&act=edit">Редактировать текст |</a>
		<?php if(isset($_SESSION['uid'])): ?>
			<a href="index.php?c=user&act=lk">ЛК |</a>
			<?php if(isset($_SESSION['uri']) && $_SESSION['uri'] ==1 ): ?>	
				<a href="index.php?c=admin&act=open">Админка</a>
			<?php endif; ?>
			<a href="index.php?c=user&act=exit">Выход</a>	
		<?php else: ?>
			<a href="index.php?c=user&act=auth">Вход</a> | 
			<a href="index.php?c=user&act=reg">Регистрация</a>
		<?php endif; ?>
		
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
</body>
</html>
