<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar ambiente</title>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"/>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../../recursos/icone/favicon.png" type="image/x-icon">
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
    if ($_SESSION['item-cadastrado']  === 'sim') {
        $_SESSION['item-cadastrado'] = 'não';
        echo '<script>alert("Item cadastrado com sucesso!")</script>';
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
                    <a href="../menu-principal/index.php"><span class="material-icons">arrow_back</span>Voltar ao menu</a>
                </li>
                <li>
                    <a href="../relatorio/ambientes/index.php"><span class="material-icons">note_alt</span>Ver ambientes</a>
                </li>
                <li>
                    <a href="../relatorio/itens/index.php"><span class="material-icons">description</span>Ver itens</a>
                </li>
                <li>
                    <a href="../cadastrar/ambiente/index.php"><span class="material-icons">post_add</span>Cadastrar ambiente</a>
                </li>
                <li>
                    <a href="../excluir/ambiente/index.php"><span class="material-icons">delete</span>Apagar ambiente</a>
                </li>
                <li>
                    <a href="../excluir/item/index.php"><span class="material-icons">delete_forever</span>Apagar item</a>
                </li>
                <li>
                    <a href="../../control/control-login.php?exit=true"><span class="material-icons">logout</span>Sair</a>
                </li>
            </ul>
        </nav>
        <div class="fade"></div>    
        <div class="titulo">
            <h1>Sistema Patrimonial EEEP. Salaberga</h1>
            <div class="titulo-pagina">
                <h2>
                    <?php 
                    if (isset($_GET['nome']) and isset($_GET['compl']) and isset($_GET['id'])) {
                        echo "$_GET[nome] $_GET[compl]";
                    } else {
                        header('location: ../menu-principal/index.php');
                    }
                    ?>
                </h2>
            </div>
        </div>
    </header>
    <main>
        <div class="titulo-pagina">
            <h2>O que deseja fazer?</h2>
        </div>
        <form action="../../control/control-excluir-item.php" method="post">
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
            <div class="btns">
                <div class="btn-novo">
                    <a href="../cadastrar/item/index.php?id_a=<?php echo $_GET['id'] . '&nome=' . $_GET['nome'] . '&compl=' . $_GET['compl'];?>">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                        Novo item
                    </a>
                </div>
                <div class="btn-delete">
                    <button type="button" id="btnAtivarModalId">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        Apagar item
                    </button>
                </div>
            </div>
            <section class="ambientes">
                <?php
                    require_once('../../model/item.class.php');
                    $item = new Item;
                    $item->listar_itens_v2($_GET['id']);
                ?>
            </section>
            <?php 
                echo "<input type=\"hidden\" name=\"id\" value=\"$_GET[id]\">";
                echo "<input type=\"hidden\" name=\"nome\" value=\"$_GET[nome]\">";
                echo "<input type=\"hidden\" name=\"compl\" value=\"$_GET[compl]\">";
            ?>
        </form>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informática</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>  
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>  
    <script src="../js/tabelas.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>