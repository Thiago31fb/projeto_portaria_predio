<?php 

    namespace App\Model;

    class Apartamento {

        private $id; 
        private $apartamento;
    

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getApartamento() {
            return $this->apartamento;
        }
        public function setApartamento($apartamento) {
            $this->apartamento = $apartamento;
        }

    }



?>