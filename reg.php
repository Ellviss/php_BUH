<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="ellviss">
<title>Регистрация </title>
<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" action="reg.php" method="post">
<h1 class="h3 mb-3 font-weight-normal">Зарегестрируйтесь пожалуйста</h1>
<label for="reglogin" class="sr-only">Логин:</label>
<input type="text" name="reglogin" class="form-control" placeholder="Login" required>
<label for="regpassword" class="sr-only">Пароль:</label>
<input type="password" name="regpassword" class="form-control" placeholder="Password" required>
<label for="regmail" class="sr-only">Почта: </label>
<input type="email" name="regmail" class="form-control" placeholder="Email" required>
<div class="checkbox mb-3">
<label>
   <input type="checkbox" value="remember-me"> Remember me
</label>
</div>
<input class="btn-lg btn-primary" type="submit" name="regsubmit"  value="Зарегестрироваться">
</form></div>


<?php $connection = mysqli_connect('localhost', 'root', 'homecredit', 'buh') or die(mysqli_error()); // Соединение с базой данных ?> 

<?php if (isset($_POST['regsubmit'])) // Отлавливаем нажатие на кнопку отправить 
{
if (empty($_POST['reglogin']))  // Условие - если поле логин пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}          
elseif (empty($_POST['regpassword'])) // Иначе если поле с паролем пустое
{
echo "<script>alert('Поле пароль не заполненно');</script>"; // Выводим сообщение об ошибке
}
elseif (empty($_POST['regmail']))   // Иначе если поле с почтой пустое
{
echo "<script>alert('Поле почта не заполненно');</script>"; // Выводим сообщение об ошибке
}                
else // Иначе если поля не пустые
{
$reglogin = $_POST['reglogin']; // Присваеваем переменной значение из поля с логином             
$regpassword = $_POST['regpassword']; // Присваеваем другой переменной значение из поля с паролем
$regmail = $_POST['regmail']; // Присваеваем другой переменной значение из поля с паролем

// Проверяем если ли такой пользователь
$check = mysqli_query($connection, "SELECT `id` FROM `users` WHERE `login` = '$reglogin' "); // Формируем переменную с запросом к базе данных с проверкой пользователя
$result = mysqli_fetch_array($check);
if (empty($result['id']))
{
$query = "INSERT INTO `users` (login, password,mail) VALUES ('$reglogin', '$regpassword', '$regmail')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
echo "<div align='center'>Регистрация прошла успешно!</div>";
echo '<div align="center"><a href="index.php">Перейти на главную</a></div>' ; // Переход на главную	
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