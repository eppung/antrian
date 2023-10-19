<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

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

        if ($query == 1) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => $query));

        }
    }

    function loketDatatable()
    {
        // CodeIgniter 3 Example

        // Here we will select all fields from posts table
// and make a join with categories table
// Please note: we don't need to call ->get() here
        $queryBuilder = $this->db->select('nama_loket,aktif,id_loket')
            ->from('loket');
        /**
         * The first parameter is the query builder instance
         * and the second is the codeigniter version (3 or 4) 
         */
        $datatables = new Ngekoding\CodeIgniterDataTables\DataTables($queryBuilder, '3');
       
        // Add extra column
        $datatables->addColumn('action', function ($row) {
            return '<a href="url/to/delete/post/'.$row->id_loket.'">Delete</a>';
        });

        // Add squence number
// The default key is `sequenceNumber`
// You can change it with give the param
        $datatables->addSequenceNumber();
        $datatables->addSequenceNumber('rowNumber'); // It will be rowNumber

        $datatables->generate(); // done
    }
}

/* End of file Administrator.php and path \application\controllers\Administrator.php */
