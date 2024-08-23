<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'INSERT INTO produtos(descricao, preco) VALUES(?, ?)'; // ? é um placeholder para os valores que serão passados pelo bindParam

$prepare = $pdo->prepare($sql);

$prepare -> bindParam(1, $_GET['descricao']); // bindParam é utilizado para passar os valores para a query
$prepare -> bindParam(2, $_GET['preco']);
$prepare -> execute();

echo $prepare->rowCount() . ' registro inserido';