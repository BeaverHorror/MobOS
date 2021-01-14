<?php

if (isset($_GET['a'])) $string_a = htmlentities($_GET['a']);
if (isset($_GET['b'])) $string_b = htmlentities($_GET['b']);
if (isset($_GET['c'])) $string_c = htmlentities($_GET['c']);
if (isset($_GET['d'])) $string_d = htmlentities($_GET['d']);

$a = (String)$string_a;
$b = (String)$string_b;
$c = (String)$string_c;
$d = (String)$string_d;



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
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL   " . mysqli_connect_error());
}

if ($link == true)
{ 
    // Загрузить форму
    if($d == "form")
    {
        if ($c == "mobos") 
        {  
            $sql = 'SELECT id, mqtt_key, user, language, course, problem, variant, code 
                    FROM mobos';
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)) 
            {
                if($row[$a] == $b)
                {
                    $arr = array(
                        'id'        => $row['id'], 
                        'mqtt_key'  => $row['mqtt_key'], 
                        'user'      => $row['user'],
                        'language'  => $row['language'],
                        'course'    => $row['course'],
                        'problem'   => $row['problem'],
                        'variant'   => $row['variant'],
                        'code'      => $row['code']
                    );
                echo json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);  
                }
            }
        }
    }
  
    // Удалить запись
    if($d == "delete")
    {
        if ($c == "mobos") 
        {
            $query ="DELETE FROM mobos WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$b]);
            $data = $stmt->fetchAll();
        }
    }
  
    // Вернуть все записи из таблицы mobos
    if($d == "table")
    {
        if($c == 'mobos') 
        {
            $sql = 'SELECT id, mqtt_key, user, language, course, problem, variant, code 
                    FROM mobos';
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)) 
            {
                print("" . $row['id'] ."   ". $row['mqtt_key'] ."   ". 
                    $row['user'] ."   ". $row['language'] ."   ". 
                    $row['course'] ."   ". $row['problem'] ."   ". 
                    $row['variant'] ."   ". $row['code'] ."\n\n");
            } 
        }
    }
}

?>
