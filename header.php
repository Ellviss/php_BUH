<?php
//session_start(); // Стартуем сессию
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php if (!isset($_SESSION['login']) || !isset($_SESSION['id'])) // если в сессии не загружены логин и id
	{
echo '<div align="right"><h2>Авторизация:</h2>
<form action="index.php" method="post">
Логин: <input type="text" name="login"><br>
Пароль: <input type="password" name="password"><br>
<input type="submit" name="submit" value="Войти">
</form></div>'; // Выводим нашу ссылку регистрации
	} 
?>
</body>
</html>