<?php 
session_start();
if (!isset($_SESSION['adm'])) {
    // header('location: ../../index.php');
}?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar ambiente</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <header>
        <article class="title">
            <h1>Sistema de Tombamento</h1>
            <h2>Cadastrar ambiente</h2>
        </article>
    </header>
    <main>
        <form action="../../../control/control-cadastrar-ambiente.php" method="post">
            <div class="campo">
                <div class="linha-form">
                    <label for="nomeAmbienteId" class="required">Qual o nome do ambiente?</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="nome-ambiente" id="nomeAmbienteId" placeholder="Ex: Sala de aula" required>
                </div>
            </div>      
            <div class="campo">
                <div class="linha-form">
                    <label for="complementoId" class="required">Complemento</label>
                </div>
                <div class="linha-form">
                    <input type="text" name="complemento" id="complementoId" placeholder="Ex: 1" required>
                </div>
            </div>      
            <div class="campo">
                <input type="submit" class="btn-submit" name="cadastrar_ambiente" value="Cadastrar">
            </div>
        </form>
    </main>
    <footer>
        <p>
            Desenvolvido pelo curso de Informática
        </p>
    </footer>
</body>
</html>