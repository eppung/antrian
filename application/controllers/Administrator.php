<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Datatables','tabel');
        
    }

    public function index()
    {
        $this->load->view('administrator/index');
    }

    function datatables() {
        
    }

    function simpanLoket() {
        
        

        echo json_encode($_POST);
        
    }
}

/* End of file Administrator.php and path \application\controllers\Administrator.php */
