<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Este é um site de delivery onde nos unimos pequenas lojas a entregadores."/>

    <link rel="stylesheet" href="login.css">
    <title>ALP motos</title>
</head>
    <body>

            <header>

                <figure class="logo">

                    <img src="img/logo.png" alt="" >

                </figure>

            </header>

            <main>

                <form method="get" action="login.php" class="formulario">
                    
                    <div class="info">

                        <input type="e-mail" name="email" placeholder="E-mail" required>

                    </div>
        
                    <div class="info">

                        <input type="password" name="senha" placeholder="Senha" required>

                    </div>

					
        
                    <div class="inline">

                        <div class="botao">

                            <select name="tabela">

                                <option value="cliente">Cliente</option>

                                <option value="entregador">Entregador</option>

                                <option value="empresa">Empresa</option>

                            </select>

                        </div>
                        
                        <div class="botao">

                            <input type="submit" name="enviar">

                        </div>

                    </div>

					<div class="botao">

                        <a href="tela_cadastro.php">Cadastrar</a>

                    </div>

                </form>

            </main>

    </body>

</html>


