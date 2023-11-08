<?php
extract($_POST, EXTR_OVERWRITE);

include_once "../php-conexao-modelagem/pedidos_realizados.php";
$ped = new Pedidos_realizados();

$ped->setcod_carrinho($pedido);
$ped->excluir();

header("Location: ../index.php");

?>