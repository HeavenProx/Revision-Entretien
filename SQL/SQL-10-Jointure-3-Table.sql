-- SQL-10
-- Jointure sur 3 tables
-- Le détail d'une commande donnée : nom du produit, quantité, prix unitaire.

SELECT p.nom, l.quantite, p.prix
FROM commandes co
INNER JOIN lignes_commande l ON co.id = l.commande_id
INNER JOIN produits p ON l.produit_id = p.id
WHERE co.id = 7;