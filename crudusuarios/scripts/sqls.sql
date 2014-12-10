INSERT INTO genders(gender) VALUES ('m');
INSERT INTO genders(gender) VALUES ('h');
INSERT INTO genders(gender) VALUES ('o');

-- Insertar fatos en languages
INSERT INTO languages(language) VALUES ('Castellano');
INSERT INTO languages(language) VALUES ('English');

-- Insertar fatos en pets
INSERT INTO pets(pet) VALUES ('Gato');
INSERT INTO pets(pet) VALUES ('Tigre');
INSERT INTO pets(pet) VALUES ('Lince');
INSERT INTO pets(pet) VALUES ('Puma');

-- Inserta un usuario
INSERT INTO users SET
			iduser = 'users1eb7a397-ec87-4fab-a453-45938ef3ab56',
			name = 'Agustin',
            lastname = 'Calderon',
            email = 'agustincl2@gmail.com',
            password = '1234',
            description = 'descripcion',
            photo = 'image.png',
            cities_idcity = 1,
            genders_idgender = 3;
            
            
-- Update un usuario
UPDATE users SET
			name = 'Agustin',
            lastname = 'Calderon'
WHERE iduser = '1eb7a397-ec87-4fab-a453-45938ef3ab56';

-- Insertar lenguajes al usuario
INSERT INTO users_has_languages SET
			users_iduser = 'b8ced066-09ef-47fa-9344-9d0a5913cdf4',
            languages_idlanguage = 1;
         
INSERT INTO users_has_languages SET
			users_iduser = 'b8ced066-09ef-47fa-9344-9d0a5913cdf4',
            languages_idlanguage = 2;
            
SELECT name, languages FROM  users
JOIN users_has_languages ON iduser = users_has_languages.users_iduser
WHERE users_iduser ='b8ced066-09ef-47fa-9344-9d0a5913cdf4'; 

SELECT name, language FROM  users
JOIN users_has_languages ON iduser = users_has_languages.users_iduser
JOIN languages ON idlanguage = languages_idlanguage
WHERE users_iduser ='b8ced066-09ef-47fa-9344-9d0a5913cdf4'; 

SELECT name, group_concat(language) FROM  users
JOIN users_has_languages ON iduser = users_has_languages.users_iduser
JOIN languages ON idlanguage = languages_idlanguage
WHERE users_iduser ='b8ced066-09ef-47fa-9344-9d0a5913cdf4'
GROUP BY name; 




            