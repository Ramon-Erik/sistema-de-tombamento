<?php 
session_start();
if (isset($_SESSION['adm'])) {
    header('location: menu-principal/index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tombamento</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <article class="titulo">
            <h1>Sistema de Tombamento</h1>
        </article>
    </header>
    <main>
        <div class="funcionalidades">
            <div class="bloco">
                <div class="button"><a href="relatorio/ambientes/index.php" class="icone"></a></div>
                <div class="texto-func">
                    <a href="relatorio/ambientes/index.php"><h4>Ver ambientes cadastrados</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptatem ullam modi recusandae facilis obcaecati voluptatibus sint corrupti, quibusdam expedita.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="relatorio/itens/index.php" class="icone"></a></div>
                <div class="texto-func">
                    <a href="relatorio/itens/index.php"><h4>Ver itens cadastrados</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptatem ullam modi recusandae facilis obcaecati voluptatibus sint corrupti, quibusdam expedita.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="sign-in/index.php" class="icone"></a></div>
                <div class="texto-func">
                    <a href="href="sign-in/index.php""><h4>Fazer login</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptatem ullam modi recusandae facilis obcaecati voluptatibus sint corrupti, quibusdam expedita.</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de informática</p>
    </footer>
</body>

</html>