<?php

// Inclui o arquivo da classe Database para que a UserModel possa estendê-la
require_once ROOT_PATH . "/Model/Database.php";

class UserModel extends Database
{
    /**
     * Recupera uma lista de usuários com base no limite fornecido.
     *
     * @param int $limit Número máximo de usuários a serem retornados.
     * @return array Lista de usuários recuperada do banco de dados.
     */
    public function getUsers($limit)
    {
        // Chama o método select da classe Database para obter os usuários
        return $this->select($limit);
    }
}
