-- SQL-13
-- Meilleur client
-- Le client qui a le plus dépensé au total.

SELECT cl.nom, SUM(l.quantite * p.prix) AS 'Total'
FROM clients cl
INNER JOIN commandes co ON cl.id = co.client_id
INNER JOIN lignes_commande l ON l.commande_id = co.id
INNER JOIN produits p ON p.id = l.produit_id
GROUP BY cl.nom
ORDER BY Total DESC
LIMIT 1;