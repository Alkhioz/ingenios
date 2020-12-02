<?php
class Database
{

    public static function StartUp()
    {

		include('config.php');
        $pdo = new PDO('mysql:host='.$HOST.';dbname='.$DATABASE.';charset=utf8', $USER, $PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}
/*class Database
{

    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=ingenio;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}*/