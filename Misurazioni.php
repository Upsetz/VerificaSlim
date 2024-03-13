<?php
    class Misurazioni implements JsonSerializable{
        
        protected $data;
        protected $valore;

        public function __construct($data, $valore){

            $this->data = $data;
            $this->valore = $valore;
            
        }

        public function get_data(){

            return $this->data;

        }

        public function get_valore(){

            return $this->valore;
            
        }

        function JsonSerialize(){
            $a = [
                "data"=>$this->data,
                "valore"=>$this->valore,
            ];
            return $a;
        }

    }
?>