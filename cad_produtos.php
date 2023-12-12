<?php
    include('conexao.php');


    $nome = $_GET['nome'];
    $preco = $_GET['preco'];
    $peso = $_GET['peso'];
    $estoque = $_GET['estoque'];
    $descricao = $_GET['descricao'];
    $tipo = $_GET['tipo'];
    $empresa = $_GET['empresa'];
    $statos = $_GET['statos'];


    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($nome)) {

        $sql = "INSERT INTO produtos (nome, preco, peso, descricao, quant_estoque, Tipos_produto_id, Empresa_id, stats) VALUES ('$nome', '$preco', '$peso', '$descricao', $estoque, $tipo, $empresa, '$statos');";

        if($conn->query($sql) === TRUE) {

            include('tela_produtos.php');
            echo "<script>alert('Cadastro executado com sucesso.');</script>";
        }

    }

    $conn->close();
?>