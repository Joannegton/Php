<?php

function sortear_numeros($quantidade){
    $numeros = array();
    for($i = 0; $i < $quantidade; $i++){
        $num = rand(1, 60);
        if(!in_array($num, $numeros)){
            $numeros[] = $num;
        }
    }
    sort($numeros); //ordena a lista
    foreach($numeros as $num){
        echo $num . "\n";
    }
}

sortear_numeros(6); //sorteia 6 números