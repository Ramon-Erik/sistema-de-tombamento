<?php
require_once('../model/administrador.class.php'); 
if (isset($_POST['login'])) {
    $nome = $_POST['nome-usuario'];
    $senha = $_POST['senha'];
    $adm = new Administrador;
    $adm->login($nome, $senha);
}
if (isset($_GET['exit'])) {
    session_start();
    session_destroy();
    header('location: ../view/index.php');
}
?>