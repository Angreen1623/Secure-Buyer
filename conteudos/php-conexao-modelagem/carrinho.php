<?php

include_once 'Conectar.php';

// parte 1 - atributos
class Carrinho
{
    private $cod_carrinho;
    private $cod_produto;
    private $cod_perfil;
    private $cep_carrinho;
    private $qnt_pro;
    private $tamanho_pro;
    private $conn;

// parte 2 - os gettes e setter

    public function getcod_carrinho() {
        return $this->cod_carrinho;
   }
    public function setcod_carrinho ($ccarrinho) {
        $this->cod_carrinho = $ccarrinho;
   }

    public function getcod_produto() {
        return $this->cod_produto;
   }
    public function setcod_produto ($cproduto) {
        $this->cod_produto = $cproduto;
   }

    public function getcod_perfil() {
        return $this->cod_perfil;
    }
    public function setcod_perfil ($cperfil) {
        $this->cod_perfil = $cperfil;
    }

    public function getcep_carrinho() {
        return $this->cep_carrinho;
    }
    public function setcep_carrinho ($ccep_carrinho) {
        $this->cep_carrinho = $ccep_carrinho;
   }

    public function getqnt_pro() {
        return $this->qnt_pro;
    }
    public function setqnt_pro ($cqnt_pro) {
        $this->qnt_pro = $cqnt_pro;
    }

    public function gettamanho_pro() {
        return $this->tamanho_pro;
    }
    public function settamanho_pro ($ctamanho_pro) {
        $this->tamanho_pro = $ctamanho_pro;
    }
   
    //parte 3 - métodos

function salvar()
{
    try{
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("insert into carrinho values (null,?,?,?,?,?)");
        @$sql->bindParam(1, $this->getcod_produto(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getcod_perfil(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getcep_carrinho(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getqnt_pro(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->gettamanho_pro(), PDO::PARAM_STR);
        if($sql->execute() == 1){
        }
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<font color='white'><center>Erro ao salvar o Registro.</center></font>" . $exc->getMessage();
    }
}

function consultar(){
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("Select * from carrinho where cod_perfil like ?"); // informei o ?
        @$sql-> bindParam(1, $this->getcod_perfil(), PDO::PARAM_STR); 
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<font color='white'><center>Erro ao consultar. </center></font>" . $exc->getMessage();
    }
} 

} //encerramento da classe produto 
?>