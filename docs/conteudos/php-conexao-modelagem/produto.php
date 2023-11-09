<?php

include_once 'Conectar.php';

// parte 1 - atributos
class Produto
{
    private $cod_perfil;
    private $cod_produto;
    private $titulo_produto;
    private $descricao_produto;
    private $tipo_peca;
    private $preco_produto;
    private $sexo;
    private $link_venda;
    private $link_edicao;
    private $valida;
    private $conn;

// parte 2 - os gettes e setter

   public function getcod_perfil() {
        return $this->cod_perfil;
   }

   public function setcod_perfil($codper) {
    $this->cod_perfil = $codper;
   }

   public function getcod_produto() {
          return $this->cod_produto;
   }

   public function setcod_produto ($cproduto) {
    $this->cod_produto = $cproduto;
   }

   public function gettitulo_produto() {
    return $this->titulo_produto;
    }

   public function settitulo_produto ($titulopro) {
   $this->titulo_produto= $titulopro;
   }

   public function getdescricao_produto() {
          return $this->descricao_produto;
   }

   public function setdescricao_produto($desc_pro) {
    $this->descricao_produto= $desc_pro;
   }

   public function gettipo_peca() {
    return $this->tipo_peca;
   }

    public function settipo_peca($tipopeca) {
    $this->tipo_peca = $tipopeca;
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

    public function getvalida() {
         return $this->valida;
    }

    public function setvalida($val) {
     $this->valida = $val;
    }
    //parte 3 - métodos

function salvar()
{
    try{
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("insert into produto values (null,?,?,?,?,?,?,0)");
        @$sql->bindParam(1, $this->gettitulo_produto(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getdescricao_produto(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->gettipo_peca(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getpreco_produto(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->getsexo(), PDO::PARAM_STR);
        @$sql->bindParam(6, $this->getcod_perfil(), PDO::PARAM_STR);
        if($sql->execute() == 1){
        }
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<font color='white'><center>Erro ao salvar o Registro.</center></font>" . $exc->getMessage();
    }
}

function alterar()
{
  try
  {
    $sql = $this->conn->prepare("update produto set titulo_produto = ?, descricao_produto = ?, tipo_peca = ?, preco_produto = ?, sexo = ? where cod_produto = ?");
    @$sql->bindParam(1, $this->gettitulo_produto(), PDO::PARAM_STR);
    @$sql->bindParam(2, $this->getdescricao_produto(), PDO::PARAM_STR);
    @$sql->bindParam(3, $this->gettipo_peca(), PDO::PARAM_STR);
    @$sql->bindParam(4, $this->getpreco_produto(), PDO::PARAM_STR);
    @$sql->bindParam(5, $this->getsexo(), PDO::PARAM_STR);
    @$sql->bindParam(6, $this->getcod_produto(), PDO::PARAM_STR);

    if ($sql->execute() == 1)
    {
      return;
    }  
      
    $this->conn = null;
  }
  catch(PDOException $exc)
  {
    echo "Erro ao alterar. " . $exc->getMessage();
  }
}

function validacao()
{
  try
  {
    $sql = $this->conn->prepare("update produto set valida = ? where cod_produto = ?");
    @$sql->bindParam(1, $this->getvalida(), PDO::PARAM_STR);
    @$sql->bindParam(2, $this->getcod_produto(), PDO::PARAM_STR);

    if ($sql->execute() == 1)
    {
    }  
      
    $this->conn = null;
  }
  catch(PDOException $exc)
  {
    echo "Erro ao alterar. " . $exc->getMessage();
  }
}

function listar()
   {
       try
       {
           $this-> conn = new Conectar();
           $sql = $this->conn->query("select * from produto where valida like 0 order by cod_produto limit 3");
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
           $sql = $this->conn->prepare ("delete from produto where cod_produto = ?"); // informei o ? (parametro)
           @$sql-> bindParam(1, $this->getcod_produto(), PDO:: PARAM_STR); // inclui sata linha para definix o parametro 
           if ($sql->execute() == 1)
           {
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

    function consultar(){
       try
       {
           $this->conn = new Conectar();
           $sql = $this->conn->prepare("Select * from produto where cod_perfil like ?"); // informei o ?
           @$sql-> bindParam(1, $this->getcod_perfil(), PDO::PARAM_STR); // inclui esta linha linha para definir o parametro
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
   function consultar2(){
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("select * from produto where cod_produto like ? order by cod_produto"); // informei o ?
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

   function filtro(){
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("Select * from produto where sexo like ?"); // informei o ?
        @$sql-> bindParam(1, $this->getsexo(), PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<font color='white'><center>Erro ao consultar. </center></font>" . $exc->getMessage();
    }
} 

   function pesquisa(){
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("Select * from produto where titulo_produto like ?"); // informei o ?
        @$sql-> bindParam(1, $this->gettitulo_produto(), PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<font color='white'><center>Erro ao consultar. </center></font>" . $exc->getMessage();
    }
} 

   function obterid(){
    try
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("Select * from produto where titulo_produto like ? and descricao_produto like ? and tipo_peca like ? and sexo like ? and cod_perfil like ?"); // informei o ?
        @$sql->bindParam(1, $this->gettitulo_produto(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getdescricao_produto(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->gettipo_peca(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getsexo(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->getcod_perfil(), PDO::PARAM_STR);
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