<?php

include_once 'Conectar.php';

// parte 1 - atributos
class Pedidos_realizados
{
    private $cod_carrinho;
    private $preco_final;
    private $forma_pagamento;
    private $data_compra;
    private $conn;

// parte 2 - os gettes e setter

   public function getcod_carrinho() {
          return $this->cod_carrinho;
   }

   public function setcod_carrinho ($cproduto) {
    $this->cod_carrinho = $cproduto;
   }    

    public function getforma_pagamento() {
         return $this->forma_pagamento;
    }

    public function setforma_pagamento($linkagem2) {
     $this->forma_pagamento = $linkagem2;
    }

    public function getpreco_final() {
        return $this->preco_final;
   }

   public function setpreco_final($linkagem) {
    $this->preco_final = $linkagem;
   }

    public function getdata_compra() {
        return $this->data_compra;
   }

   public function setdata_compra() {
    $this->data_compra = date("Y-m-d");
   }
    //parte 3 - métodos

function salvar()
{
    try{
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("insert into pedidos_realizados values (?,?,?,?)");
        @$sql->bindParam(1, $this->getcod_carrinho(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getpreco_final(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getforma_pagamento(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getdata_compra(), PDO::PARAM_STR);
        if($sql->execute() == 1){
        }
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<font color='white'><center>Erro ao salvar o Registro.</center></font>" . $exc->getMessage();
    }
}

function excluir()
   {
        try
        {
           $this->conn = new Conectar ();
           $sql = $this->conn->prepare ("delete from pedidos_realizados where cod_carrinho = ?"); // informei o ? (parametro)
           @$sql-> bindParam(1, $this->getcod_carrinho(), PDO::PARAM_STR); // inclui sata linha para definix o parametro 
           $sql->execute() == 1;
   
           $this->conn = null;
       }
       catch (PDOException $exc)
       {
       echo "<font color='white'><center> Erro ao excluir. </center></font>" . $exc->getMessage();
       }
    }

function consultar(){
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("Select * from pedidos_realizados where cod_carrinho like ? order by cod_carrinho"); // informei o ?
        @$sql-> bindParam(1, $this->getcod_carrinho(), PDO::PARAM_STR);
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