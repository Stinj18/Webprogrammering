<?php
/**
 * All Controller inherit this class
 * It defines convenience methods which allow controllers to
 * call models, services and views.
 */
class Controller {
	
	protected function model($model) { //Hjælper os med at håndtere modeller 
		require_once __DIR__ . '/../models/' . $model . '.php'; //Går ind i mappen models og kigger efter filer med en model
		return new $model();
	}
	
	protected function service($service) { //Hjælper os med at håndtere services 
		require_once __DIR__ . '/../services/' . ucfirst($service) . 'Service.php'; //Den tilføjer også service til filen
		$service_class = $service . 'Service';
		return new $service_class();
	}

	protected function view($folder, $view, $viewbag = []) { //Hjælper os med at håndtere views 
		$viewpath = __DIR__ . '/../views/' . $folder . '/' . $view . '.php'; //Definere en variable viewpath, bruger parametrene til at populate string 
		require_once __DIR__ . '/../views/template.php'; //Den require view templaten, der ligger i view mappen 
	}
	
	//convenience method to see if the request method was post or get
	protected function method ($method) {
		return $_SERVER['REQUEST_METHOD'] === strtoupper($method);
	}
	
	protected function logged_in () { //Function der tjekker om vi er logged in 
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
			return true;
		} else {
			return false;
		}
	}

}