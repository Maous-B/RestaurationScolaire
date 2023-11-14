
CREATE TABLE auth(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	login CHAR(200),
	pw CHAR(200),
	grain_de_sel CHAR(100),
	email CHAR(50),
	numero_de_telephone CHAR(50),
	date_de_creation DATE
);