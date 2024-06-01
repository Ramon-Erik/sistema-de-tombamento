<?php 
session_start();
if (!isset($_SESSION['adm'])) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tombamento</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
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
                <div class="button"><a href="../relatorio/ambientes/index.php" class="icone"> <span class="material-icons">note_alt</span></a></div>
                <div class="texto-func">
                    <a href="../relatorio/ambientes/index.php">
                        <h4>Ver ambientes cadastrados</h4>
                    </a>
                    <p>Essa função permite aos usuários visualizar uma lista completa de todos os ambientes previamente registrados no sistema.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="../relatorio/itens/index.php" class="icone"><span class="material-icons">description</span></a></div>
                <div class="texto-func">
                    <a href="../relatorios/itens/index.php">
                        <h4>Ver itens cadastrados</h4>
                    </a>
                    <p>Essa função permite aos usuários acessar uma lista completa de todos os itens previamente registrados no sistema.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="../cadastrar/ambiente/index.php" class="icone"><span class="material-icons">post_add</span></a></div>
                <div class="texto-func">
                    <a href="../cadastrar/ambiente/index.php">
                        <h4>Cadastrar um ambiente</h4>
                    </a>
                    <p>Essa função oferece aos usuários a capacidade de adicionar novos ambientes ao sistema e inserir dados, como nome.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="../cadastrar/item/index.php" class="icone"><span class="material-icons">upload_file</span></a></div>
                <div class="texto-func">
                    <a href="../cadastrar/item/index.php">
                        <h4>Cadastrar um item</h4>
                    </a>
                    <p>Essa função permite aos usuários adicionar novos itens ao sistema e inserir dados, como marca e modelo.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="../excluir/ambiente/index.php" class="icone"><span class="material-icons">delete</span></a></div>
                <div class="texto-func">
                    <a href="../excluir/ambiente/index.php">
                        <h4>Excluir um ambiente</h4>
                    </a>
                    <p>Essa funcionalidade é útil para manter o sistema organizado, removendo itens obsoletos ou não mais necessários.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="../excluir/item/index.php" class="icone"><span class="material-icons">delete_forever</span></a></div>
                <div class="texto-func">
                    <a href="../excluir/item/index.php">
                        <h4>Excluir um item</h4>
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptatem ullam modi recusandae facilis obcaecati voluptatibus sint corrupti, quibusdam expedita.</p>
                </div>
            </div>
            <div class="bloco">
                <div class="button"><a href="../../control/control-login.php?exit=true" class="icone"><span class="material-icons">logout</span></a></div>
                <div class="texto-func">
                    <a href="">
                        <h4>Sair da conta</h4>
                    </a>
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