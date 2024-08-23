<?php
// Define o caminho raiz do projeto
define("ROOT_PATH", __DIR__ . "/../");

// Define o caminho para o arquivo de banco de dados
define("DATABASE_FILE", ROOT_PATH . 'database.json');

// Inclui o arquivo do controlador base
require_once ROOT_PATH . "/Controller/Api/BaseController.php";

// Inclui o arquivo do modelo de usuário
require_once ROOT_PATH . "/Model/UserModel.php";
?>
