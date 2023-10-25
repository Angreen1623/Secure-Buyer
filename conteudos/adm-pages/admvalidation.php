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

<body id="container__body">


  <main class="principal">
    <div class="titulo">
      <h1 class="mainTitle">Cadastrar Orçamento</h1>
    </div>

    <div class="card-container">
    <?php/*

      $sql = "SELECT * FROM pedido_orcamento";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $quantidadeTupla = $stmt->rowCount();
      $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($quantidadeTupla > 0) {
        foreach ($pedidos as $pedido) {*/
      ?>


            <form action="script.php" method="post">
              <div class="card">
                <div class="card-info">
                  <p class="text-title"><?/*= strtoupper($pedido['personalizacao']) */?></p>
                  <p class="text-body">Placa: <?/*= strtoupper($pedido['placaCarro']) */?></p>
                  <p class="text-body">Data: <?/*= $dataFormatada */?></p>
                  <p class="text-body">Horário: <?/*= strtoupper($pedido['horario']) */?></p>
                </div>
                <div class="card-footer">
                  <div class="caixa__input">
                      <input type="number" required name="preco" id="preco" autocomplete="off">
                    <label for="preco">Preço</label>
                    <select class="input__data-horario" name="dataOrcamento" id="dataOrcamento">
                      <option value="<?= $pedido['data'] ?>" selected> <?= $dataFormatada ?> </option>
                    </select>
                    <select class="input__data-horario" name="horarioOrcamento" id="horarioOrcamento">
                      <option value="<?= $pedido['horario'] ?>" selected><?= $pedido['horario'] ?></option>
                    </select>
                  </div>
                  <div class="card__linha__botoes">
                    <div class="card-button card-button-first">
                      <button class="botao_orcamento" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value=" " type="submit"><i class="bx bx-x"></i></button>
                    </div>
                    <div class="card-button card-button-second">
                      <button class="botao_orcamento" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="confirmado" type="submit"><i class="bx bx-check"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
      <?php
       /*   }
        }
          */
      ?>
    </div>

  </main>
</body>

</html>