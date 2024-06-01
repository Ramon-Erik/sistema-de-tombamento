<?php 
session_start();
if (!isset($_SESSION['adm'])) {
    header('location: ../../index.php');
}

if ($_SESSION['ambiente-apagado'] === 'sim') {
    $_SESSION['ambiente-apagado'] = 'não';
    echo '<script>alert("Ambiente apagado com sucesso!")</script>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar ambiente</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../../recursos/icone/favicon1.png" type="image/x-icon">
</head>
<body>
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
                    <a href="../../excluir/item/index.php"><span class="material-icons">delete_forever</span>Apagar item</a>
                </li>
                <li>
                    <a href="../../../control/control-login.php?exit=true"><span class="material-icons">logout</span>Sair</a>
                </li>
            </ul>
        </nav>
        <div class="fade"></div>
        <article class="titulo">
            <h1>Sistema de Tombamento</h1>
            <h2>Excluir ambiente</h1>
        </article>
    </header>
    <main>
        <form action="../../../control/control-excluir-ambiente.php" method="post">
            <div class="campo">
                <div class="linha-form">
                    <label for="ambienteId">Informe o ambiente que deseja excluir</label>
                </div>
                <div class="linha-form">
                    <select name="ambientes" id="ambienteId">
                        <option value="null">Escolha uma opção</option>
                        <?php 
                        require_once('../../../model/ambientes.class.php');
                        $amb = new Ambiente;
                        $amb->listar_ambientes();
                        ?>
                    </select>
                </div>
            </div>
            <dialog id="modalConfirmacao">
                <div class="texto">
                    <h4>Excluir item</h4>
                    <p>Tem certexa que deseja <strong>excluir</strong> esse item? Não será possivel desfazer essa ação.</p>
                </div>
                <div class="btns">
                    <input type="submit" name="apagar-ambiente" value="Apagar item">
                    <button type="button" id="btnCancelarId">Cancelar</button>
                </div>
            </dialog>
            <div class="campo">
                <button type="button" class="btn-submit" id="btnAtivarModalId">Apagar ambiente</button>
            </div>
        </form>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informática</p>
    </footer>
    <script src="../../js/script.js"></script>
</body>
</html>