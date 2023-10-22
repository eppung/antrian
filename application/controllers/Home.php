<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
        $this->load->view('home/home');
        
    }

   
}

/* End of file Home.php and path \application\controllers\Home.php */
