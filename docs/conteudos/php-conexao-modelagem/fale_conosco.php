<?php

include_once 'Conectar.php';

// parte 1 - atributos
class Fale
{
    private $cod_fale;
    private $email_cli;
    private $titulo;
    private $reclamacao;
    private $conn;

// parte 2 - os gettes e setter

   public function getcod_fale() {
          return $this->cod_fale;
   }

   public function setcod_fale ($cproduto) {
    $this->cod_fale = $cproduto;
   }    

    public function gettitulo() {
         return $this->titulo;
    }

    public function settitulo($linkagem2) {
     $this->titulo = $linkagem2;
    }

    public function getemail_cli() {
        return $this->email_cli;
   }

   public function setemail_cli($linkagem) {
    $this->email_cli = $linkagem;
   }

    public function getreclamacao() {
        return $this->reclamacao;
   }

   public function setreclamacao($reclama) {
    $this->reclamacao = $reclama;
   }
    //parte 3 - métodos

function salvar()
{
    try{
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("insert into fale_conosco values (null,?,?,?,0)");
        @$sql->bindParam(1, $this->gettitulo(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getemail_cli(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getreclamacao(), PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("Select * from fale_conosco where cod_fale like ? order by cod_fale"); // informei o ?
        @$sql-> bindParam(1, $this->getcod_fale(), PDO::PARAM_STR); 
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