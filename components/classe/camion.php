<?php

require_once 'vehicule.php';

class Camion implements vehicule {
    private $_marque;
    private $_immatriculation;
    private $_prix;
    protected $_poids;

    public function set_marque($newMarque) {
        $this->_marque = $newMarque;
    }
    public function set_immatriculation($newImmatriculation) {
        $this->_immatriculation = $newImmatriculation;
    }
    public function set_prix($newPrix) {
        $this->_prix = $newPrix;
    }
    private function set_poids($newPoids) {
        $this->_poids = $newPoids;
    }
    public function get_informations() {
        echo 'Camion ' . $this->_marque . ', d\'immatriculation ' . $this->_immatriculation . ', de Poids ' . $this->_poids . '<br>';
    }

    public function demarrer() {
        echo "La ". $this->_marque . " démarre <br>";
    }
    public function rouler() {
        echo "La ". $this->_marque . " roule <br>";
    }
    public function stopper() {
        echo "La ". $this->_marque . " stoppe <br>";
    }

    
    public function __construct($marque, $immatriculation, $prix, $poids) {
        $this->set_marque($marque);
        $this->set_immatriculation($immatriculation);
        $this->set_prix($prix);
        $this->set_poids($poids);
    }

    public function __destruct() {
        echo "Desctruction de camion<br>";
    }
    public function __call($methode, $arg){
        echo 'Méthode ' .$methode. ' inaccessible depuis un contexte objet.
        <br>Arguments passés : ' .implode(', ', $arg). '<br>';
    }
    public function __get($prop){
        echo 'Propriété ' .$prop. ' inaccessible.<br>';
    }
    public function __set($prop, $valeur){
        echo 'Impossible de mettre à jour la valeur de ' .$prop. ' avec "'
        .$valeur. '" (propriété inaccessible)';
    }
    public function __toString(){
        return 'Camion ' . $this->_marque . ', d\'immatriculation ' . $this->_immatriculation . ', de Poids ' . $this->_poids . ', de Prix ' . $this->_prix . '<br>';
    }
    
}

?>