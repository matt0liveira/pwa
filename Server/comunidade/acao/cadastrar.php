<?php
$sql = "INSERT INTO comunidade(idcomunidade,nome) VALUES(0,:n)";
$insert = $con->prepare($sql);
$insert->bindParam(":n",$nome);
$insert->execute();
$resp["status"] = 1;
$resp["aviso"] = "Cadastro realizado com sucesso";