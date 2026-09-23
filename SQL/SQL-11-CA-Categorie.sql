-- SQL-11
-- Chiffre d'affaires par catégorie
-- Le CA total (quantité × prix) regroupé par catégorie de produit.

SELECT p.categorie, SUM(l.quantite * p.prix) AS "CA"
FROM produits p
INNER JOIN lignes_commande l ON p.id = l.produit_id
GROUP BY p.categorie
ORDER BY 'CA' DESC;