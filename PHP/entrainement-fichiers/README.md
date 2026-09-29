# Jeu de fichiers — exercices FICHIER-01 à 03 (entretien Arawak / Kolok)

Fixtures pour tester ta gestion de fichiers. Aucune solution ici : juste les données.
Astuce : lance un serveur PHP local depuis ce dossier avec `php -S localhost:8000`
pour tester le téléchargement et l'upload dans le navigateur.

## FICHIER-01 · Import de courriers (CSV)
- `courriers.csv` — séparateur `;`, colonnes `date;expediteur;objet;type`, avec un en-tête.
  Cas à gérer volontairement placés dedans :
  - une **ligne vide** (après le 2026-03-10) ;
  - une ligne à **2 colonnes** seulement (2026-03-11) → trop peu ;
  - une ligne à **6 colonnes** (2026-03-12, un `;` en trop) → trop de colonnes ;
  - une ligne à **expéditeur vide** (2026-03-13) → structure valide, valeur manquante.
  ⚠️ Pense à décider quoi faire de la 1re ligne (l'en-tête) : la sauter ou non.
- `courriers_vide.csv` — fichier vide (0 octet), pour ton cas « fichier vide ».
- Pour le cas « fichier absent » : pointe simplement vers un nom qui n'existe pas.

## FICHIER-02 · Téléchargement sécurisé
- `documents/` — les fichiers autorisés au téléchargement.
- `documents/manifest.csv` — le mapping `id;fichier;nom_telechargement` (ta "DB" simulée).
  Ex. `telecharger.php?id=2` doit servir `2_arrete.txt` sous le nom affiché.
- `config.php` — **fichier sensible, à la racine.** Il ne doit JAMAIS être téléchargeable.
  ⚠️ Test path traversal : si ton script accepte un nom/chemin, essaie de lui passer
  `../config.php` ou `../../config.php`. Ta vérification `realpath` doit refuser tout ce
  qui sort de `documents/`. Si tu récupères le mot de passe DB, c'est perdu.

## FICHIER-03 · Upload validé
- `uploads/` — dossier de destination (vide). C'est là que `move_uploaded_file` doit déposer.
- `fichiers-a-uploader/` — de quoi tester ta validation :
  - `document-valide.pdf` → vrai PDF (MIME réel `application/pdf`) → **accepté**.
  - `image-valide.png` → vraie image (MIME réel `image/png`) → **accepté**.
  - `faux-pdf.pdf` → extension `.pdf` mais contenu PHP (MIME réel `text/x-php`) → **rejeté**.
  ⚠️ C'est tout l'enjeu : ne valide pas sur l'extension du nom, mais sur le vrai type via
  `finfo`. Régénère aussi le nom de stockage toi-même, et impose une taille max
  (crée un gros fichier à part si tu veux tester la limite).
