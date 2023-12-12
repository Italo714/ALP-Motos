
<?php

    session_start();
    include("conexao.php");

    $email = $_GET["email"];
    $senha = $_GET["senha"];
    $tabela = $_GET["tabela"];

    // Utilize prepared statements para prevenir injeção SQL
    $sql = "SELECT senha, id FROM $tabela WHERE email = ?";

    // Prepara a consulta
    $stmt = $conn->prepare($sql);

    // Associa o parâmetro
    $stmt->bind_param("s", $email);

    // Executa a consulta
    $stmt->execute();

    // Obtém o resultado
    $result = $stmt->get_result();

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        // Obtém a senha do resultado
        $row = $result->fetch_assoc();
        $senhaBanco = $row["senha"];

        // Verifica se a senha fornecida corresponde à senha no banco de dados
        if ($senha == $senhaBanco) {
            $_SESSION['id'] = $row["id"];
            include("tela_casa_{$tabela}.php");

        } else {
            include('index.php');
            echo "<script>alert('Senha incorreta.');</script>";

        }
    } else {     
        include('index.php');
        echo "<script>alert('E-mail não encontrado.');</script>";

    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
?>
