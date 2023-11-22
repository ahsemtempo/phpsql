<?php
// Conectar ao banco de dados (substitua pelos seus próprios detalhes de conexão)
$servername = "localhost:3306";
$username = "root";
$password = "@Carrodecorrida123";
$dbname = "gestao_residuos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Processar o formulário de agendamento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_coleta = $_POST["data_coleta"];
    $endereco = $_POST["endereco"];
    $tipo_residuo = $_POST["tipo_residuo"];

    // Inserir dados na tabela coletas
    $sql = "INSERT INTO coletas (data_coleta, endereco, tipo_residuo) VALUES ('$data_coleta', '$endereco', '$tipo_residuo')";

    if ($conn->query($sql) === TRUE) {
        echo "Coleta agendada com sucesso!";
    } else {
        echo "Erro ao agendar coleta: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>