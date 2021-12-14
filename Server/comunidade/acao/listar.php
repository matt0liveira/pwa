<?php
$sql = "SELECT * FROM comunidade";
$select = $con->prepare($sql);
$select->execute();
$lista = $select->fetchAll(PDO::FETCH_ASSOC);
$resp["status"] = 1;
$resp["lista"] = $lista;