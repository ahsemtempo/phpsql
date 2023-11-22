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

// Selecionar coletas agendadas
$sql = "SELECT * FROM coletas WHERE status = 'agendada'";
$result = $conn->query($sql);

// Exibir as coletas agendadas
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Data: " . $row["data_coleta"]. " - Endereço: " . $row["endereco"]. "<br>";
    }
} else {
    echo "Nenhuma coleta agendada.";
}

// Fechar a conexão
$conn->close();
?>