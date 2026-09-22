<?php 

// PHP-14
// Rectangle
// Classe Rectangle (largeur, hauteur) avec les méthodes aire() et perimetre().

Class Rectangle{
    private int $largeur;
    private int $longueur;

    public function __construct(int $largeur, int $longueur){
        $this->largeur = $largeur;
        $this->longueur = $longueur;
    }

    public function aire(){
        return $this->largeur * $this->longueur;
    }   
    
    public function perimetre(){
        return ($this->largeur * 2) + ($this->longueur * 2);
    }   
}

$rect = new Rectangle(2, 6);

$monAire = $rect->aire();
$monPerimetre = $rect->perimetre();

echo "Aire : " . $monAire . "<br>";
echo "Perimetre : " . $monPerimetre;