<?php
class User extends Database {
	
	/**
	 * Checks if a username and password is correct.
	 * The Session variable that remembers the login is set in the UserController
	 */
	public function login(){
		
		$username = filter_var ( $_POST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var ( $_POST['password'], FILTER_SANITIZE_STRING);
				
		
		$result = $this->select_one ("users", "username", $username);
		
		/*
		$sql = "SELECT username, password FROM users WHERE username = :username";
		
		//Følgende linjer gør det samme som select_one functionen 
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$result = $stmt->fetch(); //fetchAll would get multiple rows 
		*/
				
		return password_verify($password, $result['password']);

	}

	/**
	 * Registers a new user in the database
	 */
	public function register() {

		$username = filter_var( $_POST['username'], FILTER_SANITIZE_STRING); #Cross-site scripting with FILTER_SANITIZE_STRING, becuase it removes tags and remove or encode special characters from a string.
		$password = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
		$password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
		
		if ($password == $password2){
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO users (username, password) VALUES (:username, :hashed_password);";


    		$stmt = $this->conn->prepare($sql);
    		$stmt->bindParam(':username', $username); #A way to avoid SQL injection 
    		$stmt->bindParam(':hashed_password', $hashed_password);
    		$stmt->execute();
		} else {
			echo "Passwords er ikke ens";
		}
		

		#$sql = "INSERT INTO users (username, password) VALUES (:username, :password);";

		#$stmt = $this->conn->prepare($sql);
		#$stmt->bindParam(':username', $username);
		#$stmt->bindParam(':password', $hashed_password);
		#$stmt->execute();

		return $username;

	}

	/**
	 * Gets all users from the database, but without revealing their password hash
	 */
	public function get_users() {
		$sql = "SELECT user_id, username FROM users";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Gets a single user from the database
	 */
	public function get_user ($user_id) {
		$sql = "SELECT user_id, username FROM users WHERE user_id = :user_id";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}


}