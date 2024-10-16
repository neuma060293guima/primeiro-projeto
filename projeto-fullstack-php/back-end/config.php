<?php
// Propósito do config.php: Em vez de ter que criar o código que conecta
// com banco de dados toda hora, colocamos np cong.php e chamamos config.php
// todo momento que for necessário.
// Instalar extensão: PHP intelphense.

// IP do banco de dados
$address = "localhost";
// Nome do banco de dados
$database = "db_back_end";
// Nome do administrador do banco de dados.
$username = "root";
// Senha do administrador do banco de dados.
$password = "";

// cria um objeto do tipo "pdo" que faz uma conexão ao banco de dados com 
// argumentos aos parâmetros.
$pdo = new pdo("mysql:host=$address;dbname=$database",$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
