<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar um item</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../../srecursos/icone/favicon.png" type="image/x-icon">
</head>
<body>
    <?php 
    session_start();
    if (!isset($_SESSION['adm'])) {
        header('location: ../../index.php');
    }

    if ($_SESSION['item-apagado'] === 'sim') {
        $_SESSION['item-apagado'] = 'não';
        echo '<script>alert("Item apagado com sucesso!")</script>';
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
                    <a href="../../cadastrar/ambiente/index.php"><span class="material-icons">post_add</span>Cadastrar ambiente</a>
                </li>
                <li>
                    <a href="../../cadastrar/item/index.php"><span class="material-icons">upload_file</span>Cadastrar item</a>
                </li>
                <li>
                    <a href="../../excluir/ambiente/index.php"><span class="material-icons">delete</span>Apagar ambiente</a>
                </li>
                <li>
                    <a href="../../../control/control-login.php?exit=true"><span class="material-icons">logout</span>Sair</a>
                </li>
            </ul>
        </nav>
        <div class="fade"></div>
        <div class="titulo">
            <h1>Sistema de Tombamnto</h1>
            <h2>Apagar item</h2>
        </div>
    </header>
    <main>
        <form action="../../../control/control-excluir-item.php" method="post">
            <div class="campo">
                <div class="linha-form">
                    <label for="nomesItensId">Qual o nome do item?</label>
                </div>
                <div class="linha-form">
                    <select name="nomes-itens" id="nomesItensId">
                        <?php 
                        require_once('../../../model/item.class.php');
                        $item = new Item;
                        $item->listar_nomes_itens();
                        ?>
                    </select>
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="admsItensId">Quem registrou o item?</label>
                </div>
                <div class="linha-form">
                    <select name="adms-itens" id="admsItensId">
                        <?php 
                        require_once('../../../model/item.class.php');
                        $item = new Item;
                        $item->listar_adms_itens();
                        ?>
                    </select>
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="ambientesItensId">Em que ambiente está o item?</label>
                </div>
                <div class="linha-form">
                    <select name="ambientes-itens" id="ambientesItensId">
                        <?php 
                        require_once('../../../model/item.class.php');
                        $item = new Item;
                        $item->listar_ambientes_itens();
                        ?>
                    </select>
                </div>
            </div>
            <div class="campo">
                <input type="submit" class="btn-submit" name="procurar" value="Buscar item">
            </div>
        </form>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informátca</p>
    </footer>
</body>
</html>