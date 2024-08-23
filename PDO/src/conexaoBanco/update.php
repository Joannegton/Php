<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'UPDATE produtos SET descricao = ?, preco = ?'; // ? é um placeholder para os valores que serão passados pelo bindParam

$prepare = $pdo->prepare($sql);

// bindParam é utilizado para passar os valores pela url ex: http://localhost/PDO/src/update.php?descricao=Arrozo&preco=10
$prepare -> bindParam(1, $_GET['descricao']); // bindParam é utilizado para passar os valores para a query
$prepare -> bindParam(2, $_GET['preco']);

$prepare -> execute();

echo $prepare->rowCount() . ' registro atualizado';