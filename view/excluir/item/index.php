<?php 
session_start();
if (!isset($_SESSION['adm'])) {
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