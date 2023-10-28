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
    <link rel="stylesheet" href="../conteudos/css/c_anuncio.css">
    
</head>
<body>

    <!-- Inicio da página -->
    <div class="wrapper">        

        <?php include 'navbar.php'; ?>

        <!-- titulo da pagina -->
        <h1 class="title">CRIAR ANÚNCIO </h1>

        <!-- conteúdo da página. Ah mas o titulo faz parte do conteúdo!!! ¯\_(ツ)_/¯ -->
        <div class="content">
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
                            <input type="text" name="nome">
                        </div>
                        <!-- fim do grupo -->

                        <!-- Grupo de título + input -->
                        <div class="vertical-group">
                            <!-- titulo do input -->
                            <div class="text">
                                <label class="subtitle">Descrição</label><br>
                            </div>
                            <!-- input -->
                            <textarea rows = "6" cols = "60" name = "descricao" maxlength="2000" required></textarea>
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
                                    <!-- primeiro grupo, masculino -->
                                    <div class="radio-item">
                                        <!-- input -->
                                        <input type="radio" id="masculino" name="gender" value="male">
                                        <!-- titulo -->
                                        <label for="masculino" class="label">MASCULINO</label>
                                    </div>

                                    <!-- primeiro grupo, feminino -->
                                    <div class="radio-item">
                                        <!-- input -->
                                        <input type="radio" id="feminino" name="gender" value="female">
                                        <!-- titulo -->
                                        <label for="feminino" class="label">FEMININO</label>
                                    </div>

                                    <!-- primeiro grupo, unissex -->
                                    <div class="radio-item">
                                        <!-- input -->
                                        <input type="radio" id="unissex"  name="gender" value="unissex">
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
                                <!-- titulo -->
                                <p class="subtitle">Tipo de peça</p>

                                <!--  grupos de cada botão -->
                                <div class="radios">
                                    <!-- primeiro grupo, camisa -->
                                    <div class="radio-item">
                                        <input type="radio" id="camisa" name="peca" value="camisa">
                                        <label for="camisa" class="label">CAMISA</label><br>
                                    </div>

                                    <!-- segundo grupo, blusa -->
                                    <div class="radio-item">
                                        <input type="radio" id="blusa" name="peca" value="blusa">
                                        <label for="blusa" class="label">BLUSA</label><br>
                                    </div>

                                    <!-- terceiro grupo, calçado -->
                                    <div class="radio-item">
                                        <input type="radio" id="calcado" name="peca" value="calçado">
                                        <label for="calcado" class="label">CALÇADO</label><br>
                                    </div>

                                    <!-- quarto grupo, calça -->
                                    <div class="radio-item">
                                        <input type="radio" id="calca" name="peca" value="calça">
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
                                <div class="checkboxes">
                                    <!-- opção 12 -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="t12" name="tamanhos[]" value="t12">
                                        <label for="t12" class="label">12</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade_12" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção 14 -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="t14" name="tamanhos[]" value="t14">
                                        <label for="t14" class="label">14</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade_14" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção 16 -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="t16" name="tamanhos[]" value="t16">
                                        <label for="t16" class="label">16</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade_16" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção PP -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tpp" name="tamanhos[]" value="tpp">
                                        <label for="tpp" class="label">PP</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade_pp" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- segunda linha das opções -->
                                <div class="checkboxes">
                                    <!-- opção P -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tp" name="tamanhos[]" name="type" value="tp">
                                        <label for="tp" class="label">P</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade_p" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção M -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tm" name="tamanhos[]" name="type" value="tm">
                                        <label for="tm" class="label">M</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade_m" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção G -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tg" name="tamanhos[]" name="type" value="tg">
                                        <label for="tg" class="label">G</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade_g" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção GG -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tgg" name="tamanhos[]" name="type" value="tgg">
                                        <label for="tgg" class="label">GG</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade_gg" id="qnt" value="1" onchange="verTamanho()">
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

                            <div class="img">
                                <label for='imagem1'> <img src="./img/nova-foto.png" class="img1" alt="Adicione uma imagem"></label>
                                <input type="file" name="arquivo1" id="imagem1" accept=".jpg, .png, .jpeg" required>
                            </div>

                            <div class="img">
                                <label for='imagem2'> <img src="./img/nova-foto.png" class="img2" alt="Adicione uma imagem"></label>
                                <input type="file" name="arquivo2" id="imagem2" accept=".jpg, .png, .jpeg" required>
                            </div>

                            <div class="img">
                                <label for='imagem3'> <img src="./img/nova-foto.png" class="img3" alt="Adicione uma imagem"></label>
                                <input type="file" name="arquivo3" id="imagem3" accept=".jpg, .png, .jpeg" required>
                            </div>

                            <div class="img">
                                <label for='imagem4'> <img src="./img/nova-foto.png" class="img4" alt="Adicione uma imagem"></label>
                                <input type="file" name="arquivo4" id="imagem4" accept=".jpg, .png, .jpeg" required>
                            </div>

                            <div class="img">
                                <label for='imagem5'> <img src="./img/nova-foto.png" class="img5" alt="Adicione uma imagem"></label>
                                <input type="file" name="arquivo5" id="imagem5" accept=".jpg, .png, .jpeg" required>
                            </div>

                        </div>
                        <!-- cabo imagem -->
                    </div>
                    <div class="vertical-group-price">
                        <div class="text">
                            <label class="subtitle">Preço</label><br>
                        </div>
                        <input type="text" name="preco">
                    </div>
                    <div class="buttons">
                        <div class="btn">
                            <a href="./index.php">Voltar</a>
                        </div>
                        <input type="submit" value="Confirmar" name="btnconfirmar">
                    
                    </div>
                </form>
            </div>
            
        </div>

        <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnconfirmar)){
                include_once 'php-conexao-modelagem/produto.php';
                $prod = new Produto();
                
                $prod->setcod_perfil($codper);
                $prod->settitulo_produto($nome);
                $prod->setdescricao_produto($descricao);
                $prod->settipo_peca($peca);
                $prod->setpreco_produto($preco);
                $prod->setsexo($gender);

                $prod->salvar();
                $produtos = $prod->obterid();

                foreach($produtos as $row){
                    $prod_cod = $row['cod_produto'];
                }

                include_once 'php-conexao-modelagem/tamanho.php';
                $tam = new Tamanho();

                $tam->setcod_produto($prod_cod);
                foreach($tamanhos as $tamanho){
                    if($tamanho == "t12"){
                        $tam->setsize(12);
                        $tam->setquant_tamanho($quantidade_12);
                        $tam->salvar();
                    }elseif($tamanho == "t14"){
                        $tam->setsize(14);
                        $tam->setquant_tamanho($quantidade_14);
                        $tam->salvar();
                    }elseif($tamanho == "t16"){
                        $tam->setsize(16);
                        $tam->setquant_tamanho($quantidade_16);
                        $tam->salvar();
                    }elseif($tamanho == "tpp"){
                        $tam->setsize("PP");
                        $tam->setquant_tamanho($quantidade_pp);
                        $tam->salvar();
                    }elseif($tamanho == "tp"){
                        $tam->setsize("P");
                        $tam->setquant_tamanho($quantidade_p);
                        $tam->salvar();
                    }elseif($tamanho == "tm"){
                        $tam->setsize("M");
                        $tam->setquant_tamanho($quantidade_m);
                        $tam->salvar();
                    }elseif($tamanho == "tg"){
                        $tam->setsize("G");
                        $tam->setquant_tamanho($quantidade_g);
                        $tam->salvar();
                    }elseif($tamanho == "tgg"){
                        $tam->setsize("GG");
                        $tam->setquant_tamanho($quantidade_gg);
                        $tam->salvar();
                    }
                }

                include_once 'php-conexao-modelagem/imagem_produto.php';
                $img = new Imagem();

                $img->setcod_produto($prod_cod);
                
                $imagem1 = "./img/user-img/". uniqid("vitrine") . $_FILES["fileImg"]["name"];
                move_uploaded_file($_FILES["arquivo1"]["tmp_name"], $imagem1);
                $img->setimagem_produto($imagem1);
                $img->salvar();

                $img->setcod_produto($prod_cod);

                $imagem2 = "./img/user-img/". uniqid("principal") . $_FILES["fileImg"]["name"];
                move_uploaded_file($_FILES["arquivo2"]["tmp_name"], $imagem2);
                $img->setimagem_produto($imagem2);
                $img->salvar();

                $img->setcod_produto($prod_cod);

                $imagem3 = "./img/user-img/". uniqid() . $_FILES["fileImg"]["name"];
                move_uploaded_file($_FILES["arquivo3"]["tmp_name"], $imagem3);
                $img->setimagem_produto($imagem3);
                $img->salvar();

                $img->setcod_produto($prod_cod);

                $imagem4 = "./img/user-img/". uniqid() . $_FILES["fileImg"]["name"];
                move_uploaded_file($_FILES["arquivo4"]["tmp_name"], $imagem4);
                $img->setimagem_produto($imagem4);
                $img->salvar();

                $img->setcod_produto($prod_cod);

                $imagem5 = "./img/user-img/". uniqid() . $_FILES["fileImg"]["name"];
                move_uploaded_file($_FILES["arquivo5"]["tmp_name"], $imagem5);
                $img->setimagem_produto($imagem5);
                $img->salvar();

                include_once 'php-conexao-modelagem/link.php';
                $link = new Link();
                include_once 'novo_produto.php';
                $new = new novo_produto();

                $link->setcod_produto($prod_cod);
                $link->setlink_edicao($new->editing_page($prod_cod));
                $link->setlink_compra($new->buying_page($prod_cod));
                $link->salvar();

                echo "<script language='JavaScript'>window.location.replace('tela-anunciante.php');</script>";

            }
        ?>

    <?php include 'footer.php'; ?>

    </div>
    
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
<script src="../conteudos/js/c_anuncio.js"></script>
</php>