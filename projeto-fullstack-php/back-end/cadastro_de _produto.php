<?php

include_once 'config.php';
// Ir no banco de dados
// Criar uma tabela chamada "produto"
// id -> A.I
// nome -> varchar(255)
// preco -> float

try {
    if (isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['preco']) && $_POST['nome'] != '' && $_POST['descricao'] != '' && $_POST['preco'] != '') {
            $trimmed_email = trim($_POST['nome']);
            $trimmed_senha = trim($_POST['descricao']);
            $trimmed_email = trim($_POST['preco']);

            $sql = "INSERT INTO produtos (nome, descricao, preco) VALUES (nome, descricao, preco:)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam('nome', $trimmed_email);
            $stmt->bindParam('descrição', $hashGeradoDaSenha);
            $stmt->bindParam('preco', $hashGeradoDaSenha);
            $stmt->execute();

            echo "Cadastro concluído com sucesso!";
    } else {
        echo "Você deixou algum campo vazio, preencha todos para poder cadastrar.";
    }
} catch (Exception $error) {
    echo $error;
}