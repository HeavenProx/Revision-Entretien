-- SQL-08
-- INNER JOIN
-- Chaque commande avec le nom du client associé.

SELECT cl.nom, co.id
FROM `commandes` co
INNER JOIN clients cl ON cl.id = co.client_id;


-- SELECT cl.nom, co.id, p.nom
-- FROM `commandes` co
-- INNER JOIN clients cl ON cl.id = co.client_id
-- INNER JOIN lignes_commande l ON co.id = l.commande_id
-- INNER JOIN produits p ON p.id = l.produit_id;