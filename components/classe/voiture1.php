<?php

class Voiture {
    private $_marque;
    private $_modele;
    private $_kilometrage;
    public $couleur;

    public function set_marque($newMarque) {
        $this->_marque = $newMarque;
    }
    public function set_modele($newModele) {
        $this->_modele = $newModele;
    }
    public function set_kilometrage($newKilometrage) {
        $this->_kilometrage = $newKilometrage;
    }

    public function get_information_voiture() {
        echo 'Voiture ' . $this->_marque . ', le modele ' . $this->_modele . ', avec ' . $this->_kilometrage . ' km aux compteurs, de couleur ' . $this->couleur;
    }

    
    public function __construct($marque, $modele, $kilometrage, $couleur) {
        $this->_marque = $marque;
        $this->_modele = $modele;
        $this->_kilometrage = $kilometrage;
        $this->couleur = $couleur;
    }

    public function __destruct() {
        echo "Desctruction de voitures<br>";
    }
    
}

?>