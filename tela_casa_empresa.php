<?php
    include('conexao.php');

    $colunas2 = array();
    $container2 = array();

    $sql2 = "SELECT pd.id, pd.preco, pd.peso_total AS peso, c.nome
            FROM produtos AS pr, pedidos AS pd, empresa AS e, produto_pedido AS pp, cliente AS c
            WHERE pp.produtos_id = pr.id AND pr.Empresa_id = e.id AND pp.pedidos_id = pd.id AND pd.cliente_id = c.id;";

    $resultado = $conn->query($sql2);


    if ($resultado->num_rows > 0) {

        while ($row = $resultado->fetch_assoc()) {
            

            $colunas2["preco"] = $row['preco'];
            $colunas2["peso"] = $row['peso'];
            $colunas2["nome"] = $row['nome'];


            $container2 = array_merge($container, array($colunas));
        
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Este é um site de delivery onde nos unimos pequenas lojas a entregadores."/>

    <link rel="stylesheet" href="tela_casa_empresa.css">
    <title>ALP motos</title>
</head>
<body>
    <header>

    </header>
    <main>
        <?php foreach ($container2 as $lista): //busca por nome do produto ?> 
            <div>
                <figure>
                    <img src="" alt="Foto do produto">
                </figure>
                
                <p><?php echo $lista['nome']?></p>
                <p><?php echo $lista['preco']?></p>
                <p><?php echo $lista['peso']?></p>

            </div>
            
        <?php endforeach; ?>

    </main>
    <footer>
        <figure class="opc 1">
            <a href="tela_casa_empresa.php">
                <img src="img/1.png">
                <figcaption><span>Início</span></figcaption>
            </a>
        </figure>

        <figure class="opc 2">
            <a href="tela_produtos.php">
                <img src="img/6.png">
                <figcaption><span>Produtos</span></figcaption>
            </a>
        </figure>

        <figure class="opc 3">
            <a href="">
                <img src="img/3.png">
                <figcaption><span>Chat</span></figcaption>
            </a>
        </figure>

        <figure class="opc 4">
            <a href="perfil_empresa.php">
                <img src="img/4.png">
                <figcaption><span>Perfil</span></figcaption>
            </a>
        </figure>
    </footer>
</body>
</html>