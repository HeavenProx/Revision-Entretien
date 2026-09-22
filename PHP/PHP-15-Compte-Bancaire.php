<?php 

// PHP-15
// Compte bancaire
// Classe CompteBancaire : solde privé, méthodes deposer() et retirer(). Le retrait est refusé si le solde est insuffisant.
class SoldeInsuffisantException extends Exception {}

Class CompteBancaire{
    private float $solde;

    public function __construct($solde){
        $this->solde = $solde;
    }

    public function deposer($montant){
        $this->solde += $montant;
        echo "Le montant de $montant € a bien été déposé. Le solde de votre compte est donc de $this->solde €. <br>";
    }

    public function retirer($montant){
        if(($this->solde - $montant) < 0){
            throw new SoldeInsuffisantException("Le solde est insuffisant : $this->solde €. <br>");
        }
        $this->solde -= $montant;
        echo "Le montant de $montant € a bien été retiré.\n Le solde de votre compte est donc de $this->solde € .<br>";
    }
}

$monCompte = new CompteBancaire(5000);

$monDepot = $monCompte->deposer(200);
try {
    $monCompte->retirer(1000);
} catch (SoldeInsuffisantException $e) {
    echo "Erreur : " . $e->getMessage();
}