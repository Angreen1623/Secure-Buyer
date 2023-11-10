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

                $prod->setcod_produto(18);
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
    
                                    $tam->setcod_produto(18);
    
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
                                    $img->setcod_produto(18);
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
    
                    echo "<script language=\"JavaScript\">window.location.replace(\"../user-pages/edicao654d920cce6b0.php\");</script>";
    
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
    </php>