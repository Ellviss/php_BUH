
<div align="center"><h2>Добавление записи:</h2>
<form action="index.php" method="post">
<input type="radio" name="status" id="earn" value="1"/><label for="earn">Заработано</label>
<input type="radio" checked name="status" id="spend" value="0"/><label for="spend">Траты</label>
Описание : <input type="text" name="desc">
Стоимость: <input type="text" name="cost">
<input type="submit" name="addnote" value="Добавить">
<input type="reset" value="Очистить">
</form></div>
<?php

  $date_today = date("d.m.Y");
  
  $user = $_SESSION['login'] ;
  $query = "SELECT * FROM notes WHERE user='$user' AND month(date) = month(now()) and year(date) = year(now()) ";
  $result = mysqli_query(connect(), $query)
    or die('Error querying database.');
 	$result_spend = mysqli_query(connect(), "SELECT SUM(cost_) FROM `notes` WHERE `type` = 0 AND month(date) = month(now()) and year(date) = year(now()) ");
	$srow = mysqli_fetch_array($result_spend);
	$spend = $srow [0]; 
	$result_earn = mysqli_query(connect(), "SELECT SUM(cost_) FROM `notes` WHERE `type` = 1 AND month(date) = month(now()) and year(date) = year(now()) ");
	$erow = mysqli_fetch_array($result_earn);
	$earn =$erow [0];
    $res = $earn-$spend;   
    
	echo '
	<table class="table table-hover table-md" border=1 align="center" width=70%>';
    echo '<thead><tr>';
    //echo '<td>№:</td>';
    echo '<th><b>За период: ' . strftime("%B.%Y").'</b></td>';
    echo '<th><b>Описание:</b></td>';
    echo '<th><b>Стоимость:</b> </td>';
    echo '<th><b>Функции:</b> </td>';
    echo '</tr></thead>';
  while ($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $text = $row['text_'];
    $cost = $row['cost_'];
    $date = $row['date'];
    $type = $row['type'];
    if ($type==1)
    {
		$class = "table-success";
	}
    else
    {
		$class = "table-danger";
	}    
    echo '<tr class='. $class .'>';   
    //echo '<td>' . $id .'</td>';
    echo '<td >' . $date .'</td>';
    echo '<td>'. $text.'</td>';
    echo '<td> '.$cost.' </td>';
    echo '<td>
    <form action="index.php" method="post">
    <input type=hidden name="id" value="'.($row['id']).'" >
    <input type="submit" name="editnote" value="Редактировать">
    <input type="submit" name="delnote" value="Удалить">
    </form>	
    </td>';
    echo '</tr>';
    }
    
     echo '<tr>';
    //echo '<td>№:</td>';
    echo '<td><b>Сегодня: ' . $date_today .'</b></td>';
    echo '<td><b>Заработано:</b>' . $earn .' </td>';
    echo '<td><b>Потрачено:</b>' . $spend .' </td>';
    echo '<td><b>Итого:</b>' . $res .' </td>';
    echo '</tr>';
    echo '</table>';
?>