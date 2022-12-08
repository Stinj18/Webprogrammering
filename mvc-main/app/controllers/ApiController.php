<?php

class ApiController extends Controller {
	
	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index () {
		$functions = array(
			['users' => 'returns full list of users'],
			['user/i' => 'returns info about user with user_id "i"']
		);
		echo json_encode($functions, JSON_PRETTY_PRINT);
	}
	
	public function users () {
		$users = $this->model('User')->get_users();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function user ($user_id) {
		$user = $this->model('User')->get_user($user_id);
		echo json_encode($user, JSON_PRETTY_PRINT);
	}

	public function images () {
		$images = $this->model('Home')->get_images($image_id);
		echo json_encode($images, JSON_PRETY_PRINT);
	}

	public function image ($image_id) {
		$image = $this->model('Home')->get_image($image_id);
		echo json_encode($pictures, JSON_PRETTY_PRINT);
	}
/*
	public function search($query) {
		$queryWords = explode('+', $query);
		$properString = '';

		foreach ($queryWords as $word) {
			$properString .= ' ' . $word;
		}

		$properString = trim($properString);
		echo 'You searched for query: "' . $properString . '"';
	}
*/
}