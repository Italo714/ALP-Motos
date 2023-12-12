<?php
    include('conexao.php');

    

    $sql = "SELECT id, nome FROM tipos_produto;";
    $result = $conn->query($sql);

    $colunas = array();
    $container = array();

    $colunas2 = array();
    $container2 = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            
            
            $colunas["nome"] = $row['nome'];
        
            $container = array_merge($container, array($colunas));
        
        }
        
    }

    $sql2 = "SELECT p.id, p.nome AS nome_p, p.preco, p.peso, t.nome AS nome_t, e.nome AS nome_e, p.descricao 
            FROM produtos AS p, tipos_produto AS t, empresa AS e 
            WHERE p.Tipos_produto_id = t.id AND p.Empresa_id = e.id;";
                $resultado = $conn->query($sql2);

            
    if ($resultado->num_rows > 0) {

        while ($row = $resultado->fetch_assoc()) {
            
            $colunas2["nome"] = $row['nome_p'];
            $colunas2["preco"] = $row['preco'];
            $colunas2["peso"] = $row['peso'];
            $colunas2["tipo"] = $row['nome_t'];
            $colunas2["empresa"] = $row['nome_e'];
            $colunas2["descricao"] = $row['descricao'];

            $container2 = array_merge($container2, array($colunas2));
        
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Este é um site de delivery onde nos unimos pequenas lojas a entregadores."/>

    <link rel="stylesheet" href="tela_casa_cliente.css">
    <title>ALP moto</title>
</head>
<body>
    <header>
        <div class="topo">
            <?php foreach ($container as $lista): //exibe os tipos de produto ?>

                <form action="tela_busca_tipo.php" method="post">

                    <input type='submit' name='botao' value=<?php echo $lista['nome']?> class="botao">
                    <input type="hidden" name="busca" value='<?php echo $lista['nome']?>'>

                </form>

            <?php endforeach; unset($colunas); unset($container); ?>
        </div>
    </header>
    <main>
        <?php foreach ($container2 as $lista2): //busca por nome do produto ?> 

            <div class="container">
                <div class="topo">
                    <h2><?php echo $lista2['nome']?></h2>
                    <p><?php echo $lista2['tipo']?></p>
                </div>
                <div class="meio">
                    <div class="meio-esq">
                        <p>R$ <?php echo $lista2['preco']?></p>
                        <p><?php echo $lista2['peso']?> Kg</p>
                        <p><?php echo $lista2['empresa']?></p>
                    </div>
                    <div class="meio-dir">
                        <p><?php echo $lista2['descricao']?></p>
                    </div>
                </div>
            </div>
            
        <?php endforeach; unset($colunas2); unset($container2); ?>

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