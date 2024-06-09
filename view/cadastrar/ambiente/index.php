<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar ambiente</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../../recursos/icone/favicon.png" type="image/x-icon">
</head>
<body>
    <?php 
    session_start();
    if (!isset($_SESSION['adm'])) {
        header('location: ../../index.php');
    }

    if ($_SESSION['ambiente-cadastrado'] === 'sim') {
        $_SESSION['ambiente-cadastrado'] = 'não';
        echo '<script>alert("Ambiente cadastrado com sucesso!")</script>';
    }
    ?>
    <header>
        <input type="checkbox" name="menuHamb" id="menuHambId" style="display:none;">
        <div class="container">
            <label for="menuHambId">
                <div class="hamburger"></div>
            </label>
        </div>
        <nav id="menu-links">
            <ul>
                <li>
                    <a href="../../menu-principal/index.php"><span class="material-icons">arrow_back</span>Voltar ao menu</a>
                </li>
                <li>
                    <a href="../../relatorio/ambientes/index.php"><span class="material-icons">note_alt</span>Ver ambientes</a>
                </li>
                <li>
                    <a href="../../relatorio/itens/index.php"><span class="material-icons">description</span>Ver itens</a>
                </li>
                <li>
                    <a href="../../cadastrar/item/index.php"><span class="material-icons">upload_file</span>Cadastrar item</a>
                </li>
                <li>
                    <a href="../../excluir/ambiente/index.php"><span class="material-icons">delete</span>Apagar ambiente</a>
                </li>
                <li>
                    <a href="../../excluir/item/index.php"><span class="material-icons">delete_forever</span>Apagar item</a>
                </li>
                <li>
                    <a href="../../../control/control-login.php?exit=true"><span class="material-icons">logout</span>Sair</a>
                </li>
            </ul>
        </nav>
        <div class="fade"></div>
        <div class="titulo">
            <h1>Sistema Patrimonial EEEP. Salaberga</h1>
            <div class="titulo-pagina">
                <h2>Apagar item</h2>
            </div>
        </div>
    </header>
    <main>
        <form action="../../../control/control-cadastrar-ambiente.php" method="post" autocomplete="off">
            <div class="campo">
                <div class="linha-form">
                    <label for="nomeAmbienteId" class="required">Qual o nome do ambiente?</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="nome-ambiente" id="nomeAmbienteId" placeholder="Ex: Sala de aula" required>
                </div>
            </div>      
            <div class="campo">
                <div class="linha-form">
                    <label for="complementoId" class="required">Complemento</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="complemento" id="complementoId" placeholder="Ex: 1" required>
                </div>
            </div>      
            <div class="campo">
                <input type="submit" class="btn-submit" name="cadastrar_ambiente" value="Cadastrar">
            </div>
        </form>
    </main>
    <footer>
        <p>
            Desenvolvido pelo curso de Informática
        </p>
    </footer>
</body>
</html>