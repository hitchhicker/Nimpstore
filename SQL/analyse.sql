#APP PLUS RENTABLE
SELECT art.titre,count(*)*art.prix as euro
FROM achatsimple acha,article art
WHERE art.titre=acha.titre
GROUP BY art.titre,art.prix
ORDER BY(euro) DESC
LIMIT 1
#EDITEUR QUI REALISE LE PLUS DE PROFIT
SELECT edi.nom
FROM Article art,editeur edi,
(SELECT art.titre AS titre,count(*)*art.prix AS euro 
FROM achatsimple acha,article art
WHERE art.titre=acha.titre
GROUP BY art.titre,art.prix
ORDER BY(euro) DESC
LIMIT 1) AS plus_rentable
WHERE art.titre=plus_rentable.titre
AND edi.id=art.editeur
#EDITEUR QUI REALISE LE PLUS DE VENTE
SELECT edi.nom
FROM Article art,editeur edi,
(SELECT art.titre AS titre,count(*) 
FROM achatsimple acha,article art
WHERE art.titre=acha.titre
GROUP BY art.titre,art.prix
ORDER BY(count(*)) DESC
LIMIT 1) AS plus_vente
WHERE art.titre=plus_vente.titre
AND edi.id=art.editeur
#NOMBRE D'INSTALLATION
SELECT articleInst
FROM installation
GROUP BY articleInst 
ORDER BY count(*) DESC
LIMIT 1
