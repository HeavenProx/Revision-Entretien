<?php 

// PHP-18
// Panier
// Classe Panier : ajouter(Produit, quantite), total(), nombreArticles().

class Produit{
    private float $prix;
    private string $nom;

    public function __construct(float $prix, string $nom){
        $this->prix = $prix;
        $this->nom = $nom;
    }

    public function getNom(){
        return $this->nom;
    }
    public function getPrix(){
        return $this->prix;
    }
}

class Panier{
    private array $articles = [];

    public function ajouter(Produit $produit, int $quantite): void{
        $this->articles[] = ['produit' => $produit, 'quantite' => $quantite];
        echo "Ajout de " . $quantite . " " . $produit->getNom() . " ! <br>";
    }

    public function total(): float{
        $totalPrix = 0.00;
        foreach($this->articles as $article){
            $totalPrix += $article['quantite'] * $article['produit']->getPrix();
        }
        return $totalPrix;
    }

    public function nombreArticles(): int{
        $totalArticle = 0;
        foreach($this->articles as $article){
            $totalArticle += $article['quantite'];
        }
        return $totalArticle;
    }
}

$panier = new Panier();
$panier->ajouter(new Produit(0.3, "Carotte"), 3);
$panier->ajouter(new Produit(0.5, "Tomate"), 10);
$panier->ajouter(new Produit(3.20, "Paquet de céréales Lion"), 2);

echo "<br>";
echo "Prix total : " . $panier->total();

echo "<br>";
echo "Article total : " . $panier->nombreArticles();