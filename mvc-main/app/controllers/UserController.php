<?php

class UserController extends Controller {
	
	public function index ($param_a = null, $param_b = null) { #to parametre som man selv skal sætte
		$viewbag['passed'] = [$param_a, $param_b]; #De indtastede parametre. Den har default values as null, så hvis ikke der bliver tastet noget ind vil functionen stadig virke. 
		$viewbag['model'] = $this->model('User')->get_users(); #i home model, få vi noget fra en function kaldet x_string
		
		$this->view('User', 'index', $viewbag); #Pass viewbag i et view, den tager to parametre, view folderen, home folderen og index filen
	}
	
    public function register () { 
        if($this->method('post')) {
            $username = $this->model('User')->register();
            header('Location: /user/login'); #gå ind på user/register 
        } else {
            $this->view('user', 'registration');
        }
    }

    public function login() {
        if($this->method('post')) {
            if($this->model('User')->login()) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username['username'];
                header('Location: /');
            } else {
                echo 'wrong username or password';
            }
        } else {
            $this->view('user', 'login');
        }
	}
	
	public function logout() {
        session_unset();
		header('Location:/user/login');	
	}

    public function all_users () {
        $viewbag['users'] = $this->model('User')->get_users();
        $this->view('user', 'userlist', $viewbag);
    }
    
	public function userlist() {
		if($this->logged_in()) {
			$this->view('user', 'userlist');
		} else {
			header('Location:/user/login');
		}
	}
}