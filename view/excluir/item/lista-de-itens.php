<?php 
session_start();
if (!isset($_SESSION['adm'])  and !isset($_SESSION['nome-item']) and !isset($_SESSION['id_adm-item']) and !isset($_SESSION['id_ambiente-item']) and !isset($_SESSION['nome-ambiente-item']) and !isset($_SESSION['nome-adm-item']) ) {
    header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar um item</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <header>
        <article class="titulo">
            <h1>Sistema de Tombamnto</h1>
            <h2>Apagar item</h2>
        </article>
    </header>
    <main>
        <?php 
        echo '<h3>Mostrando resultados para <span class="underline">' . $_SESSION['nome-item'] . '</span class="underline"> em <span class="underline">' . $_SESSION['nome-ambiente-item'] . '</span class="underline"> cadastrados por <span class="underline">' . $_SESSION['nome-adm-item'] . '</span class="underline"></h3>'?>
        <form action="../../../control/control-excluir-item.php" method="post">
            <div class="campo">
                <?php
                require_once('../../../model/item.class.php');
                $item =  new Item();
                $item->listar_itens($_SESSION['nome-item'], $_SESSION['id_ambiente-item'], $_SESSION['id_adm-item']);
                ?>
                </table>
            </div>
            <dialog id="modalConfirmacao">
                <div class="texto">
                    <h4>Excluir item</h4>
                    <p>Tem certexa que deseja <strong>excluir</strong> esse item? Não será possivel desfazer essa ação.</p>
                </div>
                <div class="btns">
                    <input type="submit" name="apagar-item" value="Apagar item">
                    <button type="button" id="btnCancelarId">Cancelar</button>
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