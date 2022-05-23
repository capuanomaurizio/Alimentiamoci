<?php
    class Utente{

        private $username;
        private $email;
        private $telefono;
        private $altezza;
        private $sedentarieta;
        private $peso;
        private $eta;
        private $fisicoAttuale;
        private $fisicoIdeale;

        public function __construct($u, $email, $t, $a, $s, $p, $eta, $fA, $fI){
            $this->username = $u;
            $this->email = $email;
            $this->telefono = $t;
            $this->altezza = $a;
            $this->sedentarieta = $s;
            $this->peso = $p;
            $this->eta = $eta;
            $this->fisicoAttuale = $fA;
            $this->fisicoIdeale = $fI;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function getAltezza(){
            return $this->altezza;
        }

        public function getSedentarieta(){
            return $this->sedentarieta;
        }

        public function getPeso(){
            return $this->peso;
        }

        public function getEta(){
            return $this->eta;
        }

        public function getFisicoAttuale(){
            return $this->fisicoAttuale;
        }

        public function getFisicoIdeale(){
            return $this->fisicoIdeale;
        }

    }
?>