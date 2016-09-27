<?php
//include ("admin/settings.php");
$connection = mysqli_connect('localhost', 'root','', 'buh') or die(mysqli_error());
if (isset($_POST['regsubmit'])) // Отлавливаем нажатие на кнопку отправить 
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
$reglogin = $_POST['reglogin']; // Присваиваем переменной значение из поля с логином             
$regpassword = $_POST['regpassword']; // Присваиваем другой переменной значение из поля с паролем
$query = "INSERT INTO `users` (login, password) VALUES ('$reglogin', '$regpassword')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
echo "<div align='center'>Регистрация прошла успешно!</div>"; // Сообщаем что все получилось
}
}
if (isset($_POST['submit'])) // Отлавливаем нажатие кнопки "Отправить"
{
if (empty($_POST['login'])) // Если поле логин пустое
{
echo '<script>alert("Поле логин не заполненно");</script>'; // То выводим сообщение об ошибке
}
elseif (empty($_POST['password'])) // Если поле пароль пустое
{
echo '<script>alert("Поле пароль не заполненно");</script>'; // То выводим сообщение об ошибке
}
else  // Иначе если все поля заполненны
{    
$login = $_POST['login']; // Записываем логин в переменную 
$password = $_POST['password']; // Записываем пароль в переменную           
$query = mysqli_query($connection, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `password` = '$password'"); // Формируем переменную с запросом к базе данных с проверкой пользователя
$result = mysqli_fetch_array($query); // Формируем переменную с исполнением запроса к БД 


if (empty($result['id'])) // Если запрос к бд не возвразяет id пользователя
{
echo '<script>alert("Неверные Логин или Пароль");</script>'; // Значит такой пользователь не существует или не верен пароль
}
else // Если возвращяем id пользователя, выполняем вход под ним
{
$_SESSION['password'] = $password; // Заносим в сессию  пароль
$_SESSION['login'] = $login; // Заносим в сессию  логин
$_SESSION['id'] = $result['id']; // Заносим в сессию  id
echo '<div align="center">Вы успешно вошли в систему: '.$_SESSION['login'].'</div>'; // Выводим сообщение что пользователь авторизирован        
}     
}		
} 
if (isset($_POST['addnote'])) // Отлавливаем нажатие на кнопку отправить 
{
if (empty($_POST['desc']))  // Условие - если поле  пустое
{
echo "<script>alert('Поле описание не заполненно');</script>"; // Выводим сообщение об ошибке
}          
elseif (empty($_POST['cost'])) // Иначе если поле  пустое
{
echo "<script>alert('Поле стоимость не заполненно');</script>"; // Выводим сообщение об ошибке
}                      
else // Иначе если поля не пустые
{
	$desc = $_POST['desc']; // Присваеваем переменной значение из поля              
	$cost = $_POST['cost']; // Присваеваем другой переменной значение из поля 
	$type = $_POST['status'];
	$adduser = $_SESSION['login'] ;
	$add_query = "INSERT INTO `notes` (text_, cost_,user,type) VALUES ('$desc', '$cost','$adduser','$type')"; // Создаем переменную с запросом к базе данных
	$addresult = mysqli_query($connection, $add_query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
	echo "<div align='center'>Добавление прошло успешно!</div>"; // Сообщаем что все получилось	
}
}
if (isset($_POST['delnote'])) // Отлавливаем нажатие на кнопку отправить 
{
if (empty($_POST['id']))  // Условие - если поле  пустое
{
echo "<script>alert('Что-то пошло не так');</script>"; // Выводим сообщение об ошибке
}          
    else // Иначе если поля не пустые
{
	$del_id = $_POST['id']; // Присваеваем переменной значение из поля              
	$del_query = "DELETE FROM notes WHERE id = '$del_id'"; // Создаем переменную с запросом к базе данных
	$delresult = mysqli_query($connection, $del_query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
	echo "<div align='center'>Удаление прошло успешно!</div>"; // Сообщаем что все получилось	
}
}

function show_all()
{
	
}
function show_one()
{
	
}
function edit_one()
{
	
}
function delete_one()
{
	
}
function add_one()
{
	
}

?>

