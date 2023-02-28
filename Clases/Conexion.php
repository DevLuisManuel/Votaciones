<?php
error_reporting(0);
class Conexion{
    private $conex;
    private $fpdo;
    function __construct(){
        include_once dirname(__DIR__)."/FluentPDO/FluentPDO.php";
        try {
            $this->conex = new PDO(
                "mysql:dbname=votaciones",
                "votaciones",
                "****",
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
                )
            );
            $this->conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->conex->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
            $this->fpdo = new FluentPDO($this->conex);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function Conectar(){
        return $this->fpdo;
    }
}