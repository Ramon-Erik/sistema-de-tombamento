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
        <div class="titulo-pagina">
            <h2>O que deseja fazer?</h2>
        </div>
        <section class="ambientes">
            <?php 
                require_once('../../model/ambientes.class.php');
                $ambiente = new Ambiente;
                $ambiente->listar_ambientes('a');
            ?>
        </section>
    </main>
    <footer>
        <p>Desenvolvido pelo curso de Informática</p>
    </footer>
</body>
</html>