<?php
    function Conectar(){
        $usuario = "root";
        $senha = "";
        $server = "localhost";
        $dbname = "ods6.1";
        $conexao = new PDO("mysql:host=".$server.";dbname=".$dbname,$usuario,$senha,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $conexao;
    }
?>