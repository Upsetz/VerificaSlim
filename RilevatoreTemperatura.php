<?php
    class RilevatoreTemperatura extends Rilevatore implements JsonSerializable{
        
        private $tipologia;

        public function __construct($tipologia, $identificativo, $codiceSeriale){

            parent:: __construct($identificativo, "°C", $codiceSeriale);
            $this->tipologia = $tipologia;
            
        }

        function JsonSerialize(){
            $a = [
                "id"=>$this->identificativo,
                "unita di misura"=>$this->unita,
                "codice seriale"=>$this->codiceSeriale,
                "tipologia" => $this->tipologia
            ];
            return $a;
        }

    }
?>