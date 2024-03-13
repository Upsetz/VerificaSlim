<?php
    class Rilevatore implements JsonSerializable{
        protected $identificativo;
        protected $misurazioni;
        protected $unita;
        protected $codiceSeriale;

        public function __construct($identificativo, $unita, $codiceSeriale){
            $this->identificativo = $identificativo;
            $this->unita = $unita;
            $this->codiceSeriale = $codiceSeriale;
            $this -> misurazioni = array();
        }

        function addMisurazione($m){

            array_push($this->misurazioni, $m);

        }
        function get_identificativo(){
             return $this->identificativo;
        }

        function get_misurazioni(){
            return $this->misurazioni;
        }

        function get_unita(){
            return $this->unita;
        }

        function get_codiceSeriale(){
            return $this->codiceSeriale;
        }

        function set_identificativo($identificativo){
            $this->identificativo = $identificativo;
        }

        function set_unita($unita){
            $this->unita = $unita;
        }

        function set_codiceSeriale($codiceSeriale){
                $this->codiceSeriale = $codiceSeriale;
        }

        function JsonSerialize(){
            $a = [
                "id"=>$this->identificativo,
                "unita di misura"=>$this->unita,
                "codice seriale"=>$this->codiceSeriale
            ];
            return $a;
        }

    }
?>