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
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admtalk.css">
    
</head>

<body class="body">

<div class="wrapper">
    <div class="title">
        <h1> RECLAMAÇÕES </h1>
    </div>
        
    <div class="adm-talk">
        
    <form method="POST" action="">

    <div class="box">
        <?php

        include_once '../php-conexao-modelagem/fale_conosco.php';

        $f = new Fale();

        $fal_bd=$f->consultar();

        ?> 
        <br> Email &nbsp;&nbsp;&nbsp;&nbsp; Título &nbsp;&nbsp;&nbsp;&nbsp; Mensagem </br>
        <?php
        foreach($fal_bd as $fal_mostrar) {

        $cod_fale = $fal_mostrar[0];
        ?>
        <br><br>
        <b> <?php echo $fal_mostrar[1]; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $fal_mostrar[2]; ?>    &nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $fal_mostrar[3]; ?>
        <?php


        }

        ?>

        <input type="submit" value="Lido" name="btnenviar">

        <?php

        extract($_POST, EXTR_OVERWRITE);
        include_once '../php-conexao-modelagem/fale_conosco.php';
        $u = new Fale();

        if (isset($btnenviar)) {

            foreach($u->consultar() as $fal_mostrar) {

                $cod_fale = $fal_mostrar[0];

            }
            
                $u->setcod_fale($cod_fale);
                $u->update();
        }
        ?>
        
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
    
        

    </div>


</div>
        
    
</body>
<!--javascript-->
<script src="js/script.js"></script>
</php>
