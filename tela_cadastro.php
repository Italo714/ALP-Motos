<?php 
    $aux = 1;
    $sla = [1];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Este é um site de delivery onde nos unimos pequenas lojas a entregadores."/>

    <link rel="stylesheet" href="login.css">
    <title>ALP moto</title>
</head>
<body>
    <header>
        <figure class="logo_cadastro">
            <img src="img/logo.png" alt="" >
        </figure>
    </header>
    <main class="formulario">

        <form method="post">
            <input type="submit" name="cliente" value="Cliente">
            <input type="submit" name="empresa" value="Empresa">
            <input type="submit" name="entregador" value="Entregador">
            
            <?php 
                if (isset($_POST['cliente'])) {
                    $aux = 1; 
                } else if (isset($_POST['empresa'])) {
                    $aux = 2;
                } else if (isset($_POST['entregador'])) {
                    $aux = 3;
                }
            ?>

        </form>

            
            <?php if ($aux == 1) foreach ($sla as $sla) : ?>
                
                <form action="cadastro_cliente.php" method="get">

                    <div class="info">
                        <p>Nome:</p>
                        <input type="text" name="nome" required>
                    </div>

                    <div class="info">
                        <p>CPF:</p>
                        <input type="text" name="cpf" required>
                    </div>

                    <div class="info">
                        <p>Telefone:</p>
                        <input type="text" name="telefone" required>
                    </div>

                    <div class="info">
                        <p>Data de nascimento:</p>
                        <input type="date" name="nascimento" required>
                    </div>

                    <div class="info">
                        <p>E-mail:</p>
                        <input type="email" name="email" required>
                    </div>
                
                    <div class="info">
                        <p>Senha:</p>
                        <input type="password" name="senha1" required>
                    </div>

                    <div class="info">
                        <p>Confirme a senha:</p>
                        <input type="password" name="senha2" required>
                    </div>

                    <input type="hidden" name="statos" value="ativo">
                    <input type="hidden" name="imagem" value="uploads/sem_foto.png">
                    
                    <div class="botao">
                        <input type="submit" name="submit" value="Cadastrar">
                    </div>
                </form> 
            <?php endforeach; ?>

            <?php if ($aux == 2) foreach ($sla as $sla) : ?>

                <form action="cadastro_empresa.php" method="get">

                    <div class="info">
                        <p>Nome:</p>
                        <input type="text" name="nome" required>
                    </div>
                    
                    <div class="info">
                        <p>Telefone:</p>
                        <input type="telefone" name="telefone" required>
                    </div>

                    <div class="info">
                        <p>E-mail:</p>
                        <input type="email" name="email" required>
                    </div>
        
                    <div class="info">
                        <p>Senha:</p>
                        <input type="password" name="senha1" required>
                    </div>

                    <div class="info">
                        <p>Confirme a senha:</p>
                        <input type="password" name="senha2" required>
                    </div>
                    
                    <input type="hidden" name="statos" value="ativo">
                    <input type="hidden" name="imagem" value="uploads/sem_foto.png">
                    
                    <div class="botao">
                        <input type="submit" value="Cadastrar">
                    </div>
                </form>
                    
            <?php endforeach; ?>

            <?php if ($aux == 3) foreach ($sla as $sla) : ?>
               
                <form action="cadastro_entragador.php" method="get">

                    <div class="info">
                        <p>Nome:</p>
                        <input type="text" name="nome" required>
                    </div>
                    
                    <div class="info">
                        <p>CPF:</p>
                        <input type="text" name="cpf" required>
                    </div>

                    <div class="info">
                        <p>Telefone:</p>
                        <input type="text" name="telefone" required>
                    </div>

                    <div class="info">
                        <p>Data de nascimento:</p>
                        <input type="date" name="nascimento" required>
                    </div>

                    <div class="info">
                        <p>E-mail:</p>
                        <input type="email" name="email" required>
                    </div>
        
                    <div class="info">
                        <p>Senha:</p>
                        <input type="password" name="senha1" required>
                    </div>

                    <div class="info">
                        <p>Confirme a senha:</p>
                        <input type="password" name="senha2" required>
                    </div>
                    
                    <input type="hidden" name="statos" value="ativo">
                    <input type="hidden" name="imagem" value="uploads/sem_foto.png">
                    
                    <div class="botao">
                        <input type="submit" value="Cadastrar">
                    </div>
                </form>
            <?php endforeach; ?>

        <form method="get" action="index.php" class="voltar">
            <input type="submit" value="Voltar">
        </form>
    </main>
</body>
</html>