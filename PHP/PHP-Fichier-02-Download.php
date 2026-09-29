<?php

// Un utilisateur télécharge un document via telecharger.php?id=42. 
// Retrouve le chemin du fichier (depuis un tableau simulé) 
// puis force le téléchargement dans le navigateur avec les bons en-têtes.

if(!isset($_GET['id'])){
    echo "Error : pas d'id lors de la récupération";
    exit;
}

$fichiers = [
    42 => "entrainement-fichiers/documents/facture.pdf",
    43 => "documents/contrat.pdf",
];

if(!isset($fichiers[$_GET['id']])){
    echo "Error : fichier introuvable par id";
    http_response_code(404);
    exit;
}

$chemin = $fichiers[$_GET['id']];

if(!file_exists($chemin)){
    echo "Error : fichier introuvable par chemin";
    http_response_code(404);
    exit;
}

header('Content-Type: application/pdf; charset=utf-8');
header('Content-Disposition: attachment; filename="' . basename($chemin) . '"');
header('Content-Length: ' . filesize($chemin));
readfile($chemin);
exit;
