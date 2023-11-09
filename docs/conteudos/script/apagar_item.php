<?php
extract($_POST, EXTR_OVERWRITE);

include_once "../php-conexao-modelagem/pedidos_realizados.php";
$ped = new Pedidos_realizados();
include_once "../php-conexao-modelagem/carrinho.php";
$cart = new Carrinho();

$ped->setcod_carrinho($pedido);
$ped->excluir();
$cart->setcod_carrinho($pedido);
$cart->excluir();

header("Location: ../index.php");

?>