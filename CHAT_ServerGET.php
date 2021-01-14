<?php

if (isset($_GET['a'])) $string_a = htmlentities($_GET['a']);
if (isset($_GET['b'])) $string_b = htmlentities($_GET['b']);

$a = (String)$string_a;
$b = (String)$string_b;

$db_host = "localhost";     // Имя сервера
$db_user = "cc33953_bd";    // Имя пользователя
$db_password = "69911201";  // Пароль
$db_name = "cc33953_bd";    // 
$charset = 'utf8';          // 

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

if ($link == true) {
  // Добавить новую запись в БД  
  $sql = 'INSERT INTO data SET str = ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$a]);
  $data = $stmt->fetchAll();
  
  // Вернуть все записи с БД
  $sql = 'SELECT id, str FROM data';
  $result = mysqli_query($link, $sql);
   while ($row = mysqli_fetch_array($result)) {
      print("" . $row['str'] . "\n");
   }
}

?>