<?php

class novo_produto{

function buying_page($prod_cod){

    $link = "./user-pages/".uniqid("produto", false).".php";

    $myfile = fopen($link, "w") or die("Unable to open file!");

    include_once "./php-conexao-modelagem/produto.php";

    $txt = '<!DOCTYPE php>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/produto.css">
    </head>
    <body class="body">

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
                <li> <a href="../masculino.php">Masculino</a></li>
                <li> <a href="../feminino.php">Feminino</a></li>
                <li> <a href="../unissex.php">Unissex</a></li>
                <li>
                    <a href="#">Ajuda</a>
                    <ul class="submenu">
                        <li><a href="../sobrenos.html">Sobre nos</a></li>
                        <li><a href="../fale_conosco">Fale Conosco</a></li>
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

            <?php 
                include_once "../php-conexao-modelagem/carrinho.php";
                $cart = new Carrinho();
                include_once "../php-conexao-modelagem/produto.php";
                $prod = new Produto();
                include_once "../php-conexao-modelagem/imagem_produto.php";
                $img = new Imagem();
                include_once "../php-conexao-modelagem/perfil.php";
                $per = new Perfil();
                include_once "../php-conexao-modelagem/pedidos_realizados.php";
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

                    $ped_rea->setcod_carrinho($row[\'cod_carrinho\']);
                    $pedidos_realizados = $ped_rea->consultar();

                    foreach($pedidos_realizados as $row2){
                        $n++;

                        if($row2[\'cod_carrinho\'] == $row[\'cod_carrinho\']){
                            $pedidos[$n] = $row2[\'cod_carrinho\'];
                        }

                    }

                    if(!isset($pedidos[$i])){
                    $j++;

                    $carrinho_atual[$j] = intval($row[\'cod_carrinho\']);
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
                                    echo ".".$imagem; }
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
                                    <form action="../script/bag.php" method="POST">
                                        <input type="hidden" name="num_item" value="<?php echo $carrinho_atual[$j]; ?>">
                                        <label for="btnexc"><img src="../img/del.png" alt="deletar"></label>
                                        <input type="submit" name="btnexc" id="btnexc" style="display: none;">
                                    </form>
                                </div>
                            </div>
                        </div>
            <?php
                        }

                           $total = $total + ($preco * $row["qnt_pro"]);
                        }
                    }
                }
            ?>

            <div class="bag-buy">
                <div class="group cupom">
                    <img src="../img/cupom.png" alt="">
                    <form name="cupom" method="POST" action="" id="butaodesconto">
                    <input type="text" name="cupom" id="cupom" placeholder="Adicionar cupom de desconto" maxlength="50" style="min-width: 345px;" required>
                    <button class="btnadicionar" name="btnaddaction">adicionar</button>
                    </form>

                </div>
                <?php
                        extract($_POST, EXTR_OVERWRITE);
                        if(isset($btnaddactionz))
                         {
                             include_once \'../php-conexao-modelagem/cupom.php\';
                             $pro=new Cupom();
                             $pro -> setnome_cupom($cupom);
                             $pro_bd = $pro->consultar();
                             foreach($pro_bd as $pro_mostrar){
                              $valor = floatval($pro_mostrar["valorp_cupom"]);
                            }

                            if($total>0 || !empty($valor)){
                                $desconto=$total*$valor;
                                $total=$total-$desconto;
                              }
                        }
                        
                      ?>
                <div class="itens">
                    <h4 class="left">Total:</h4>
                    <h3 class="right">R$ <?php echo number_format($total,2,",","."); ?></h3>
                </div>
                <div class="bag-end">
                    <?php if($total != 0){?>
                    <button class="btn" onclick="openPag()">Finalizar compra</button>
                    <?php }else{?>
                    <button class="btn" onclick="window.location.replace(\'../novidades.php\')">Começe a comprar</button>
                    <?php }?>
                </div>
                <a href="../novidades.php" style="color:#000;"> <span class="continue underline">Continuar comprando</span></a>
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
                    
                    $prod->setcod_produto("'.$prod_cod.'");

                    $produtos = $prod->consultar2();

                    foreach($produtos as $row){
                        $codper_anun = $row["cod_perfil"];
                        $nome = $row["titulo_produto"];
                        $desc = $row["descricao_produto"];
                        $preco = number_format($row["preco_produto"],2,",",".");
                    }
                ?>
                <div class="images">
                    <div class="img-group">

                        <div class="prod-selectimg">
                            <?php $img->setcod_produto('.$prod_cod.');
                            $imagens = $img->consultar2();
                            foreach($imagens as $row2){
                            $imagem = $row2["imagem_produto"];?>
                            <div class="image-option">

                                <?php if(!str_contains($imagem, "principal")){ ?>
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
                        <h1 class="title"><?php echo $nome; ?></h1>
                        <h1 class="price">R$ <?php echo $preco; ?></h1>
                    </div>

                    <form action="" method="POST" onsubmit="return form_submit(event)" name="main" id="main">
                    
                        <?php
                            $tam->setcod_produto('.$prod_cod.');

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
                                    <td class="<?php if($t12){ echo"selected"; }?>"> <label for="tam12" class="btn12 <?php if(!$t12){ echo"selectable"; }?>" onclick="clickedTam(`btn12`)">  12  </label> </td>
                                    <input type="radio" name="tamanho" id="tam12" value="12" style="display: none;" <?php if($t12){ echo"disabled"; }?>>
                                    
                                    <td class="<?php if($t14){ echo"selected"; }?>"> <label for="tam14" class="btn14 <?php if(!$t14){ echo"selectable"; }?>" onclick="clickedTam(`btn14`)">  14  </label> </td>
                                    <input type="radio" name="tamanho" id="tam14" value="14" style="display: none;" <?php if($t14){ echo"disabled"; }?>>
                                    
                                    <td class="<?php if($t16){ echo"selected"; }?>"> <label for="tam16" class="btn16 <?php if(!$t16){ echo"selectable"; }?>" onclick="clickedTam(`btn16`)">  16  </label> </td>
                                    <input type="radio" name="tamanho" id="tam16" value="16" style="display: none;" <?php if($t16){ echo"disabled"; }?>>
                                    
                                    <td class="<?php if($tpp){ echo"selected"; }?>"> <label for="tampp" class="btnpp <?php if(!$tpp){ echo"selectable"; }?>" onclick="clickedTam(`btnpp`)">  PP  </label> </td>
                                    <input type="radio" name="tamanho" id="tampp" value="PP" style="display: none;" <?php if($tpp){ echo"disabled"; }?>>
                                </tr>
                                <tr>
                                    <td class="<?php if($tp){ echo"selected"; }?>"> <label for="tamp" class="btnp <?php if(!$tp){ echo"selectable"; }?>" onclick="clickedTam(`btnp`)">  P  </label> </td>
                                    <input type="radio" name="tamanho" id="tamp" value="P" style="display: none;" <?php if($tp){ echo"disabled"; }?>>
                                    
                                    <td class="<?php if($tmedio){ echo"selected"; }?>"> <label for="tamm" class="btnm <?php if(!$tmedio){ echo"selectable"; }?>" onclick="clickedTam(`btnm`)">  M  </label> </td>
                                    <input type="radio" name="tamanho" id="tamm" value="M" style="display: none;" <?php if($tmedio){ echo"disabled"; }?>>
                                    
                                    <td class="<?php if($tg){ echo"selected"; }?>"> <label for="tamg" class="btng <?php if(!$tg){ echo"selectable"; }?>" onclick="clickedTam(`btng`)">  G  </label> </td>
                                    <input type="radio" name="tamanho" id="tamg" value="G" style="display: none;" <?php if($tg){ echo"disabled"; }?>>
                                    
                                    <td class="<?php if($tgg){ echo"selected"; }?>"> <label for="tamgg" class="btngg <?php if(!$tgg){ echo"selectable"; }?>" onclick="clickedTam(`btngg`)">  GG  </label> </td>
                                    <input type="radio" name="tamanho" id="tamgg" value="GG" style="display: none;" <?php if($tgg){ echo"disabled"; }?>>
                                </tr>
                            </table>
                            </div>
                        </div>

                        <div class="info-item">
                            <h2>Frete:</h2>
                            <input type="text" name="cep" id="cep" placeholder="Calcular CEP" maxlength="9" onblur="ver_cep(this.value)" onkeypress="return cep_mask(window.event.keyCode)" required>
                            <div class="error_message">
                                <p>Digite um cep válido</p>
                            </div>
                        </div>

                        <div class="info-item quantidade">
                            <h2>Quantidade:</h2>
                            <span class="subtitle btn-qnt menos">-</span>
                            <!-- número que aumenta e diminui -->
                            <input type="text" name="quantidade" id="qnt" value="1" maxlength="7" onkeypress="return verTamanho(window.event.keyCode)" required>
                            <!-- botão de menos -->
                            <span class="subtitle btn-qnt mais">+</span>
                        </div>

                        <div class="end-purchase">
                            <input type="submit" value="Adicionar ao carrinho" class="btn" name="add_cart" form="main">
                            <div class="more">
                                <span class="underline about-btn">Sobre a loja</span>
                            </div>
                            <div class="more">
                                <span class="underline detail-btn">Detalhes do produto</span>
                            </div>
                            </div>

                    </form>

                            <div class="more">
                            <?php
                            include_once "../php-conexao-modelagem/carrinho.php";    
                            $cart = new Carrinho();

                            include_once "../php-conexao-modelagem/pedidos_realizados.php";
                            $ped = new Pedidos_realizados();
                           
                            if(isset($codper)){
                                $cart->setcod_perfil($codper);
                                foreach($cart->consultar() as $row){
                                    $ped->setcod_carrinho($row["cod_carrinho"]);
                                    foreach($ped->consultar() as $row2){
                                        $cart->setcod_carrinho($row2["cod_carrinho"]);
                                        foreach($cart->consultar2() as $row3){
                                            if($row3["cod_produto"] == '.$prod_cod.'){
                                                $produto_comprado = 1;
                                            }
                                        }
                                    }
                                }
                            }



                                if(isset($produto_comprado)){
                                    echo "<br><br><h1>Avalie este produto</h1>";

                                    include_once "../php-conexao-modelagem/avaliacoes.php";
                                    $avali = new Avaliacao();

                                    $avali->setcod_perfil($codper);
                                    $avali->setcod_produto('.$prod_cod.');
                                    $avaliacoes = $avali->consultar2();

                                if (empty($avaliacoes)) {  
                                    echo \'<form method="POST" action="" name="aval" id="aval">\';
                                    echo \'<div class="estrelas">\';
                                    echo \'<input type="radio" name="estrela" id="vazio" checked>\';
                                    echo \'<label for="estrela1"><i class="opcao fa" style="cursor: pointer;"></i></label>\';
                                    echo \'<input type="radio" name="estrela" id="estrela1" value="1">\';
                                    echo \'<label for="estrela2"><i class="opcao fa" style="cursor: pointer;"></i></label>\';
                                    echo \'<input type="radio" name="estrela" id="estrela2" value="2">\';
                                    echo \'<label for="estrela3"><i class="opcao fa" style="cursor: pointer;"></i></label>\';
                                    echo \'<input type="radio" name="estrela" id="estrela3" value="3">\';
                                    echo \'<label for="estrela4"><i class="opcao fa" style="cursor: pointer;"></i></label>\';
                                    echo \'<input type="radio" name="estrela" id="estrela4" value="4">\';
                                    echo \'<label for="estrela5"><i class="opcao fa" style="cursor: pointer;"></i></label>\';
                                    echo \'<input type="radio" name="estrela" id="estrela5" value="5">\';
                            
                                    echo \'<div class="div-campo">\';
                                    echo \'<div class="text-campo">\';
                                    echo \'<label class="subtitle">Comente o que achou deste produto:</label><br>\';
                                    echo \'</div>\';
                                    echo \'<textarea style="border: 1px solid #ccc; border-radius: 20px; padding: 10px; width: 100%; max-width: 100%; resize: none;" rows="6" cols="60" name="descricao" maxlength="2000" required></textarea>\';
                                    echo \'</div>\';
                            
                                    echo \'<input type="submit" name="btnenviar" value="Enviar" form="aval" class="btn">\';
                                    echo \'</div>\';
                                    echo \'</form>\';
                                } else {
                                    echo "Você já avaliou este produto.";
                                }
                            }
                            ?>

                                <?php
                                extract($_POST, EXTR_OVERWRITE);
                                if(isset($btnenviar)){
                        
                                    include_once "../php-conexao-modelagem/avaliacoes.php";
                                    $aval = new Avaliacao();
                        
                                    $aval->setcod_produto('.$prod_cod.');
                                    $aval->setcod_perfil($codper);
                                    $aval->settexto_ava($descricao);
                                    $aval->setestrela_ava($estrela);
                                    $aval->salvar();
                        
                                    echo "<script language=\'JavaScript\'>window.location.replace(\'../index.php\');</script>";   
                                }
                                ?>
                            </div>
                        
                </div>
            </div>

            <div class="rating-box" >
            <div class="rating-title">
                <h1>Avaliações do produto</h1>
            </div>
                <?php
                include_once "../php-conexao-modelagem/avaliacoes.php";
                $avali = new Avaliacao();
                $avali->setcod_produto(' . $prod_cod . ');
                $avaliacoes=$avali->consultar();
                ?>

            
                <?php
                foreach($avaliacoes as $a_mostrar)
                {
                echo "<div class=\"rating-item\">";
                echo  "<div class=\"group\">";
                echo "<div class=\"name-profile\">";
               
                
                $cod_perfil_avaliacao = $a_mostrar[\'cod_perfil\'];
                include_once "../php-conexao-modelagem/perfil.php";
                $nome = new Perfil();
                $nome->setcod_perfil($cod_perfil_avaliacao);
                $exibir = $nome->consultarnome();
                echo "<h1>" . $exibir . "</h1>";
                $estrela = $a_mostrar[\'estrela_ava\']; 
                for ($i = 1; $i<=5; $i++)
                {
                    if ($i <= $estrela)
                    {
                        echo "<i class=\"estrela-preenchida fa-solid fa-star\"></i>";
                    } else{
                        echo "<i class=\"estrela-vazia fa-solid fa-star\"></i>";
                    }
                }
                echo "<div class=\"rating-commit\">";
                echo "<p>" . $a_mostrar[\'texto_ava\'] . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>"; 
                echo "</div>";
                }
                ?>
        </div>

            <div class="about">

            <?php
                include_once "../php-conexao-modelagem/perfil.php";
                $per = new Perfil();

                $per->setcod_perfil($codper_anun);
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
                            <?php echo $desc; ?>
                        </p>
                    </div>
                    <div class="end-description">
                        <div class="description-title"><h1>Precisa de ajuda?</h1></div>
                        <div class="description-contact"><h3>Entre em contato com a loja</h3></div>
                        <span>0800 0 00000</span>
                        <span><a href="../fale_conosco.php" style="color:black">Envie-nos uma mensagem</a></span>
                    </div>
                    </div>
                </div>
            </div>

            <footer>
        <div class="container-footer">
            <div class="row-footer">
            <div class="footer-col">
                    <a href="../index.php"><img src="../img/logo-sb.png" ></a>
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
                    <li> <a href="../fale_conosco.php">Fale conosco</a></li>
                    <li> <a href="../sobrenos.php">Sobre nós</a></li>
                </ul>
                </div>
            <div class="footer-col">
                <h6>CATEGORIAS</h6>
                <ul>
                    <li> <a href="../masculino.php">Masculino</a></li>
                    <li> <a href="../feminino.php">Feminino</a></li>
                    <li> <a href="../unissex.php">Unissex</a></li>
                </ul>
            </div>
            <div class="footer-sub">
                ESTÁ COM PROBLEMAS?<br>
            <a href="../fale_conosco.php"><button>Fale conosco</button></a>
            </div>
        </div>
        </div>
    </footer> 

    <?php

        extract($_POST, EXTR_OVERWRITE);
        if(isset($add_cart)){

            include_once "../php-conexao-modelagem/carrinho.php";
            $cart = new Carrinho();

            $cart->setcod_produto('.$prod_cod.');
            $cart->setcod_perfil($codper);
            $cart->setcep_carrinho($cep);
            $cart->setqnt_pro($quantidade);
            $cart->settamanho_pro($tamanho);
            $cart->salvar();

            echo "<script language=\'JavaScript\'>window.location.replace(\'../index.php\');</script>";

        }

    ?>
            
        </div>
        
    </body>
    <!--javascript-->
    <script src="../js/script.js"></script>
    <script src="../js/produto.js"></script>
    </php>';

    fwrite($myfile, $txt);

    fclose($myfile);

    return $link;

}


















function editing_page($prod_cod){

    $link = "./user-pages/".uniqid("edicao", false).".php";

    $myfile = fopen($link, "w") or die("Unable to open file!");

    $txt = '<!DOCTYPE php>
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
        <link rel="stylesheet" href="../css/c_anuncio.css">
        
    </head>
    <body class="body">
    
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
    
            <!-- titulo da pagina -->
            <h1 class="title">EDITAR ANÚNCIO </h1>
    
            <!-- conteúdo da página. Ah mas o titulo faz parte do conteúdo!!! ¯\_(ツ)_/¯ -->
            <div class="content">
                <?php 

                include_once "../php-conexao-modelagem/perfil.php";
                    $perfil = new Perfil();
                    
                    if(!isset($codper)){
                        echo "<script language=\"JavaScript\">window.location.replace(\"../index.php\");</script>";
                    }
                    
                    $perfil->setcod_perfil($codper);
                    $perfis = $perfil->consultar();
                    foreach($perfis as $row){
                        if($row["cnpj"] == NULL){
                            echo "<script language=\"JavaScript\">window.location.replace(\"../index.php\");</script>";
                        }
                    }

                include_once "../php-conexao-modelagem/produto.php";
                $prod = new Produto();

                $prod->setcod_produto('.$prod_cod.');
                $produtos = $prod->consultar2();

                foreach($produtos as $row){
                    $codper_anun = $row["cod_perfil"];
                }

                if($codper != $codper_anun){
                    echo "<script language=\"JavaScript\">window.location.replace(\"../index.php\");</script>";
                }

                foreach($produtos as $row){
            ?>
                <!-- o formulário -->
                <div class="form-text">
                    <form action="" enctype="multipart/form-data" method="POST">
                        <!-- inputs de texto e os titulos deles -->
                        <div class="form">
                            <!-- Grupo de título + input -->
                            <div class="vertical-group">
                                <!-- titulo do input -->
                                <div class="text">
                                    <label class="subtitle">Título</label><br>
                                </div>
                                <!-- input -->
                                <input type="text" name="nome" value="<?php echo $row["titulo_produto"]; ?>">
                            </div>
                            <!-- fim do grupo -->
    
                            <!-- Grupo de título + input -->
                            <div class="vertical-group">
                                <!-- titulo do input -->
                                <div class="text">
                                    <label class="subtitle">Descrição</label><br>
                                </div>
                                <!-- input -->
                                <textarea rows = "6" cols = "60" name = "descricao" maxlength="2000" required><?php echo $row["descricao_produto"];?></textarea>
                            </div>
                            <!-- fim do grupo -->
                        </div>
                        <!-- fim dos formulários  -->
    
                        <!-- segunda sessão de formulários, esses são os que ficam na horizontal -->
                        <div class="form2">
                            <!-- separei cada linha vertical em uma div diferente, div da primeira linha c/ quantidade e genero-->
                            <div class="form-box">
                                
    
                                <!-- sexo -->
                                <div class="sexo">
                                    <!-- titulo -->
                                    <p class="subtitle">Sexo</p>
                                    <!--  grupos de cada botão -->
                                    <div class="radios">
                                        <?php
    
                                        $male = false;
                                        $female = false;
                                        $unissex = false;
    
    
                                            switch($row["sexo"]){
    
                                                case "male": 
                                                    $male = true;
                                                    break;
                                                case "female": 
                                                    $female = true;
                                                    break;
                                                case "unissex": 
                                                    $unissex = true;
                                                    break;
    
                                            }
                                        
                                        ?>
                                        <!-- primeiro grupo, masculino -->
                                        <div class="radio-item">
                                            <!-- input -->
                                            <input type="radio" id="masculino" name="gender" value="male" <?php if($male){echo "checked";} ?>>
                                            <!-- titulo -->
                                            <label for="masculino" class="label">MASCULINO</label>
                                        </div>
    
                                        <!-- primeiro grupo, feminino -->
                                        <div class="radio-item">
                                            <!-- input -->
                                            <input type="radio" id="feminino" name="gender" value="female" <?php if($female){echo "checked";} ?>>
                                            <!-- titulo -->
                                            <label for="feminino" class="label">FEMININO</label>
                                        </div>
    
                                        <!-- primeiro grupo, unissex -->
                                        <div class="radio-item">
                                            <!-- input -->
                                            <input type="radio" id="unissex"  name="gender" value="unissex" <?php if($unissex){echo "checked";} ?>>
                                            <!-- titulo -->
                                            <label for="unissex" class="label">UNISSEX</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- div da segunda linha c/ tipo de roupa-->
                            <div class="form-box">
                                <!-- inputs com o tipo das peças -->
                                <div class="tipo-peca">
    
                                    <?php
    
                                        $camisa = false;
                                        $blusa = false;
                                        $calcado = false;
                                        $calca = false;
    
    
                                            switch($row["tipo_peca"]){
    
                                                case "camisa": 
                                                    $camisa = true;
                                                    break;
                                                case "blusa": 
                                                    $blusa = true;
                                                    break;
                                                case "calçado": 
                                                    $calcado = true;
                                                    break;
                                                case "calça": 
                                                    $calca = true;
                                                    break;
    
                                            }
                                        
                                        ?>
    
                                    <!-- titulo -->
                                    <p class="subtitle">Tipo de peça</p>
    
                                    <!--  grupos de cada botão -->
                                    <div class="radios">
                                        <!-- primeiro grupo, camisa -->
                                        <div class="radio-item">
                                            <input type="radio" id="camisa" name="peca" value="camisa" <?php if($camisa){echo "checked";} ?>>
                                            <label for="camisa" class="label">CAMISA</label><br>
                                        </div>
    
                                        <!-- segundo grupo, blusa -->
                                        <div class="radio-item">
                                            <input type="radio" id="blusa" name="peca" value="blusa" <?php if($blusa){echo "checked";} ?>>
                                            <label for="blusa" class="label">BLUSA</label><br>
                                        </div>
    
                                        <!-- terceiro grupo, calçado -->
                                        <div class="radio-item">
                                            <input type="radio" id="calcado" name="peca" value="calçado" <?php if($calcado){echo "checked";} ?>>
                                            <label for="calcado" class="label">CALÇADO</label><br>
                                        </div>
    
                                        <!-- quarto grupo, calça -->
                                        <div class="radio-item">
                                            <input type="radio" id="calca" name="peca" value="calça" <?php if($calca){echo "checked";} ?>>
                                            <label for="calca" class="label">CALÇA</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- div da terceira linha c/ opções de tamanho-->
                            <div class="form-box">
                                <!-- titulo -->
                                <p class="subtitle">Opções de tamanhos</p>
                                <!-- div para os botões e nome de cada opção -->
                                <div class="tamanhos">
                                <?php
    
                                    include_once "../php-conexao-modelagem/tamanho.php";
                                    $tam = new Tamanho();
    
                                    $t12_check = false;
                                    $t12_qnt = 0;
                                    $t14_check = false;
                                    $t14_qnt = 0;
                                    $t16_check = false;
                                    $t16_qnt = 0;
                                    $tpp_check = false;
                                    $tpp_qnt = 0;
                                    $tp_check = false;
                                    $tp_qnt = 0;
                                    $tm_check = false;
                                    $tm_qnt = 0;
                                    $tg_check = false;
                                    $tg_qnt = 0;
                                    $tgg_check = false;
                                    $tgg_qnt = 0;
    
                                    $tam->setcod_produto('.$prod_cod.');
    
                                    $tamanhos = $tam->consultar();
                                    foreach($tamanhos as $row2){
    
                                        switch($row2["size"]){
    
                                            case "12": 
                                                $t12_check = true;
                                                $t12_qnt = (int)$row2["quant_tamanho"];
                                                $t12_id = $row2["cod_tamanho"];
                                                break;
                                            case "14": 
                                                $t14_check = true;
                                                $t14_qnt = $row2["quant_tamanho"];
                                                $t14_id = $row2["cod_tamanho"];
                                                break;
                                            case "16": 
                                                $t16_check = true;
                                                $t16_qnt = $row2["quant_tamanho"];
                                                $t16_id = $row2["cod_tamanho"];
                                                break;
                                            case "PP": 
                                                $tpp_check = true;
                                                $tpp_qnt = $row2["quant_tamanho"];
                                                $tpp_id = $row2["cod_tamanho"];
                                                break;
                                            case "P": 
                                                $tp_check = true;
                                                $tp_qnt = $row2["quant_tamanho"];
                                                $tp_id = $row2["cod_tamanho"];
                                                break;
                                            case "M": 
                                                $tm_check = true;
                                                $tm_qnt = $row2["quant_tamanho"];
                                                $tm_id = $row2["cod_tamanho"];
                                                break;
                                            case "G": 
                                                $tg_check = true;
                                                $tg_qnt = $row2["quant_tamanho"];
                                                $tg_id = $row2["cod_tamanho"];
                                                break;
                                            case "GG": 
                                                $tgg_check = true;
                                                $tgg_qnt = $row2["quant_tamanho"];
                                                $tgg_id = $row2["cod_tamanho"];
                                                break;
                                        }
                                    }
    
    
                                ?>
                                    <div class="checkboxes">
                                        <!-- opção 12 -->
                                        <div class="radio-item">
                                            <input type="checkbox" id="t12" name="tamanhos[]" value="t12"<?php if($t12_check){echo "checked";} ?>>
                                            <label for="t12" class="label">12</label>
                                            <!-- quantidades -->
                                            <div class="quantidade">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn menos">-</span>
                                                <!-- número que aumenta e diminui -->
                                                <input type="number" name="quantidade_12" id="qnt" value="<?php if($t12_check){echo $t12_qnt;} else{ echo 1; } ?>" onchange="verTamanho()">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn mais">+</span>
                                            </div>
                                        </div>
                                        <!-- opção 14 -->
                                        <div class="radio-item">
                                            <input type="checkbox" id="t14" name="tamanhos[]" value="t14" <?php if($t14_check){echo "checked";} ?>>
                                            <label for="t14" class="label">14</label>
                                            <!-- quantidades -->
                                            <div class="quantidade">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn menos">-</span>
                                                <!-- número que aumenta e diminui -->
                                                <input type="number" name="quantidade_14" id="qnt" value="<?php if($t14_check){echo $t14_qnt;}else{ echo 1;} ?>" onchange="verTamanho()">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn mais">+</span>
                                            </div>
                                        </div>
                                        <!-- opção 16 -->
                                        <div class="radio-item">
                                            <input type="checkbox" id="t16" name="tamanhos[]" value="t16" <?php if($t16_check){echo "checked";} ?>>
                                            <label for="t16" class="label">16</label>
                                            <!-- quantidades -->
                                            <div class="quantidade">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn menos">-</span>
                                                <!-- número que aumenta e diminui -->
                                                <input type="number" name="quantidade_16" id="qnt" value="<?php if($t16_check){echo $t16_qnt;}else{ echo 1;} ?>" onchange="verTamanho()">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn mais">+</span>
                                            </div>
                                        </div>
                                        <!-- opção PP -->
                                        <div class="radio-item">
                                            <input type="checkbox" id="tpp" name="tamanhos[]" value="tpp" <?php if($tpp_check){echo "checked";} ?>>
                                            <label for="tpp" class="label">PP</label>
                                            <!-- quantidades -->
                                            <div class="quantidade">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn menos">-</span>
                                                <!-- número que aumenta e diminui -->
                                                <input type="number" name="quantidade_pp" id="qnt" value="<?php if($tpp_check){echo $tpp_qnt;}else{ echo 1;} ?>" onchange="verTamanho()">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn mais">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- segunda linha das opções -->
                                    <div class="checkboxes">
                                        <!-- opção P -->
                                        <div class="radio-item">
                                            <input type="checkbox" id="tp" name="tamanhos[]" name="type" value="tp" <?php if($tp_check){echo "checked";} ?>>
                                            <label for="tp" class="label">P</label>
                                            <!-- quantidades -->
                                            <div class="quantidade">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn menos">-</span>
                                                <!-- número que aumenta e diminui -->
                                                <input type="number" name="quantidade_p" id="qnt" value="<?php if($tp_check){echo $tp_qnt;}else{ echo 1;} ?>" onchange="verTamanho()">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn mais">+</span>
                                            </div>
                                        </div>
                                        <!-- opção M -->
                                        <div class="radio-item">
                                            <input type="checkbox" id="tm" name="tamanhos[]" name="type" value="tm" <?php if($tm_check){echo "checked";} ?>>
                                            <label for="tm" class="label">M</label>
                                            <!-- quantidades -->
                                            <div class="quantidade">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn menos">-</span>
                                                <!-- número que aumenta e diminui -->
                                                <input type="number" name="quantidade_m" id="qnt" value="<?php if($tm_check){echo $tm_qnt;}else{ echo 1;} ?>" onchange="verTamanho()">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn mais">+</span>
                                            </div>
                                        </div>
                                        <!-- opção G -->
                                        <div class="radio-item">
                                            <input type="checkbox" id="tg" name="tamanhos[]" name="type" value="tg" <?php if($tg_check){echo "checked";} ?>>
                                            <label for="tg" class="label">G</label>
                                            <!-- quantidades -->
                                            <div class="quantidade">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn menos">-</span>
                                                <!-- número que aumenta e diminui -->
                                                <input type="number" name="quantidade_g" id="qnt" value="<?php if($tg_check){echo $tg_qnt;}else{ echo 1;} ?>" onchange="verTamanho()">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn mais">+</span>
                                            </div>
                                        </div>
                                        <!-- opção GG -->
                                        <div class="radio-item">
                                            <input type="checkbox" id="tgg" name="tamanhos[]" name="type" value="tgg" <?php if($tgg_check){echo "checked";} ?>>
                                            <label for="tgg" class="label">GG</label>
                                            <!-- quantidades -->
                                            <div class="quantidade">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn menos">-</span>
                                                <!-- número que aumenta e diminui -->
                                                <input type="number" name="quantidade_gg" id="qnt" value="<?php if($tgg_check){echo $tgg_qnt;}else{ echo 1;} ?>" onchange="verTamanho()">
                                                <!-- botão de menos -->
                                                <span class="subtitle btn mais">+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fim do formulário de texto -->
    
                        <!-- grupo das imagens, fotos e titulo -->
                        <div class="vertical-group">
                            <div class="text">
                                <p class="subtitle">Fotos do produto</p>
                            </div>
    
                            <!-- as imagens -->
                            <div class="images">
    
                                <?php 
    
                                    include_once "../php-conexao-modelagem/imagem_produto.php";
                                    $img = new Imagem();
                                    $n = 1;
                                    $img->setcod_produto('.$prod_cod.');
                                    $imagens = $img->consultar2();
                                    foreach($imagens as $row2){
                                        $imagem = $row2["imagem_produto"];
    
                                        if(str_contains($imagem, "vitrine"))
                                        $imagem_vitrine = $row2["imagem_produto"];
    
                                        if(str_contains($imagem, "principal"))
                                        $imagem_principal = $row2["imagem_produto"];
    
                                        switch($n){
    
                                            case 1: ?> 
    
                                                <div class="img">
                                                    <label for="imagem<?php echo $n; ?>"> <img src=".<?php echo $imagem_vitrine; ?>" class="img<?php echo $n; ?>" alt="Adicione uma imagem"></label>
                                                </div> <?php
    
                                                break;
                                            case 2: ?> 
    
                                                <div class="img">
                                                    <label for="imagem<?php echo $n; ?>"> <img src=".<?php echo $imagem_principal; ?>" class="img<?php echo $n; ?>" alt="Adicione uma imagem"></label>
                                                </div> <?php
    
                                                break;
                                            default: ?> 
    
                                                <div class="img">
                                                    <label for="imagem<?php echo $n; ?>"> <img src=".<?php echo $imagem; ?>" class="img<?php echo $n; ?>" alt="Adicione uma imagem"></label>
                                                </div> <?php
    
                                                break;
                                            
                                            
                                        }
    
                                        ?>
                                        
                                        <?php
                                        $n++;
                                    }
                                ?>
    
                            </div>
                            <!-- cabo imagem -->
                        </div>
                        <div class="vertical-group-price">
                            <div class="text">
                                <label class="subtitle">Preço</label><br>
                            </div>
                            <input type="text" name="preco" value="<?php echo number_format($row["preco_produto"],2,",","."); ?>">
                        </div>
                        <div class="buttons">
                            <div class="btn">
                                <a href="../index.php">Voltar</a>
                            </div>
                            <input type="submit" value="Alterar" name="btnalterar">
                        
                        </div>
                    </form>
    
                    <?php } ?>
                </div>
                
            </div>
    
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnalterar)){
                    
                    $prod->setcod_perfil($codper);
                    $prod->settitulo_produto($nome);
                    $prod->setdescricao_produto($descricao);
                    $prod->settipo_peca($peca);
                    $prod->setpreco_produto($preco);
                    $prod->setsexo($gender);
    
                    $prod->alterar();
    
                    $tam->setcod_produto(1);
                    foreach($tamanhos as $tamanho){
                        if($tamanho == "t12"){
                            $tam->setcod_tamanho($t12_id);
                            $tam->setsize(12);
                            $tam->setquant_tamanho($quantidade_12);
                            $tam->alterar();
                        }elseif($tamanho == "t14"){
                            $tam->setcod_tamanho($t14_id);
                            $tam->setsize(14);
                            $tam->setquant_tamanho($quantidade_14);
                            $tam->alterar();
                        }elseif($tamanho == "t16"){
                            $tam->setcod_tamanho($t16_id);
                            $tam->setsize(16);
                            $tam->setquant_tamanho($quantidade_16);
                            $tam->alterar();
                        }elseif($tamanho == "tpp"){
                            $tam->setcod_tamanho($tpp_id);
                            $tam->setsize("PP");
                            $tam->setquant_tamanho($quantidade_pp);
                            $tam->alterar();
                        }elseif($tamanho == "tp"){
                            $tam->setcod_tamanho($tp_id);
                            $tam->setsize("P");
                            $tam->setquant_tamanho($quantidade_p);
                            $tam->alterar();
                        }elseif($tamanho == "tm"){
                            $tam->setcod_tamanho($tm_id);
                            $tam->setsize("M");
                            $tam->setquant_tamanho($quantidade_m);
                            $tam->alterar();
                        }elseif($tamanho == "tg"){
                            $tam->setcod_tamanho($tg_id);
                            $tam->setsize("G");
                            $tam->setquant_tamanho($quantidade_g);
                            $tam->alterar();
                        }elseif($tamanho == "tgg"){
                            $tam->setcod_tamanho($tg_id);
                            $tam->setsize("GG");
                            $tam->setquant_tamanho($quantidade_gg);
                            $tam->alterar();
                        }
                    }
    
                    echo "<script language=\"JavaScript\">window.location.replace(\".'.$link.'\");</script>";
    
                }
            ?>
    
            <footer>
                <div class="container-footer">
                    <div class="row-footer">
                    <div class="footer-col">
                            <a href="../index.php"><img src="../img/logo-sb.png" ></a>
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
                            <li> <a href="../fale_conosco.php">Fale conosco</a></li>
                            <li> <a href="../sobrenos.html">Sobre nós</a></li>
                        </ul>
                        </div>
                    <div class="footer-col">
                        <h6>CATEGORIAS</h6>
                        <ul>
                        <li> <a href="../masculino.php">Masculino</a></li>
                        <li> <a href="../feminino.php">Feminino</a></li>
                        <li> <a href="../unissex.php">Unissex</a></li>
                        </ul>
                    </div>
                    <div class="footer-sub">
                        ESTÁ COM PROBLEMAS?<br>
                    <a href="../fale_conosco.php"><button>Fale conosco</button></a>
                    </div>
                </div>
                </div>
        </footer> 
    
        </div>
        
    </body>
    <!--javascript-->
    <script src="../js/script.js"></script>
    <script src="../js/c_anuncio.js"></script>
    </php>';

    fwrite($myfile, $txt);

    fclose($myfile);

    return $link;

}

}

?>