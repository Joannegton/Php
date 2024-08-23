<?php

require 'Produto.php';

$produto = new Produto();

switch ($_GET['operacao']) { // $_GET é uma variável global do PHP que é utilizada para coletar dados enviados por um formulário via método GET
    case 'list':
        echo '<h3>Produtos: </h3>';
        foreach ($produto->list() as $value) {
            echo 'Id: ' . $value['id'] . '<br> Descrição: ' . $value['descricao'] . '<br> Preço: ' .$value['preco'] . '<hr>';
        }
        break;
    case 'insert':
        $status = $produto->insert('Produto teste', 10);
        if (!$status) {
            echo 'Não foi possível executar a operação';
            return false;
        }
        echo 'Registro inserido com sucesso';
        break;
    case 'update':
        $status = $produto->update(1, 'Macarrão', 12);
        if (!$status) {
            echo 'Não foi possível executar a operação';
            return false;
        }
        echo 'Produto atualizado com sucesso';
        break;
    case 'delete':
        $status = $produto->delete(2);
        if (!$status) {
            echo 'Não foi possível executar a operação';
            return false;
        }
        echo 'Produto deletado com sucesso';
        break;
    
    default:
        # code...
        break;
}

