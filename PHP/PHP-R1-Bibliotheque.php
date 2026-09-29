<?php 

// Contexte : une petite bibliothèque gère ses livres et leurs emprunts.

// Classe Livre — un livre a un titre, un auteur, et un état « disponible » (vrai au départ).

// constructeur (titre, auteur)
// getters titre / auteur
// estDisponible(): bool
// emprunter() et rendre() qui basculent son état

// Classe Bibliotheque — gère une collection de Livre.

// ajouter(Livre $livre): void
// emprunter(string $titre): void
// rendre(string $titre): void
// livresDisponibles(): array
// nombreDisponibles(): int

// Les règles à faire respecter (le vrai cœur de l'exo) :
// ⚠️ emprunter un titre qui n'existe pas → exception
// ⚠️ emprunter un livre déjà emprunté → exception (on ne le prête pas deux fois)
// ⚠️ rendre un livre qui n'était pas emprunté → exception

// Indices (t'orienter, pas te résoudre) :
// 💡 Encapsulation : propriétés private, et tout typé (propriétés, paramètres, retours) — 
//      c'est ce qui te démarque en entretien.
// 💡 L'état « disponible » vit dans le Livre, pas dans la Bibliotheque : c'est le livre qui sait s'il est prêté. 
//      La bibliothèque ne fait que déléguer ($livre->emprunter()). Ne duplique pas l'état des deux côtés.
// 💡 Pour retrouver un livre par titre, tu peux indexer ton tableau par titre à l'ajout (comme dans ta ListeTaches) 
//      plutôt que de boucler à chaque fois.
// 💡 livresDisponibles() filtre : fais-le en foreach à la main avant de le réécrire avec array_filter.

Class LivreException extends Exception {}

Class Livre {
    private string $titre;
    private string $auteur;
    private bool $etat;

    public function __construct(string $titre, string $auteur, bool $etat = true){
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->etat = $etat;
    }

    public function getTitre(): string{
        return $this->titre;
    }

    public function getAuteur(): string{
        return $this->auteur;
    }

    public function getDispo(): bool{
        return $this->etat;
    }

    public function emprunter(): void{
        $this->etat = !$this->etat;
    }

    public function rendre(): void{
        $this->etat = !$this->etat;
    }
}

Class Bibliotheque {

    private array $livres = [];

    public function ajouter(Livre $livre): void{
        $this->livres[$livre->getTitre()] = $livre;;
        echo "Livre ajouté : " . $livre->getTitre() . " de " . $livre->getAuteur() . " !<br>";
    }

    public function emprunter($titre): void{
        if(isset($this->livres[$titre])){
            if($this->livres[$titre]->getDispo() === true){
                $this->livres[$titre]->emprunter();
                echo "Livre emprunté a la bibliothèque : " . $titre . " !<br>";
            } else {
                throw new LivreException("Le livre a emprunter l'est déjà : " . $titre);
            }
        } else {
            throw new LivreException("Le livre a emprunter n'existe pas dans la bibliothèque : " . $titre);
        }
    }

    public function rendre($titre): void{
        if(isset($this->livres[$titre])){
            if($this->livres[$titre]->getDispo() === false){
                $this->livres[$titre]->rendre();
                echo "Livre rendu a la bibliothèque : " . $titre . " !<br>";
            } else {
                throw new LivreException("Le livre a rendre n'est pas emprunté : " . $titre);
            }
        } else {
            throw new LivreException("Le livre a rendre n'existe pas dans la bibliothèque : " . $titre);
        }
    }

    public function livresDisponibles(): array{
        $dispo = [];
        foreach($this->livres as $livre){
            if($livre->getDispo() === true){
                $dispo[$livre->getTitre()] = $livre;
            }
        }
        return $dispo;
    } 

    public function nombreDisponibles(): int{
        $dispo = 0;
        foreach($this->livres as $livre){
            if($livre->getDispo() === true){
                $dispo++;
            }
        }
        return $dispo;
    }
}


$biblio = new Bibliotheque;
$biblio->ajouter(new Livre("Clean Code", "Robert C. Martin"));
$biblio->ajouter(new Livre("Le Petit Prince", "Saint-Exupéry"));
$biblio->ajouter(new Livre("1984", "George Orwell"));

echo "Nombres de livres dispo : " . $biblio->nombreDisponibles() . " !<br>";
$biblio->emprunter("1984");
echo "Nombres de livres dispo : " . $biblio->nombreDisponibles() . " !<br>";
// $biblio->emprunter("1984");
$biblio->rendre("1984");
echo "Nombres de livres dispo : " . $biblio->nombreDisponibles() . " !<br>";

var_dump($biblio->livresDisponibles());

// $biblio->rendre("Clean Code");
// $biblio->emprunter("Livre Fantôme");