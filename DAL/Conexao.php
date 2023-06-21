<?php

namespace DAL;

class Conexao{
    private static $dbNome = 'empresa';
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
    private static $dbPassword = '';

    private static $cont = null;

    public function __construct(){
        die("A função init não é permitida");
    }
    
    public static function conectar(){
        if (self::$cont == null){
            try{
                self::$cont = new \PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbNome , self::$dbUser , self::$dbPassword);
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function desconectar(){
        self::$cont = null;
    }
}
?>