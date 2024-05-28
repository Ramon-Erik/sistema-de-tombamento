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
    <title>Faça o tombamnto dos itens</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <header>
        <article class="titulo">
            <h1>Sistema de Tombamnto</h1>
            <h2>Tombar item</h2>
        </article>
    </header>
    <main>
        <form action="../../../control/control-cadastrar-item.php" method="post">
            <div class="campo">
                <div class="linha-form">
                    <label for="nomeItemId" class="required">Qual o nome do item?</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="nome-item" id="nomeItemId" placeholder="Ex: monitor" required>
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="marcaItemId">Qual a marca?</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="marca-item" id="marcaItemId" placeholder="Coloque quem fabricou o item. Ex: samsung">
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="modeloItemId">Qual o modelo?</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="modelo-item" id="modeloItemId" placeholder="Ex: ">
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="estadotId">Qual o estado de conservação?</label>
                </div>
                <div class="linha-form">
                <select name="estado" id="estadotId" required>
                        <option value="conservado">Conservado</option>
                        <option value="n-conservao">Não conervado</option>
                    </select>
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="tipoIdentId">Identificação do item</label>
                </div>
                <div class="linha-form">
                    <select name="tipo-ident" id="tipoIdentId" required>
                        <option value="num-tomb">Número de tombamento</option>
                        <option value="num-serie">Número de série</option>
                        <option value="contagem">Número de contagem</option>
                    </select>
                </div>
                <div class="linha-form">
                    <input type="text" name="num-ident" id="numIdentId" required>
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="ambienteId">Em que ambiente esse item está?</label>
                </div>
                <div class="linha-form">
                    <select name="ambiente" id="ambienteId" required>
                        <?php 
                        require_once('../../../model/ambientes.class.php');
                        $amb = new Ambiente;
                        $amb->listar_ambientes();
                        ?> 
                    </select>
                </div>
            </div>
            <div class="campo">
                <input type="submit" class="btn-submit" name="cadastrar_tombamento" value="Cadastrar">
            </div>
        </form>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informática</p>
    </footer>
</body>
</html>