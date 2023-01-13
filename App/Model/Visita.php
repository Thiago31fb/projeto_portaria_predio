<?php 

    namespace App\Model;

    class Visita {

        private $id;
        
        private $id_visitante;
        private $id_apartamento;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getId_visitante() {
            return $this->id_visitante;
        }
        public function setId_visitante($id_visitante) {
            $this->id_visitante = $id_visitante;
        }

        public function getId_apartamento() {
            return $this->id_apartamento;
        }
        public function setId_apartamento($id_apartamento) {
            $this->id_apartamento = $id_apartamento;
        }
    }



?>