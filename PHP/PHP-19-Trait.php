<?php

// PHP-19
// Trait Loggable
// Un trait Loggable fournissant log(string $msg), réutilisé dans deux classes qui n'ont pas de lien d'héritage.

trait Loggable{
    private function log(string $msg): void {
        echo $msg . " est loggué !";
    }
}

Class User {
    use Loggable;

    public function createUser($nomUser): void {
        $this->log($nomUser);
    }
}

Class Visitor {
    use Loggable;

    public function createVisitor($nomVisitor): void {
        $this->log($nomVisitor);
    }
}

$user = new User;
$visitor = new Visitor;

$user->createUser("Jean-User");
echo "<br>";
$visitor->createVisitor("Jean-Visitor");