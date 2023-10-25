<!DOCTYPE php>
    <php lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Secure Buyer</title>
        <!--Logo-->
        <link rel="apple-touch-icon" sizes="180x180" href="../img/Icone/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../img/Icone/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../img/Icone/favicon-16x16.png">
        <link rel="manifest" href="../img/Icone/site.webmanifest">
        <!--css-->
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/produto.css">
        
    </head>
    <body>

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
                    <img src="../img/lupa.png" alt="">
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
                    <img src="../img/logo-sb.png" alt="Icone">
                </a>
            </div>
            <!-- fim da logo -->
            <!-- div dos conteúdos da direita, carrinho e login -->
            <div class="right">
                <!-- grupo do login -->
                <div class="group">
                    <!-- se clicar no link vai para criar conta -->
                    <a class="singin-btn" href="<?php
                        include_once "../php-conexao-modelagem/conexao.php";
                        $ip = new Conexao();
                        if(!empty($_SERVER["HTTP_CLIENTE_IP"])){
                            $ip_maquina = $_SERVER["HTTP_CLIENTE_IP"];
                        }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                            $ip_maquina = $_SERVER["HTTP_X_FORWARDED_FOR"];
                        }else{
                            $ip_maquina = $_SERVER["REMOTE_ADDR"];
                        }
                        $ip->setendereco_ip($ip_maquina);
                
                        $ips = $ip->listar();
                
                        foreach($ips as $row){
                            if($ip_maquina = $row["endereco_ip"]){
                                $codper = $row["cod_perfil"];
                            }
                        }
                    
                    if(isset($codper)){
                        echo "../perfil-padrao.php";
                    }else{ 
                        echo "../entrar.php";
                    }?>">
                        <!-- foto do login -->
                        <img src="../img/user.png" alt="Logar">
                    </a>
                </div>
                <!-- fim do grupo do login -->
                <!-- grupo do carrinho -->
                <div class="group">
                    <!-- se clicar no link abre o carrinho -->
                    <a id="bag-btn" class="bag-btn" href="#">
                        <!-- imagem da sacola -->
                        <img src="../img/bag.png" alt="Sacola">
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
        <span class="close-icon"><img src="../img/close.png" alt="fechar"></span>
        <div class="bag-sidebar">
            <div class="bag-title">
                <h4>Meu carrinho</h4>
            </div>
            <div class="bag-body">
                <div class="bag-item">
                    <div class="img">
                        <img src="../img/modelo15.png" alt="">
                    </div>
                    <div class="text">
                        <div class="bag-info">
                            <h5>Jaqueta</h5>
                            <h3>MIUMIU</h3>
                        </div>
                        <h5 class="bag-price">R$350,00</h5>
                        <span>- 1 +</span>
                        <div class="right">
                            <img src="../img/del.png" alt="deletar">
                        </div>
                    </div>
                </div>
                <div class="bag-item">
                    <div class="img">
                        <img src="../img/modelo16.png" alt="">
                    </div>
                    <div class="text">
                        <div class="bag-info">
                            <h5>Jaqueta</h5>
                            <h3>RIACHUELO</h3>
                        </div>
                        <h5 class="bag-price">R$115,00</h5>
                        <span>- 1 +</span>
                        <div class="right">
                            <img src="../img/del.png" alt="deletar">
                        </div>
                    </div>
                </div>
                <div class="bag-buy">
                    <div class="group cupom">
                        <img src="../img/cupom.png" alt="">
                        <h3>Adicionar cupom de desconto</h3>
                    </div>
                    <div class="itens">
                        <h4 class="left">Frete:</h4>
                        <div class="group right">
                            <img src="../img/frete.png" alt="">
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
            <div class="produto-info">
                <?php
                    extract($_POST, EXTR_OVERWRITE);
                    include_once "../php-conexao-modelagem/imagem_produto.php";
                    $img = new Imagem();
                    include_once "../php-conexao-modelagem/tamanho.php";
                    $tam = new Tamanho();
                    include_once "../php-conexao-modelagem/produto.php";
                    $prod = new Produto();
                    
                    $prod->setcod_perfil("1");
                    $prod->settitulo_produto("sdasdfdsaf");
                    $prod->setdescricao_produto("dsafdsafadsfsadfsdfsdfsd");
                    $prod->settipo_peca("camisa");
                    $prod->setsexo("female");

                    $produtos = $prod->obterid();

                    foreach($produtos as $row){
                        $prod_cod = $row["cod_produto"];
                    }
                ?>
                <div class="images">
                    <div class="img-group">

                        <div class="prod-selectimg">
                            <?php $img->setcod_produto($prod_cod);
                            $imagens = $img->consultar2();
                            foreach($imagens as $row2){
                            $imagem = $row2["imagem_produto"];?>
                            <div class="image-option">

                                <?php if(!str_contains($imagem, "vitrine")){ ?>
                                    <img src=".<?php echo $imagem; ?>" alt="">
                                <?php } ?>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    
                        <div class="prod-img">
                            <img src=".<?php
                        $imagens = $img->consultar2();
                        foreach($imagens as $row2){
                            $imagem = $row2["imagem_produto"];

                            if(str_contains($imagem, "principal"))
                            echo $imagem;
                        }?>" alt="Modelo da roupa">
                        </div>
                    </div> 
                </div>

                <div class="prod-info">

                    <div class="info-item">
                        <h1 class="title">sdasdfdsaf</h1>
                        <h1 class="price">R$127,00</h1>
                    </div>

                    <form action="" method="POST">
                    
                        <?php
                            $tam->setcod_produto($prod_cod);
                            $tamanhos = $tam->consultar();

                            $t12 = true;
                            $t14 = true;
                            $t16 = true;
                            $tpp = true;
                            $tp = true;
                            $tmedio = true;
                            $tg = true;
                            $tgg = true;

                            foreach($tamanhos as $row){
                                if($row["quant_tamanho"] > 0){
                                    switch ($row["size"]) {
                                        case "12":
                                            $t12 = false;
                                            break;
                                        case "14":
                                            $t14 = false;
                                            break;
                                        case "16":
                                            $t16 = false;
                                            break;
                                        case "PP":
                                            $tpp = false;
                                            break;
                                        case "P":
                                            $tp = false;
                                            break;
                                        case "M":
                                            $tmedio = false;
                                            break;
                                        case "G":
                                            $tg = false;
                                            break;
                                        case "GG":
                                            $tgg = false;
                                            break;
                                    }
                                }
                            }
                        ?>

                        <div class="info-item">
                            <h2>Selecionar Tamanho:</h2>
                            <div class="sizes">
                                <table>
                                    <tr>
                                        <td class="<?php if($t12){ echo"selected"; }?>"> <label for="tam12" class="<?php if(!$t12){ echo"unselected"; }?>">  12  </label> </td>
                                        <input type="radio" name="tamanho" id="tam12" value="tam12" style="display: none;">

                                        <td class="<?php if($t14){ echo"selected"; }?>"> <label for="tam14" class="<?php if(!$t14){ echo"unselected"; }?>">  14  </label> </td>
                                        <input type="radio" name="tamanho" id="tam14" value="tam14" style="display: none;">

                                        <td class="<?php if($t16){ echo"selected"; }?>"> <label for="tam16" class="<?php if(!$t16){ echo"unselected"; }?>">  16  </label> </td>
                                        <input type="radio" name="tamanho" id="tam16" value="tam16" style="display: none;">

                                        <td class="<?php if($tpp){ echo"selected"; }?>"> <label for="tampp" class="<?php if(!$tpp){ echo"unselected"; }?>">  PP  </label> </td>
                                        <input type="radio" name="tamanho" id="tampp" value="tampp" style="display: none;">
                                    </tr>
                                    <tr>
                                        <td class="<?php if($tp){ echo"selected"; }?>"> <label for="tamp" class="<?php if(!$tp){ echo"unselected"; }?>">  P  </label> </td>
                                        <input type="radio" name="tamanho" id="tamp" value="tamp" style="display: none;">

                                        <td class="<?php if($tmedio){ echo"selected"; }?>"> <label for="tamm" class="<?php if(!$tmedio){ echo"unselected"; }?>">  M  </label> </td>
                                        <input type="radio" name="tamanho" id="tamm" value="tamm" style="display: none;">

                                        <td class="<?php if($tg){ echo"selected"; }?>"> <label for="tamg" class="<?php if(!$tg){ echo"unselected"; }?>">  G  </label> </td>
                                        <input type="radio" name="tamanho" id="tamg" value="tamg" style="display: none;">

                                        <td class="<?php if($tgg){ echo"selected"; }?>"> <label for="tamgg" class="<?php if(!$tgg){ echo"unselected"; }?>">  GG  </label> </td>
                                        <input type="radio" name="tamanho" id="tamgg" value="tamgg" style="display: none;">
                                    </tr>
                        </table>
                            </div>
                        </div>

                        <div class="info-item">
                            <h2>Frete:</h2>
                            <input type="text" name="cep" id="cep" placeholder="Calcular CEP">
                        </div>

                        <div class="info-item">
                            <h2>Quantidade:</h2>
                            <span class="quantity">- 1 +</span>
                        </div>

                        <div class="end-purchase">
                            <input type="submit" value="Adicionar à carrinho" class="btn">
                            <div class="more">
                                <span class="underline about-btn">Sobre a loja</span>
                            </div>
                            <div class="more">
                                <span class="underline detail-btn">Detalhes do produto</span>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="rating">
                <div class="rating-box">
                    <div class="rating-title">
                        <h1>Avaliações do produto</h1>
                    </div>

                    <div class="filter">
                        <div class="filter-item">
                            <div class="media">
                                <h4 class="underline">Media de avaliações</h4>
                                <h3>5 de 5 estrelas</h3>
                            </div>
                        
                            <div class="buttons">
                                <div class="btn">Tudo</div>
                                <div class="btn">1 estrela</div>
                                <div class="btn">2 estrelas</div>
                                <div class="btn">3 estrelas</div>
                                <div class="btn">4 estrelas</div>
                                <div class="btn">5 estrelas</div>
                            </div>
                        </div>

                        <div class="rating-container">
                            <div class="rating-item">
                                <div class="img-profile">
                                    <img src="../img/modelo13.png" alt="">
                                </div>
                                <div class="group">
                                    <div class="name-profile">
                                        <h1>Natalia Carangueijo da Silva</h1>
                                    </div>
                                    <div class="rating-stars">★★★★★</div>
                                    <div class="rating-commit">
                                        <p>Esta camiseta é simplesmente deslumbrante! Com cristais brilhantes,
                                            estilo moderno e design sóbrio, é confortável e elegante. As mangas
                                            longas e a modelagem solta a torna versátil. Cinco estrelas para
                                            uma peça única.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about">

            <?php
                include_once "../php-conexao-modelagem/perfil.php";
                $per = new Perfil();

                $per->setcod_perfil(1);
                $perfil = $per->consultar();
                foreach ($perfil as $row2) {

                    $img = $row2["imagem"];
                    $nome = $row2["nome"];
                    $lastnm = $row2["sobrenome"];
                    $loja = $row2["nome_loja"];
                    $cnpj = $row2["cnpj"];

                }
            ?>

                <span class="close-about"><img src="../img/close.png" alt="fechar"></span>
                <div class="about-sidebar">
                    <div class="title">
                        <h4>Sobre a loja</h4>
                    </div>
                    <div class="about-body">

                        <div class="group">
                            <div class="img">
                                <img src="<?php echo ".".$img; ?>" alt="">
                            </div>

                            <div class="profile">
                                <div class="name">
                                    <h1><?php echo $loja; ?> - <?php echo $nome." ".$lastnm; ?></h1>
                                </div>

                                <span class="btn">Visitar loja</span>
                            </div>

                        </div>

                        <div class="description">
                            <span>Avaliações: XX</span>
                            <span>Produtos: XX</span>
                            <span>Anunciante desde: XX/XX/XXXX</span>
                            <span>CNPJ: <?php echo $cnpj; ?></span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="detail">
                <span class="close-detail"><img src="../img/close.png" alt="fechar"></span>
                <div class="detail-sidebar">
                    <div class="title">
                        <h4>Detalhes do produto</h4>
                    </div>
                    <div class="detail-body">
                    <div class="description">
                        <p>
                            dsafdsafadsfsadfsdfsdfsd
                        </p>
                    </div>
                    <div class="description">
                        <div class="description-title"><h1>XXX</h1></div> 
                        <div class="description-material"><h2>XXXX</h2></div>
                    </div>
                    <div class="end-description">
                        <div class="description-title"><h1>Precisa de ajuda?</h1></div>
                        <div class="description-contact"><h3>Entre em contato com a loja</h3></div>
                        <span>0800 0 00000</span>
                        <span>Envie-nos uma mensagem</span>
                    </div>
                    </div>
                </div>
            </div>

            <footer>
        <div class="container-footer">
            <div class="row-footer">
            <div class="footer-col">
                    <a href="Home.html"><img src="../img/logo-sb.png" ></a>
            </div>
            <div class="footer-col">
                <h6>INÍCIO</h6>
                <ul>
                    <li> <a href="../index.php">Home</a></li>
                </ul>   
            </div>
            <div class="footer-col">
                <h6>AJUDA</h6>
                <ul>
                    <li> <a href="../faleconosco.html">Fale conosco</a></li>
                    <li> <a href="../sobrenos.html">Sobre nós</a></li>
                </ul>
                </div>
            <div class="footer-col">
                <h6>CATEGORIAS</h6>
                <ul>
                    <li> <a href="../novidades.php">Masculino</a></li>
                    <li> <a href="../novidades.php">Feminino</a></li>
                </ul>
            </div>
            <div class="footer-sub">
                ESTÁ COM PROBLEMAS?<br>
            <a href="../faleconosco.html"><button>Fale conosco</button></a>
            </div>
        </div>
        </div>
    </footer> 
            
        </div>
        
    </body>
    <!--javascript-->
    <script src="../js/script.js"></script>
    <script src="../js/produto.js"></script>
    </php>