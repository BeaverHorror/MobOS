<?php

$db_host = "localhost";     // Имя сервера
$db_user = "cc33953_bd";    // Имя пользователя
$db_password = "69911201";  // Пароль
$db_name = "cc33953_bd";    // 

// Соединение с БД
$link = mysqli_connect($db_host,$db_user,$db_password,$db_name); 

if (!$link) die("Error");    // Проверка соединения с БД

$query = "DELETE FROM data"; // Запрос на удаление БД

$result  =  mysqli_query( $link,  $query );

if ( !$result ) {
  echo "Произошла ошибка: "  .  mysqli_error();
}
else {
  echo "Данные БД удалены";
}

mysqli_close( $link );

?>