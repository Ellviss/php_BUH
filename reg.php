<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Регистрация </title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div align="center"><h2>Регистрация:</h2>
<form action="reg.php" method="post">
Логин: <input type="text" name="reglogin"><br><br>
Пароль: <input type="password" name="regpassword"><br><br>
<input type="submit" name="regsubmit"  value="Зарегестрироваться">
</form></div>


<?php $connection = mysqli_connect('localhost', 'root', '', 'buh') or die(mysqli_error()); // Соединение с базой данных ?> 

<?php if (isset($_POST['regsubmit'])) // Отлавливаем нажатие на кнопку отправить 
{
if (empty($_POST['reglogin']))  // Условие - если поле логин пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}          
elseif (empty($_POST['regpassword'])) // Иначе если поле с паролем пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}                      
else // Иначе если поля не пустые
{
$reglogin = $_POST['reglogin']; // Присваеваем переменной значение из поля с логином             
$regpassword = $_POST['regpassword']; // Присваеваем другой переменной значение из поля с паролем

// Проверяем если ли такой пользователь
$check = mysqli_query($connection, "SELECT `id` FROM `users` WHERE `login` = '$reglogin' "); // Формируем переменную с запросом к базе данных с проверкой пользователя
$result = mysqli_fetch_array($check);
if (empty($result['id']))
{
$query = "INSERT INTO `users` (login, password) VALUES ('$reglogin', '$regpassword')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
echo "<div align='center'>Регистрация прошла успешно!</div>"; // Сообщаем что все получилось	
}
else 
{
	echo "<div align='center'>Логин уже зарегестрирован!</div>"; // Если пользователь уже есть
}
}
} ?>

<br>
</body>
</html>