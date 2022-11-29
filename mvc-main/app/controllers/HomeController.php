<?php

/** Default Controller */
class HomeController extends Controller { #Det den kalder som standard
	
	/**
	 * Default function for HomeController
	 * 
	 * Collects info in "viewbag":
	 * - using functino parameters
	 * - using services
	 * - using models
	 * and sending it to the view
	 * 
	 * Den er er kaldet by default, hvis ikke vi kalder noget andet. 
	 */
	public function index ($param_a = null, $param_b = null) { #to parametre som man selv skal sætte
		#viewbag er et array
		$viewbag['passed'] = [$param_a, $param_b]; #De indtastede parametre. Den har default values as null, så hvis ikke der bliver tastet noget ind vil functionen stadig virke. 
		#$viewbag['math_result'] = $this->service('math')->add_random_number(2); #kalder en service. Adds a random number, mellem 1 og 100
		#$viewbag['dog_fact'] = $this->service('dog')->get_fact(); # Den får et nyt dog fact hver gang siden genindlæses. Den kalder en API
		#$viewbag['model'] = $this->model('home')->x_string("joe"); #i home model, få vi noget fra en function kaldet x_string
		
		$this->view('home', 'index', $viewbag); #Pass viewbag i et view, den tager to parametre, view folderen, home folderen og index filen
	}
	
	/**
	 * Example of function that must only be called when user is logged in
	 * Hvis man er logget ind, sender den en til den restricted site. 
	 * Hvis man ikke er logget ind, sender den en til login siden. 
	 */
	public function restricted () {
		if($this->logged_in()) {
			$this->view('home', 'restricted');
			#$this->view('home', 'uploadpage');
			#$this->view('home', 'userlist');
		} else {
			header('Location:/user/login');
		}
	}
	
}