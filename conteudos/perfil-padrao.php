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
    <link rel="stylesheet" href="../conteudos/css/perfil-padrao.css">
    
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
                    <a href="../index.php">
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
                        <a class="singin-btn" href="<?php
                            include_once 'php-conexao-modelagem/conexao.php';
                            $ip = new Conexao();

                            if(!empty($_SERVER['HTTP_CLIENTE_IP'])){
                                $ip_maquina = $_SERVER['HTTP_CLIENTE_IP'];
                            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                                $ip_maquina = $_SERVER['HTTP_X_FORWARDED_FOR'];
                            }else{
                                $ip_maquina = $_SERVER['REMOTE_ADDR'];
                            }
                            $ip->setendereco_ip($ip_maquina);
                    
                            $ips = $ip->listar();
                    
                            foreach($ips as $row){
                                if($ip_maquina = $row['endereco_ip']){
                                    $codper = $row['cod_perfil'];
                                }
                            }
                        
                        if(isset($codper)){
                            echo 'perfil-padrao.php';
                        }else{ 
                            echo 'entrar.php';
                        }?>">
                            <!-- foto do login -->
                            <img src="../conteudos/img/user.png" alt="Logar">
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

            <?php
                include_once 'php-conexao-modelagem/perfil.php';
                $perfil = new Perfil();
                $perfil->setcod_perfil($codper);
                $dadosPerfil = $perfil->alterar();
                $perfis = $perfil->consultar();

                $loja = false;
                foreach($perfis as $row){
                    if($row['cnpj'] != NULL){
                        $loja = true;
                    }
                }

                foreach ($dadosPerfil as $mostrar_dados) {
                
                ?>

        <div class="meuperfil">
            <div class="meuperfil-dados">
                <div class="group">
                    <div class="img <?php if($loja == true){
                        echo "open";
                    } ?>">
                        <img src="<?php echo $mostrar_dados[6]?>" alt="Foto Perfil">
                <?php
                }
                ?>
                    </div>
                    <div class="text">
                        <div class="title">
                            <h1>Minha conta</h1>
                        </div>
                        <div class="subtitle">
                            <p>Veja seus dados pessoais</p>
                        </div>
                    </div>
                </div>

        <!--inicio do php para preencher os campos-->


        <?php
        $perfil->setcod_perfil($codper);
        $dadosPerfil = $perfil->alterar();
        ?>
        <form action="" method="POST">
        <?php
        foreach ($dadosPerfil as $mostrar_dados) {
        
        ?>
                <div class="dados">
                    <div class="dados-item">
                        <h3>Nome</h3>
                        <input type="text" value='<?php echo $mostrar_dados[0]?>' name="nome" required>
                    </div>
                    <div class="dados-item">
                        <h3>Sobrenome</h3>
                        <input type="text" value='<?php echo $mostrar_dados[1]?>'  name="sobrenome" required>
                    </div>
                    <div class="dados-item">
                        <h3>Email</h3>
                        <input type="text" value='<?php echo $mostrar_dados[2]?>'  name="email" required>
                    </div>
                    <div class="dados-item">
                        <h3>Nova senha</h3>
                        <input type="password" value=""  name="nova_senha">
                    </div>
                    <div class="dados-item">
                        <h3>Confirmar nova senha</h3>
                        <input type="password" value="" name="confirmar_senha">
                    </div>
                    <div class="dados-item">
                        <input type="hidden" value='<?php echo $pro_mostrar[4]?>' name="cod_perfil">
                    </div>
                </div>

                <div class="buttons">
                    <input name = "btnalterar" type="submit" value="Alterar">
                    <br><br><input name = "btnlogout" type="submit" value="Deslogar">
                    <?php

                        include_once 'php-conexao-modelagem/conexao.php';
                        $ip = new Conexao();
                        $perfil = new Perfil();
                    
                        foreach($ips as $row){
                            if($ip_maquina = $row['endereco_ip']){
                                $codper = $row['cod_perfil'];
                            }
                        }

                        $perfil->setcod_perfil($codper);

                        

                        if($loja == true){
                            echo "<a class='become-btn' href='tela-anunciante.php'>Perfil da loja</a>";
                        }else{
                            echo "<a class='become-btn' href='tornar-anunciante.php'>Tornar-se anunciante</a>";
                        }
                    
                    ?>
                </div>
              </div>
            </form>
            <?php
             }
             ?>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnalterar)) {
        $senha_nova = isset($nova_senha) ? $nova_senha : "";
        $confirmar_senha = isset($confirmar_senha) ? $confirmar_senha : "";
        $senhasicorr = true;

        if ($senha_nova == $confirmar_senha) {
            $senha = $senha_nova;
            $senhasicorr = false;

            $perfil = new Perfil();
            $perfil->setnome($nome);  
            $perfil->setsobrenome($sobrenome); 
            $perfil->setemail($email);
            $perfil->setsenha($senha);
            $perfil->setcod_perfil($codper);
            echo "<br><br><h3>" . $perfil->alterar2() . "</h3>";
            echo "<script language='JavaScript'>window.location.replace('./perfil-padrao.php');</script>";
        } else {
            $senhasicorr = true;
        }
        }
        ?>
       
        <?php
        include_once 'php-conexao-modelagem/conexao.php';
        if (isset($btnlogout)){
        extract($_POST, EXTR_OVERWRITE);
        $sair = new Conexao();
        echo "<br><br><h3>" . $sair->excluir() . "</h3>";
        echo "<script language='JavaScript'>window.location.replace('./entrar.php');</script>";
         }
        ?>
          <!--fim do php para preencher os campos e alterar-->
            

            <div class="pedidos">
                <div class="pedidos-box">
                    <div class="group">
                        <div class="img">
                            <img src="img/frete.png" alt="">
                        </div>
                        <div class="text">
                            <div class="title">
                                <h1>Meus pedidos recentes</h1>
                            </div>
                            <div class="subtitle">
                                <p>Veja seus últimos pedidos realizados</p>
                            </div>
                        </div>
                    </div>

                    <div class="pedidos-item">
                        <div class="group-images">
                            <div class="image">
                                <img src="img/modelo2.png" alt="Jaqueta em denim">
                            </div>
                            <div class="description">
                                <div class="name">
                                    <div class="title">
                                        <h2>Jaqueta em denim</h2>
                                    </div>
                                    <div class="loja">
                                        <h3>MIUMIU</h3>
                                    </div>
                                </div>
                                <div class="price">
                                    <p>R$ 350,00</p>
                                </div>
                            </div>
                        </div>

                        <div class="btn">
                            <span>Cancelar compra</span>
                        </div>
                    </div>

                    <div class="pedidos-item">
                        <div class="group-images">
                            <div class="image">
                                <img src="img/modelo3.png" alt="Blusa em denim decorado">
                            </div>
                            <div class="description">
                                <div class="name">
                                    <div class="title">
                                        <h2>Blusa em denim decorado</h2>
                                    </div>
                                    <div class="loja">
                                        <h3>RIACHUELO</h3>
                                    </div>
                                </div>
                                <div class="price">
                                    <p>R$ 115,00</p>
                                </div>
                            </div>
                        </div>

                        <div class="btn">
                            <a href="">Reembolsar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(isset($senhasicorr)) {
            if($senhasicorr = true){
                echo " <div class="."depurar"."> <h3>As senhas não coincidem.</h3> </div>";
            }
        }
        ?>

        <div class="bag">
            <span class="close-icon"><img src="../conteudos/img/close.png" alt="fechar"></span>
            <div class="bag-sidebar">
                <div class="bag-title">
                    <h4>Meu carrinho</h4>
                </div>
                <div class="bag-body">

                    <div class="bag-item">
                        <div class="img">
                            <img src="../conteudos/img/modelo15.png" alt="">
                        </div>
                        <div class="text">
                            <div class="bag-info">
                                <h5>Jaqueta</h5>
                                <h3>MIUMIU</h3>
                            </div>
                            <h5 class="bag-price">R$350,00</h5>
                            <span>- 1 +</span>
                            <div class="right">
                                <img src="../conteudos/img/del.png" alt="deletar">
                            </div>
                        </div>
                    </div>

                    <div class="bag-item">
                        <div class="img">
                            <img src="../conteudos/img/modelo16.png" alt="">
                        </div>
                        <div class="text">
                            <div class="bag-info">
                                <h5>Jaqueta</h5>
                                <h3>RIACHUELO</h3>
                            </div>
                            <h5 class="bag-price">R$115,00</h5>
                            <span>- 1 +</span>
                            <div class="right">
                                <img src="../conteudos/img/del.png" alt="deletar">
                            </div>
                        </div>
                    </div>

                    <div class="bag-buy">

                        <div class="group cupom">
                            <img src="../conteudos/img/cupom.png" alt="">
                            <h3>Adicionar cupom de desconto</h3>
                        </div>

                        <div class="itens">
                            <h4 class="left">Frete:</h4>

                            <div class="group right">
                                <img src="../conteudos/img/frete.png" alt="">
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
    
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
</php>