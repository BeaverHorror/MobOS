<?php

if (isset($_GET['a'])) $string_a = htmlentities($_GET['a']);
if (isset($_GET['b'])) $string_b = htmlentities($_GET['b']);
if (isset($_GET['c'])) $string_c = htmlentities($_GET['c']);

$a = (String)$string_a;
$b = (String)$string_b;
$c = (String)$string_c;


$db_host = "localhost";      // Имя сервера
$db_user = "cc33953_mobos";  // Имя пользователя
$db_password = "69911201";   // Пароль
$db_name = "cc33953_mobos";  // 
$charset = 'utf8';           // 

// Соединение с БД
$link = mysqli_connect($db_host,$db_user,$db_password,$db_name); 

// Соединение с PDO
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $db_user, $db_password, $opt);

// Проверка соединения с БД
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL   " . mysqli_connect_error());
}

if ($link == true)
{

}

?>
