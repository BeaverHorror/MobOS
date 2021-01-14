<?php
if (isset($_POST['a'])) $string_a = htmlentities($_POST['a']);
if (isset($_POST['b'])) $string_b = htmlentities($_POST['b']);
if (isset($_POST['c'])) $string_c = htmlentities($_POST['c']);

if (isset($_POST['operation'])) $string_operatione = htmlentities($_POST['operation']);
if (isset($_POST['tableName'])) $string_tableName = htmlentities($_POST['tableName']);
if (isset($_POST['name'])) $string_name = htmlentities($_POST['name']);
if (isset($_POST['kod'])) $string_kod = htmlentities($_POST['kod']);

$a = (String)$string_a;
$b = (String)$string_b;
$c = (String)$string_c;

$operation = (String)$string_operation;
$tableName = (String)$string_tableName;
$name = (String)$string_name;
$kod = (String)$string_kod;



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
if ($link == false)
{
  print("Ошибка: Невозможно подключиться к MySQL   " . mysqli_connect_error());
}

if ($link == true) 
{

}

?>