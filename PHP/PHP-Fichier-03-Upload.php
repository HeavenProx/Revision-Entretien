<?php 

// Traite un formulaire d'upload de document : 
// récupère le fichier, valide-le et déplace-le dans le dossier de stockage sous un nom sûr.

if(!isset($_FILES['document'])){
    echo "Error : aucun fichier envoyé";
    exit;
}
$nom = $_FILES['document']['name'];             // nom original donné par l'utilisateur
$nomTempo = $_FILES['document']['tmp_name'];    // chemin temporaire où PHP a stocké le fichier
$size = $_FILES['document']['size'];            // taille en octets
$codeError = $_FILES['document']['error'];      // code d'erreur (0 = succès)
$type = $_FILES['document']['type'];            // type MIME envoyé par le navigateur


if($codeError !== UPLOAD_ERR_OK){
    echo "Error : code d'erreur";
    exit;
}

$maxSize = 8 * 1024 * 1024;
if($size > $maxSize){
    echo "Error : fichier trop volumineux";
    exit;
}

$extensionsAutorisees = [
    'application/pdf' => 'pdf',
    'image/jpeg' => 'jpg',
];

if(!in_array($type = mime_content_type($_FILES['document']['tmp_name']), array_keys($extensionsAutorisees))){
    echo "Error : extension du fichier non accepté";
    exit;
}

$extension = $extensionsAutorisees[$type];

$nomSur = bin2hex(random_bytes(16)) . "." . $extension;

if(!move_uploaded_file($_FILES['document']['tmp_name'], "uploads/" . $nomSur)){
    echo "Error : échec du déplacement du fichier";
    exit;
}