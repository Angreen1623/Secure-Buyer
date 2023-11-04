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
                    include_once 'php-conexao-modelagem/conexao.php';
                    $ip = new Conexao();
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
                        if($ip_maquina = $row['endereco_ip']){
                            $codper = $row['cod_perfil'];
                        }
                    }
                
                if(isset($codper)){
                    echo 'perfil-padrao.php';
                }else{ 
                    echo 'entrar.php';
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
            <li><a href="#">Feminino</a></li>
            <li><a href="#">Masculino</a></li>
            <li>
                <a href="#">Ajuda</a>
                <ul class="submenu">
                    <li><a href="#">Sobre nos</a></li>
                    <li><a href="#">Fale Conosco</a></li>
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
                $realizados = new Pedidos_realizados();
                if(isset($codper)){

                $total = 0;

                $cart->setcod_perfil($codper);
                $carrinhos = $cart->consultar();

                foreach($carrinhos as $row){
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
                                    <h5><?php  echo $row2["titulo_produto"];?></h5>
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
                                    <img src="../conteudos/img/del.png" alt="deletar">
                                </div>
                            </div>
                        </div>

            <?php
                        }

                        $total = $total + ($preco * $row["qnt_pro"]);

                    }
                }
            ?>

            <div class="bag-buy">
                <div class="group cupom">
                    <img src="../conteudos/img/cupom.png" alt="">
                    <h3>Adicionar cupom de desconto</h3>
                </div>
                <div class="itens">
                    <h4 class="left">Frete:</h4>
                    <div class="group right">
                        <img src="../conteudos/img/frete.png" alt="">
                        <h3 class="underline">Calcular</h3>
                    </div>
                </div>
                <div class="itens">
                    <h4 class="left">Total:</h4>
                    <h3 class="right"> <?php echo number_format($total,2,",","."); ?></h3>
                </div>
                <div class="bag-end">
                    <?php if($total != 0){?>
                    <button class="btn" onclick="openPag()">Finalizar compra</button>
                    <?php }else{?>
                    <button class="btn" onclick="">Começe a comprar</button>
                    <?php }?>
                </div>
                <span class="continue underline">Continuar comprando</span>
            </div>
        </div>
    </div>
</div>

<?php include_once 'finalizar_compra.php'; ?>