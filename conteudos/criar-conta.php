<!DOCTYPE html>
<html lang="pt-br">
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
        <!-- Inicio da navbar -->
        <header>
            <!-- início navbar mais a cima -->
            <div class="topbar">

                <!-- div da lupa c/ seu texto-->
                <div class="left">
                    <label>
                        <!-- icone da lupa -->
                        <img src="../conteudos/img/lupa.png" alt="">
                        <!-- texto da lupa -->
                        <input type="search" placeholder="Pesquisar">
                    </label>
                </div>
                <!-- fim da lupa -->

                <!-- div da logo -->
                <div class="logo">

                    <!-- se vc clicar na logo volta para o index -->
                    <a href="../index.html">
                        <!-- foto da logo -->
                        <img src="../conteudos/img/logo-sb.png" alt="Icone">
                    </a>

                </div>
                <!-- fim da logo -->

                <!-- div dos conteúdos da direita, carrinho e login -->
                <div class="right">


                    <!-- grupo do login -->
                    <div class="group">
                        <!-- se clicar no link vai para criar conta -->
                        <a class="singin-btn" href="<?php extract($_POST, EXTR_OVERWRITE); if(isset($cod_perfil)){
                            echo 'perfil.php';
                        }else{ 
                            echo 'entrar.php';
                        }?>">
                            <!-- foto do login -->
                            <img src="conteudos/img/user.png" alt="Logar">
                        </a>
                    </div>
                    <!-- fim do grupo do login -->

                    <!-- grupo do carrinho -->
                    <div class="group">
                        <!-- se clicar no link abre o carrinho -->
                        <a id="bag-btn" class="bag-btn" href="#">
                            <!-- imagem da sacola -->
                            <img src="../conteudos/img/bag.png" alt="Sacola">
                        </a>
                    </div>
                    <!-- fim do grupo -->

                </div>
                <!-- div do grupo -->

            </div>
            <!-- fim da barra superior -->

        <div class="bag">
            <span class="close-icon"><img src="img/close.png" alt="fechar"></span>
            <div class="bag-sidebar">
                <div class="bag-title">
                    <h4>Meu carrinho</h4>
                </div>
                <div class="bag-body">

                    <div class="bag-item">
                        <div class="img">
                            <img src="img/modelo15.png" alt="">
                        </div>
                        <div class="text">
                            <div class="bag-info">
                                <h5>Jaqueta</h5>
                                <h3>MIUMIU</h3>
                            </div>
                            <h5 class="bag-price">R$350,00</h5>
                            <span>- 1 +</span>
                            <div class="right">
                                <img src="img/del.png" alt="deletar">
                            </div>
                        </div>
                    </div>

                    <div class="bag-item">
                        <div class="img">
                            <img src="img/modelo16.png" alt="">
                        </div>
                        <div class="text">
                            <div class="bag-info">
                                <h5>Jaqueta</h5>
                                <h3>RIACHUELO</h3>
                            </div>
                            <h5 class="bag-price">R$115,00</h5>
                            <span>- 1 +</span>
                            <div class="right">
                                <img src="img/del.png" alt="deletar">
                            </div>
                        </div>
                    </div>
                    <div class="bag-buy">

                        <div class="group cupom">
                            <img src="img/cupom.png" alt="">
                            <h3>Adicionar cupom de desconto</h3>
                        </div>

                        <div class="itens">
                            <h4 class="left">Frete:</h4>

                            <div class="group right">
                                <img src="img/frete.png" alt="">
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
    </div>
    <!--INCIO "CRIE SUA CONTA"-->
    <!--titulo escrito "crie sua conta"-->
    <aside>
        <br><h1>CRIE SUA CONTA</h1>
    </aside>
    <!--inicio do formulário "crie sua conta"-->
    <div class="formulariocriesuaconta">
        <form name="formu" onsubmit="return criesuacon()" method="post">
            <!--nesta div o usuario ira digitar seu nome e seu sobrenome-->
            <div>
                <label title="Digite seu nome">Nome</label>
                <input type="text" name="nome" require>
                </div> 
                <div>
                <label title="Digite seu sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" require>
            </div>
            <div>
                <!--nesta div o usuario ira digitar seu email-->
                <label title="Digite seu email">E-mail</label>
                <input type="text" name="email" require>
            </div>
            <div>
                <!--nesta div o usuario ira digitar sua senha e ira confirmar a senha digitada-->
                <label title="Digite sua senha">Senha</label>
                <input type="password" id="senha" name="senha" require><!--comando usado para senha aparecer com privacidade-->
            </div>
            <div>
                <label title="Confirme sua senha">Confirmar senha</label>
                <input type="password" id="senha" name="confirmarsenha" require><!--comando usado para a confirmação de senha aparecer com privacidade-->
            </div>
            <div>
                <input type="submit" value="Crie sua conta" name="btncadastro" require><!--botao criado para a criação de conta do usuario-->
            </div>
        </form>
    </div>
    <!--fim do formulario "crie sua conta"-->

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btncadastro)){
            include_once 'php-conexao-modelagem/perfil.php';
            $per = new Perfil();

            if($senha != $confirmarsenha) {
                echo "As senhas devem ser iguais";
            }else{
                
                $per->setnome($nome);
                $per->setsobrenome($sobrenome);
                $per->setemail($email);
                $per->setsenha($senha);
                $per->salvar();

                $sqlresult = $per->listar();
                foreach ($sqlresult as $row) {
                    echo "<form method='post' name='cod' action='../index.php'><input type='hidden' name='cod_perfil' value='".$row['cod_perfil']."'>";
                    echo "<script language='JavaScript'>document.cod.submit();</script></form>";
                }
            }
        }
    ?>




</body>
<!--javascript-->
<script src="js/script.js"></script>
<script src="conteudos/js/criesuacon.js"></script>
</html>