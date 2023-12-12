<?php 
    session_start();
    include('conexao.php');

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM cliente WHERE id = $id;";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) { //busca por tipo do produto
        while ($row = $result->fetch_assoc()) {
            
            $nome = $row['nome'];
            $foto = $row['imagem'];

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

    <link rel="stylesheet" href='perfil.css'>
    <title>ALP Motos</title>
</head>

<body>
    <header>
        <figure class="cima">
            <div class="topo">
                <?php
                    echo "<img src='$foto'>"
                ?>  
                <?php
                    echo "<p>$nome</p>"
                ?>
            </div>
        </figure>
    </header>

    <main>

        <a class="indica">
            <img src="img/presente.png">
            <div class="aux">
                <h2>Ganhe R$10 indicando na ALP Moto</h2>
                <p>Convide seus amigos</p>
            </div>
        </a>

        <div class="principal">

            <a href="" class="container">
                <img src="img/notif.png">
                <div class="aux">
                    <h3>Notificações</h3>
                    <p>Minha central de notificações</p>
                </div>
                <span>></span>
            </a>

            <a href="" class="container">
                <img src="img/configuracao.png">
                <div class="aux">
                    <h3>Configurações</h3>
                    <p>Configure e personalize seu perfil</p>
                </div>
                <span>></span>
            </a>

            <a href="" class="container">
                <img src="img/carteira.png">
                <div class="aux">
                    <h3>Carteira</h3>
                    <p>Meu saldo e QR code</p>
                </div>
                <span>></span>
            </a>

            <a href="" class="container">
                <img src="img/cupom.png">
                <div class="aux">
                    <h3>Cupons</h3>
                    <p>Meus cupons de desconto</p>
                </div>
                <span>></span>
            </a>

            <a href="" class="clube">
            <img src="img/clube.png">
                <div class="aux">
                    <h3>Clube ALP Moto</h3>
                    <p>Meus pacotes de desconto</p>
                </div>
                <span>></span>
            </a>

            <a href="index.php" class="container">
                <img src="img/x.png">
                <div class="aux">
                    <h3>Sair</h3>
                    <p>Log-out</p>
                </div>
                <span></span>
            </a>

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