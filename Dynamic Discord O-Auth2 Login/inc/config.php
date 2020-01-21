<?php

require(dirname(__FILE__).'/discord.class.php');
require(dirname(__FILE__).'/db.php');


$website = array(
	'discord_client'	=>	'',
	'discord_secret'	=>	'',
	'discord_scopes'	=>	'identify email guilds',	// scopes entre espacios
	'url'				=>	website::website_url(),
	'current_url'		=>	website::current_url()
);

session_start();
?>
