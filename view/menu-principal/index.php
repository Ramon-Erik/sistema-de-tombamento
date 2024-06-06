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
    <title>Menu principal</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../../recursos/icone/favicon.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="titulo">
            <h1>Sistema Patrimonial EEEP. Salaberga</h1>
        </div>
    </header>
    <main>
        <form action="../../control/control-excluir-ambiente.php" method="post">
            <div class="titulo-pagina">
                <h2>O que deseja fazer?</h2>
            </div>
            <dialog id="modalConfirmacao">
                <div class="texto">
                    <h4>Excluir ambiente</h4>
                    <p>Tem certexa que deseja <strong>excluir</strong> esse ambiente? Não será possivel desfazer essa ação.</p>
                </div>
                <div class="btns-dialog">
                    <input type="submit" name="apagar-ambiente" value="Apagar ambiente">
                    <button type="button" id="btnCancelarId">Cancelar</button>
                </div>
            </dialog>
            <dialog id="modalErro">
                <div class="texto">
                    <h4>Excluir</h4>
                    <p>É necessário selecionar o ambiente que deseja excluir.</p>
                </div>
            </dialog>
            <div class="btns">
                <div class="btn-novo">
                    <a href="../cadastrar/ambiente/index.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>Novo ambiente</a>
                </div>
                <div class="btn-delete">
                    <button type="button" id="btnAtivarModalId"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>Apagar ambiente</button>
                </div>
            </div>
            <section class="ambientes">
                <?php 
                    require_once('../../model/ambientes.class.php');
                    $ambiente = new Ambiente;
                    $ambiente->listar_ambientes('a');
                ?>
            </section>
        </form>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informática</p>
    </footer>
    <script src="../js/script.js"></script>
</body>
</html>