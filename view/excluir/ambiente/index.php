<?php 
if (!isset($_SESSION['adm'])) {
    header('location: ../../index.php');
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
</head>
<body>
    <header>
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
                <button type="button" class="btn-submit" id="btnAtivarModalId"><span class="material-icons">delete</span> Apagar ambiente</button>
            </div>
        </form>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informática</p>
    </footer>
    <script src="../../js/script.js"></script>
</body>
</html>