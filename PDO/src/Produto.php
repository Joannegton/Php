<?php

declare(strict_types=1);

class Produto{
    /**
     * @var PDO // PDO é uma classe nativa do PHP que fornece uma interface para se conectar com o banco de dados
     */ 
    private $conexao;

    public function __construct()
    {
        try{
            $this->conexao = new PDO('mysql:host=localhost;dbname=pdo;charset=utf8', 'root', '');
            echo 'Conexão realizada com sucesso';
        } catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    public function list() : array
    {
        $sql = 'SELECT * FROM produtos';

        $produtos = [];

        foreach ($this->conexao->query($sql) as $key => $value) {
            array_push($produtos, $value); // array_push é utilizado para adicionar um ou mais elementos no final de um array
        }
        return $produtos;
    }

    public function insert(string $descricao, int $preco): int
    {
        $sql = 'INSERT INTO produtos(descricao, preco) VALUES(?, ?)'; // ? é um placeholder para os valores que serão passados pelo bindParam

        $prepare = $this->conexao->prepare($sql);

        $prepare -> bindParam(1, $descricao); // bindParam é utilizado para passar os valores para a query
        $prepare -> bindParam(2, $preco);
        $prepare -> execute();

        return $prepare->rowCount() ;
    }

    public function update(int $id, string $descricao, int $preco) : int
    {
        $sql = 'UPDATE produtos SET descricao = ?, preco = ? WHERE id = ?'; // ? é um placeholder para os valores que serão passados pelo bindParam

        $prepare = $this->conexao->prepare($sql);

        // bindParam é utilizado para passar os valores pela url ex: http://localhost/PDO/src/update.php?descricao=Arrozo&preco=10
        $prepare -> bindParam(1, $descricao);
        $prepare -> bindParam(2, $preco);
        $prepare -> bindParam(3, $id); // bindParam é utilizado para passar os valores para a query


        $prepare -> execute();

        return $prepare->rowCount() ;
    }

    public function delete(int $id) : int
    {
        $sql = 'DELETE FROM produtos WHERE id = ?'; // ? é um placeholder para os valores que serão passados pelo bindParam

        $prepare = $this->conexao->prepare($sql);
        
        $prepare -> bindParam(1, $id); // bindParam é utilizado para passar os valores para a query
        
        $prepare -> execute();
        
        return $prepare->rowCount();
    }


    
}