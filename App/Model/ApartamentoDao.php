<?php

    namespace App\Model;

    class ApartamentoDao {
        
                // os apartamentos ja forao criados no codigo sql

        // public function create(Apartamento $a){

        //     $sql = 'SELECT * FROM apartamento WHERE indentidade = ?';
        //     $stmt = Conexao::getConn()->prepare($sql);
        //     $stmt->bindValue(1, $a->getIndentidade());
        //     $stmt-> execute();
        //     if($stmt ->rowCount()==0){

        //         $sql = 'INSERT INTO apartamento (apartamento) VALUE (?)';
        //         $stmt = Conexao::getConn()->prepare($sql);
        //         $stmt->bindValue(1, $v->getNome());
        //         $stmt-> execute();
        //     }
        // }

        public function read(){
            $sql = 'SELECT * FROM apartamento';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt-> execute();

            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
         
        }

        // public function update(Apartamento $v){
        //     $sql =" UPDATE apartamento SET apartamento= ? WHERE id= ?";
        
        //     $stmt = Conexao::getConn()->prepare($sql);
        //     $stmt->bindValue(1, $v->getApartamento());
        //     $stmt->bindValue(2, $v->getId());

        //     $stmt-> execute();


        // }

        // public function delete($id){
        //     $sql = "DELETE FROM apartamento WHERE id =?";
        //     $stmt = Conexao::getConn()->prepare($sql);
        //     $stmt->bindValue(1, $id);
        //     $stmt-> execute();

        // }

        public function validate($apartamento){
            $sql ="SELECT * FROM apartamento WHERE apartamento =?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $apartamento);
            $stmt->execute();

            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
        }

    }
?>