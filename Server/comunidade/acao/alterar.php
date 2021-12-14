<?php
$sql = "UPDATE comunidade SET nome = :n WHERE idcomunidade = :idcomunidade";
$update = $con->prepare($sql);
$update->bindParam(":n",$nome);
$update->bindParam(":idcomunidade",$idcomunidade);
$update->execute();
retornar(1, 'Comunidade alterada com sucesso :)');