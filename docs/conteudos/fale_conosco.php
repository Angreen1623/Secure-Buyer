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
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fale_conosco.css">
    
</head>

<body class="body">
    
    <div class="wrapper">

        <?php include 'navbar.php'; ?>

        <div class="fale-conosco">
        
            <main class="texto">
                <aside>
                    <h1>CONTATO</h1>
                    <p>Olá, teve problemas com uma loja que indicamos? Entre em contato conosco para que possamos melhorar o nosso atendimento.</p>
                </aside>
            </main>

            <!--formulário-->

            <div class="formulario">
                <form name="formul" action="" method="post">
                    <div>
                        <label title="Digite seu email.">E-mail</label>
                        <input type="text" name="email"/>
                    </div>
                    <div>
                        <label title="Informe um título">Título</label>
                        <input type="text" name="titulo">
                    </div>
                    <div>
                        <label title="Digite sua mensagem para nós.">Mensagem</label>
                        <textarea rows="5" name="mensagem" style="resize:none;"></textarea>
                    </div>
                    <div>
                        <input name="btnenviar" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>

        <?php include 'footer.php'; ?>

    </div>

    <!-- 
    <?php
    extract($_POST, EXTR_OVERWRITE);
    if(isset($btnenviar))
    {
        include_once './php-conexao-modelagem/fale_conosco.php';
        $msg=new Fale();

        $msg->setemail_cli($email);
        $msg->settitulo($titulo);
        $msg->setreclamacao($mensagem);
        echo "<h3><br><br>" . $msg->salvar() . "</h3>";

    }
    ?>
    -->
    
    
</body>
<!--javascript-->
<script src="js/script.js"></script>
</php>
