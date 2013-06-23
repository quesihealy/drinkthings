<?php


function countCards() {
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