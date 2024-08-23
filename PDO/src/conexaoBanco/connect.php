<?php

declare(strict_types=1);

$pdo = null;

try{
    $pdo = new PDO('mysql:host=localhost;dbname=pdo;charset=utf8', 'root', '');
    echo 'Conexão realizada com sucesso';
} catch (PDOException $e){
    echo $e->getMessage();
    die();
}

return $pdo;