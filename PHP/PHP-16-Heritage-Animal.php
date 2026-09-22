<?php 

// PHP-16
// Héritage animal
// Classe abstraite Animal avec une méthode crier(), redéfinie par Chien et Chat.

abstract Class Animal{
    protected string $nom;

    public function __construct($nom){
        $this->nom = $nom;
    }

    abstract public function crier(): void;

    public function getNom(){
        echo $this->nom . "<br>";
    }
}

class Chien extends Animal{
    public function crier(): void {
        echo "Wouaf ! <br>";
    }
}

class Chat extends Animal{
    public function crier(): void {
        echo "Miaou ! <br>";
    }
}

$chat = new Chat("Jackouille");
$chien = new Chien("Fripouille");

$chat->getNom();
$chat->crier();

$chien->getNom();
$chien->crier();

