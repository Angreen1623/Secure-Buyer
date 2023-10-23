<?php

class novo_produto{

function buying_page($codper, $nome, $desc, $peca, $preco, $gender){

    $link = "./user-pages/".uniqid("produto", false).".php";

    $myfile = fopen($link, "w") or die("Unable to open file!");

    include_once "./php-conexao-modelagem/produto.php";

    $prod = new Produto();
    $prod->setcod_perfil($codper);
    $prod->settitulo_produto($nome);
    $prod->setdescricao_produto($desc);
    $prod->settipo_peca($peca);
    $prod->setpreco_produto($preco);
    $prod->setsexo($gender);

    $produtos = $prod->obterid();
    foreach($produtos as $row){
        $prod_cod = $row["cod_produto"];
    }

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

                    $prod->setcod_produto('.$prod_cod.');
                    $produtos = $prod->consultar2();
                ?>
                <div class="images">
                    <div class="img-group">

                        <div class="prod-selectimg">
                            <div class="image-option">
                                <img src="../img/modelo18.png" alt="">
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

                $per->setcod_perfil('.$codper.');
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
                            '.$desc.'
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
    </php>';

    fwrite($myfile, $txt);

    fclose($myfile);

    return $link;

}


















function editing_page($codper, $nome, $desc, $peca, $preco, $gender){

    $link = "./user-pages/".uniqid("edicao", false).".php";

    $myfile = fopen($link, "w") or die("Unable to open file!");

    include_once "./php-conexao-modelagem/produto.php";

    $prod = new Produto();
    $prod->setcod_perfil($codper);
    $prod->settitulo_produto($nome);
    $prod->setdescricao_produto($desc);
    $prod->settipo_peca($peca);
    $prod->setpreco_produto($preco);
    $prod->setsexo($gender);

    $produtos = $prod->obterid();
    foreach($produtos as $row){
        $prod_cod = $row["cod_produto"];
    }

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
        <link rel="stylesheet" href="../css/edt-anuncio.css">
        
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
    
            <div class="editar-anuncio">

                <?php 

                    include_once "../php-conexao-modelagem/produto.php";
                    $prod = new Produto();

                    $prod->setcod_produto('.$prod_cod.');
                    $produto = $prod->consultar2();
                    foreach ($produto as $row) {

                        $titulo = $row["titulo_produto"];
                        $descricao = $row["descricao_produto"];
    
                    }
                
                ?>
    
                <div class="form-container">
                    <div class="title">
                        <h1>Editar Anúncio</h1>
                    </div>
    
                    <div class="form">
                        <form action="" method="POST">
                            <div class="vertical-group">
                                <div class="label">
                                    <p>Título</p>
                                </div>
                                <input type="text" name="nome" value="<?php echo $titulo; ?>">
                            </div>
                            <div class="vertical-group">
                                <div class="label">
                                    <p>Descrição</p>
                                </div>
                                <input type="text" name="desc" class="descricao" value="<?php echo $descricao; ?>">
                            </div>
                            <div class="vertical-group">
                                <div class="label">
                                    <p>Quantidade</p>
                                </div>
                                <span class="btn-qnt">-</span>
                                <span>1</span>
                                <span class="btn-qnt">+</span>
                            </div>
                            <div class="vertical-group">
                                <div class="label">
                                    <p>Aplicar promoção</p>
                                </div>
                                <input type="text" name="promoção" placeholder="Valor do desconto">
                            </div>
                            <div class="button">
                                <div class="btn">
                                    <span>Cancelar</span>
                                </div>
                                <div class="btn">
                                    <input type="submit" name="btnalterar" value="Confirmar mudanças">
                                </div>
                            </div>
                        </form>
                    </div>
    
                    <div class="image">
                        <img src="../img/modelo21.png" alt="">
                    </div>
    
                </div>
            </div>
    
            <?php
    
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnalterar)){
                    
                $prod->setcod_produto('.$prod_cod.');
                $prod->settitulo_produto($nome);
                $prod->setdescricao_produto($desc);

                $prod->alterar();
    
                }
    
            ?>
    
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
    </php>';

    fwrite($myfile, $txt);

    fclose($myfile);

    return $link;

}

}

?>