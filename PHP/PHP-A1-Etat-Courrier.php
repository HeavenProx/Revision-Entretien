<?php

// Un courrier suit le workflow reçu → en_cours → traité → archivé, avec en_cours → rejeté possible. 
// Écris une classe qui n'autorise que les transitions valides (exception sinon) 
// et garde l'historique horodaté des changements.

class RejectMailException extends Exception {}

class Mail{
    private string $nom;
    private array $workflow;

    public function __construct(string $nom, array $workflow){
        $this->nom = $nom;
        $this->workflow = $workflow;
    }

    public function getNom(): string{
        return $this->nom;
    }

    public function getWorkflow(): array{
        return $this->workflow;
    }
}

Class VerifMail{
    private array $goodWorkflow = [];
    private array $badWorkflow = [];

    public function isGoodWorkflow(Mail $mail): void {

        $transitionsAutorisees = [
            'reçu'     => ['en_cours'],
            'en_cours' => ['traité', 'rejeté'],
            'traité'   => ['archivé'],
            'rejeté'   => [],
            'archivé'  => [],
        ];

        $timestamp = date("Y-m-d H:i:s");
        $workflow = $mail->getWorkflow();

        $etatPrecedent = 'reçu';

        foreach($workflow as $etatActuel){

            if(!in_array($etatActuel, $transitionsAutorisees[$etatPrecedent])){
                $this->badWorkflow[] = [$timestamp, $mail->getNom(), $mail->getWorkflow()];
                throw new RejectMailException("Transition invalide : $etatPrecedent → $etatActuel");
            }

            $etatPrecedent = $etatActuel; 
        }

        $this->goodWorkflow[] = [$timestamp, $mail->getNom(), $mail->getWorkflow()];
        echo "La transaction " . $mail->getNom() . " est valide ! <br>";
    }
}


$verifMail = new VerifMail();

$scenarios = [
    ['nom' => 'mail 1', 'workflow' => ['en_cours', 'traité', 'archivé']], // chemin nominal
    ['nom' => 'mail 2', 'workflow' => ['en_cours', 'rejeté']], // la branche
    ['nom' => 'mail 3', 'workflow' => ['traité']], // saut d'étape
    ['nom' => 'mail 4', 'workflow' => ['archivé']], // saut d'étape
    ['nom' => 'mail 5', 'workflow' => ['en_cours', 'traité', 'rejeté']], // rejeté pas depuis traité
    ['nom' => 'mail 6', 'workflow' => ['en_cours', 'archivé', 'traité']], // archivé = final
    ['nom' => 'mail 7', 'workflow' => ['en_cours', 'en_cours']], // vers soi-même
];

foreach($scenarios as $scenario){
    try {
        $verifMail->isGoodWorkflow(new Mail($scenario['nom'], $scenario['workflow']));
    } catch (RejectMailException $e) {
        echo $e->getMessage() . "<br>";
    }
}


