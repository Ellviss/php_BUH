<?php
session_start(); // Стартуем сессию
?>
<?php include ('work/logic.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My First App MyBuh</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include ('header.php'); ?>
<hr/>
<center>Список затрат</center>
<?php include ('content.php');	?>
<hr/>
<?php include ('footer.php'); ?>


<br>
</body>
</html>