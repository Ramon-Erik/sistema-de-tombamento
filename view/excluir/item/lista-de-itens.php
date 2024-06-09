<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar um item</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../../recursos/icone/favicon.png" type="image/x-icon">
</head>
<body>
    <?php 
    session_start();
    if (!isset($_SESSION['adm'])  and !isset($_SESSION['nome-item']) and !isset($_SESSION['id_adm-item']) and !isset($_SESSION['id_ambiente-item']) and !isset($_SESSION['nome-ambiente-item']) and !isset($_SESSION['nome-adm-item']) ) {
        header('location: ../../index.php');
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
            <h1>Sistema Patrimonial EEEP. Salaberga</h1>
            <div class="titulo-pagina">
                <h2>Apagar item</h2>
            </div>
        </div>
    </header>
    <main>
        <?php 
        echo '<h3>Mostrando resultados para <span class="underline">' . $_SESSION['nome-item'] . '</span class="underline"> em <span class="underline">' . $_SESSION['nome-ambiente-item'] . '</span class="underline"> cadastrados por <span class="underline">' . $_SESSION['nome-adm-item'] . '</span class="underline"></h3>'
        ?>
        <form action="../../../control/control-excluir-item.php" method="post">
            <div class="campo">
                <?php
                require_once('../../../model/item.class.php');
                $item =  new Item();
                $item->listar_itens($_SESSION['nome-item'], $_SESSION['id_ambiente-item'], $_SESSION['id_adm-item']);
                ?>
                </table>
            </div>
            <input type="hidden" name="compl" value="undefined">
            <dialog id="modalConfirmacao">
                <div class="texto">
                    <h4>Excluir item</h4>
                    <p>Tem certexa que deseja <strong>excluir</strong> esse item? Não será possivel desfazer essa ação.</p>
                </div>
                <div class="btns-dialog">
                    <input type="submit" name="apagar-item" value="Apagar item">
                    <button type="button" id="btnCancelarId">Cancelar</button>
                </div>
            </dialog>
            <dialog id="modalErro">
                <div class="texto">
                    <h4>Excluir</h4>
                    <p>É necessário selecionar o item que deseja excluir.</p>
                </div>
            </dialog>
            <div class="campo">
                <button type="button" class="btn-submit" id="btnAtivarModalId">Apagar item</button>
            </div>
        </form>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informátca</p>
    </footer>
    <script src="../../js/script.js"></script>
</body>
</html>