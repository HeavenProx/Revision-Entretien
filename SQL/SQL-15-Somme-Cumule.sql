-- SQL-15
-- Somme cumulée
-- Le cumul du chiffre d'affaires jour après jour.

SELECT 
	co.date_commande, 
    SUM(l.quantite * p.prix) AS "CA",
    SUM(SUM(l.quantite * p.prix)) OVER (ORDER BY co.date_commande) as CA_Cumule
FROM commandes co
INNER JOIN lignes_commande l ON l.commande_id = co.id
INNER JOIN produits p ON p.id = l.produit_id
GROUP BY co.date_commande;