<?php
    extract($_POST, EXTR_OVERWRITE);

    include_once '../php-conexao-modelagem/pedidos_realizados.php';
    $ped_rea = new Pedidos_realizados();

    include_once '../php-conexao-modelagem/carrinho.php';
    $cart = new Carrinho();

    $ped_rea->setpreco_final($total);
    $ped_rea->setforma_pagamento($forma_pag);
    $ped_rea->setdata_compra();

    $cart->setcod_perfil($codper);
    $carrinhos = $cart->consultar();

    foreach($carrinhos as $row){

        $ped_rea->setcod_carrinho($row['cod_carrinho']);
        $pedidos_realizados = $ped_rea->consultar();

        if(empty($pedidos_realizados)){
            $ped_rea->setcod_carrinho($row['cod_carrinho']);
            $ped_rea->salvar();

        }
    }

    header("Location: ../acompanhar_pedido.php");

    
?>