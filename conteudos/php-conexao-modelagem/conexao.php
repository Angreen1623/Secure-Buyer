<?php

include_once 'Conectar.php';

//parte 1 - atributos
class Conexao
{
   private $endereco_ip; 
   private $cod_perfil;
   private $conn;
   
//parte 2 - os getters e setter

    public function getendereco_ip(){
        return $this->endereco_ip;
    }

    public function setendereco_ip($end){
        $this->endereco_ip = $end;
    }

    public function getcod_perfil(){
        return $this->cod_perfil;
    }

    public function setcod_perfil($codperfil){
        $this->cod_perfil = $codperfil;
    }

    //salvar
    function salvar()
    {
        try
        {
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("insert into conexao values (?,?)");
        @$sql-> bindParam(1, $this->getendereco_ip(), PDO::PARAM_STR);
        @$sql-> bindParam(2, $this->getcod_perfil(), PDO::PARAM_STR);
        if($sql->execute() == 1)
        {
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
        $sql = $this->conn->query("Select * from conexao");
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao executar consulta. " . $exc->getMessage();
    }
    }

    function consultar()
    {
        try
        {
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("select * from conexao where endereco_ip like ?"); //informe o ? (parametro)
        @$sql-> bindParam(1, $this->getendereco_ip(), PDO::PARAM_STR);//essa linha define o parametro
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
        }
        catch(PDOException $exc)
        {
        echo "Erro ao executar consulta " . $exc->getMessage();
        }
        

    }

    //excluir

    function excluir()
    {
        try
        {
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("delete from conexao where endereco_ip like '::1'"); //informe o ? (parametro)
        if($sql->execute() == 1)
        {
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
    }

    //consultar

    function obterid()
    {
        try
        {
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("select * from conexao where endereco_ip like ?"); //informe o ? (parametro)
        @$sql-> bindParam(1, $this->getendereco_ip(), PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
        }
        catch(PDOException $exc)
        {
        echo "Erro ao executar consulta " . $exc->getMessage();
        }
        

    }

    function alterar(){
        try{

            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update conexao set cod_perfil = ? where endereco_ip = ?");
            @$sql-> bindParam(1, $this->getendereco_ip(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getcod_perfil(), PDO::PARAM_STR);
            if($sql->execute() == 1){
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;

        }catch(PDOException $exc){
            echo "Erro ao alterar o registro.".$exc->getMessage();
        }
    }

}
?>