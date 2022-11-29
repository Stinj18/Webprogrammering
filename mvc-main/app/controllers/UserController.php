<?php

class UserController extends Controller {
	
	public function index ($param) {
		echo 'user index function not implemented';
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
                #$_SESSION['username'] = $username['username'];
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
		header('Location: /');	
	}

    public function all_users () {
        $viewbag['users'] = $this->model('user')->get_users();
        $this->view('user', 'table', $viewbag);
    }
	
}