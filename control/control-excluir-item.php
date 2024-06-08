<?php 
require_once('../model/item.class.php');
if (isset($_POST['procurar'])) {
    $item =  new Item();
    session_start();
    $_SESSION['nome-item'] = $_POST['nomes-itens'];
    $_SESSION['id_adm-item'] = $_POST['adms-itens'];
    $_SESSION['id_ambiente-item'] = $_POST['ambientes-itens'];
    $_SESSION['nome-ambiente-item'] = $item->pesquisar_nome_ambiente($_POST['ambientes-itens']);
    $_SESSION['nome-adm-item'] = $item->pesquisar_nome_adm($_POST['adms-itens']);
    header('location: ../view/excluir/item/lista-de-itens.php');
}
if (isset($_POST['apagar-item'])) {
    $item =  new Item();
    session_start();
    // echo $_POST['tombamento'];
    // echo '<pre>' . print_r($_POST);
    // echo '<pre>' . 'post item' . $_POST['item'] . '<br>post id' . $_POST['id']  . '<br>post nome'. $_POST['nome']  . '<br>post compl' . $_POST['compl'];
    $item->apagar_item($_POST['item'], $_SESSION['id_ambiente-item'], $_SESSION['nome-ambiente-item'], $_POST['compl']);
}
?>