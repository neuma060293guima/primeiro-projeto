<?php
// Vamos começar a fazer o cadastro de usuário

// Incluindo arquivo que faz a conexão com banco de dados e cria a variável $pdo
// Cadastrar usuário: email e senha
// Conecta com o banco de dados
include_once "config.php";

// Try -> Tenta um código, catch -> Pega o Erro caso o try não funcione
try {
    // Condicional que vai verificar se o formulário está tentando logar com post.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se os campos de email e senha não estão vazios ou nulos.
        if (isset($_POST['email']) && isset($_POST['senha']) && $_POST['email'] != '' && $_POST['senha'] != '') {
            if(filter_var($_POSt["email"],FILTER_VALIDADE_EMAIL)){
                // criando o comando SQL que vai inserir o novo usuário
                $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
                // Prepara comando para executar no banco de dados que escolhemos.
                // stmt: significa "statement" ou "declaração"
                $stmt = $pdo->prepare($sql);
                //Fazendo o "BIND" dos parãmetros do email e senha no comando sql anterior para ele saber onde puxar os 
                // valores de email e senha.
                $stmt->bindParam('email', $_POST['email']);
                $stmt->bindParam('senha', $_POST['senha']);
                // Finalmente depois de configurarmos o comando SQL vamos executar ele para fazer a inserção no banco.
                $stmt->execute();

            } else {
                echo "O email não é válido!";
            }

            // criando o comando SQL que vai inserir o novo usuário
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam('email', $_POST['email']);
            $stmt->bindParam('senha', $_POST['senha']);
            $stmt->execute();
            if ($stmt->rowCount() >= 1) {
                echo "Você logou! <br>" ;
                session_start();
                $_SESSION["email_do_usuario"] = $_POST['email'];
                echo "Você iniciou a sessão! <br>";
                echo $_SESSION["email_do_usuario"];
            } else {
                echo "Você não logou!";
            }
        } else {
            // Mensagem que exibe que usuáriotente cadastrar com algum campo vazio.
            echo "Você deixou algum campo de email ou senha vazio, preencha para poder se cadastrar.";
        }
    } else {
        echo "";
    }
} catch (Exception $error) {
    echo $error;
}



