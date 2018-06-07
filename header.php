<?php if (!isset($_SESSION['login']) || !isset($_SESSION['id'])) // если в сессии не загружены логин и id
	{
echo '<div class="alert alert-info" align="right">
<h2>Авторизация:</h2>
<form action="index.php" method="post">
Логин: <input type="text" name="login"><br>
Пароль: <input type="password" name="password"><br>
<input class="btn-lg btn-primary" type="submit" name="submit" value="Войти">
</form></div>'; // Выводим нашу ссылку регистрации
	} 
?>
