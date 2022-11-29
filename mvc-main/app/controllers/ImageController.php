<?php

class ImageController extends Controller {
	
	public function index ($param) {
		echo 'Image index function not implemented';
	}
	
    public function upload () { 
        if($this->method('post')) {
            $image = $this->model('Image')->uploadpage();
            header('Location: /home/uploadpage'); #gå ind på user/register 
        } else {
            $this->view('home', 'uploadimage');
        }
    }

    public function all_images () {
        $viewbag['images'] = $this->model('images')->get_images();
        $this->view('image', 'table', $viewbag);
    }
	
}