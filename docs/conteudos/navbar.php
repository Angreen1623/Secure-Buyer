    <!-- Inicio da navbar -->
    <header>
    <!-- início navbar mais a cima -->
    <div class="topbar">
        <!-- div da lupa c/ seu texto-->
        <div class="left">
            <label>
                <!-- icone da lupa -->
                <img src="../conteudos/img/lupa.png" alt="">
                <!-- texto da lupa -->
                <input type="search" placeholder="Pesquisar">
            </label>
        </div>
        <!-- fim da lupa -->
        <!-- div da logo -->
        <div class="logo">
            <!-- se vc clicar na logo volta para o index -->
            <a href="./index.php">
                <!-- foto da logo -->
                <img src="../conteudos/img/logo-sb.png" alt="Icone">
            </a>
        </div>
        <!-- fim da logo -->
        <!-- div dos conteúdos da direita, carrinho e login -->
        <div class="right">
            <!-- grupo do login -->
            <div class="group">
                <!-- se clicar no link vai para criar conta -->
                <a class="singin-btn" href="<?php

                    $adm = false;
                    include_once 'php-conexao-modelagem/conexao.php';
                    $ip = new Conexao();
                    include_once 'php-conexao-modelagem/perfil.php';
                    $per = new Perfil();
                    if(!empty($_SERVER['HTTP_CLIENTE_IP'])){
                        $ip_maquina = $_SERVER['HTTP_CLIENTE_IP'];
                    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                        $ip_maquina = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    }else{
                        $ip_maquina = $_SERVER['REMOTE_ADDR'];
                    }
                    $ip->setendereco_ip($ip_maquina);
            
                    $ips = $ip->listar();
            
                    foreach($ips as $row){
                        if($ip_maquina == $row['endereco_ip']){
                            $codper = $row['cod_perfil'];
                        }
                    }

                    $per->setcod_perfil($codper);
                    $perfiis = $per->consultar();

                    foreach($perfiis as $row){
                        if($row['adm'] == 1){
                            $adm = true;
                        }
                    }
                
                if(isset($codper)){
                    echo 'perfil-padrao.php';
                }elseif(!isset($codper)){ 
                    echo 'entrar.php';
                }elseif($adm == true){
                    echo './adm-pages/admpage.php';
                }?>">
                    <!-- foto do login -->
                    <img src="../conteudos/img/user.png" alt="Logar">
                </a>
            </div>
            <!-- fim do grupo do login -->
            <!-- grupo do carrinho -->
            <div class="group">
                <!-- se clicar no link abre o carrinho -->
                <a id="bag-btn" class="bag-btn" href="#">
                    <!-- imagem da sacola -->
                    <img src="../conteudos/img/bag.png" alt="Sacola">
                </a>
            </div>
            <!-- fim do grupo -->
        </div>
        <!-- div do grupo -->
    </div>
    <!-- fim da barra superior -->
    </div>
    <nav>
        <ul>
            <li><a href="feminino.php">Feminino</a></li>
            <li><a href="masculino.php">Masculino</a></li>
            <li><a href="unissex.php">Unissex</a></li>
            <li>
                <a href="#">Ajuda</a>
                <ul class="submenu">
                    <li><a href="#">Sobre nos</a></li>
                    <li><a href="./fale_conosco.php">Fale Conosco</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<div class="bag">
    <span class="close-icon"><img src="../conteudos/img/close.png" alt="fechar"></span>
    <div class="bag-sidebar">
        <div class="bag-title">
            <h4>Meu carrinho</h4>
        </div>
        <div class="bag-body">

            <?php 
                include_once "./php-conexao-modelagem/carrinho.php";
                $cart = new Carrinho();
                include_once "./php-conexao-modelagem/produto.php";
                $prod = new Produto();
                include_once "./php-conexao-modelagem/imagem_produto.php";
                $img = new Imagem();
                include_once "./php-conexao-modelagem/perfil.php";
                $per = new Perfil();
                include_once "./php-conexao-modelagem/pedidos_realizados.php";
                $ped_rea = new Pedidos_realizados();

                $total = 0;
                if(isset($codper)){
                
                $pedido_realizado = false;

                $cart->setcod_perfil($codper);
                $carrinhos = $cart->consultar();
                $n = 0;
                $i = 0;
                $j = 0;
                $pedidos[] = "";

                foreach($carrinhos as $row){
                    $i++;

                    $ped_rea->setcod_carrinho($row['cod_carrinho']);
                    $pedidos_realizados = $ped_rea->consultar();

                    foreach($pedidos_realizados as $row2){
                        $n++;

                        if($row2['cod_carrinho'] == $row['cod_carrinho']){
                            $pedidos[$n] = $row2['cod_carrinho'];
                        }

                    }

                    if(!isset($pedidos[$i])){
                    $j++;

                    $carrinho_atual[$j] = intval($row['cod_carrinho']);
                    $prod->setcod_produto($row["cod_produto"]);
                    $produtos = $prod->consultar2();

                    foreach($produtos as $row2){

                        $preco = $row2["preco_produto"];
                        
            ?>

                        <div class="bag-item">
                            <div class="img">
                                <img src="<?php 
                                $img->setcod_produto($row["cod_produto"]);
                                $imagens = $img->consultar2();

                                foreach($imagens as $row3){

                                    $imagem = $row3["imagem_produto"];

                                    if(str_contains($imagem, "principal"))
                                    echo $imagem; }
                                ?>" alt="">
                            </div>
                            <div class="text">
                                <div class="bag-info">
                                    <h5><?php  echo $row2["titulo_produto"]; ?></h5>
                                    <h3>
                                        <?php 
                                    $per->setcod_perfil($row2["cod_perfil"]);
                                    $perfiis = $per->consultar();

                                    foreach($perfiis as $row3){
                                        echo $row3["nome_loja"];
                                    }
                                    ?></h3>
                                </div>
                                <h5 class="bag-price">R$ <?php  echo number_format($preco,2,",",".");?></h5>
                                <span>Quantidade: <?php  echo $row["qnt_pro"];?></span>
                                <div class="right">
                                    <form action="./script/bag.php" method="POST">
                                        <input type="hidden" name="num_item" value="<?php echo $carrinho_atual[$j]; ?>">
                                        <label for="btnexc"><img src="../conteudos/img/del.png" alt="deletar"></label>
                                        <input type="submit" name="btnexc" id="btnexc" style="display: none;">
                                    </form>
                                </div>
                            </div>
                        </div>
            <?php
                        }
                
                        extract($_POST, EXTR_OVERWRITE);
                        if(isset($btnadicionar))
                         {
                             include_once './php-conexao-modelagem/cupom.php';
                             $pro=new Cupom();
                             $pro -> setnome_cupom($cupom.'%');
                             $pro_bd = $pro->consultar();
                             foreach($pro_bd as $pro_mostrar)
                             {
                             ?>                                                  
                             $pro_mostrar["valorp_cupom"];
                           <?php              
                        }
                    }   
            
                        $total = $total + ($preco * $row["qnt_pro"]);
                    }
                    }
                }
            ?>

            <div class="bag-buy">
                <div class="group cupom">
                    <img src="../conteudos/img/cupom.png" alt="">
                    <form name="cupom"  method = "POST" action = ""><input type="text" name="cupom" id="cupom" placeholder="Adicionar cupom de desconto" maxlength="50" style="min-width: 345px;" required>
                    <button class="btnadicionar" name="btnadicionar">adicionar</button></form>
                  
                </div>
                <?php ?>
                <div class="itens">
                    <h4 class="left">Total:</h4>
                    <h3 class="right"> <?php echo number_format($total,2,",","."); ?></h3>
                </div>
                <div class="bag-end">
                    <?php if($total != 0){?>
                    <button class="btn" onclick="openPag()">Finalizar compra</button>
                    <?php }else{?>
                    <button class="btn" onclick="window.location.replace('./novidades.php')">Começe a comprar</button>
                    <?php }?>
                </div>
                <a href="novidades.php" style="color:#000;"> <span class="continue underline">Continuar comprando</span></a>
            </div>
        </div>
    </div>
</div>

<?php include_once 'finalizar_compra.php'; ?>