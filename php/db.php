<?php

class DB
{
    private static $server = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "wamp";

    // private static $server = "localhost";
    // private static $username = "u207493759_wamp";
    // private static $password = "Ksi9OSfMRwFl";
    // private static $dbname = "u207493759_wampi";
    
    public static function getConnection()
    {
        return new mysqli(self::$server, self::$username, self::$password, self::$dbname);
    }
}
