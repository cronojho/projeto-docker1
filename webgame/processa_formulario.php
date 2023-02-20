<?php
// Configuração do banco de dados
$servername = "webgame_db_1";
$username = "root";
$password = "Senha123";
$dbname = "testedb";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("A conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Coleta os dados enviados pelo formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

// Valida os dados
if (empty($nome) || empty($email) || empty($telefone)) {
    echo "Por favor, preencha todos os campos do formulário.";
} else {
    // Insere os dados no banco de dados
    $sql = "INSERT INTO contatos (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

