<!DOCTYPE html>
<html lang="pt-br">
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
    <link rel="stylesheet" href="../conteudos/css/tornar.css">
    
</head>
<body>

    <!-- Inicio da página -->
    <div class="wrapper">

    <?php include 'navbar.php'; ?>

        <div class="tornar-anunciante">
  
            <?php
                include_once 'php-conexao-modelagem/perfil.php';
                $perfil = new Perfil();
                $perfil->setcod_perfil($codper);
                $dadosPerfil = $perfil->alterar();
            ?>

            <div class="form-container">
                <form action="" enctype="multipart/form-data" method="POST">
                    <div class="title">
                        <h1>Tornar-se anunciante</h1>
                    </div>

                    <div class="form">
                        <div class="text-form">
                            
                            <div class="vertical-group">
                                <div class="label">
                                    <p>CNPJ</p>
                                </div>
                                <input type="text" name="cnpj" onblur="checkcnpj(this.value)" data-mask="00.000.000/0000-00" class="cnpjmask" required>
                            </div>
                            <div id="cnpj-error-message" style="color: red; display: none;">
                             Digite um CNPJ válido.
                            </div>
                            <div class="vertical-group">
                                <div class="label">
                                    <p>Nome da loja</p>
                                </div>
                                <input type="text" name="nome_loja" required>
                            </div>

                            <div class="button">
                                <div class="btn1">
                                <a href="perfil-padrao.php">Voltar</a>
                                </div>
                                <div class="btn2">
                                    <input name ="btnconfirmar" type="submit" value="Confirmar mudanças">
                                </div>
                            </div>
                        </div>

                        <div class="img-form">
                            <div class="img">
                                <label for='imagem'> <img src="./img/nova-foto.png" alt="Adicione uma imagem"></label>
                                <input type="file" name="arquivo" id="imagem" accept=".jpeg, .jpg, .png" onchange="return tamanho_imagem()">
                            </div>
                            <div class="description">
                                <p>Adicionar foto</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php include 'footer.php'; ?>
       
       <?php
        include_once 'php-conexao-modelagem/perfil.php';
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnconfirmar)) {
        
            if(isset($_FILES["arquivo"]) && !empty($_FILES["arquivo"])){
                $imagem = "./img/user-img/". uniqid() . $_FILES["fileImg"]["name"];

                move_uploaded_file($_FILES["arquivo"]["tmp_name"], $imagem);

                $perfil = new Perfil();
                $perfil->setnome_loja($nome_loja);  
                $perfil->setcnpj($cnpj); 
                $perfil->setcod_perfil($codper);
                $perfil->setimagem($imagem);
                echo "<br><br><h3>" . $perfil->alterar3() . "</h3>";
                echo "<script language='JavaScript'>window.location.replace('tela-anunciante.php');</script>";
            }

            }

        ?>
    </div>
    

<!--javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script><!--link da api para a mascara-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

<script src="../conteudos/js/script.js"></script>
<script src="../conteudos/js/taunun.js"></script>
</body>
</html>