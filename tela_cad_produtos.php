<?php

    include('conexao.php');

    $sql = "SELECT id, nome FROM tipos_produto;";
    $result = $conn->query($sql);

    $colunas = array();
    $container = array();

    if ($result->num_rows > 0) { //exibe os tipos de produto

        while ($row = $result->fetch_assoc()) {
            
            $colunas["id"] = $row['id'];
            $colunas["nome"] = $row['nome'];
        
            $container = array_merge($container, array($colunas));
        
        }
        
    }

    $conn->close();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Este é um site de delivery onde nos unimos pequenas lojas a entregadores."/>

    <link rel="stylesheet" href="tela_cad_produtos.css">
    <title>ALP moto</title>
</head>
<body>
    <header>
        <figure class="logo_cadastro">
            <img src="img/logo.png" alt="" >

        </figure>
    </header>
    <main>
                
        <form action="cad_produtos.php" method="get">

            <div class="info">
                <p>Nome do produto:</p>
                <input type="text" name="nome" required>
            </div>

            <div class="info">
                <p>Preço:</p>
                <input type="number" name="preco" required>
            </div>

            <div class="info">
                <p>Peso:</p>
                <input type="number" name="peso" required>
            </div>

            <div class="info">
                <p>Descrição:</p>
                <textarea name="descricao" id="descricao" cols="30" rows="10" required></textarea>
            </div>
            <div class="inline">
                <div class="botao">

                    <select name="tipo">
                        <?php foreach ($container as $tipos): ?>
                            <option value="<?php echo $tipos['id']?>"><?php echo $tipos['nome']?></option>
                        <?php endforeach; ?>
                    </select>

                </div>

                <input type="hidden" name="estoque" value= 1 >
                <input type="hidden" name="statos" value="ativo">
                <input type="hidden" name="empresa" value="<?php session_start(); echo $_SESSION['id'];?>">
                
                <div class="botao">
                    <input type="submit" name="submit" value="Cadastrar">
                </div>
            </div>
        </form> 
        <div class="link">
            <a href="tela_produtos.php">Voltar</a>
        </div>
    </main>
</body>
</html>