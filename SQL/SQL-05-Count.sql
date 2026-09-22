-- SQL-05
-- COUNT
-- Le nombre total de commandes, et le nombre de clients distincts ayant commandé.

SELECT COUNT(DISTINCT(cl.id)) , COUNT(co.id)
FROM `commandes` co
INNER JOIN clients cl ON cl.id = co.client_id;