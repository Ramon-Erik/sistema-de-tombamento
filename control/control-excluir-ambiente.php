<?php 
require_once('../model/ambientes.class.php');
if (isset($_POST['apagar-ambiente'])) {
    $amb =  new Ambiente;
    $amb->apagar_ambiente($_POST['ambientes']);
}
?>