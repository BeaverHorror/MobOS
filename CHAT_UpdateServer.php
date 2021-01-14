<?php
$db_host = "localhost";     // Имя сервера
$db_user = "cc33953_bd";    // Имя пользователя
$db_password = "69911201";  // Пароль
$db_name = "cc33953_bd";    // 

// Соединение с БД
$link = mysqli_connect($db_host,$db_user,$db_password,$db_name); 

$sql = 'SELECT id, str FROM data';
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_array($result)) 
{
  print("" . $row['str'] . "\n");
}

?>