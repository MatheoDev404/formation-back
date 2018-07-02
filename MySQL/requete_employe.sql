
SELECT *
FROM employe;

SELECT nom, prenom
FROM employe;

-- sélectionne le service de chaque employé, avec les doublons
	SELECT service
	FROM employe;

-- DISTINCT pour dédoublonner
	SELECT DISTINCT service
	FROM employe;

-- DISTINCT pour dédoublonner par couple de valeurs
	SELECT DISTINCT service, salaire
	FROM employe;

-- Filtrage des données avec WHERE
	SELECT *
	FROM employe
	WHERE id = 1;

-- Egalité =
	SELECT *
	FROM employe
	WHERE salaire = 6000;

-- Inégalité !=
	SELECT *
	FROM employe
	WHERE salaire != 6000;

-- Inégalité <>
	SELECT *
	FROM employe
	WHERE salaire <> 6000;

-- Comparaison  
	-- >
	SELECT *
	FROM employe
	WHERE salaire > 6000;

	-- <
	SELECT *
	FROM employe
	WHERE salaire < 6000;

-- quotes(simple et double, pour MySQL) pour les strings
	SELECT *
	FROM employe
	WHERE service = 'informatique';

-- Pareil pour les dates, le format: 'yyyy-mm-dd'
	SELECT *
	FROM employe
	WHERE date_embauche = '2017-01-01';

-- Pour échaper une quote: \
	SELECT *
	FROM employe
	WHERE nom = 'Poivré d\'Arvor';
    
-- entre deux valeurs(incluses): BETWEEN
	SELECT *
	FROM employe
	WHERE date_embauche BETWEEN '2016-06-01' AND '2016-10-01';
    
-- Qui ressemble à: LIKE
	-- qui commence par
	SELECT *
	FROM employe
	WHERE prenom LIKE 'j%';
    
    -- qui fini par
    SELECT *
	FROM employe
	WHERE prenom LIKE '%n';
    
    -- qui contient 
	SELECT *
	FROM employe
	WHERE prenom LIKE '%ie%';
    
    -- exemple avec une date
    SELECT *
	FROM employe
	WHERE date_embauche LIKE '2016%';
    
-- Avec OR , au moins une des conditions spécifiée doit etre remplie
    SELECT *
	FROM employe
	WHERE service = 'informatique'
    OR salaire >= 5000;
    
-- Pour avoir les commerciaux qui gagnent 4000 ou 5000
	SELECT *
	FROM employe
	WHERE service = 'commercial' AND (salaire = 5000 OR salaire = 4000);
    
-- Avec IN on spécifie les valeurs acceptées
	-- IN + AND
	SELECT *
	FROM employe
	WHERE service = 'commercial' AND salaire  IN(5000, 4000);
    
	-- IN
    SELECT *
	FROM employe
	WHERE service IN( 'informatique', 'comptable' );
    
    -- NOT IN 
	SELECT *
	FROM employe
	WHERE service NOT IN( 'informatique', 'comptable' );

-- ORDER BY
	SELECT *
	FROM employe
	ORDER BY nom;
    
	-- ASC tri ascendant
	SELECT *
	FROM employe
	ORDER BY nom ASC;
    
    -- DESC tri descendant
	SELECT *
	FROM employe
	ORDER BY nom DESC;
    
    -- cumul successif des tris
		--
		SELECT *
		FROM employe
		ORDER BY service, date_embauche;
        --
		SELECT *
		FROM employe
		ORDER BY service DESC, date_embauche;

		--
		SELECT *
		FROM employe
		WHERE service = 'commercial'
		ORDER BY salaire;
    
-- LIMIT, par default l'OFFSET vaut 0
	-- Les 5 1er employés
	SELECT *
	FROM employe
    ORDER BY date_embauche DESC
	LIMIT 5;
    
    -- Les 3 premiers employés par ordre alphabétique
	SELECT *
	FROM employe
    ORDER BY nom ASC
	LIMIT 3;
    
    -- Les 3 employés, mais à partir du 4ème
	SELECT *
	FROM employe
    ORDER BY nom
	LIMIT 3 OFFSET 3;
    
    -- Les 3 employés, mais à partir du 7ème
	SELECT *
	FROM employe
    ORDER BY nom
	LIMIT 3 OFFSET 6;
    
	-- Ecriture simplifiée
		-- 3 premiers
		SELECT *
		FROM employe
		ORDER BY nom
		LIMIT 3, 0;
		-- 3 suivants
		SELECT *
		FROM employe
		ORDER BY nom
		LIMIT 3, 3;
        -- 3 suivants
		SELECT *
		FROM employe
		ORDER BY nom
		LIMIT 3, 6;
        
-- Les 2 informaticiens les mieux payés, triés par salaire decroissant
	SELECT * 
    FROM employe
    WHERE service = 'informatique' 
    ORDER BY salaire DESC
    LIMIT 2;
    

-- fonction d'aggrégat
	-- COUNT() compte le nombre d'employés
	SELECT COUNT(*)
    FROM employe;
    
    -- COUNT() compte le nombre d'informaticiens
	SELECT COUNT(*)
    FROM employe
    WHERE service = 'informatique';
    
     -- COUNT() compte le nombre d'informaticiens avec un alias
	SELECT COUNT(*) AS nb_info
    FROM employe
    WHERE service = 'informatique';
		-- example d'alias
        SELECT nom AS nom_employe, prenom AS pre, salaire*12 AS salaire_annuel
        FROM employe;
        
    -- SUM() additionne toutes les valeures
    SELECT SUM(salaire) AS masse_salariale_mensuelle
    FROM employe;
		-- 
		SELECT SUM(salaire*12) AS masse_salariale_annuelle
		FROM employe;
        
	-- AVG() additionne toutes les valeures
    SELECT AVG(salaire) AS salaire_moyen
    FROM employe;
    
    -- MAX() retourne la valeure la plus élevée
    SELECT MAX(salaire) AS salaire_max
    FROM employe;
    
    -- MIN() retourne la valeure la plus BASSE
    SELECT MIN(salaire) AS salaire_min
    FROM employe;
    
    -- GROUP BY permet de regrouper 
    SELECT service, COUNT(*) AS nb_employes
    FROM employe
    GROUP BY service;
    
    -- HAVING permet de dire si il a : 
	SELECT service, COUNT(*) AS nb_employes
    FROM employe
    GROUP BY service
    HAVING COUNT(*) > 2;
		-- Avec l'alias 
        SELECT service, COUNT(*) AS nb_employes
		FROM employe
		GROUP BY service
		HAVING nb_employes > 2;
        
-- INSERT INTO
	INSERT INTO employe (prenom, nom, service, date_embauche, salaire)
	VALUES ('Mathéo', 'Stunault', 'informatique', '2018-06-06', 5000);

	SELECT * FROM employe;

-- DELETE
	DELETE FROM employe WHERE id=13;

-- UPDATE
	--
	UPDATE employe SET salaire = 4000 WHERE id = 1;
	--
	UPDATE employe SET salaire = salaire - 1000 WHERE id = 1;
    --
    UPDATE employe SET prenom = 'Mister', nom = 'Hyde' WHERE id = 3;