<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Antrian_model','model');
        
    }

    public function index()
    {
        $data['data'] = $this->model->getLayanan();
$this->load->view('antrian/index',$data);

    }
}

/* End of file Antrian.php and path \application\controllers\Antrian.php */
