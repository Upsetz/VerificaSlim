<?php
    class Impianto implements JsonSerializable{
        private $latitudine;
        private $nome;
        private $longitudine;
        private $rilevatori;

        function __construct($nome, $longitudine, $latitudine){
            $this->nome = $nome;
            $this->longitudine = $longitudine;
            $this->latitudine = $latitudine;
            $this->rilevatori = array(); 
        }

        function get_nome(){
             return $this->nome;
        }

        function get_latitudine(){
            return $this->latitudine;
        }

        function get_longitudine(){
            return $this->longitudine;
        }

        function get_rilevatori(){
            return $this->rilevatori;
        }

        function set_nome($nome){
            $this->nome = $nome;
        }

        function set_latitudine($latitudine){
            $this->latitudine = $latitudine;
        }

        function set_longitudine($longitudine){
                $this->longitudine = $longitudine;
        }

        function addRilevatore(Rilevatore $r){
            array_push($this->rilevatori, $r);
        }

        function JsonSerialize(){
            $a = [
                "nome"=>$this->nome,
                "latitudine"=>$this->latitudine,
                "longitudine"=>$this->longitudine,
            ];
            return $a;
        }
    }
?>