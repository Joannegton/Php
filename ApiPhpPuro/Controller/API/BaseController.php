<?php
class BaseController
{
    /**
     * Método mágico __call.
     * Este método é chamado quando uma tentativa de chamar um método inacessível ou inexistente é feita.
     * Aqui, ele retorna uma resposta de erro 404 (Não Encontrado).
     */
    public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }
 
    /**
     * Obtém os parâmetros da query string.
     * 
     * @return array Retorna um array com os parâmetros da query string.
     */
    protected function getStringParams() : array
    {
        // Converte a query string em um array associativo
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }
 
    /**
     * Envia a saída da API.
     *
     * @param mixed  $data Dados a serem enviados na resposta.
     * @param string $httpHeader Cabeçalhos HTTP a serem enviados na resposta.
     */
    protected function sendOutput($data, $httpHeaders = array())
    {
        // Remove qualquer cabeçalho 'Set-Cookie' para garantir que nenhum cookie seja enviado
        header_remove('Set-Cookie');
 
        // Adiciona os cabeçalhos HTTP, se houver
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        // Imprime os dados de saída e encerra o script
        echo $data;
        exit;
    }
}
