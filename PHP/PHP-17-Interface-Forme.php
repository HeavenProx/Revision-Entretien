<?php 
// PHP-17
// Interface Forme
// Interface Forme avec aire(): float, implémentée par Cercle, Carre et Rectangle. Puis une fonction qui somme l'aire d'un tableau de formes.

interface Forme{
    public function aire(): float;
}

class Carre implements Forme{
    private int $longueur;

    public function __construct(int $longueur){
        $this->longueur = $longueur;
    }

    public function aire(): float {
        return $this->longueur ** 2;
    }
}

class Rectangle implements Forme{
    private int $longueur;
    private int $largeur;

    public function __construct(int $longueur, int $largeur){
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function aire(): float {
        return $this->longueur * $this->largeur;
    }
}

class Cercle implements Forme{
    private int $rayon;

    public function __construct(int $rayon){
        $this->rayon = $rayon;
    }

    public function aire(): float {
        return M_PI * ($this->rayon ** 2);
    }
}

$carre = new Carre(4);
$rectangle = new Rectangle(4, 12);
$cercle = new Cercle(5);

$formes = [$carre, $rectangle, $cercle];

function sommesAires(array $formes): float {
    $total = 0;
    foreach($formes as $forme){
        $total += $forme->aire();
    }
    return $total;
}

echo sommesAires($formes);