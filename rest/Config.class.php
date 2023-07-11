<?php
/*
class Config{
    public static function DB_HOST(){
        return Config::get_env("DB_HOST", "localhost");
    }

    public static function DB_USERNAME(){
        return Config::get_env("DB_USERNAME", "root");
    }

    public static function DB_PASSWORD(){
        return Config::get_env("DB_PASSWORD", "69w33d420");
    }
//DBNAME
    public static function DB_SCHEMA(){
        return Config::get_env("DB_SCHEMA", "personalitydb"); 
    }

    public static function DB_PORT(){
        return Config::get_env("DB_PORT", "3306");
    }

    public static function JWT_SECRET(){
        return Config::get_env("JWT_SECRET", "web");
    }

    public static function get_env($name, $default){
        return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
    }
}
*/


class Config{
    public static function DB_HOST(){
        return Config::get_env("DB_HOST", "personalitydb-do-user-14363873-0.b.db.ondigitalocean.com");
    }

    public static function DB_USERNAME(){
        return Config::get_env("DB_USERNAME", "doadmin");
    }

    public static function DB_PASSWORD(){
        return Config::get_env("DB_PASSWORD", "AVNS_6DgsprY0TfOwERacYU6");
    }
//DBNAME
    public static function DB_SCHEMA(){
        return Config::get_env("DB_SCHEMA", "defaultdb"); 
    }

    public static function DB_PORT(){
        return Config::get_env("DB_PORT", "25060");
    }

    public static function JWT_SECRET(){
        return Config::get_env("JWT_SECRET", "web");
    }

    public static function get_env($name, $default){
        return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
    }
}


/*
class Config{
    public static function DB_HOST(){
        return Config::get_env("DB_HOST", "localhost");
    }

    public static function DB_USERNAME(){
        return Config::get_env("DB_USERNAME", "root");
    }

    public static function DB_PASSWORD(){
        return Config::get_env("DB_PASSWORD", "maliprinc");
    }
//DBNAME
    public static function DB_SCHEMA(){
        return Config::get_env("DB_SCHEMA", "personalitydb"); 
    }

    public static function DB_PORT(){
        return Config::get_env("DB_PORT", "3307");
    }

    public static function JWT_SECRET(){
        return Config::get_env("JWT_SECRET", "web");
    }

    public static function get_env($name, $default){
        return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
    }
}
*/
?>