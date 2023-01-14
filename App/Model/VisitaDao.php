<?php

    namespace App\Model;

    class VisitaDao {

        public function entrada(Visita $v){

            $sql = 'INSERT INTO visita (id_visitante, id_apartamento, entrada) VALUES (?,?,current_timestamp())';
            
                
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $v->getId_visitante());
            $stmt->bindValue(2, $v->getId_apartamento());
            $stmt-> execute();
            

        }

        public function VisitasDiaOrAtiva(){
            $sql = 'SELECT visita.id, ap.apartamento, v.nome,v.sobrenome, v.indentidade, date_format(visita.entrada, "%d/%m/%Y  %H:%i ") entrada, date_format( visita.saida, "%d/%m/%Y  %H:%i ") saida FROM visita
            JOIN apartamento ap on ap.id = visita.id_apartamento
            JOIN visitante v on v.id = Visita.id_visitante
            where (current_date() = date(visita.entrada)) or (visita.saida is NULL)';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt-> execute();

            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
         
        }

        public function saida(Visita $v){
            $sql =" UPDATE visita SET saida = current_timestamp() WHERE id= ?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $v->getId());

            $stmt-> execute();


        }

        public function delete($id){
            $sql = "DELETE FROM visita WHERE id =?";
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt-> execute();
        }

        public function historico($v){
            $sql = 'SELECT ap.apartamento, v.nome,v.sobrenome, v.indentidade, date_format(visita.entrada, "%d/%m/%Y  %H:%i ") 
            entrada, date_format( visita.saida, "%d/%m/%Y  %H:%i ") saida FROM visita
            JOIN apartamento ap on ap.id = visita.id_apartamento
            JOIN visitante v on v.id = Visita.id_visitante
            WHERE id_apartamento =?';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $v);
            $stmt-> execute();

            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
        }
        
        

        // public function validate($id){
        //     $sql ="SELECT * FROM visita WHERE id =?";
        //     $stmt = Conexao::getConn()->prepare($sql);
        //     $stmt->bindValue(1, $id);
        //     $stmt->execute();

        //     if($stmt->rowCount() > 0):
        //         $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        //         return $resultado;
        //     else:
        //         return [];
        //     endif;
        // }

    }
?>