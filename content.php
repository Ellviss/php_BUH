﻿<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div align="center"><h2>Добавление записи:</h2>
<form action="index.php" method="post">
Описание покупки: <input type="text" name="desc">
Стоимость: <input type="text" name="cost">
<input type="submit" name="addnote" value="Добавить">
</form></div>
<?php

$db = mysqli_connect('localhost', 'root', '', 'buh')
    or die('Error connecting to MySQL server.');

  $query = "SELECT * FROM notes";
  $result = mysqli_query($db, $query)
    or die('Error querying database.');
    
    
	echo '<table border=1 align=center width=70%>';
    echo '<tr>';
    echo '<td>№:</td>';
    echo '<td>Описание:</td>';
    echo '<td>Стоимость: </td>';
    echo '<td>Функции: </td>';
    echo '</tr>';
  while ($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $text = $row['text_'];
    $cost = $row['cost_'];
    echo '<tr>';   
    echo '<td>' . $id .'</td>';
    echo '<td>'. $text.'</td>';
    echo '<td> '.$cost.' </td>';
    echo '<td><input type="submit" name="editnote" value="Редактировать"><input type="submit" name="delnote" value="Удалить"></td>';
    echo '</tr>';
    }
    echo '</table>';
?>