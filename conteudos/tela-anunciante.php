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
        include_once 'php-conexao-modelagem/link.php';
        $link = new Link();
        include_once 'php-conexao-modelagem/perfil.php';
        $perfil = new Perfil();
        $perfil->setcod_perfil($codper);

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
                        <a href="<?php  
                            $link->setcod_produto($row['cod_produto']);
                            $links = $link->consultar();

                            foreach($links as $row2){
                                $link_res = $row2['link_edicao'];
                                echo $link_res;
                            } 
                            ?>">

                        <img src="<?php
                        $img->setcod_produto($row['cod_produto']);
                        $imagens = $img->consultar2();
                        foreach($imagens as $row2){
                            $imagem = $row2['imagem_produto'];

                            if(str_contains($imagem, 'vitrine'))
                            echo $imagem;
                        }
                        ?>" alt="" class="imgmodelo1">
                    </a>
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

<?php include 'footer.php'; ?>

<!--FINAL TELA ANUNCIANTE-->
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
</php>