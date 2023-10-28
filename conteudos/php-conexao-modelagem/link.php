<?php

include_once 'Conectar.php';

// parte 1 - atributos
class Link
{
    private $cod_produto;
    private $link_compra;
    private $link_edicao;
    private $conn;

// parte 2 - os gettes e setter

   public function getcod_produto() {
          return $this->cod_produto;
   }

   public function setcod_produto ($cproduto) {
    $this->cod_produto = $cproduto;
   }    

    public function getlink_edicao() {
         return $this->link_edicao;
    }

    public function setlink_edicao($linkagem2) {
     $this->link_edicao = $linkagem2;
    }

    public function getlink_compra() {
        return $this->link_compra;
   }

   public function setlink_compra($linkagem) {
    $this->link_compra = $linkagem;
   }
    //parte 3 - métodos

function salvar()
{
    try{
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("insert into links_produto values (?,?,?)");
        @$sql->bindParam(1, $this->getcod_produto(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getlink_edicao(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getlink_compra(), PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("Select * from links_produto where cod_produto like ?"); // informei o ?
        @$sql-> bindParam(1, $this->getcod_produto(), PDO::PARAM_STR); 
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