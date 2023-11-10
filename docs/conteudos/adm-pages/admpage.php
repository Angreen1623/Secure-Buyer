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
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admpage.css">

</head>
<body class="body">

        <div class="content">
            <div class="box">
                <div class="title">
                    <h1>Seja Bem Vindo</h1>
                </div>
                        <div class="buttons">


                            <a href="./admcupom.php"><input type="button" value="Criar cupom" name="btncupom"></a>
                            <a href="./admvalidation.php"><input type="button" value="Validar produtos" name="btnverificar"><a>
                            <a href="./admtalk.php"><input type="button" value="Verificar email" name="btnfaleconosco"></a>
                            
                        </div>
                        <div class="buttons">
                            <form action="" method="post">
                                <input type="submit" value="Deslogar" name="btndeslogar">
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btndeslogar)){
                include_once '../php-conexao-modelagem/conexao.php';
                $sair = new Conexao();

                $sair->excluir();
                echo "<script language='JavaScript'>window.location.replace('../entrar.php');</script>";
            }
        ?>
       
        
    </div>
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
<script src="../conteudos/js/entrar.js"></script>
</php>