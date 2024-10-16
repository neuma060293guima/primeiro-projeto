<?php
// Vamos começar a fazer o cadastro de usuário!

// Incluindo arquivo que faz a conexão com banco de dados e cria a variável $pdo
include_once 'config.php';

// Cadastrar usuário: email e senha.
try {
    // Verifica se os campos de cadastro de email e senha estão vazios, evitando usuários cadastrarem 
    // com campos vazios.
    if (isset($_POST['email']) && isset($_POST['senha']) && $_POST['email'] != '' && $_POST['senha'] != '') {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
            $trimme_email = trim($_POST["email"]);
            $trimme_senha = trim($_POST["senha"]);

            // Criando o comando SQL que vai inserir o novo usuário.
            $sql = "INSERT INTO usuarios (email, senha) VALUES (:email, :senha)";
            // Prepara comando para executar no banco de dados que escolhemos.
            // stmt: significa "statement" ou "declaração".
            $stmt = $pdo->prepare($sql);
            // Fazendo o "BIND" dos parâmetros email e senha no comando sql anterior para ele saber onde puxar os 
            // valores de email e senha.
            $stmt->bindParam('email', $trimmed_email);
            $stmt->bindParam('senha', $trimmed_senha);
            // Finalmente depois de configurarmos o comando SQL vamos executar ele para fazer a inserção no banco.
            $stmt->execute();

            echo "Cadastro concluído com sucesso!";
        } else {
            echo "O email não é válido!";
        }
    } else {
        // Mensagem que exibe que usuário tente cadastrar com algum campo vazio.
        echo "Você deixou algum campo de email ou senha vazio, preencha para poder se cadastrar.";
    }
} catch (Exception $error) {
    echo $error;
}


