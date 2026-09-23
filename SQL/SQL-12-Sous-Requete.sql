-- SQL-12
-- Sous-requête
-- Les produits plus chers que le prix moyen de tous les produits.

SELECT nom, prix
FROM produits
WHERE prix > (SELECT AVG(prix) FROM produits);