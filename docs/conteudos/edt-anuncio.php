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
    <link rel="stylesheet" href="../conteudos/css/edt-anuncio.css">
    
</head>
<body>

    <!-- Inicio da página -->
    <div class="wrapper">
        <?php include 'navbar.php'; ?>

        <div class="editar-anuncio">

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
                            <input type="text" name="nome">
                        </div>
                        <div class="vertical-group">
                            <div class="label">
                                <p>Descrição</p>
                            </div>
                            <input type="text" name="desc" class="descricao">
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
                    <img src="img/modelo21.png" alt="">
                </div>

            </div>
        </div>

        <?php

            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnalterar)){

            include_once './php-conexao-modelagem/produto.php';
            $prod = new Produto();

            $prod->setcod_perfil($codper);
            $prod->setcod_produto(3); //TEMPORÁRIO ---------------------------------------------------------------------------------------
            $prod->settitulo_produto($nome);
            $prod->setdescricao_produto($desc);

            }

        ?>

    <?php include 'footer.php'; ?>
    
    </div>
    
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
</php>