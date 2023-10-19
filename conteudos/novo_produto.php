<?php

class novo_produto{

function buying_page($codper, $nome, $desc, $peca, $preco, $gender){

    $link = uniqid("produto", false).".php";

    $myfile = fopen($link, "w") or die("Unable to open file!");

    $txt = '<!DOCTYPE php>
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
        <link rel="stylesheet" href="../conteudos/css/produto.css">
        
    </head>
    <body>

        <!-- Inicio da página -->
        <div class="wrapper">
        <?php include "navbar.php"; ?>

            <div class="produto-info">
                <?php
                    extract($_POST, EXTR_OVERWRITE);
                    include_once "php-conexao-modelagem/imagem_produto.php";
                    $img = new Imagem();
                    include_once "php-conexao-modelagem/produto.php";
                    $prod = new Produto();

                    $prod->setcod_perfil("'.$codper.'");
                    $prod->settitulo_produto("'.$nome.'");
                    $prod->setdescricao_produto("'.$desc.'");
                    $prod->settipo_peca("'.$peca.'");
                    $prod->setpreco_produto("'.$preco.'");
                    $prod->setsexo("'.$gender.'");

                    $prod->salvar();
                    $produtos = $prod->obterid();

                    foreach($produtos as $row){
                        $prod_cod = $row["cod_produto"];
                    }

                    $prod->setcod_produto($prod_cod);
                    $produtos = $prod->consultar2();
                ?>
                <div class="images">
                    <div class="img-group">

                        <div class="prod-selectimg">
                            <div class="image-option">
                                <img src="img/modelo18.png" alt="">
                            </div>
                        </div>
                    
                        <div class="prod-img">
                            <img src="<?php
                            ?>" alt="Modelo da roupa">
                        </div>
                    </div> 
                </div>

                <div class="prod-info">

                    <div class="info-item">
                        <h1 class="title">'.$nome.'</h1>
                        <h1 class="price">R$'.$preco.'</h1>
                    </div>

                    <div class="info-item">
                        <h2>Selecionar Tamanho:</h2>
                        <div class="sizes">
                            <table>
                            <tr>
                                <td class="selected">12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>PP</td>
                            </tr>
                            <tr>
                                <td>P</td>
                                <td class="selected">M</td>
                                <td class="selected">G</td>
                                <td>GG</td>
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
                        <span class="btn">Adicionar à carrinho</span>
                        <div class="more">
                            <span class="underline about-btn">Sobre a loja</span>
                        </div>
                        <div class="more">
                            <span class="underline detail-btn">Detalhes do produto</span>
                        </div>
                    </div>
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
                                    <img src="img/modelo13.png" alt="">
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
                <span class="close-about"><img src="../conteudos/img/close.png" alt="fechar"></span>
                <div class="about-sidebar">
                    <div class="title">
                        <h4>Sobre a loja</h4>
                    </div>
                    <div class="about-body">

                        <div class="group">
                            <div class="img">
                                <img src="img/modelo12.png" alt="">
                            </div>

                            <div class="profile">
                                <div class="name">
                                    <h1>Glamour Global - Isabella Grenzel</h1>
                                </div>

                                <span class="btn">Visitar loja</span>
                            </div>

                        </div>

                        <div class="description">
                            <span>Avaliações: 40</span>
                            <span>Produtos: 50</span>
                            <span>Anunciante desde: 11/11/2023</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="detail">
                <span class="close-detail"><img src="../conteudos/img/close.png" alt="fechar"></span>
                <div class="detail-sidebar">
                    <div class="title">
                        <h4>Detalhes do produto</h4>
                    </div>
                    <div class="detail-body">
                    <div class="description">
                        <p>
                            Decorada com cristais brilhantes, esta camiseta tem <br>
                            estilo moderno e design sóbrio. Feita em algodão, ela <br>
                            tem mangas longas e modelagem solta. <br><br>
                            •Código do produto: 001 <br>
                            •Decorada com cristais <br>
                            •Modelagem larga <br>
                            •Gola redonda <br>
                            •Mangas curtas <br>
                            •Logotipo bordado <br>
                            •Barra feita com agulha dupla <br>
                            •O(a) modelo mede 50 cm e usa tamanho 38 <br>
                            •altura: 49cm
                        </p>
                    </div>
                    <div class="description">
                        <div class="description-title"><h1>Materiais</h1></div> 
                        <div class="description-material"><h2>Algodão</h2></div>
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

            <?php include "footer.php"; ?>
            
        </div>
        
    </body>
    <!--javascript-->
    <script src="../conteudos/js/script.js"></script>
    <script src="../conteudos/js/produto.js"></script>
    </php>';

    fwrite($myfile, $txt);

    fclose($myfile);

    return $link;

}

}

?>