-- SQL-09
-- LEFT JOIN
-- Les clients qui n'ont JAMAIS passé de commande.

SELECT cl.nom, COUNT(DISTINCT(co.id))
FROM clients cl
LEFT JOIN `commandes` co  ON cl.id = co.client_id
GROUP BY cl.nom
HAVING COUNT(DISTINCT(co.id)) = 0
