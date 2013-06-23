<?php

Class Cards {

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
				$cards = $query->fetchAll(PDO::FETCH_ASSOC);
				return $cards;
			} else {
				$error = $query->errorInfo();
				echo "Oops, the query failed. It slammed the door and yelled: " . $error[2];
			}

		}

		// for($i=0; $i<=$cardCount; $i++) {
		// 	$cards[$i]['uses'] = 0;
		// }

	}

	public function display_card($db) {
		
		$card_count = $this->count_cards($db);
		$deck_of_cards = $this->get_cards($db);

		$random_id = rand(0, $card_count);
		echo $deck_of_cards[$random_id]['thing'];
	
	}

}