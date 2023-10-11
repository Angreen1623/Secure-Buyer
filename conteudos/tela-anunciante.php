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
        <?php include 'navbar.php'; ?>

    </div>
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
        <p class="descricao">AVALIAÇÕES: X <br> PRODUTOS: X <br> ANUNCIANTE DESDE:  XX/XX/XX</p></div>
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

            $prod->setcod_perfil($codper);
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

    <?php include 'footer.php'; ?>
</header>

<!--FINAL TELA ANUNCIANTE-->
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
</php>