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


  <main class="principal">
    <div class="titulo">
      <h1 class="mainTitle">Validação de produtos</h1>
    </div>
    <?php 

        $n = 0;
    
        include_once "../php-conexao-modelagem/produto.php";
        $prod = new Produto();
        include_once "../php-conexao-modelagem/imagem_produto.php";
        $img = new Imagem();

        $produtos = $prod->listar();
        if(!empty($produtos)){ ?>
        
    <form action="" method="post">

    <div class="card-container">
      <?php
        foreach($produtos as $row){
          $n++;

          $cod_prod[$n] = $row["cod_produto"];

      ?>

            
        <div class="card">
          <div class="images">
            <div class="img-group">
                <div class="prod-selectimg">
                    <?php $img->setcod_produto($row["cod_produto"]);
                    $imagens = $img->consultar2();
                    foreach($imagens as $row2){
                    $imagem = $row2['imagem_produto'];?>
                    <div class="image-option">
                        <?php if(!str_contains($imagem, "principal")){ ?>
                            <img src=".<?php echo $imagem; ?>" alt="">
                        <?php } ?>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            
                <div class="prod-img">
                    <img src=".<?php
                $imagens = $img->consultar2();
                foreach($imagens as $row2){
                    $imagem = $row2["imagem_produto"];
                    if(str_contains($imagem, "principal"))
                    echo $imagem;
                }?>" alt="Modelo da roupa">
                </div>
            </div> 
          </div>
          <div class="prod_info">
            <div class="title">
              <h1><?php echo $row["titulo_produto"]; ?></h1>
            </div>
            <div class="description">
              <textarea rows="6" cols = "35" name="descricao" maxlength="2000" readonly><?php echo $row["descricao_produto"]; ?></textarea>
            </div>
            <div class="price">
              <h1><?php echo number_format($row['preco_produto'],2,",",".") ; ?></h1>
            </div>
            <div class="gender">
              <h1><?php echo $row["sexo"]; ?></h1>
            </div>
            <div class="peca">
            <h1><?php echo $row["tipo_peca"]; ?></h1>
            </div>
          </div>
          <div class="buttons_accept">
            <div class="btn">
              <input type="submit" name="accept[<?php echo $n; ?>]" value="Aceitar">
            </div>
            <div class="btn">
              <input type="submit" name="block[<?php echo $n; ?>]" value="Bloquear">
            </div>
          </div>
        </div>
            
      <?php
        }

        extract($_POST, EXTR_OVERWRITE);
        for($i = 1; $i <= 3; $i++){
          if(isset($accept[$i])){

            $prod->setcod_produto($cod_prod[$i]);
            $prod->setvalida(1);

            $prod->validacao();
            echo "<script language='JavaScript'>window.location.replace('./admpage.php');</script>";

          }
        }

        for($i = 1; $i <= 3; $i++){
          if(isset($block[$i])){

            $prod->setcod_produto($cod_prod[$i]);

            $prod->exclusao();
            echo "<script language='JavaScript'>window.location.replace('./admpage.php');</script>";
          }
        }

      ?>
    </div>
    </form>

    <?php
      }
    ?>

    <form action="" method="post">
      <input type="submit" value="Voltar" name="btnvoltar">
    </form>

    <?php
      extract($_POST, EXTR_OVERWRITE);
      if(isset($btnvoltar)){
        echo "<script language='JavaScript'>window.location.replace('./admpage.php');</script>";
      }
    ?>

  </main>
</body>

</html>