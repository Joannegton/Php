<?php
declare(strict_types=1); //usar tipos

function divisao(int $num1, int $num2) : String{
    try{
        if($num2 == 0){
            throw new Exception("Não é possivel divisão por zero");
        }
        return (string) ($num1 / $num2);
    } catch(Exception $e){
        return $e -> getMessage();
    }
}
echo divisao(10, 2) . "\n"; // 5
echo divisao(10, 0); // Não é possivel divisão por zero
