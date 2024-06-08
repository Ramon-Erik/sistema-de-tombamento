<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../../recursos/icone/favicon.png" type="image/x-icon">
</head>
<body>
<?php 
    session_start();
    if (isset($_SESSION['adm']) and $_SESSION['adm'] === 'erro-senha') {
        echo '<script>alert("A senha informada está errada!")</script>';
        $_SESSION['adm'] = '...';
    }
    ?>
    <header>
        <div class="titulo">
            <h1>Sistema Patrimonial EEEP Salaberga</h1>
            <h2>Login</h2>
        </div>
    </header>
    <main>
        <form action="../../control/control-login.php" method="post">
            <div class="campo">
                <div class="linha-form"><label for="nomeUsrId">
                    Selecione seu usuário</label>
                </div>
                <div class="linha-form">
                    <select name="nome-usuario" id="nomeUsrId">
                        <?php 
                        require_once('../../model/administrador.class.php');
                        $adm = new Administrador;
                        $adm->listar_adms();
                        ?>
                    </select>
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <label for="senhaId">Informe sua senha</label>
                </div>
                <div class="linha-form">
                    <input type="password" name="senha" id="senhaId">
                </div>
            </div>
            <div class="campo">
                <div class="linha-form">
                    <input class="btn-submit" type="submit" name="login" value="Logar">
                </div>
            </div>
        </form>
    </main>
    <footer>
    <footer>
        <p>Desenvolvido pelo curso de informática</p>
    </footer>
</body>
</html>