<?php

function credentials() {

	// Variables
	$db['hostname'] = 'localhost';
	$db['username'] = 'roots';
	$db['password'] = 'w00tw00t';

	return $db;

}

function countCards() {

	// Variables
	$hostname = 'localhost';
	$username = 'roots';
	$password = 'w00tw00t';

	try 
	{
		$cardquery = new PDO("mysql:host=$hostname;dbname=gameofthings", $username, $password);
		$cardquery->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT * FROM cards';
		$query = $cardquery->prepare($sql);
		$query->execute();
		$cardCount = $query->rowCount();

		return $cardCount;
	} 
	catch (PDOException $e)
	{
		echo 'Oops, cardQuery error: ' . $e->getMessage();
	}
}