<?php

    namespace App\Model;

    class VisitanteDao {

        public function create(Visitante $v){

            $sql = 'SELECT * FROM visitante WHERE indentidade = ?';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $v->getIndentidade());
            $stmt-> execute();
            if($stmt ->rowCount()==0){


                $sql = 'INSERT INTO visitante (nome, sobrenome, indentidade, empresa) VALUES (?,?,?,?)';
            
                
                $stmt = Conexao::getConn()->prepare($sql);
                $stmt->bindValue(1, $v->getNome());
                $stmt->bindValue(2, $v->getSobrenome());
                $stmt->bindValue(3, $v->getIndentidade());
                $stmt->bindValue(4, $v->getEmpresa());
                $stmt-> execute();
            }

        }

        public function read(){
            $sql = 'SELECT nome, sobrenome, indentidade, empresa FROM visitante';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt-> execute();

            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
         
        }

        public function update(Visitante $v){
            $sql =" UPDATE visitante SET nome= ?, sobrenome= ?,indentidade= ?, empresa= ? WHERE id= ?";
        
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $v->getNome());
            $stmt->bindValue(2, $v->getSobrenome());
            $stmt->bindValue(3, $v->getIndentidade());
            $stmt->bindValue(4, $v->getEmpresa());
            $stmt->bindValue(5, $v->getId());

            $stmt-> execute();


        }

        public function delete($id){
            $sql = "DELETE FROM visitante WHERE id =?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt-> execute();

        }

        public function validando_indet($indentidade){
            $sql ="SELECT * FROM visitante WHERE indentidade =?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $indentidade);
            $stmt->execute();

            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
        }

        public function validate($id){
            $sql ="SELECT * FROM visitante WHERE id =?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            if($stmt->rowCount() > 0):
                return TRUE;
            else:
                return FALSE;
            endif;
        }

    }
?>