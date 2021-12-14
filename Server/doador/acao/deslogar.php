<?php
if(verifyLogin()){
    $sql = "DELETE FROM dispositivo WHERE fkdoador = :fkdoador AND token = :token";
    $delete = $con->prepare($sql);
    $delete->bindParam(":fkdoador", $_COOKIE["iddoador"]);
    $delete->bindParam(":token", $_COOKIE["token"]);
    $delete->execute();
    //Fazendo cookies expirarem
    setcookie("iddoador", 0, time() - 1);
    setcookie("token", 0, time() - 1);
    retornar(1, null);
} else{
    retornar(0, null);
}