<?php
//session_start(); // Стартуем сессию
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>


<?php if (isset($_GET['exit'])) { // если вызвали переменную "exit"
unset($_SESSION['password']); // Чистим сессию пароля
unset($_SESSION['login']); // Чистим сессию логина
unset($_SESSION['id']); // Чистим сессию id
header('Location: index.php');
} ?>

<?php if (isset($_SESSION['login']) && isset($_SESSION['id'])) // если в сессии загружены логин и id
{
echo '<div align="center"><a href="index.php?exit">Выход</a></div>'; // Выводим нашу ссылку выхода
} ?>

<?php if (!isset($_SESSION['login']) || !isset($_SESSION['id'])) // если в сессии не загружены логин и id
{
echo '<div align="center"><a href="reg.php">Регистрация</a></div>'; // Выводим нашу ссылку регистрации
} ?>

<br>
</body>
</html>