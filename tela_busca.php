<?php $aux = '';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Este é um site de delivery onde nos unimos pequenas lojas a entregadores."/>

    <link rel="stylesheet" href="tela_busca.css">
    <title>ALP moto</title>
</head>
<body>
    <header>
    <form method="POST">
        <div class="busca">
            <input type="text" name="busca" placeholder="Buscar..." required class="txtbusca">
            <input type="image" src="img/lupa2.png" alt="Submit" name='buscar' class="imgbusca">
            <?php if (isset($_POST['buscar'])) {
                $aux = 'a';
                } 
            ?>
        </div>
    </form>

        <?php
            include('conexao.php');

            

            $sql = "SELECT id, nome FROM tipos_produto;";
            $result = $conn->query($sql);

            $colunas = array();
            $container = array();

            
            if ($aux == '') {
                if ($result->num_rows > 0) { //exibe os tipos de produto

                    while ($row = $result->fetch_assoc()) {
                        
                        
                        $colunas["nome"] = $row['nome'];
                    
                        $container = array_merge($container, array($colunas));
                    
                    }
                    
                }
            } else {
                $termo = $_POST['busca'];

                $sql = "SELECT p.id, p.nome AS nome_p, p.preco, p.peso, t.nome AS nome_t, e.nome AS nome_e, p.descricao  
                FROM produtos AS p, tipos_produto AS t, empresa AS e 
                WHERE p.Tipos_produto_id = t.id AND p.Empresa_id = e.id AND p.nome = '$termo';";

                $resultado = $conn->query($sql);

            
                if ($resultado->num_rows > 0) { //busca por nome do produto

                    while ($row = $resultado->fetch_assoc()) {
                        
                        $colunas["nome"] = $row['nome_p'];
                        $colunas["preco"] = $row['preco'];
                        $colunas["peso"] = $row['peso'];
                        $colunas["empresa"] = $row['nome_e'];
                        $colunas["tipo"] = $row['nome_t'];
                        $colunas["descricao"] = $row['descricao'];

                        $container = array_merge($container, array($colunas));
                    
                    }

                } else {
                    $sql = "SELECT p.id, p.nome AS nome_p, p.preco, p.peso, t.nome AS nome_t, e.nome AS nome_e, p.descricao  
                    FROM produtos AS p, tipos_produto AS t, empresa AS e 
                    WHERE p.Tipos_produto_id = t.id AND p.Empresa_id = e.id AND e.nome = '$termo';";

                    $resultado = $conn->query($sql);

                    if ($resultado->num_rows > 0) { //busca por nome da empresa
                        echo "<h2>Resultados da Busca:</h2>";
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<p>{$row['nome']}</p>";
                            
                            $colunas["nome"] = $row['nome_p'];
                            $colunas["preco"] = $row['preco'];
                            $colunas["peso"] = $row['peso'];
                            $colunas["empresa"] = $row['nome_e'];
                            $colunas["tipo"] = $row['nome_t'];
                            $colunas["descricao"] = $row['descricao'];
            
                            $container = array_merge($container, array($colunas));
                        
                        }
        
                    } else {
                        $sql = "SELECT p.id, p.nome AS nome_p, p.preco, p.peso, t.nome AS nome_t, e.nome AS nome_e, p.descricao 
                        FROM produtos AS p, tipos_produto AS t, empresa AS e 
                        WHERE p.Tipos_produto_id = t.id AND p.Empresa_id = e.id AND t.nome = '$termo';";
                        $resultado = $conn->query($sql);

                        if ($resultado->num_rows > 0) { //busca por tipo do produto
                            echo "<h2>Resultados da Busca:</h2>";
                            while ($row = $resultado->fetch_assoc()) {
                                echo "<p>{$row['nome']}</p>";
                                
                                $colunas["nome"] = $row['nome_p'];
                                $colunas["preco"] = $row['preco'];
                                $colunas["peso"] = $row['peso'];
                                $colunas["empresa"] = $row['nome_e'];
                                $colunas["tipo"] = $row['nome_t'];
                                $colunas["descricao"] = $row['descricao'];
            
                                $container = array_merge($container, array($colunas));
                            
                            }
            
                        } else {
                            echo "<p>Nenhum resultado encontrado.</p>";
                        }
                    }
                }
            }

            $conn->close();
        ?>
    </header>
    <main>


        <?php if ($aux != '') foreach ($container as $lista): ?>

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

        
        <div class="topo">
            <?php if ($aux == '')  foreach ($container as $lista): //exibe os tipos de produto ?>

                <form action="tela_busca_tipo.php" method="post">
            
                    <input type='submit' name='botao' value=<?php echo $lista['nome']?> class="botao">
                    <input type="hidden" name="busca" value='<?php echo $lista['nome']?>'>
                
                </form>

            <?php endforeach; unset($colunas); unset($container);?>
        </div>
        
    </main>
    <footer>
        <figure class="opc 1">
            <a href="tela_casa_cliente.php">
                <img src="img/1.png">
                <figcaption><span>Início</span></figcaption>
            </a>
        </figure>

        <figure class="opc 2">
            <a href="tela_busca.php">
                <img src="img/2.png">
                <figcaption><span>Busca</span></figcaption>
            </a>
        </figure>

        <figure class="opc 3">
            <a href="">
                <img src="img/3.png">
                <figcaption><span>Chat</span></figcaption>
            </a>
        </figure>

        <figure class="opc 4">
            <a href="perfil_cliente.php">
                <img src="img/4.png">
                <figcaption><span>Perfil</span></figcaption>
            </a>
        </figure>
    </footer>
</body>
</html>