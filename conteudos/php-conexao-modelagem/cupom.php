<?php

include_once 'Conectar.php';

// parte 1 - atributos
class Produto
{
    private $cod_cupom;
    private $nome_cupom;
    private $valorp_cupom;
    private $datac_cupom;
    private $dataex_cupom;
    private $conn;

// parte 2 - os gettes e setter

   public function getcod_cupom() {
        return $this->cod_cupom;
   }

   public function setcod_cupom($codper) {
    $this->cod_cupom = $codper;
   }

   public function getnome_cupom() {
          return $this->nome_cupom;
   }

   public function setnome_cupom ($cproduto) {
    $this->nome_cupom = $cproduto;
   }

   public function getvalorp_cupom() {
    return $this->valorp_cupom;
    }

   public function setvalorp_cupom ($titulopro) {
   $this->valorp_cupom= $titulopro;
   }

   public function getdatac_cupom() {
          return $this->datac_cupom;
   }

   public function setdatac_cupom() {
    $this->datac_cupom = date("Y-m-d");
   }

   public function getdataex_cupom() {
    return $this->dataex_cupom;
   }

    public function setdataex_cupom() {
    $this->dataex_cupom = strtotime($this->getdatac_cupom()+"+ 7 day");
    }
    
   public function getpreco_produto() {
    return $this->preco_produto;
   }

    public function setpreco_produto($prepro) {
    $this->preco_produto= $prepro;
    }

    public function getsexo() {
        return $this->sexo;
       }
    
    public function setsexo($sex) {
        $this->sexo = $sex;
    }

    public function getlink_venda() {
         return $this->link_venda;
    }

    public function setlink_venda($linkagem) {
     $this->link_venda = $linkagem;
    }

    public function getlink_edicao() {
         return $this->link_edicao;
    }

    public function setlink_edicao($linkagem2) {
     $this->link_edicao = $linkagem2;
    }
    //parte 3 - métodos

function salvar()
{
    try{
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("insert into cupom values (?,?,?,?,?,?)");
        @$sql->bindParam(1, $this->getvalorp_cupom(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getdatac_cupom(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getdataex_cupom(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getpreco_produto(), PDO::PARAM_STR);
        @$sql->bindParam(6, $this->getcod_cupom(), PDO::PARAM_STR);
        if($sql->execute() == 1){
        }
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<font color='white'><center>Erro ao salvar o Registro.</center></font>" . $exc->getMessage();
    }
}

/*
   function listar()
   {
       try
       {
           $this-> conn = new Conectar();
           $sql = $this->conn->query("select * from cupom order by nome_cupom");
           $sql->execute();
           return $sql->fetchAll();
           $this->conn = null;
       }
       catch(PDOException $exc)
       {
        echo "<font color='white'><center>Erro ao executar consulta.</center></font> " . $exc->getMessage();
       }
   }

   function exclusao()
   {
        try
        {
           $this->conn = new Conectar ();
           $sql = $this->conn->prepare ("delete from cupom where Cod_livro = ?"); // informei o ? (parametro)
           @$sql-> bindParam(1, $this->getCod_Livro(), PDO:: PARAM_STR); // inclui sata linha para definix o parametro 
           if ($sql->execute() == 1)
           {
            return "<font color='white'><center>Excluido com sucesso!</center></font>";
           }
           else
           {
           return "<font color='white'><center>Erro na exclusão !</center></font>";
           }
   
           $this->conn = null;
       }
       catch (PDOException $exc)
       {
       echo "<font color='white'><center> Erro ao excluir. </center></font>" . $exc->getMessage();
       }
    } 
   */

    function consultar(){
       try
       {
           $this->conn = new Conectar();
           $sql = $this->conn->prepare("Select * from cupom where nome_cupom like ?"); // informei o ?
           @$sql-> bindParam(1, $this->getnome_cupom(), PDO::PARAM_STR); // inclui esta linha linha para definir o parametro
           // @$sql-> bindParam(1, $this->getNome(). "%" ,PDO::PARAM_STR);
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