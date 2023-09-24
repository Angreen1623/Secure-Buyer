<?php

include_once 'Conectar.php';

//parte 1 - atributos
class Perfil
{
   private $cod_perfil; 
   private $nome;
   private $sobrenome;
   private $email;
   private $senha;
   private $nome_loja;
   private $cnpj;
   private $imagem;
   
//parte 2 - os getters e setter

public function getcod_perfil(){
    return $this->cod_perfil;
}

public function setcod_perfil($codperfil){
    $this->cod_perfil = $codperfil;
}

public function getnome(){
    return $this->nome;
}

public function setnome($nome_perf){
    $this->nome = $nome_perf;
}

public function getsobrenome(){
    return $this->sobrenome;
}

public function setsobrenome($sobre_nome){
    $this->sobrenome = $sobre_nome;
}

public function getemail(){
    return $this->email;
}

public function setemail($e_mail){
    $this->email = $e_mail;
}

public function getsenha(){
    return $this->senha;
}

public function setsenha($senha_perf){
    $this->senha = $senha_perf;
}

public function getnome_loja(){
    return $this->nome_loja;
}

public function setnome_loja($nomeloja){
    $this->nome_loja = $nomeloja;
}

public function getcnpj(){
    return $this->cnpj;
}

public function setcnpj($CNPJ){
    $this->cnpj = $CNPJ;
}

public function getimagem(){
    return $this->imagem;
}

public function setimagem($imagem_perf){
    $this->imagem = $imagem_perf;
}

//salvar
function salvar()
{
    try
    {
      $this-> conn = new Conectar();
      $sql = $this->conn->prepare("insert into perfil values (?,?,?,?,null,null,null,null)");
      @$sql-> bindParam(1, $this->getnome(), PDO::PARAM_STR);
      @$sql-> bindParam(2, $this->getsobrenome(), PDO::PARAM_STR);
      @$sql-> bindParam(3, $this->getemail(), PDO::PARAM_STR);
      @$sql-> bindParam(4, $this->getsenha(), PDO::PARAM_STR);
      if($sql->execute() == 1)
      {
        echo "<script type='text/javascript'>alert('Registro salvo com sucesso!');</script>";
      }
       $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<script type='text/javascript'>alert('Erro ao salvar o registro: " . $exc->getMessage() . "');</script>";
    }
}

//listar
function listar()
{
   try
   {
     $this->conn = new Conectar();
     $sql = $this->conn->query("Select * from perfil order by cod_perfil");
     $sql->execute();
     return $sql->fetchAll();
     $this->conn = null;
   }
   catch(PDOException $exc)
   {
     echo "Erro ao executar consulta. " . $exc->getMessage();
   }
}

//excluir

/*function excluir()
{
    try
    {
      $this-> conn = new Conectar();
      $sql = $this->conn->prepare("delete from livro where cod_livro = ?"); //informe o ? (parametro)
      @$sql-> bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);//essa linha define o parametro
      if($sql->execute() == 1)
      {
        return "<font face = 'Tahoma' color = 'white'><b>Excluído com sucesso!</b></font>";
      }
      else
      {
        return "Erro na exclusão";
      }
       $this->conn = null;
    }
    catch(PDOException $exc)
    {
      echo "Erro ao excluir " . $exc->getMessage();
    }
}*/

//consultar
function consultar()
{
    try
    {
      $this-> conn = new Conectar();
      $sql = $this->conn->prepare("select * from perfil where cod_perfil like ?"); //informe o ? (parametro)
      @$sql-> bindParam(1, $this->getcod_perfil(), PDO::PARAM_STR);//essa linha define o parametro
      $sql->execute();
      return $sql->fetchAll();
      $this->conn = null;
    }
    catch(PDOException $exc)
    {
      echo "Erro ao executar consulta " . $exc->getMessage();
    }
    

}

function obterid()
{
    try
    {
      $this-> conn = new Conectar();
      $sql = $this->conn->prepare("select * from perfil where email like ? and senha like ?"); //informe o ? (parametro)
      @$sql-> bindParam(1, $this->getemail(), PDO::PARAM_STR);
      @$sql-> bindParam(2, $this->getsenha(), PDO::PARAM_STR);
      $sql->execute();
      return $sql->fetchAll();
      $this->conn = null;
    }
    catch(PDOException $exc)
    {
      echo "Erro ao executar consulta " . $exc->getMessage();
    }
    

}

}//encerramento da classe produto
?>