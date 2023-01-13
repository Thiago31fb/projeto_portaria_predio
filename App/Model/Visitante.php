<?php 

    namespace App\Model;

    class Visitante {

        private $id;
        private $nome;
        private $sobrenome;
        private $indentidade;
        private $empresa;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getSobrenome() {
            return $this->sobrenome;
        }
        public function setSobrenome($sobrenome) {
            $this->sobrenome = $sobrenome;
        }

        public function getIndentidade() {
            return $this->indentidade;
        }
        public function setIndentidade($indentidade) {
            $this->indentidade = $indentidade;
        }

        public function getEmpresa() {
            return $this->empresa;
        }
        public function setEmpresa($empresa) {
            $this->empresa = $empresa;
        }

    }



?>