<?php

class Database
{
    /**
     * Recupera uma lista de usuários com base no limite fornecido.
     *
     * @param int $limit Número máximo de usuários a serem retornados.
     * @return array Lista de usuários ou lança uma exceção em caso de erro.
     */
    public function select($limit) : array
    {
        try {
            // Lê o conteúdo do arquivo de banco de dados e decodifica de JSON para array
            $users = json_decode(file_get_contents(DATABASE_FILE), true);

            // Limita o array de usuários ao número especificado
            $users = array_slice($users, 0, $limit);

            // Retorna a lista de usuários
            return $users;
            
        } catch(Exception $e) {
            // Lança uma nova exceção com a mensagem de erro em caso de falha
            throw new Exception($e->getMessage());
        }
        // Retorna false em caso de erro (não alcançado devido ao lançamento da exceção)
        return false;
    }
}
