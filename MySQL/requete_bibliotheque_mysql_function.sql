-- fonction sur les string
    -- length() taille de la string
		SELECT length('test');
        
	-- concat_ws() concatennation avec séparateur
		--
		SELECT concat_ws('-', 'a', 'b', 'c' ) AS str;
		--
		SELECT concat_ws(':', id_abonne, prenom ) AS abonne
		FROM abonne;
		
	-- trim() retire les espaces en debut et fin de string
		SELECT trim('               ici                 ' );
		
	-- replace() remplace dans un champ donné une string par une autre.
		--
		SELECT replace(prenom, 'e', 'a') FROM abonne;
		--
		UPDATE abonne
		SET prenom= replace(prenom, 'j', 'J')
		WHERE id_abonne = 8;
		
	-- substring() permet de cut une string
		SELECT SUBSTRING('bonjour', 4); -- coupe la chaine en commençant au 4ème caractère
		SELECT substring('bonjour', 4, 2); -- coupe la chaine en commençant au 4ème caractère pour une longueure de 2

	-- upper()/lower() uppercase/lowercase la string
		-- upper()
			SELECT upper(prenom)
			FROM abonne;
		-- lower()
			SELECT lower(prenom)
			FROM abonne;
    
-- fonction sur les nombres
	-- arrondi 
		SELECT round(AVG(salaire))
		FROM entreprise.employe;
    -- arrondi a l'inferieur
		SELECT floor(AVG(salaire))
		FROM entreprise.employe;
    -- arrondi au superieur
		SELECT ceil(AVG(salaire))
		FROM entreprise.employe;
        
-- fonction sur les dates 
	-- datetime courant
		SELECT now();
    -- date courante
		SELECT curdate();
	-- heure courante
		SELECT curtime();
	-- formatage de date
		SELECT date_format(now(),'%d/%m/%Y %H:%i:%s') as now;
	-- rajoute ou retranche du temps à une date, ici 2 jours.
        SELECT date_add(now(), INTERVAL 2 DAY);
	-- recupère l'année dans une date donnée
		SELECT * FROM emprunt
        WHERE year(date_sortie) = 2014;
        
-- fonction de test
	-- ifnull()
		SELECT date_sortie , ifnull(date_rendu, 'en cour') AS date_rendu
		FROM emprunt;
    -- if()
		SELECT 
			date_sortie , 
			if(
				date_rendu IS NULL, 
				'en cour',
				concat('rendu le : ', date_rendu)
			) AS date_rendu
		FROM emprunt;
        
	-- equivalent switch  
        SELECT 
			CASE WHEN date_rendu IS null 
				THEN 'en cour' 
				ELSE concat('rendue le : ', date_rendu) 
            END as date_rendu
        FROM emprunt;
	
    -- 
	SELECT 
		CASE prenom
			WHEN 'Julien'
			THEN 'moi'
			WHEN 'Chloe'
			THEN 'elle'
			ELSE prenom
		END as qui
	FROM emprunt;
        
	-- retourne la première cvaleure non null
		SELECT coalesce(null, null, 'test', null) as val;
    
    -- dernier identifiant
		insert into abonne(prenom) VALUES ('liam');
		SELECT last_insert_id();