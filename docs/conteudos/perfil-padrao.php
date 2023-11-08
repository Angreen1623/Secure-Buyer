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
<body class="body">

    <!-- Inicio da página -->
    <div class="wrapper">
        <?php include 'navbar.php'; ?>  

            <?php
                include_once 'php-conexao-modelagem/perfil.php';
                $perfil = new Perfil();
                if(!isset($codper)){
                    echo "<script language='JavaScript'>window.location.replace('./index.php');</script>";
                }
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
        <form name = "formul" onsubmit="return validaAlteracao()" method="POST">
        <?php
        foreach ($dadosPerfil as $mostrar_dados) {
        
        ?>
                <div class="dados">
                    <div class="dados-item">
                        <h3>Nome</h3>
                        <input type="text" value='<?php echo $mostrar_dados[0]?>' name="nome" onkeypress="return blockletras(window.event.keyCode)" required>
                    </div>
                    <div class="dados-item">
                        <h3>Sobrenome</h3>
                        <input type="text" value='<?php echo $mostrar_dados[1]?>'  name="sobrenome" onkeypress="return blockletras(window.event.keyCode)" required>
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

                <div class="errorDiv" id="errorDiv" style="color: red; font-size: 0.9em;"></div>


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
            $perfil->setsenha(password_hash($senha, PASSWORD_DEFAULT));
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

                    <?php

                    include_once "./php-conexao-modelagem/pedidos_realizados.php";
                    $ped = new Pedidos_realizados();
                    include_once "./php-conexao-modelagem/carrinho.php";
                    $cart = new Carrinho();

                    include_once "./php-conexao-modelagem/imagem_produto.php";
                    $img = new Imagem();
                    include_once "./php-conexao-modelagem/produto.php";
                    $prod = new Produto();

                    include_once "./php-conexao-modelagem/perfil.php";
                    $per = new Perfil();

                    $pedido_realizado = false;

                    $n = 0;

                    $cart->setcod_perfil($codper);
                    
                    foreach($cart->consultar() as $row){

                        $ped->setcod_carrinho($row['cod_carrinho']);

                        foreach($ped->consultar() as $row2){

                            $cod_realizado = $row2['cod_carrinho'];
                            
                            $data = $row2["data_compra"];
    
                            if($cod_realizado == $row['cod_carrinho']){

                                $n++;

                                $pedido[$n] = intval($row['cod_carrinho']);

                                $pedido_realizado = false;

                            $prod->setcod_produto($row['cod_produto']);

                            foreach($prod->consultar2() as $row3){

                                $nome = $row3["titulo_produto"];
                                $preco = $row3["preco_produto"];
                                $codper_anun = $row["cod_perfil"];

                            }

                            $per->setcod_perfil($codper_anun);
                            foreach ($per->consultar() as $row3) {

                                $loja = $row3["nome_loja"];

                            }
                            
                            $qnt = $row["qnt_pro"];
                    
                    ?>

                    <div class="pedidos-item">
                        <div class="group-images">
                            <div class="image">
                                <?php $img->setcod_produto($row['cod_produto']);
                                foreach($img->consultar2() as $row2){
                                $imagem = $row2["imagem_produto"];?>
                                <div class="image-option">

                                    <?php if(str_contains($imagem, "principal")){ ?>
                                        <img src="<?php echo $imagem; ?>" alt="">
                                    <?php } ?>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="description">
                                <div class="name">
                                    <div class="title">
                                        <h2><?php echo $nome." x".$qnt; ?></h2>
                                    </div>
                                    <div class="loja">
                                        <h3><?php echo $loja; ?></h3>
                                    </div>
                                </div>
                                <div class="price">
                                    <p>R$ <?php  echo number_format($preco,2,",",".");?></p>
                                </div>
                            </div>
                        </div>

                        <div class="btn">
                            <form action="./script/apagar_item.php" method="post">
                                <input type="hidden" name="pedido" value="<?php echo $pedido[$n]; ?>">

                                <?php if($data == date("Y-m-d")){?>
                                    <input type="submit" name="cancelar" value="Cancelar compra">
                                <?php }else{ ?>
                                    <input type="submit" name="reembolsar" value="Pedir reembolso">
                                <?php } ?>
                            </form>
                        </div>
                    </div>


                    <?php }
                            }
    
                        }
                        
                        ?>
                    
                    <!-- <div class="pedidos-item">
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
                    </div> -->
                </div>
            </div>
        </div>

        <?php
        if(isset($senhasicorr)) {
            if($senhasicorr = true){
                echo "<script>document.getElementById('errorDiv').textContent = 'As senhas não coincidem.';</script>";
            }
        }
        ?>

    <?php include 'footer.php'; ?>

    </div>
    
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
<script src="../conteudos/js/alterarperf.js"></script>
</php>