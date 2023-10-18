<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
$this->load->view('administrator/index');

    }
}

/* End of file Administrator.php and path \application\controllers\Administrator.php */
