<!DOCTYPE html>
<html lang="pt-BR">

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

<body>


  <main class="principal1">
    <div class="cupom">
      <div class="titulo">
        <h1 class="mainTitle">Criar cupom</h1>
      </div>
      <form action="" method="post">

      <div class="form-container">
              
          <div class="form">

              <div class="nome">
                  <h2>Nome do cupom:</h2>
                  <input type="text" name="nome_c">
              </div>
              <div class="valor">
                  <h2>Valor do cupom:</h2>
                  <input type="text" placeholder="10%" name="perc_c">
              </div>

              <input type="submit" name="criar" value="Criar cupom">

          </div>


        <?php

          extract($_POST, EXTR_OVERWRITE);
          if(isset($criar)){
            include_once "../php-conexao-modelagem/cupom.php";
            $cupom = new Cupom;

            $valor_c = intval(str_replace("%", "", $perc_c))/100;

            $cupom->setnome_cupom($nome_c);
            $cupom->setvalorp_cupom($valor_c);
            $cupom->setdatac_cupom();
            $cupom->setdataex_cupom();

            $cupom->salvar();
            
          }

        ?>
      </div>
      </form>
      <form action="" method="post">
      <input type="submit" value="Voltar" name="btnvoltar">
    </form>

    <?php
      extract($_POST, EXTR_OVERWRITE);
      if(isset($btnvoltar)){
        echo "<script language='JavaScript'>window.location.replace('./admpage.php');</script>";
      }
    ?>
    </div>
  </main>
</body>

</html>