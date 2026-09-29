<?php 

// L'entreprise reçoit des lots de courriers en CSV. 
// Ouvre courriers.csv (colonnes date;expediteur;objet;type), parcours chaque ligne 
// et écris un journal import.log en y ajoutant une ligne horodatée par courrier importé. 
// Gère : fichier absent, fichier vide, ligne mal formée.

if(!file_exists("courriers.csv")){
    echo "Error : fichier csv inexistant";
    exit;
}

if(filesize("courriers.csv") === 0){
    echo "Error : ligne du csv vide";
    exit;
}

// $myFileByLine = file("courriers.csv");

$datas = [];
if($myFile = fopen("courriers.csv", "r")){
    while(($line = fgetcsv($myFile, 0, ";")) !== false ){
        $datas[] = $line;
    }
    fclose($myFile);
}

array_shift($datas);

foreach($datas as $data){
    echo count($data);
    if(count($data) !== 4 || in_array("", $data, true)){
        $timestamp = date("Y-m-d H:i:s");
        file_put_contents("error-import.log", "[$timestamp]" . implode(";", $data) . "\n", FILE_APPEND);
    } else {
        $timestamp = date("Y-m-d H:i:s");
        file_put_contents("import.log", "[$timestamp]" . implode(";", $data) . "\n", FILE_APPEND);
    }
}


