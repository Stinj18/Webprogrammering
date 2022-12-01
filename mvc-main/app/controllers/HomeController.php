<?php

/** Default Controller */
class HomeController extends Controller { #Det den kalder som standard
	
	/**
	 * Example of function that must only be called when user is logged in
	 * Hvis man er logget ind, sender den en til den restricted site. 
	 * Hvis man ikke er logget ind, sender den en til login siden. 
	 */
	public function imagefeed () {
		if($this->logged_in()) {
			$this->view('home', 'imagefeed');
		} else {
			header('Location:/user/login');
		}
	}
	
	public function uploadpage () {
		if($this->logged_in()) {
			$this->view('home', 'uploadpage');
		} else {
			header('Location:/user/login');
		}
	}

	public function index ($param_a = null, $param_b = null) { #to parametre som man selv skal sætte
		$viewbag['passed'] = [$param_a, $param_b]; #De indtastede parametre. Den har default values as null, så hvis ikke der bliver tastet noget ind vil functionen stadig virke. 
		$viewbag['model'] = $this->model('Image')->get_images(); #i home model, få vi noget fra en function kaldet x_string
		
		$this->view('Image', 'index', $viewbag); #Pass viewbag i et view, den tager to parametre, view folderen, home folderen og index filen
	}
	
    public function upload () { 
        if($this->method('post')) {
            $image = $this->model('Image')->upload();
            header('Location: /home/uploadpage'); #gå ind på home/uploadpage 
        } else {
            $this->view('home', 'uploadimage');
        }
    }

    public function all_images () {
        $viewbag['images'] = $this->model('images')->get_images();
        $this->view('image', 'table', $viewbag);
    }
}