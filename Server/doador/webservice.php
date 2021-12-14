<?php
require_once "../lib/conexao.php";
require_once "../funcoesImg.php";
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/erro.log");
$resp = array();
$acoes = array('cadastrar', 'logar', 'deslogar', 'verificar');
foreach($_POST as $i => $valor){
    $$i = $valor;
}
//Função Verificar Login
function verifyLogin(){
    global $con;
    if(isset($_COOKIE["iddoador"], $_COOKIE["token"])){
        $sql = "SELECT count(*) 'qtd' FROM dispositivo WHERE fkdoador = :fkdoador AND token = :token AND now() <= DATE_ADD(datacriacao, INTERVAL 30 DAY)";
        $select = $con->prepare($sql);
        $select->bindParam(":fkdoador", $_COOKIE["iddoador"]);
        $select->bindParam(":token", $_COOKIE["token"]);
        $select->execute();
        $dados = $select->fetch(PDO::FETCH_ASSOC);
        if($dados["qtd"] == 1){
            return true;
        } else{
            return false;
        }
    } else{
        setcookie("iddoador", "0", time() - 1);
        setcookie("token", "0", time() - 1);
        return false;
    }
} 

function retornar($status, $aviso, $tipo = 'aviso') {
    global $resp;
    $resp['status'] = $status;
    $resp[$tipo] = $aviso;
}

if(isset($tipo)){
    $con = Conectar();
    if(in_array($tipo, $acoes)){
        require_once "acao/$tipo.php";
    } else{
        retornar(0, 'Tipo de requisição inválida :(');
    }
} else{
    retornar(0, 'ERRO - Informe o tipo de requisição');
}
echo json_encode($resp, JSON_UNESCAPED_UNICODE);