

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Este é um site de delivery onde nos unimos pequenas lojas a entregadores."/>

    <link rel="stylesheet" href="tela_produtos.css">
    <title>ALP moto</title>
</head>
<body>
    <header>
        
    </header>
    <main>
        <?php
            session_start();
            include('conexao.php');

            $id = $_SESSION['id'];

            $sql = "SELECT p.id, p.nome AS nome_p, p.preco, p.peso, t.nome AS nome_t, e.nome AS nome_e, p.descricao 
                    FROM produtos AS p, tipos_produto AS t, empresa AS e 
                    WHERE p.Tipos_produto_id = t.id AND p.Empresa_id = e.id AND p.Empresa_id = $id;";
            $result = $conn->query($sql);

            $colunas = array();
            $container = array();

            if ($result->num_rows > 0) { //busca por tipo do produto
                while ($row = $result->fetch_assoc()) {
                    
                    $colunas["nome"] = $row['nome_p'];
                    $colunas["preco"] = $row['preco'];
                    $colunas["peso"] = $row['peso'];
                    $colunas["tipo"] = $row['nome_t'];
                    $colunas["empresa"] = $row['nome_e'];
                    $colunas["descricao"] = $row['descricao'];

                    $container = array_merge($container, array($colunas));
                
                }

            } else {
                echo "<p class='aviso'>Nenhum produto cadastrado.</p>";
            }
            $conn->close();
        ?>

        <?php foreach ($container as $lista): ?>

            <div class="container">
                <div class="topo">
                    <h2><?php echo $lista['nome']?></h2>
                    <p><?php echo $lista['tipo']?></p>
                </div>
                <div class="meio">
                    <div class="meio-esq">
                        <p>R$ <?php echo $lista['preco']?></p>
                        <p><?php echo $lista['peso']?> Kg</p>
                        <p><?php echo $lista['empresa']?></p>
                    </div>
                    <div class="meio-dir">
                        <p><?php echo $lista['descricao']?></p>
                    </div>
                </div>
            </div>
    
        <?php endforeach; ?>
        

        <form action="tela_cad_produtos.php" method="get" class="com_mais">
            <input type="submit" value="+" class="mais">
        </form>
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