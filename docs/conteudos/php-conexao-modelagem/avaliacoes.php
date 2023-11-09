<?php

    include_once 'Conectar.php';

    class Avaliacao{
        private $cod_produto;
        private $cod_perfil;
        private $texto_ava;
        private $estrela_ava;
        private $conn;

        public function getcod_produto(){
            return $this->cod_produto;
        }

        public function setcod_produto($ct){
            $this->cod_produto = $ct;
        }

        public function getcod_perfil(){
            return $this->cod_perfil;
        }

        public function setcod_perfil($tam){
            $this->cod_perfil = $tam;
        }

        public function gettexto_ava(){
            return $this->texto_ava;
        }

        public function settexto_ava($qt){
            $this->texto_ava = $qt;
        }

        public function getestrela_ava(){
            return $this->estrela_ava;
        }

        public function setestrela_ava($est){
            $this->estrela_ava = $est;
        }

        function consultar(){
        try {
            
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select texto_ava, estrela_ava, cod_perfil from avaliacoes where cod_produto like :cod_produto");
            @$sql->bindParam(':cod_produto', $this->getcod_produto(), PDO::PARAM_INT);
            @$sql->execute();
            $result = $sql->fetchAll();
            $this->conn = null;
            return $result;
        } catch (PDOException $exc) {
            echo "Erro ao executar a consulta." . $exc->getMessage();
        }
    }

        function consultar2(){
        try {
            
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from avaliacoes where cod_perfil like :cod_perfil and cod_produto like :cod_produto");
            @$sql->bindParam(':cod_perfil', $this->getcod_perfil(), PDO::PARAM_INT);
            @$sql->bindParam(':cod_produto', $this->getcod_produto(), PDO::PARAM_INT);
            @$sql->execute();
            $result = $sql->fetchAll();
            $this->conn = null;
            return $result;
        } catch (PDOException $exc) {
            echo "Erro ao executar a consulta." . $exc->getMessage();
        }
    }


        function salvar(){
            try{

                $this->conn = new Conectar();
                $sql = $this->conn->prepare("insert into avaliacoes (cod_produto, cod_perfil, texto_ava, estrela_ava) values (:codigo,:cod_perfil,:texto, :estrelas)");
                @$sql-> bindParam(":codigo", $this->getcod_produto(), PDO::PARAM_INT);
                @$sql-> bindParam(":cod_perfil", $this->getcod_perfil(), PDO::PARAM_INT);
                @$sql-> bindParam(":texto", $this->gettexto_ava(), PDO::PARAM_STR);
                @$sql-> bindParam(":estrelas", $this->getestrela_ava(), PDO::PARAM_INT);
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
                $sql = $this->conn->prepare("update avaliacoes set cod_perfil = :cod_perfil, texto_ava = :qt_tamanho where cod_produto = :codigo");
                @$sql-> bindParam(":cod_perfil", $this->getcod_perfil(), PDO::PARAM_STR);
                @$sql-> bindParam(":qt_tamanho", $this->gettexto_ava(), PDO::PARAM_INT);
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