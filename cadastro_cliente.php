<?php
    include('conexao.php');

    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $telefone = $_GET['telefone'];
    $nascimeto = $_GET['nascimento'];
    $imagem = $_GET['imagem'];
    $email = $_GET['email'];
    $senha1 = $_GET['senha1'];
    $senha2 = $_GET['senha2'];
    $statos = $_GET['statos'];
    

    if($senha1 == $senha2) {

        $senha = $senha1;

        if($_SERVER["REQUEST_METHOD"] == "GET" && isset($nome)) {

            $sql = "INSERT INTO cliente (nome, cpf, telefone, nascimento, imagem, email, senha, stats) VALUES ('$nome', '$cpf', '$telefone', $nascimeto, '$imagem', '$email', '$senha1', '$statos');";

            if($conn->query($sql) === TRUE) {

                include('index.php');
                echo "<script>alert('Cadastro executado com sucesso.');</script>";
            }

        }

    } else {

        include('tela_cadastro.php');
        
        echo "<script>alert('Confirmação da senha incorreta.');</script>";
    }

    $conn->close();
?>