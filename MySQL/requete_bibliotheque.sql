-- Ne renvois rien car null n'est pas égale a null 
	SELECT * FROM emprunt WHERE date_rendu = null;
    -- On utilise donc IS null , si on veut tester une valeure null
    	SELECT * FROM emprunt WHERE date_rendu IS null;
	-- et IS NOT null pour l'inverse
    	SELECT * FROM emprunt WHERE date_rendu IS NOT null;
        
-- faire le lien entre deux table en faisant une requete dans une requete et en utilisant la foreign key id_livre
	SELECT titre 
	FROM livre 
	WHERE id_livre IN ( 	
		SELECT id_livre 
		FROM emprunt 
		WHERE date_rendu 
		IS null 
	);

	SELECT * FROM bibliotheque.abonne;
-- trouver les livre emprunter par Chloé

	SELECT id_livre 
	FROM emprunt 
	WHERE id_abonne = ( 	
		SELECT id_abonne 
		FROM abonne 
		WHERE prenom ='Chloe'
	);
		
-- trouver le prenom des abonne ayant enpreinté un livre le 19/12/2014
	SELECT prenom 
	FROM abonne 
	WHERE id_abonne IN ( 	
		SELECT id_abonne 
		FROM emprunt 
		WHERE date_sortie = '2014-12-19'
	);

-- Combien d'emprunt a fait guillaume
	SELECT COUNT(*) AS nb_emprunts
	FROM emprunt
	WHERE id_abonne = (
		SELECT id_abonne
		FROM abonne
		WHERE prenom = 'Guillaume'
	);
            
-- combien d'emprunt a fait Chloe, et quels titre
	SELECT titre
	FROM livre 
	WHERE id_livre IN (
		SELECT id_livre
		FROM emprunt
		WHERE id_abonne = (
			SELECT id_abonne
			FROM abonne
			WHERE prenom = 'Chloe'
		)
	);


-- combien de livre n'a pas rendut Chloe, et quels titre
	SELECT titre
	FROM livre 
	WHERE id_livre IN (
		SELECT id_livre
		FROM emprunt
		WHERE id_abonne = (
			SELECT id_abonne
			FROM abonne
			WHERE prenom = 'Chloe'
		)
		AND date_rendu IS null
	);
    
-- afficher le nom des abonne qui on deja enprunter guy de maupassant
    SELECT prenom
    FROM abonne
    WHERE id_abonne IN (
		SELECT id_abonne
        FROM emprunt
        WHERE id_livre IN (
			SELECT id_livre
            FROM livre
            WHERE id_auteur = (
				SELECT id_auteur
				FROM auteur
				WHERE nom = 'guy de maupassant'
			)
		)
	);
    
-- JOINTURE
	-- afficher nom et titre des livre de l'auteur id =4
		SELECT auteur.nom, livre.titre
		FROM auteur, livre
		WHERE auteur.id_auteur = livre.id_auteur 
		AND auteur.id_auteur = 4;    

	-- la même requete avec des alias
		SELECT a.nom, l.titre
		FROM auteur a, livre l
		WHERE a.id_auteur = l.id_auteur 
		AND a.id_auteur = 4;  
		
	-- afficher le prénom de l'abonnée, la date de sortie, la date de rendue de l'emprunt numero 1

		SELECT a.prenom,  e.date_sortie, e.date_rendu
		FROM abonne a, emprunt e
		WHERE a.id_abonne = e.id_abonne
		AND e.id_emprunt = 1;
		
		-- pareil avec le  livre et l'autheur
			SELECT a.prenom,  e.date_sortie, e.date_rendu, au.nom, l.titre
			FROM abonne a, emprunt e, livre l, auteur au
			WHERE a.id_abonne = e.id_abonne
			AND e.id_livre = l.id_livre
			AND au.id_auteur = l.id_auteur
			AND e.id_emprunt = 1;
            
-- JOINTURE avec JOIN /ON
	--
		SELECT a.prenom,  e.date_sortie, e.date_rendu
		FROM emprunt e 
		JOIN abonne a ON a.id_abonne = e.id_abonne
		WHERE e.id_emprunt = 1;
    --
		SELECT a.prenom,  e.date_sortie, e.date_rendu, au.nom, l.titre
		FROM emprunt e 
		JOIN abonne a ON a.id_abonne = e.id_abonne
		JOIN livre l ON l.id_livre = e.id_livre
		JOIN auteur au ON au.id_auteur = l.id_auteur
		WHERE e.id_emprunt = 1;
    
    -- afficher le titre du livre, le prenom de l'abonné, les date de sortie et de rendu des livre de maupassant
		SELECT l.titre, a.prenom, e.date_sortie, e.date_rendu
		FROM emprunt e 
		JOIN abonne a ON a.id_abonne = e.id_abonne
		JOIN livre l ON l.id_livre = e.id_livre
		JOIN auteur au ON au.id_auteur = l.id_auteur
		WHERE au.nom = 'guy de maupassant';
        
	-- lister les emprunts par ordre de sortie 
    -- afficher le prenom de l'abonné , le titre du livre et la date de sortie
		SELECT a.prenom, l.titre, e.date_sortie
		FROM emprunt e
		JOIN abonne a ON a.id_abonne = e.id_abonne
		JOIN livre l ON l.id_livre = e.id_livre
        ORDER BY e.date_sortie ASC;
	
    -- qui a empreinté "une vie " en 2014, prenom et date de sortie
		SELECT a.prenom, e.date_sortie
		FROM emprunt e
		JOIN abonne a ON a.id_abonne = e.id_abonne
		JOIN livre l ON l.id_livre = e.id_livre
        WHERE l.titre = 'une vie'
        AND e.date_sortie LIKE '2014-%';
        
	-- afficher le nombre de livres empruntés par chaque abonné et le nom de l'abonné
		SELECT a.prenom, COUNT(e.date_sortie) AS nb_livre_emprunte
		FROM emprunt e
		JOIN abonne a ON a.id_abonne = e.id_abonne
        GROUP BY a.prenom;
        -- LEFT JOIN permet d'afficher toutes les valeurs de la table qui se trouve avant(à gauche), meme si elle n'on pas forcement de paire 
			SELECT a.prenom, e.id_emprunt
			FROM abonne a
			LEFT JOIN emprunt e ON a.id_abonne = e.id_abonne;
		-- RIGHT JOIN permet d'afficher toutes les valeurs de la table qui se trouve avant(à droite), meme si elle n'on pas forcement de paire 
			SELECT a.prenom, e.id_emprunt
			FROM emprunt e
			RIGHT JOIN abonne a ON a.id_abonne = e.id_abonne;
            
-- UNION: Operateur d'enssemble dédoublonnage, UNION ALL : Operateur d'ensemble sans dédoublonnage
	SELECT prenom FROM abonne
    UNION 
    SELECT nom FROM auteur


    