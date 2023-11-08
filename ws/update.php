<?php

$pathDb = "../musicas.sqlite";
$connection = new PDO("sqlite:".$pathDb);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = $_GET["id"];
$nome = $_GET["nome"];
$banda = $_GET["banda"];

$prepare = $connection->prepare("UPDATE musicas SET nome=:nome, banda=:banda WHERE id=:id;");

$prepare->bindParam(":nome", $nome);
$prepare->bindParam(":banda", $banda);
$prepare->bindParam(":id", $id);

$prepare->execute();

header("Location:../index.php");