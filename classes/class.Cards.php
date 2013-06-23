<?php

Class Cards {

	public function __construct() {

		try {

			$cardquery = new PDO("mysql:host=$db['hostname'];dbname=$db['name']", $db['user'], $db['password']);
			$cardquery->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = 'SELECT * FROM cards';
			$query = $cardquery->prepare($sql);
			$query->execute();
			$cards = $query->fetchAll();
			$cardCount = $query->rowCount();

			for($i=0; $i<=$cardCount; $i++) {
				$cards[$i]['uses'] = 0;
			}

			return $cards;

		}

		catch (PDOException $e) {
			echo 'Oops, cardQuery error: ' . $e->getMessage();
		}

	}

}