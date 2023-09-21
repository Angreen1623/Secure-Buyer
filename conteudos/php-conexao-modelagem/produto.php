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
    private $imagem_produto;
    private $preco_produto;
    private $sexo;
    private $cod_perfil;
    private $conn;

// parte 2 - os gettes e setter

   public function getcod_perfil() {
         return $this->cod_per;
   }

   public function setcod_perfil($cod_per) {
    $this->cod_per = $codper;
   }

   public function getcod_produto() {
          return $this->produto;
   }

   public function setcod_produto ($cproduto) {
    $this->cproduto= $cproduto;
   }

   public function gettitulo_produto() {
    return $this->titulo_pro;
    }

   public function settitulo_produto ($titulopro) {
   $this->titulo_pro= $titulopro;
   }

   public function getdescricao_produto() {
          return $this->desc_pro;
   }

   public function setdescricao_produto($desc_pro) {
    $this->desc_pro= $desc_pro;
   }

   public function gettipo_peca() {
    return $this->tipopeca;
   }

    public function settipo_peca($tipopeca) {
    $this->tipopeca= $tipopeca;
    }
    
   public function getimagem_produto() {
    return $this->imagem_pro;
   }

    public function setimagem_produto($imgpro) {
    $this->imagem_pro= $imgpro;
    }
    
   public function getpreco_produto() {
    return $this->preco_pro;
   }

    public function setpreco_produto($prepro) {
    $this->preco_pro= $prepro;
    }

    public function getsexo() {
        return $this->sex;
       }
    
    public function setsexo($sex) {
    $this->sex= $sex;
        }

    public function getcod_perfil() {
       return $this->cod_perfil; 
      }
        
     public function setcod_perfil($codperfil) {
     $this->cod_perfil= $codperfil;
    }        
    //parte 3 - métodos

function salvar()
{
    try{
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("insert into produto values (null,?,?,?,?,?,?,?)");
        @$sql->bindParam(1, $this->gettitulo_produto(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getdescricao_produto(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->gettipo_peca(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getimagem_produto(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->getpreco_produto(), PDO::PARAM_STR);
        @$sql->bindParam(6, $this->getsexo(), PDO::PARAM_STR);
        @$sql->bindParam(7, $this->getcod_perfil(), PDO::PARAM_STR);
        if($sql->execute() == 1){
            return "<font color='white'><center>Registro salvo com sucesso!</center></font>";
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
           $sql = $this->conn->query("select * from livro order by cod_produto");
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
           $sql = $this->conn->prepare ("delete from livro where Cod_livro = ?"); // informei o ? (parametro)
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

} //encerramento da classe produto 
?>