BEGIN; -- Début des instructions

SELECT * FROM employe;

UPDATE employe SET salaire = salaire + 100 WHERE id = 1;

ROLLBACK; -- annule l'instruction
COMMIT; -- Confirme l'instruction