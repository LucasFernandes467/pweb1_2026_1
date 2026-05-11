<?php

include_once './database/db.class.php';

//instanciar um objeto da classe DB 
$conn = new db("usuario");

$dados = [
    'nome' => "Lucas Fernandes 2",
    'telefone' => "49985040369",
    'email' => "caroline.m2007@aluno.ifsc.edu.br",
];

$conn->store($dados);
echo "Inserido com sucesso!";