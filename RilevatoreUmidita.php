<?php
    class RilevatoreUmidita extends Rilevatore implements JsonSerializable{
        
        private $posizione;

        public function __construct($posizione, $identificativo, $codiceSeriale){

            parent::__construct($identificativo, "%", $codiceSeriale);
            $this->posizione = $posizione;

        }

        function JsonSerialize(){
            $a = [
                "id"=>$this->identificativo,
                "unita di misura"=>$this->unita,
                "codice seriale"=>$this->codiceSeriale,
                "posizione" => $this->posizione
            ];
            return $a;
        }

    }
?>