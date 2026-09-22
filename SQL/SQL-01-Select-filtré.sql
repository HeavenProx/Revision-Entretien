-- SQL-01
-- SELECT filtré
-- Tous les clients de Lyon, triés par nom.

SELECT nom
FROM clients
WHERE ville = 'Lyon'
ORDER BY nom;