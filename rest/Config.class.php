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
        return Config::get_env("DB_HOST", "localhost");
    }

    public static function DB_USERNAME(){
        return Config::get_env("DB_USERNAME", "root");
    }

    public static function DB_PASSWORD(){
        return Config::get_env("DB_PASSWORD", "root");
    }
//DBNAME
    public static function DB_SCHEMA(){
        return Config::get_env("DB_SCHEMA", "personalitytest"); 
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