<!DOCTYPE php>
<php lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Buyer</title>
    <!--Logo-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/Icone/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/Icone/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/Icone/favicon-16x16.png">
    <link rel="manifest" href="img/Icone/site.webmanifest">
    <!--css-->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body class="body">

    <div class="modal-background">
        <div class="janela-modal">
            <div class="title">
                <h1>Acompanhe seu pedido</h1>
            </div>
            <div class="content">
                <p>Codigo de rastreio do produto:   NF4258783110BR</p>
            </div>
            <div class="btn">
                <form action="" method="post">
                    <button name="voltar">Confirmar</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($voltar)){
            header("Location: ./index.php");
        }
    ?>
    
</body>
<!--javascript-->
<script src="js/script.js"></script>
</php>