<?php
if (isset($_POST['a'])) $string_a = htmlentities($_POST['a']);
if (isset($_POST['b'])) $string_b = htmlentities($_POST['b']);
if (isset($_POST['c'])) $string_c = htmlentities($_POST['c']);
if (isset($_POST['d'])) $string_d = htmlentities($_POST['d']);

if (isset($_POST['id']))       $string_id          = htmlentities($_POST['id']);
if (isset($_POST['mqtt_key'])) $string_mqtt_key    = htmlentities($_POST['mqtt_key']);
if (isset($_POST['user']))     $string_user        = htmlentities($_POST['user']);
if (isset($_POST['language'])) $string_language    = htmlentities($_POST['language']);
if (isset($_POST['course']))   $string_course      = htmlentities($_POST['course']);
if (isset($_POST['problem']))  $string_problem     = htmlentities($_POST['problem']);
if (isset($_POST['variant']))  $string_variant     = htmlentities($_POST['variant']);
if (isset($_POST['code']))     $string_code        = htmlentities($_POST['code']);

$a = (String)$string_a;
$b = (String)$string_b;
$c = (String)$string_c;
$d = (String)$string_d;

$id        = (String)$string_id;
$mqtt_key  = (String)$string_mqtt_key;
$user      = (String)$string_user;
$language  = (String)$string_language;
$course    = (String)$string_course;
$problem   = (String)$string_problem;
$variant   = (String)$string_variant;
$code      = (String)$string_code;



$db_host = "localhost";        // Имя сервера
$db_user = "cc33953_mobosbd";  // Имя пользователя
$db_password = "69911201";     // Пароль
$db_name = "cc33953_mobosbd";  // 
$charset = 'utf8';             // 

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
    // Новая запись
    if($d == "send_new_data")
    {
        if($c == "mobos")
        {
            $sql = 'INSERT INTO mobos 
                    SET mqtt_key = ?, user = ?, language = ?, course = ?, problem = ?, variant = ?, code = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$mqtt_key,$user,$language,$course,$problem,$variant,$code]);
            $data = $stmt->fetchAll();
        }
    } 
  
  // Изменить запись
    if($d == "change_data")
    {
        if($c == "mobos")
        {
            $sql = 'UPDATE mobos 
                    SET mqtt_key = ?, user = ?, language = ?, course = ?, problem = ?, variant = ?, code = ?
                    WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$mqtt_key,$user,$language,$course,$problem,$variant,$code,$id]);
            $data = $stmt->fetchAll();
        }
    }

}

?>