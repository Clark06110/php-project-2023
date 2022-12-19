<?php

class CompteBancaire {
    private $_nom;
    private $_solde;

    public function set_credit($newCredit) {
        $this->_solde += $newCredit;
    }
    

    public function get_information_compteBancaire() {
        echo 'Compte bancaire de ' . $this->_nom . ' de ' . $this->_solde . '€ <br>';
    }

    
    public function __construct($nom, $solde) {
        $this->_nom = $nom;
        $this->_solde = $solde;
    }

    public function __destruct() {
        echo "Desctruction de Compte bancaire<br>";
    }
    
}

?>