<?php

    include_once 'Conectar.php';

    class Imagem{
        private $cod_produto;
        private $imagem_produto;
        private $conn;

        public function getcod_produto(){
            return $this->cod_produto;
        }

        public function setcod_produto($ct){
            $this->cod_produto = $ct;
        }

        public function getimagem_produto(){
            return $this->imagem_produto;
        }

        public function setimagem_produto($img){
            $this->imagem_produto = $img;
        }

        function consultar2(){
            try{

                $this->conn = new Conectar();
                $sql = $this->conn->prepare("SELECT * FROM imagem_produto WHERE cod_produto like ? ORDER BY (cod_produto)");
                @$sql-> bindParam(1, $this->getcod_produto(), PDO::PARAM_INT);
                $sql->execute();
                return $sql->fetchAll();
                $this->conn = null;

            }catch(PDOException $exc){
                echo "Erro ao executar a consulta.".$exc->getMessage();
            }
        }

        
        function salvar(){
            try{

                $this->conn = new Conectar();
                $sql = $this->conn->prepare("insert into imagem_produto (cod_produto, imagem_produto) values (:codigo,:img)");
                @$sql-> bindParam(":codigo", $this->getcod_produto(), PDO::PARAM_INT);
                @$sql-> bindParam(":img", $this->getimagem_produto(), PDO::PARAM_STR);
                if($sql->execute() == 1){
                }

            }catch(PDOException $exc){
                echo "<script language='JavaScript'>Erro ao salvar o registro.".$exc->getMessage()."</script>";
            }
        }

        // function alterar(){
        //     try{

        //         $this->conn = new Conectar();
        //         $sql = $this->conn->prepare("update tamanho set size = :size, quant_tamanho = :qt_tamanho where cod_produto = :codigo");
        //         @$sql-> bindParam(":size", $this->getsize(), PDO::PARAM_STR);
        //         @$sql-> bindParam(":qt_tamanho", $this->getquant_tamanho(), PDO::PARAM_INT);
        //         @$sql-> bindParam(":codigo", $this->getcod_produto(), PDO::PARAM_INT);
        //         if($sql->execute() == 1){
        //             return "Registro alterado com sucesso!";
        //         }
        //         $this->conn = null;

        //     }catch(PDOException $exc){
        //         echo "Erro ao alterar o registro.".$exc->getMessage();
        //     }
        // }

    }

?>