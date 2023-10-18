<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
$this->load->view('antrian/index');

    }
}

/* End of file Antrian.php and path \application\controllers\Antrian.php */
