-- Insertar datos en gender
<<<<<<< HEAD
<<<<<<< HEAD
=======
INSERT INTO genders (gender) VALUES ('m'); 
INSERT INTO genders (gender) VALUES ('h'); 
>>>>>>> 5a619d9623087ec6898acf1171f4b3ff0217cd8e
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
INSERT INTO genders (gender) VALUES ('o'); 

-- Insertar datos en languages
INSERT INTO languages (language) VALUES ('Castellano');
INSERT INTO languages (language) VALUES ('English');
<<<<<<< HEAD
<<<<<<< HEAD
=======
INSERT INTO languages (language) VALUES ('French');
>>>>>>> 5a619d9623087ec6898acf1171f4b3ff0217cd8e
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b

-- Insertar datos en pets
INSERT INTO pets (pet) VALUES ('Gato');
INSERT INTO pets (pet) VALUES ('Tigre');
INSERT INTO pets (pet) VALUES ('Lince');
INSERT INTO pets (pet) VALUES ('Puma');

<<<<<<< HEAD
<<<<<<< HEAD
-- Inserta un usuario
INSERT INTO users SET 
=======
INSERT INTO pets (pet) VALUES ('Cat');
INSERT INTO pets (pet) VALUES ('Dog');
-- Inserta un usuario
INSERT INTO users SET 
			iduser = 'ab593a08-a693-46e7-ada9-eb66c1877eb1',
			name = 'Agustin',
            lastname = 'Calderon',
            email = 'agustincl@gmail.com',
            password = '1234',
            description = 'descripcion',
            photo = 'image.png',
            cities_idcity = 1,
            genders_idgender = 3;

INSERT INTO users SET 
>>>>>>> 5a619d9623087ec6898acf1171f4b3ff0217cd8e
=======
-- Inserta un usuario
INSERT INTO users SET 
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
			iduser = 'b8633638-dfad-4b6c-8fae-6aaf91e23e14',
			name = 'Agustin',
            lastname = 'Calderon',
            email = 'agustincl2@gmail.com',
            password = '1234',
            description = 'descripcion',
            photo = 'image.png',
<<<<<<< HEAD
<<<<<<< HEAD
            cities_idcity = 1,
=======
            cities_idcity = 2,
>>>>>>> 5a619d9623087ec6898acf1171f4b3ff0217cd8e
=======
            cities_idcity = 1,
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
            genders_idgender = 3;

-- Update un usuario
UPDATE users SET 
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
			name = 'Sebastian',
            lastname = 'Calderon'
WHERE 
iduser = 'b8633638-dfad-4b6c-8fae-6aaf91e23e14';
<<<<<<< HEAD
=======
            cities_idcity = 3 
WHERE 
iduser = 'ab593a08-a693-46e7-ada9-eb66c1877eb1';
>>>>>>> 5a619d9623087ec6898acf1171f4b3ff0217cd8e
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
	
INSERT INTO users SET 
			iduser = '4ea8f86a-0488-42cd-9730-cfdb0974c395',
			name = 'KAKA',
            lastname = 'kaka',
            email = 'kaka@gmail.com',
            password = '1234',
            description = 'descripcion',
            photo = 'image.png',
            cities_idcity = 1,
            genders_idgender = 3;
      
-- Delete un usuario

DELETE FROM users 
WHERE
iduser = '4ea8f86a-0488-42cd-9730-cfdb0974c395';
			
-- Insertar lenguajes al usuario
INSERT INTO users_has_languages SET
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
		users_iduser = '846f600e-7baa-11e4-b116-123b93f75cba',
        languages_idlanguage =1;

INSERT INTO users_has_languages SET
		users_iduser = '846f600e-7baa-11e4-b116-123b93f75cba',
        languages_idlanguage =2;        
        
<<<<<<< HEAD
=======
		users_iduser = 'ab593a08-a693-46e7-ada9-eb66c1877eb1',
        languages_idlanguage =1;

INSERT INTO users_has_languages SET
		users_iduser = 'ab593a08-a693-46e7-ada9-eb66c1877eb1',
        languages_idlanguage =2;        
        
INSERT INTO users_has_pets SET
		users_iduser = 'ab593a08-a693-46e7-ada9-eb66c1877eb1',
        pets_idpet =1;

INSERT INTO users_has_pets SET
		users_iduser = 'ab593a08-a693-46e7-ada9-eb66c1877eb1',
        pets_idpet =2;        
        
        
>>>>>>> 5a619d9623087ec6898acf1171f4b3ff0217cd8e
=======
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
-- SELECT usuarios
SELECT * FROM users;
SELECT name, email FROM users;
SELECT name FROM users WHERE password ='1234';

SELECT languages_idlanguage FROM users_has_languages
WHERE users_iduser = '846f600e-7baa-11e4-b116-123b93f75cba';

SELECT name, languages_idlanguage FROM users 
JOIN users_has_languages ON users_iduser = iduser
WHERE iduser = '846f600e-7baa-11e4-b116-123b93f75cba';

SELECT name, language FROM users 
JOIN users_has_languages ON users_iduser = iduser
JOIN languages ON idlanguage = languages_idlanguage
WHERE iduser = '846f600e-7baa-11e4-b116-123b93f75cba';


SELECT name, group_concat(language) FROM users 
JOIN users_has_languages ON users_iduser = iduser
JOIN languages ON idlanguage = languages_idlanguage
WHERE iduser = '846f600e-7baa-11e4-b116-123b93f75cba'
GROUP BY name; 


