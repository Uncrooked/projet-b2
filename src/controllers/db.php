<?php

class DatabaseClass {

    private static $host;
    private static $dbName;
    private static $username;
    private static $password;
    public static $database = null;
    public static $statement = null;

    public static function getConnexionData(){
        $content = @file_get_contents("./public/assets/data/data.json");
        $content = json_decode($content);
        self::$host = $content->host;
        self::$dbName = $content->db_name;
        self::$username = $content->username;
        self::$password = $content->password;
    }

    public static function connect() {//connct to db
        self::getConnexionData();
        try {
            self::$database = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName, self::$username, self::$password);
            self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("PDO database error: " . $e->getMessage());
        }
    }

    public static function query($database,$query,$params){
        self::$statement = $database -> prepare($query);
        self::$statement->execute($params);
    }
}
