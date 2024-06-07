<?php
require("../model/item.class.php");

if(isset($_POST['cadastrar_tombamento'])){
    $nome = $_POST['nome-item'];
    $marca = $_POST['marca-item'];
    $modelo = $_POST['modelo-item'];
    $estado = $_POST['estado'];
    $tombamento = $_POST['num-ident'];
    $id_ambiente = $_POST['ambiente']; 
    session_start();
    $id_responsavel = $_SESSION['adm']; 

    $item = new Item;
    if ($_POST['tipo-ident'] === 'serie') {
        $item->cadastrar_varios_itens($nome, $estado,$modelo,$marca,$tombamento,$id_ambiente,$id_responsavel, []);
    } else {
        $item->cadastrar_item($nome, $estado,$modelo,$marca,$tombamento,$id_ambiente,$id_responsavel);
    }
}
?>