<?php

$pathDb = "../musicas.sqlite";
$connection = new PDO("sqlite:" . $pathDb);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = $_GET["id"];

$prepare = $connection->prepare("DELETE FROM musicas WHERE id=:id;");

$prepare->bindParam(":id", $id);

$prepare->execute();

header("Location:../index.php");