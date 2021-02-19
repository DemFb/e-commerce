<?php

class DatabaseAdmin
{
private static $dbHost = "2eurhost.com";
private static $dbNAme = "eurh_group6";
private static $dbUser = "eurh_group6";
private static $dbUserPassword = "uPk6u5FEQcguQj3";
private static $connection = null;


public static function connect()
{
try{
    self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbNAme,self::$dbUser,self::$dbUserPassword);
}
catch(PDOException $e){
    die($e->getMessage());
}
return self::$connection;
}

public static function disconnect(){
    self::$connection = null;
}

}

DatabaseAdmin::connect();
?>