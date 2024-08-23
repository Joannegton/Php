<?php

declare(strict_types=1);

$pdo = require 'connect.php';

$sql = 'DELETE FROM produtos WHERE id = ?'; // ? é um placeholder para os valores que serão passados pelo bindParam

$prepare = $pdo->prepare($sql);

$prepare -> bindParam(1, $_GET['id']); // bindParam é utilizado para passar os valores para a query

$prepare -> execute();

echo $prepare->rowCount() . ' registro deletado';