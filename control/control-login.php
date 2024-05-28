<?php
require_once('../model/administrador.class.php'); 
if (isset($_POST['login'])) {
    $nome = $_POST['nome-usuario'];
    $senha = $_POST['senha'];
    $adm = new Administrador;
    $adm->login($nome, $senha);
}
?>