-- SQL-06
-- GROUP BY
-- Le nombre de commandes par client.

SELECT cl.nom, COUNT(co.id)
FROM `commandes` co
INNER JOIN clients cl ON cl.id = co.client_id
GROUP BY cl.nom;