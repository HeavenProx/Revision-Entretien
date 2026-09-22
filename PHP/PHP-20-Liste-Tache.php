<?php 

// PHP-20
// Liste de tâches
// Tache (titre, faite) + ListeTaches qui gère ajouter(), marquerFaite($titre) et nonFaites()

class Tache{
    private string $nom;
    private bool $faite = false;

    public function __construct(string $nom, bool $faite){
        $this->nom = $nom;
        $this->faite = $faite;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getFait(){
        return $this->faite;
    }

    public function marquerCommeFaite():void {
        $this->faite = true;
    }
}

class ListeTaches{
    private array $listeTaches = [];

    public function ajouter(Tache $tache): void{
        $this->listeTaches[$tache->getNom()] = $tache;
        echo "Nouvelle tache assigné : " . $tache->getNom() . " ! <br>";
    }

    public function marquerFaite($titre): Tache{
        $this->listeTaches[$titre]->marquerCommeFaite();
        return $this->listeTaches[$titre];
    }

    public function nonFaites(): array{
        $nonFaites = [];
        foreach($this->listeTaches as $listeName => $liste){
            if($liste->getFait() === false){
                $nonFaites[$liste->getNom()] = $liste;
            }
        }
        return $nonFaites;
    }
}

$liste = new ListeTaches();
$liste->ajouter(new Tache("Faire la vaiselle", false));
$liste->ajouter(new Tache("Vider les poubelles", true));
$liste->ajouter(new Tache("Faire à manger", false));
$liste->ajouter(new Tache("Ranger la maison", true));
$liste->ajouter(new Tache("Changer les draps", false));
var_dump($liste->marquerFaite("Faire la vaiselle"));
var_dump($liste->nonFaites());