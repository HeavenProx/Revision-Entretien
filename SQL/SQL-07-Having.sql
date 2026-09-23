-- SQL-07
-- HAVING
-- Les clients ayant passé plus de 3 commandes.

SELECT cl.nom, COUNT(co.id)
FROM `commandes` co
INNER JOIN clients cl ON cl.id = co.client_id
GROUP BY cl.nom
HAVING COUNT(co.id) > 3