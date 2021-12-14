<?php
    require_once "../lib/conexao.php";
    header("Access-Control-Allow-Origin: *");
    foreach($_POST as $indice => $valor){
        $$indice = $valor;
    }
    $resp = array();
    $acoes = array('cadastrar', 'alterar', 'listar', 'excluir', 'pegarDados');

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
            retornar(0, 'Requisição inválida');
        }
    } else{
        retornar(0, 'Informe o tipo da requisição');
    }
    echo json_encode($resp,JSON_UNESCAPED_UNICODE);
?>