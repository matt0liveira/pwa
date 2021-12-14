<?php
$checagemSQL = "SELECT COUNT(*) 'qtd' FROM comunidade WHERE idcomunidade = :idcomunidade";
$selectCheck = $con->prepare($checagemSQL);
$selectCheck->bindParam(':idcomunidade', $idcomunidade);
$selectCheck->execute();
$dadosCheck = $selectCheck->fetch(PDO::FETCH_ASSOC);
if($dadosCheck["qtd"] == 1){
    $sql = "DELETE FROM comunidade WHERE idcomunidade = :idcomunidade";
    $delete = $con->prepare($sql);
    $delete->bindParam(":idcomunidade", $idcomunidade);
    $delete->execute();
    retornar(1, 'Comunidade excluída com sucesso :)');
} else{
    retornar(0, 'Comunidade não encontrada :(');
}