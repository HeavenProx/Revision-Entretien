-- SQL-14
-- ROW_NUMBER
-- Le produit le plus vendu DANS CHAQUE catégorie.

SELECT *
FROM (SELECT ROW_NUMBER() OVER (PARTITION BY p.categorie ORDER BY SUM(l.quantite) DESC) AS ligne_num, p.categorie, p.nom, SUM(l.quantite)
        FROM produits p
        INNER JOIN lignes_commande l ON p.id = l.produit_id
        GROUP BY p.categorie, p.nom
     ) AS classement
WHERE classement.ligne_num = 1;