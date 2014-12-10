<<<<<<< HEAD
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
=======
-- Insertar datos en cities
INSERT INTO cities (city) VALUES ('Zaragoza'); 
INSERT INTO cities (city) VALUES ('Barcelona'); 
INSERT INTO cities (city) VALUES ('Madrid'); 
INSERT INTO cities (city) VALUES ('Badajoz'); 
INSERT INTO cities (city) VALUES ('Sevilla'); 

-- Insertar datos en gender
INSERT INTO genders (gender) VALUES ('male'); 
INSERT INTO genders (gender) VALUES ('female');
INSERT INTO genders (gender) VALUES ('other');

-- Insertar datos en languages
INSERT INTO languages (language) VALUES ('Castellano');
INSERT INTO languages (language) VALUES ('English');
INSERT INTO languages (language) VALUES ('Français');
INSERT INTO languages (language) VALUES ('Deuch');
INSERT INTO languages (language) VALUES ('Português');
INSERT INTO languages (language) VALUES ('Italiano');

-- Insertar datos en pets
INSERT INTO pets (pet) VALUES ('Gato');
INSERT INTO pets (pet) VALUES ('Tigre');
INSERT INTO pets (pet) VALUES ('Lince');
INSERT INTO pets (pet) VALUES ('Puma');

-- Inserta un usuario
INSERT INTO users SET 
			iduser = 'b8633638-dfad-4b6c-8fae-6aaf91e23e14',
>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
			name = 'Agustin',
            lastname = 'Calderon',
            email = 'agustincl2@gmail.com',
            password = '1234',
            description = 'descripcion',
            photo = 'image.png',
            cities_idcity = 1,
            genders_idgender = 3;
<<<<<<< HEAD
            
            
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




            
=======

INSERT INTO users SET 
			iduser = '4ea8f86a-0488-42cd-9730-cfdb0974c395',
			name = 'Antonio',
            lastname = 'Nacarino',
            email = 'naka@gmail.com',
            password = '1234',
            description = 'descripcion',
            photo = 'image2.png',
            cities_idcity = 1,
            genders_idgender = 1;
      

-- Update un usuario
UPDATE users SET 
			name = 'Sebastian',
            lastname = 'Calderon'
WHERE 
iduser = 'b8633638-dfad-4b6c-8fae-6aaf91e23e14';

-- Delete un usuario
DELETE FROM users 
WHERE
iduser = '4ea8f86a-0488-42cd-9730-cfdb0974c395';
			
-- Insertar lenguajes al usuario
INSERT INTO usuarios.users_has_languages SET
		users_iduser = '4ea8f86a-0488-42cd-9730-cfdb0974c395',
        languages_idlanguage =2;

INSERT INTO users_has_languages SET
		users_iduser = 'b8633638-dfad-4b6c-8fae-6aaf91e23e14',
        languages_idlanguage =2;        

-- Insertar mascotas al usuario
INSERT INTO usuarios.users_has_pets SET
		users_iduser = '4ea8f86a-0488-42cd-9730-cfdb0974c395',
        pets_idpet =1;
INSERT INTO usuarios.users_has_pets SET
		users_iduser = 'b8633638-dfad-4b6c-8fae-6aaf91e23e14',
        pets_idpet =2;
INSERT INTO usuarios.users_has_pets SET
		users_iduser = 'c8633638-abcd-4cb6-8fae-6aaf91e32e55',
        pets_idpet =3;
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


>>>>>>> 2154e67bf3659eb83eab35fa977f7f2d7077b02b
