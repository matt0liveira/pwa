<?php
$sql = "SELECT iddoador, senha FROM doador WHERE email = :e";
$select = $con->prepare($sql);
$select->bindParam(":e", $email);
$select->execute();
$dados = $select->fetch(PDO::FETCH_ASSOC);
//Se existir o doador
if($dados["iddoador"]){
    //Se a senha estiver correta
    if(password_verify($senha, $dados["senha"])){
        //Vincule um novo dispositivo
        $so = $_SERVER["HTTP_USER_AGENT"]; //Armazenando informações do dispositivo que está acessando
        $token = bin2hex(random_bytes(32)); //Gerando token de segurança
        $durationCookie = time()+((3600*24)*30); //Determinando a duração do Cookie
        $sql = "INSERT INTO dispositivo VALUES(0,:so,:token,now(),:fkdoador)";
        $insert = $con->prepare($sql);
        $insert->bindParam(":so", $so);
        $insert->bindParam(":token", $token);
        $insert->bindParam(":fkdoador", $dados["iddoador"]);
        $insert->execute();
        retornar(1, 'Login efetuado com sucesso :)');
        //Criando cookie 'id'
        setcookie("iddoador", $dados["iddoador"], $durationCookie, "/");
        //Criando cookie 'token'
        setcookie("token", $token, $durationCookie, "/");
    } else{
        retornar(0, 'Senha incorreta :(');
    }
} else{
    retornar(0, 'Usuário não encontrado :(');
}