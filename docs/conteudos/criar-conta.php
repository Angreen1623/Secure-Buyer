<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/criesuacon.css">
</head>
<body>

    <!-- Inicio da página -->
    <div class="wrapper">

        <?php include 'navbar.php'; ?>
        
    </div>
    <!--INCIO "CRIE SUA CONTA"-->
    <!--titulo escrito "crie sua conta"-->
    <div class="content">
        <div class="box">
            <div class="title">
                <h1>CRIE SUA CONTA</h1>
            </div>
            <!--inicio do formulário "crie sua conta"-->
            <div class="formulariocriesuaconta">
                <form name="formu" onsubmit="return validar()"   method="POST">
                    <!--nesta div o usuario ira digitar seu nome e seu sobrenome-->
                    <div>
                        <label title="Digite seu nome">Nome</label>
                        <input type="text" name="nome" required  onkeypress="return blockletras(window.event.keyCode)">
                        </div> 
                        <div>
                        <label title="Digite seu sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" required  onkeypress="return blockletras(window.event.keyCode)">
                    </div>
                    <div>
                        <!--nesta div o usuario ira digitar seu email-->
                        <label title="Digite seu email">E-mail</label>
                        <input type="text" name="email" required>
                    </div>
                    <div>
                        <!--nesta div o usuario ira digitar sua senha e ira confirmar a senha digitada-->
                        <label title="Digite sua senha">Senha</label>
                        <input type="password" id="senha" name="senha" required><!--comando usado para senha aparecer com privacidade-->
                    </div>
                    <div>
                        <label title="Confirme sua senha">Confirmar senha</label>
                        <input type="password" id="confsenha" name="confirmarsenha" required><!--comando usado para a confirmação de senha aparecer com privacidade-->
                    </div>
                    <div class="errorDiv" id="errorDiv" style="color: red; font-size: 0.9em;"></div><!-- div do erro-->
                    <div>
                        <input type="submit" value="Crie sua conta" name="btncadastro"><!--botao criado para a criação de conta do usuario-->
                    </div>
                </form>
            </div>
        </div>

        <?php include 'footer.php'; ?>
        
    <!--fim do formulario "crie sua conta"-->
    </div>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btncadastro)){
            include_once 'php-conexao-modelagem/perfil.php';
            $per = new Perfil();
                $per->setnome($nome);
                $per->setsobrenome($sobrenome);
                $per->setemail(strtolower($email));
                $per->setsenha(password_hash($senha, PASSWORD_DEFAULT));
                $per->salvar();

                $sqlresult = $per->obterid();
                
                if(!empty($_SERVER['HTTP_CLIENTE_IP'])){
                    $ip_maquina = $_SERVER['HTTP_CLIENTE_IP'];
                }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                    $ip_maquina = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else{
                    $ip_maquina = $_SERVER['REMOTE_ADDR'];
                }

                foreach ($sqlresult as $row) {
                    include_once 'php-conexao-modelagem/conexao.php';
                    $ip = new Conexao();
                    $ip->setendereco_ip($ip_maquina);
                    $ip->setcod_perfil($row['cod_perfil']);

                    $ips = $ip->listar();
                    foreach($ips as $row2){
                        if($ip_maquina = $row2['endereco_ip']){
                            $ip->alterar();
                            echo "<script language='JavaScript'>window.location.replace('./index.php');</script>";
                        }
                    }
                    $ip->salvar();
                    echo "<script language='JavaScript'>window.location.replace('./index.php');</script>";
                }
            }
    ?>




</body>
<!--javascript-->
<script src="js/script.js"></script>
<script src="../conteudos/js/criesuacon.js"></script>
</html>