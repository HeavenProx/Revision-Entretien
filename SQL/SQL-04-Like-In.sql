-- SQL-04
-- LIKE / IN
-- Les produits dont le nom commence par « A », OU dont la catégorie est « boisson » ou « snack ».

SELECT *
FROM `produits`
WHERE nom LIKE 'A%' OR categorie IN ('boisson', 'snack');