<?php

$pathDb = "../musicas.sqlite";
$connection = new PDO("sqlite:".$pathDb);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$nome = $_GET["nome"];
$banda = $_GET["banda"];

$prepare = $connection->prepare("INSERT INTO musicas (nome, banda) VALUES (:nome, :banda)");

$prepare->bindParam(":nome", $nome);
$prepare->bindParam(":banda", $banda);

$prepare->execute();

header("Location:../");