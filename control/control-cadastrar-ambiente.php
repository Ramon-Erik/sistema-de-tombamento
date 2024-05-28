<?php 
require_once('../model/ambientes.class.php');
if (isset($_POST['cadastrar_ambiente'])) {
    $nome = $_POST['nome-ambiente'];
    $complemento = $_POST['complemento'];
    session_start();
    $adm = $_SESSION['adm'];
    $amb = new Ambiente;
    $amb->cadastrar_ambientes($nome, $complemento, $adm);
}
?>