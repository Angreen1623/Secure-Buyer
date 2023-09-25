<?php

    include_once 'Conectar.php';

    class Tamanho{
        private $cod_produto;
        private $size;
        private $quant_tamanho;
        private $conn;

        public function getcod_produto(){
            return $this->cod_produto;
        }

        public function setcod_produto($ct){
            $this->cod_produto = $ct;
        }

        public function getsize(){
            return $this->size;
        }

        public function setsize($tam){
            $this->size = $tam;
        }

        public function getquant_tamanho(){
            return $this->quant_tamanho;
        }

        public function setquant_tamanho($qt){
            $this->quant_tamanho = $qt;
        }

        function consultar(){
            try{

                $this->conn = new Conectar();
                $sql = $this->conn->prepare("select * from tamanho where cod_produto like ?");
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
                $sql = $this->conn->prepare("insert into tamanho (cod_produto, size, quant_tamanho) values (:codigo,:size,:qt_tamanho)");
                @$sql-> bindParam(":codigo", $this->getcod_produto(), PDO::PARAM_INT);
                @$sql-> bindParam(":size", $this->getsize(), PDO::PARAM_STR);
                @$sql-> bindParam(":qt_tamanho", $this->getquant_tamanho(), PDO::PARAM_INT);
                if($sql->execute() == 1){
                    return "Registro salvo com sucesso!";
                }

            }catch(PDOException $exc){
                echo "Erro ao salvar o registro.".$exc->getMessage();
            }
        }

        function alterar(){
            try{

                $this->conn = new Conectar();
                $sql = $this->conn->prepare("update tamanho set size = :size, quant_tamanho = :qt_tamanho where cod_produto = :codigo");
                @$sql-> bindParam(":size", $this->getsize(), PDO::PARAM_STR);
                @$sql-> bindParam(":qt_tamanho", $this->getquant_tamanho(), PDO::PARAM_INT);
                @$sql-> bindParam(":codigo", $this->getcod_produto(), PDO::PARAM_INT);
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