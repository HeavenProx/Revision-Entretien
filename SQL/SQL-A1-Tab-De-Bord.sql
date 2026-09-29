-- Tables courriers(id, objet, statut, date_reception, date_traitement, service_id) 
-- et services(id, nom). 

-- Écris : (1) par service, le nombre de courriers par statut et le délai moyen de traitement ; 
-- (2) les courriers en retard (reçus il y a plus de 15 jours, pas encore traités).

-- 1 : 
SELECT s.nom, c.statut, COUNT(c.id) AS nb_courrier, AVG(DATEDIFF(c.date_traitement, c.date_reception)) AS delai_moyen_jours
FROM courriers c 
INNER JOIN services s ON c.service_id = s.id
GROUP BY s.nom, c.statut

-- 2 :
SELECT c.id, c.objet, c.statut
FROM courriers c
WHERE DATEDIFF(NOW(), c.date_reception) > 15
  AND c.date_traitement IS NULL;