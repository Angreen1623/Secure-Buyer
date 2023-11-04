<div class="fim-pag">
    <?php
        include_once 'php-conexao-modelagem/perfil.php';
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
    <form action="">
        <div class="row">
            <div class="col">
                <div class="title">Dados pessoais</div>
                <div class="inputBox">
                    <span>Nome completo:</span>
                    <input type="text" value="<?php if(isset($nome_completo)){ echo $nome_completo; }?>">
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="text" value="<?php if(isset($email)){ echo $email; }?>">
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
                    <div class="flex">
                        <div class="image">
                            <img src="./img/visa.png" alt="">
                        </div>
                        <div class="image">
                            <img src="./img/mastercard.png" alt="">
                        </div>
                        <div class="image">
                            <img src="./img/pix.jpg" alt="">
                        </div>
                        <div class="image">
                            <img src="./img/boleto.png" alt="">
                        </div>
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
            </div>
        </div>
        <input type="submit" name="enviar" class="submit-btn" value="Finalizar Compra">
    </form>
</div>