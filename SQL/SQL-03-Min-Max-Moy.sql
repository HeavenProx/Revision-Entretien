-- SQL-03
-- Agrégats
-- Le prix moyen, minimum et maximum des produits, en une seule requête.

SELECT AVG(prix), MIN(prix), MAX(prix)
FROM `produits`