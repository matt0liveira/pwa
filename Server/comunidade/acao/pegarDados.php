<?php
$sql = "SELECT count(*) 'qtd', comunidade.* FROM comunidade WHERE idcomunidade = :idcomunidade";
$select = $con->prepare($sql);
$select->bindParam(":idcomunidade",$idcomunidade);
$select->execute();
$dados = $select->fetch(PDO::FETCH_ASSOC);
if($dados["qtd"] == 1){
    $resp["status"] = 1;
    $resp["dados"] = $dados;
    retornar(1, $dados, 'dados');
} else{
    retornar(0, 'Item não encontrado');
}