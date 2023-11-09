<div class="fim-pag">
    <?php
        include_once '../php-conexao-modelagem/perfil.php';
        $perfil = new Perfil();
        if(isset($codper)){
            $perfil->setcod_perfil($codper);
            $dadosPerfil = $perfil->alterar();

            foreach ($dadosPerfil as $row) {
                $nome_completo = $row["nome"]." ".$row["sobrenome"];
                $email = $row["email"];
            }
        }
        
    ?>
    <form action="./script/finalizar.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="title">Dados pessoais</div>
                <div class="inputBox readonly">
                    <span>Nome completo:</span>
                    <input type="text" value="<?php if(isset($nome_completo)){ echo $nome_completo; }?>" readonly>
                </div>
                <div class="inputBox readonly">
                    <span>Email:</span>
                    <input type="text" value="<?php if(isset($email)){ echo $email; }?>" readonly>
                </div>
                <div class="inputBox">
                    <span>Endereço:</span>
                    <input type="text">
                </div>
                <div class="inputBox">
                    <span>Cidade:</span>
                    <input type="text">
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Estado:</span>
                        <input type="text">
                    </div>
                    <div class="inputBox">
                        <span>Cep:</span>
                        <input type="text">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="title">Pagamento</div>
                <div class="inputBox">
                    <span>Forma de pagamento :</span>

                    <input type="radio" name="forma_pag" id="visa" value="visa" style="display: none;">
                    <input type="radio" name="forma_pag" id="masterc" value="masterc" style="display: none;">
                    <input type="radio" name="forma_pag" id="pix" value="pix" style="display: none;">
                    <input type="radio" name="forma_pag" id="boleto" value="boleto" style="display: none;">

                    <div class="flex">
                        <label class="image" for="visa">
                            <img src="../img/visa.png" alt="">
                        </label>
                        <label class="image" for="masterc">
                            <img src="../img/mastercard.png" alt="">
                        </label>
                        <label class="image" for="pix">
                            <img src="../img/pix.jpg" alt="">
                        </label>
                        <label class="image" for="boleto">
                            <img src="../img/boleto.png" alt="">
                        </label>
                    </div>
                </div>
                <div class="inputBox">
                    <span>Nome no cartão:</span>
                    <input type="text">
                </div>
                <div class="inputBox">
                    <span>Número do Cartão:</span>
                    <input type="text">
                </div>
                <div class="inputBox">
                    <span>Data de expiração:</span>
                    <input type="text" placeholder="mm/aa">
                </div>
                <div class="flex">
                <div class="inputBox">
                    <span>CVV:</span>
                    <input type="text">
                </div>
                </div>
                <input type="hidden" name="total" value="<?php echo $total;?>">
                <input type="hidden" name="codper" value="<?php echo $codper;?>">
            </div>
        </div>
        <input type="submit" name="btnenviar" class="submit-btn" value="Finalizar Compra">
    </form>
</div>