<?php
    extract($_POST, EXTR_OVERWRITE);

    include_once '../php-conexao-modelagem/pedidos_realizados.php';
    $ped_rea = new Pedidos_realizados();

    include_once '../php-conexao-modelagem/carrinho.php';
    $cart = new Carrinho();

    $pedido_realizado = false;

    $ped_rea->setpreco_final($total);
    $ped_rea->setforma_pagamento($forma_pag);
    $ped_rea->setdata_compra();

    $cart->setcod_perfil($codper);
    $carrinhos = $cart->consultar();

    foreach($carrinhos as $row){

        $ped_rea->setcod_carrinho($row['cod_carrinho']);
        $pedidos_realizados = $ped_rea->consultar();

        foreach($pedidos_realizados as $row2){
            $cod_realizado = $row2['cod_carrinho'];
            if($cod_realizado == $row['cod_carrinho']){
                $pedido_realizado = true;
            }
        }
        if($pedido_realizado == false){
            $ped_rea->setcod_carrinho($row['cod_carrinho']);
            $ped_rea->salvar();
        }
    }

    header("Location: ../acompanhar_pedido.php");
?>