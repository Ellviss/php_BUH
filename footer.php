<?php if (isset($_GET['exit'])) { // если вызвали переменную "exit"
unset($_SESSION['password']); // Чистим сессию пароля
unset($_SESSION['login']); // Чистим сессию логина
unset($_SESSION['id']); // Чистим сессию id
header('Location: index.php');
} ?>

<?php if (isset($_SESSION['login']) && isset($_SESSION['id'])) // если в сессии загружены логин и id
{
echo '<div align="center"><h2><a href="index.php?exit">Выход</a></h2></div>'; // Выводим нашу ссылку выхода
} ?>

<?php if (!isset($_SESSION['login']) || !isset($_SESSION['id'])) // если в сессии не загружены логин и id
{
echo '<div align="center"><h1><a href="reg.php">Регистрация</a></h1></div>'; // Выводим нашу ссылку регистрации
} ?>

