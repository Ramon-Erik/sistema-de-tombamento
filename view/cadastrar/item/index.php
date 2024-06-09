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
    <title>Faça o cadastro dos itens</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../../recursos/icone/favicon.png" type="image/x-icon">
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
                <h2>Cadastrar item</h2>
            </div>
        </div>
    </header>
    <main>
        <form action="../../../control/control-cadastrar-item.php" method="post" autocomplete="off">
            <div class="campo">
                <div class="linha-form">
                    <label for="nomeItemId" class="required">Qual o nome do item?</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="nome-item" id="nomeItemId" placeholder="Ex: Tablet" required>
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="marcaItemId">Qual a marca?</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="marca-item" id="marcaItemId" placeholder="Coloque quem fabricou o item. Ex: Multilaser">
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="modeloItemId">Qual o modelo?</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="modelo-item" id="modeloItemId" placeholder="Ex: M10">
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="estadotId">Qual o estado de conservação?</label>
                </div>
                <div class="linha-form">
                    <select name="estado" id="estadotId" required>
                            <option value="conservado">Conservado</option>
                            <option value="nao conservado">Não conervado</option>
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
                        <option value="num-serie">Número de série (S/N)</option>
                        <option value="contagem">Número de contagem</option>
                        <option value="serie">Cadastrar vários</option>
                    </select>
                </div>
                <div class="linha-form">
                    <input type="text" name="num-ident" id="numIdentId" placeholder="Ex: 2055893">
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="ambienteId">Em que ambiente esse item está?</label>
                </div>
                <?php 
                    echo '<div class="linha-form">';
                    echo '<select name="ambiente" id="ambienteId" required';
                    if (isset($_GET['id_a']) and isset($_GET['nome']) and isset($_GET['compl'])) {
                        $id_a = $_GET['id_a'];
                        $nome = $_GET['nome'];
                        $compl = $_GET['compl'];
                        echo " disabled>";
                        echo "<option value=\"$id_a\">$nome $compl</option>";
                        echo "<input type=\"hidden\" name=\"ambiente\" value=\"$id_a\">";
                    } else {
                        require_once('../../../model/ambientes.class.php');
                        $amb = new Ambiente;
                        $amb->listar_ambientes('opt');
                    }
                    echo '</select></div>';
                ?>
            </div>
            <div class="campo">
                <input type="submit" class="btn-submit" name="cadastrar_tombamento" value="Cadastrar">
            </div>
        </form>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informática</p>
    </footer>
    <script src="../../js/placeholder-item.js"></script>
</body>
</html>