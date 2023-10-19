<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Datatables', 'tabel');
        $this->load->model('Administrator_model', 'model');

    }

    public function index()
    {
        $this->load->view('administrator/index');
    }

    function datatables()
    {

    }

    function simpanLoket()
    {
        $data = array(
            "nama_loket" => $_POST['nama_loket'],
            "aktif" => 1
        );

        $query = $this->model->insert($data);
        
        if ( $query == 1) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => $query));
            
        }
    }
}

/* End of file Administrator.php and path \application\controllers\Administrator.php */
