<?php

Class Cards {

	public function __construct() {
		$this->id = '';
		$this->thing = '';
		$this->use = '';
	}

	public function count_cards($db) {

		try {
			$cardquery = new PDO($db['connection_string'], $db['username'], $db['password']);
			$cardquery->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Oops, could not connect to the database';
			exit;
		}

		$sql = 'SELECT * FROM cards';
		$query = $cardquery->prepare($sql);

		if ($query) {
			
			$result = $query->execute();

			if ($result) {
				// While there are rows return each row and add uses to the associative array
				$card_count = $query->rowCount(PDO::FETCH_ASSOC);
				return $card_count;
			} else {
				$error = $query->errorInfo();
				echo "Oops, the query failed. It slammed the door and yelled: " . $error[2];
			}

		}

	}

	public function get_cards($db) {

		$card_count = $this->count_cards($db);

		try {
			$cardquery = new PDO($db['connection_string'], $db['username'], $db['password']);
			$cardquery->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Oops, could not connect to the database';
			exit;
		}

		$sql = 'SELECT * FROM cards';
		$query = $cardquery->prepare($sql);

		if ($query) {
			
			$result = $query->execute();

			if ($result) {
				// While there are rows return each row and add uses to the associative array
				while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {

					$temp_cards = new Cards();

					$temp_cards->id = $row['id'];
					$temp_cards->thing = $row['thing'];
					$temp_cards->use = 0;

					$all_cards[] = $temp_cards;

				}

				return $all_cards;
			
			} else {
				$error = $query->errorInfo();
				echo "Oops, the query failed. It slammed the door and yelled: " . $error[2];
			}

		}

	}

	public function use_card($db, $deck_of_cards) {
		
		$card_count = $this->count_cards($db) - 1;

		$random_number = rand(0, $card_count);
		
		$current_card = $deck_of_cards[$random_number];
		$current_card->use++;

		while($current_card->use >= 2) {
			$current_card = rand(0, $card_count);
			$current_card->use++;
		}

		return $current_card;
	
	}

}