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
                        <a class="singin-btn" href="<?php extract($_POST, EXTR_OVERWRITE); if(isset($cod_perfil)){
                            echo 'perfil.php';
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

        <!-- titulo da pagina -->
        <h1 class="title">CRIAR ANÚNCIO </h1>

        <!-- conteúdo da página. Ah mas o titulo faz parte do conteúdo!!! ¯\_(ツ)_/¯ -->
        <div class="content">
            <!-- o formulário -->
            <div class="form-text">
                <form action="">
                    <!-- inputs de texto e os titulos deles -->
                    <div class="form">
                        <!-- Grupo de título + input -->
                        <div class="vertical-group">
                            <!-- titulo do input -->
                            <div class="text">
                                <label class="subtitle">Título</label><br>
                            </div>
                            <!-- input -->
                            <input type="text">
                        </div>
                        <!-- fim do grupo -->

                        <!-- Grupo de título + input -->
                        <div class="vertical-group">
                            <!-- titulo do input -->
                            <div class="text">
                                <label class="subtitle">Descrição</label><br>
                            </div>
                            <!-- input -->
                            <input type="text" class="desc">
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
                                        <input type="radio" id="male" name="gender" value="male">
                                        <!-- titulo -->
                                        <label for="male" class="label">MASCULINO</label>
                                    </div>

                                    <!-- primeiro grupo, feminino -->
                                    <div class="radio-item">
                                        <!-- input -->
                                        <input type="radio" id="female" name="gender" value="female">
                                        <!-- titulo -->
                                        <label for="female" class="label">FEMININO</label>
                                    </div>

                                    <!-- primeiro grupo, unissex -->
                                    <div class="radio-item">
                                        <!-- input -->
                                        <input type="radio" id="female" name="gender" value="unissex">
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
                                        <input type="radio" id="male" name="type" value="camisa">
                                        <label for="camisa" class="label">CAMISA</label><br>
                                    </div>

                                    <!-- segundo grupo, blusa -->
                                    <div class="radio-item">
                                        <input type="radio" id="female" name="type" value="blusa">
                                        <label for="blusa" class="label">BLUSA</label><br>
                                    </div>

                                    <!-- terceiro grupo, calçado -->
                                    <div class="radio-item">
                                        <input type="radio" id="female" name="type" value="calçado">
                                        <label for="calçado" class="label">CALÇADO</label><br>
                                    </div>

                                    <!-- quarto grupo, calça -->
                                    <div class="radio-item">
                                        <input type="radio" id="female" name="type" value="calça">
                                        <label for="calça" class="label">CALÇA</label><br>
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
                                        <input type="checkbox" id="tamanhos" name="type" value="t12" class="checkbox">
                                        <label for="t12" class="label">12</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade-12" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção 14 -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tamanhos" name="type" value="t14">
                                        <label for="t14" class="label">14</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade-14" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção 16 -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tamanhos" name="type" value="t16">
                                        <label for="t16" class="label">16</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade-16" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção PP -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tamanhos" name="type" value="tpp">
                                        <label for="tpp" class="label">PP</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade-pp" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- segunda linha das opções -->
                                <div class="checkboxes">
                                    <!-- opção P -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tamanhos" name="type" value="tp">
                                        <label for="tp" class="label">P</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade-p" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção M -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tamanhos" name="type" value="tm">
                                        <label for="tm" class="label">M</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade-m" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção G -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tamanhos" name="type" value="tg">
                                        <label for="tg" class="label">G</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade-g" id="qnt" value="1" onchange="verTamanho()">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn mais">+</span>
                                        </div>
                                    </div>
                                    <!-- opção GG -->
                                    <div class="radio-item">
                                        <input type="checkbox" id="tamanhos" name="type" value="tgg">
                                        <label for="tgg" class="label">GG</label>
                                        <!-- quantidades -->
                                        <div class="quantidade">
                                            <!-- botão de menos -->
                                            <span class="subtitle btn menos">-</span>
                                            <!-- número que aumenta e diminui -->
                                            <input type="number" name="quantidade-gg" id="qnt" value="1" onchange="verTamanho()">
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
                                <img src="../conteudos/img/modelo15.png" alt="rosto">
                            </div>
                            <div class="img">
                                <img src="../conteudos/img/modelo16.png" alt="corpo">
                            </div>
                            <div class="img">
                                <img src="../conteudos/img/modelo18.png" alt="produto">
                            </div>
                        </div>
                        <!-- cabo imagem -->
                    </div>
                    <div class="vertical-group-price">
                        <div class="text">
                            <label class="subtitle">Preço</label><br>
                        </div>
                        <input type="text">
                    </div>
                    <div class="buttons">
                        <div class="btn">
                            <span>Voltar</span>
                        </div>
                        <div class="btn">
                            <span>Confirmar</span>
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>

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
    
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
<script src="../conteudos/js/c_anuncio.js"></script>
</php>