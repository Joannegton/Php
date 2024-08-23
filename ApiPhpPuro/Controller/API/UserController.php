<?php

class UserController extends BaseController
{
    /**
     * Endpoint "/user/list" - Recupera uma lista de usuários.
     */
    public function listAction()
    {
        // Inicializa a descrição de erro e os cabeçalhos da resposta
        $erroDescription = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"]; // Obtém o método HTTP da requisição
        $stringParamsArray = $this->getStringParams(); // Recupera os parâmetros da requisição

        // Verifica se o método da requisição é GET
        if (strtoupper($requestMethod) == 'GET') {
            try {
                // Cria uma instância do UserModel para interagir com o banco de dados
                $userModel = new UserModel();

                // Limite padrão para o número de usuários a serem recuperados
                $intLimit = 10;
                // Verifica se um parâmetro 'limit' foi fornecido na requisição
                if (isset($stringParamsArray['limit']) && $stringParamsArray['limit']) {
                    $intLimit = $stringParamsArray['limit']; // Atualiza o limite com o valor da requisição
                }

                // Recupera a lista de usuários do UserModel
                $usersArray = $userModel->getUsers($intLimit);
                // Codifica a lista de usuários como JSON para a resposta
                $responseData = json_encode($usersArray);
            } catch (Error $e) {
                // Captura e trata qualquer erro que ocorra durante o processo
                $erroDescription = $e->getMessage() . ' Algo deu errado! Por favor, entre em contato com o suporte.';
                $errorHeader = 'HTTP/1.1 500 Internal Server Error'; // Define o código de status HTTP para erro interno do servidor
            }
        } else {
            // Trata casos onde o método da requisição não é suportado
            $erroDescription = 'Método não suportado';
            $errorHeader = 'HTTP/1.1 422 Unprocessable Entity'; // Define o código de status HTTP para entidade não processável
        }

        // Envia a resposta para o cliente
        if (!$erroDescription) {
            // Se não houver erros, envia uma resposta JSON bem-sucedida
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            // Se houve um erro, envia uma resposta JSON de erro
            $this->sendOutput(
                json_encode(array('error' => $erroDescription)),
                array('Content-Type: application/json', $errorHeader)
            );
        }
    }
}
