<?php

// Inclui o arquivo de configuração principal
require __DIR__ . "/Config/config.php";

// Obtém o caminho da URL da requisição
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Divide a URL em partes usando '/' como delimitador
$uri = explode('/', $uri);

// Verifica se a URL não segue o formato esperado para a API
if ((isset($uri[1]) && $uri[1] != 'api') || (isset($uri[2]) && $uri[2] != 'v1')) {
    // Retorna um erro 404 se a URL não estiver no formato correto
    header("HTTP/1.1 404 Not Found");
    exit();
} else if ((isset($uri[3]) && $uri[3] != 'user') || !isset($uri[4])) {
    // Retorna um erro 404 se o endpoint 'user' não estiver presente ou se o método não estiver definido
    header("HTTP/1.1 404 Not Found");
    exit();
}

// Inclui o arquivo do controlador de usuário
require ROOT_PATH . "/Controller/Api/UserController.php";

// Cria uma instância do controlador de usuário
$user = new UserController();

// Determina o nome do método a ser chamado com base na URL
$methodName = $uri[4] . 'Action';

// Chama o método correspondente no controlador de usuário
$user->{$methodName}();
?>
