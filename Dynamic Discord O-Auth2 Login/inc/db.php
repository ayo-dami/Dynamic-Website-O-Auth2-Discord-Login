<?php


try {
	define('db_server'	, 'localhost');
	define('db_name'	, 'discord');
	define('db_user'	, 'root');
	define('db_pass'	, '');

	$mysql = new PDO('mysql:host='. db_server .';dbname='. db_name , db_user , db_pass);
	$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	echo $e->getMessage();
	exit;
}


/*

CREATE TABLE 'usuarios' (
	'id' VARCHAR(20) NOT NULL COMMENT 'ID Unico cuenta',
	'email' VARCHAR(100) NOT NULL COMMENT 'Correo del usuario',
	'name' VARCHAR(32) NOT NULL COMMENT 'Nombre Usuario',
	'tag' VARCHAR(4) NOT NULL COMMENT 'Tag (Cód 4 dígitos)',
	'avatar' VARCHAR(32) NOT NULL COMMENT 'Avatar',

	'token_access' VARCHAR(35) NOT NULL,
	'token_refresh' VARCHAR(35) NOT NULL,
	'token_expiration_date' TIMESTAMP NOT NULL,
	'stamp_info' TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha Registro/Update Info',
	PRIMARY KEY ('id')
) ENGINE=InnoDB ;

*/