<!DOCTYPE php>
<php lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Buyer</title>
    <!--Logo-->
    <link rel="apple-touch-icon" sizes="180x180" href="../conteudos/img/Icone/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../conteudos/img/Icone/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../conteudos/img/Icone/favicon-16x16.png">
    <link rel="manifest" href="../conteudos/img/Icone/site.webmanifest">
    <!--css-->
    <link rel="stylesheet" href="../conteudos/css/reset.css">
    <link rel="stylesheet" href="../conteudos/css/style.css">
    <link rel="stylesheet" href="../conteudos/css/telaanun.css">
</head>
<body>
    <!--incio navbar-->
    <!-- Inicio da página -->
    <div class="wrapper">
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
                    <a href="../index.php">
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
            
        <div class="bag">
            <span class="close-icon"><img src="../conteudos/img/close.png" alt="fechar"></span>
            <div class="bag-sidebar">
                <div class="bag-title">
                    <h4>Meu carrinho</h4>
                </div>
                <div class="bag-body">
                    <div class="bag-item">
                        <div class="img">
                            <img src="../conteudos/img/modelo15.png" alt="">
                        </div>
                        <div class="text">
                            <div class="bag-info">
                                <h5>Jaqueta</h5>
                                <h3>MIUMIU</h3>
                            </div>
                            <h5 class="bag-price">R$350,00</h5>
                            <span>- 1 +</span>
                            <div class="right">
                                <img src="../conteudos/img/del.png" alt="deletar">
                            </div>
                        </div>
                    </div>
                    <div class="bag-item">
                        <div class="img">
                            <img src="../conteudos/img/modelo16.png" alt="">
                        </div>
                        <div class="text">
                            <div class="bag-info">
                                <h5>Jaqueta</h5>
                                <h3>RIACHUELO</h3>
                            </div>
                            <h5 class="bag-price">R$115,00</h5>
                            <span>- 1 +</span>
                            <div class="right">
                                <img src="../conteudos/img/del.png" alt="deletar">
                            </div>
                        </div>
                    </div>
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
                            <h3 class="right">R$465,00</h3>
                        </div>
                        <div class="bag-end">
                            <span class="btn">Finalizar compra</span>
                        </div>
                        <span class="continue underline">Continuar comprando</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--INICIO TELA ANUNCIANTE-->
<!--informações sobre anunciante-->
<header id="event-description">
    
<?php
        include_once 'php-conexao-modelagem/produto.php';
        $prod = new Produto();
        include_once 'php-conexao-modelagem/perfil.php';
        $perfil = new Perfil();
        $perfil->setcod_perfil($codper);
        $produtos = $prod->obterid();

        foreach($produtos as $row){
            $prod_cod = $row['cod_produto'];
        }

        $dadosPerfil = $perfil->alterar();
        ?>
        <?php
        foreach ($dadosPerfil as $mostrar_dados) {
        
        ?>

    <div class="p1"> 
        <div class="imgmenor">
            <img src="<?php echo $mostrar_dados[6]?>" alt="Foto Perfil">
        </div>
        <p class="nomedaloja"><?php echo $mostrar_dados[4]?></p>
        <p class="descricao">AVALIAÇÕES: 40 <br> PRODUTOS: 50 <br> ANUNCIANTE DESDE:  11/11/2023</p></div>
    <div>

       <?php 
          }
         ?>
    <div class="products">

        <h1 class="products-title">TODOS OS PRODUTOS</h1>

        <div class="products-container">


        <?php
            include_once 'php-conexao-modelagem/imagem_produto.php';
            $img = new Imagem();

            $prod->setcod_perfil(1);
            $produtos = $prod->consultar();

            foreach($produtos as $row){
                ?>

                <div class="products-item">
                <form action="produto.php" method="post">
                <label for="imagem">
                    <img src="<?php
                    $img->setcod_produto($row['cod_produto']);
                    $imagens = $img->consultar2();
                    foreach($imagens as $row2){
                        echo $row2['imagem_produto'];
                    }
                    ?>" alt="" class="imgmodelo1">
                </label>
                <input type="hidden" name="cod_produto" value="<?php $row['cod_produto'] ?>">
                <input type="submit" id="imagem">
                </form>
                <p class="descmodelos1"><?php echo $row['titulo_produto']; ?></p>
                <p class="preco1">R$ <?php echo $row['preco_produto']; ?></p>
                </div>

                <?php

            }

        ?>

            <div class="products-item">
                <a href="c_anuncio.php">
                <img src="../conteudos/img/addprod.png" alt="Crie um anúncio" class="imgmodelo1"></a>
                <p class="descmodelos1">Crie um novo anúncio</p>
            </div>
        </div>

    </div>
</header>

<!--FINAL TELA ANUNCIANTE-->
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
</php>