<?php
extract($_POST, EXTR_OVERWRITE);

include_once "../php-conexao-modelagem/carrinho.php";
$cart = new Carrinho();

$cart->setcod_carrinho($num_item);
$cart->excluir();

header("Location: ../index.php");

?>