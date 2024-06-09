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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../recursos/icone/favicon.png" type="image/x-icon">
</head>

<body>
    <header>
        <div class="titulo">
            <h1>Sistema Patrimonial EEEP Salaberga</h1>
            <h2>Início</h2>
        </div>
    </header>
    <main>
        <div class="funcionalidades">
            <div class="bloco">
                <div class="button"><a href="relatorio/ambientes/index.php" class="icone"> <span class="material-icons">note_alt</span></a></div>
                <div class="texto-func">
                    <a href="relatorio/ambientes/index.php"><h4>Ver ambientes cadastrados</h4></a>
                    <p>Essa função permite aos usuários visualizar uma lista completa de todos os ambientes previamente registrados no sistema.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="relatorio/itens/index.php" class="icone"> <span class="material-icons">description</span></a></div>
                <div class="texto-func">
                    <a href="relatorio/itens/index.php"><h4>Ver itens cadastrados</h4></a>
                    <p>Essa função permite aos usuários acessar uma lista completa de todos os itens previamente registrados no sistema.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="sign-in/index.php" class="icone"> <span class="material-icons" >person</span></a></div>
                <div class="texto-func">
                    <a href="sign-in/index.php"><h4>Fazer login</h4></a>
                    <p>Ao fazer login, os usuários podem acessar os recursos e funcionalidades do sistema, garantindo segurança e controle de acesso aos dados e informações.</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de informática</p>
    </footer>
</body>

</html>