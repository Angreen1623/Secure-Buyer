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
    <link rel="stylesheet" href="../conteudos/css/entrar.css">

</head>
<body>

    <div class="wrapper">
        <header>
            <div class="topbar">

                <div class="left">
                    <label>
                        <img src="../conteudos/img/lupa.png" alt="">
                        <input type="search" placeholder="Pesquisar">
                    </label>
                </div>

                <div class="logo">

                    <a href="index.html">
                        <img src="../conteudos/img/logo-sb.png" alt="Icone">
                    </a>

                </div>

                <div class="right">

                    <div class="group">
                        <a class="singin-btn" href="criar-conta.html">
                            <img src="../conteudos/img/user.png" alt="Logar">
                        </a>
                    </div>

                    <div class="group">
                        <a id="bag-btn" class="bag-btn" href="#">
                            <img src="../conteudos/img/bag.png" alt="Sacola">
                        </a>
                    </div>

                </div>

            </div>

            <nav>
                <ul>
                    
                    <li><a href="#">Feminino</a></li>
                    <li><a href="#">Masculino</a></li>
                    <li>
                        <a href="#">Ajuda</a>
                        <ul class="submenu">
                            <li><a href="#">Sobre nós</a></li>
                            <li><a href="#">Fale Conosco</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </header>
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
    <div class="imagemformu">
        <img src="img/modelo001.png">
        </div>   

        <aside>
        <br><h1>ENTRAR</h1>
        </aside>

    <div class="formularioentrar">
        <form name="formul" onsubmit="return validaform()" method="post">
          <div>
            <label title="Digite seu email">E-mail</label>
            <input type="text" name="input_email">
          </div>
          <div>
            <label title="Digite uma mensagem para nós.">Senha</label>
            <input type="password" name="senha">
          </div>
          <div>
          <p class="p1">
            <span class="esquecisenha"><a href="#">Esqueci a senha</a></span>
          </p>   
        </div>       
        <div class="buttons">
            <input type="submit" value="Enviar" name="btnenviar"> 
            <input type="button" value="Voltar"> 
          </div>
          <p class="p1">
            <span class="naotemconta">Ainda não possui cadastro? </span>
            <span class="naotemconta1"><a href="criar-conta.html"> Crie sua conta</a></span>
          </p>            
        </form>
      </div>

      <?php
             extract($_POST, EXTR_OVERWRITE);
             if(isset($btnenviar))
              {
                  include_once 'perfil.php';
                  $per=new Perfil();
                  $per->setTitulo($txt);
                  $per->setCategoria($txtcate);
                  $perfis = $per->listar();
                
                  foreach($perfis as $row){

                    if($row['email'] == $input_email && $row['email'] == $input_email){

                    }
                    
                  }
              }
      ?>
</body>
<!--javascript-->
<script src="../conteudos/js/script.js"></script>
<script src="../conteudos/js/entrar.js"></script>
</html>