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

    function updateLoket()
    {
        $data = array();

        foreach ($_POST['loket'] as $key => $value) {
            $data['loket'][$value['name']] = $value['value'];

        }

        if (isset($_POST['layanan'])) {
            foreach ($_POST['layanan'] as $key => $value) {

                $data['layanan'][$value['name']] = ($value['value'] == 'true' ? 1 : 0);

            }
        }

        $query = $this->model->updateLoket($data);

        if ($query == 1) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => $query));

        }

    }

    function deleteLoket()
    {

        $data = array(
            "id_loket" => $_POST["id_loket"],
        );

        $query = $this->model->delete($data);

        if ($query == 1) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => $query));
        }
    }

    function loketDatatable()
    {
        // CodeIgniter 3 Example

        // Here we will select all fields from posts table
// and make a join with categories table
// Please note: we don't need to call ->get() here
        $queryBuilder = $this->db->select('nama_loket,kode_loket,aktif,id_loket')->order_by('nama_loket ASC')
            ->from('loket');
        /**
         * The first parameter is the query builder instance
         * and the second is the codeigniter version (3 or 4) 
         */
        $datatables = new Ngekoding\CodeIgniterDataTables\DataTables($queryBuilder, '3');
        $datatables->only(['nama_loket', 'kode_loket', 'aktif']);

        // Add extra column
        $datatables->addColumn('action', function ($row) {
            return '<td>
            <div class="dropdown">
                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                    href="#" role="button" data-toggle="dropdown">
                    <i class="dw dw-more"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="edit-loket dropdown-item" href="javascript:;" id="' . $row->id_loket . '"><i class="dw dw-edit2"></i>Edit Data</a>
                    <a class="delete-loket dropdown-item" href="javascript:;" id="' . $row->id_loket . '"><i class="dw dw-delete-3"></i>Hapus</a>
                </div>
            </div>
        </td>';
        });

        // Add squence number
// The default key is `sequenceNumber`
// You can change it with give the param
        $datatables->addSequenceNumber();
        $datatables->addSequenceNumber('rowNumber'); // It will be rowNumber

        $datatables->generate(); // done

    }

    //LAYANAN
    function simpanLayanan()
    {
        //jika input id layanan ada maka update gambar
        if ($_POST["id_layanan"] != null) {
            $this->updateGambarLayanan();
        } else {

            if ($_POST["kode_layanan"] == null) {
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $kodeLayanan = '';

                for ($i = 0; $i < 4; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $kodeLayanan .= $characters[$index];
                }
                do {
                    $exist = $this->model->cekKodeLayanan($kodeLayanan);
                } while ($exist >= 1);
            } else {
                $kodeLayanan = $_POST['kode_layanan'];
            }


            $data = array(
                "nama_layanan" => $_POST['nama_layanan'],
                "aktif" => 1,
                "kode_layanan" => $kodeLayanan
            );

            $query = $this->model->insertLayanan($data);

            if ($query == 1) {
                echo json_encode(array('status' => 'success'));
            } else {
                echo json_encode(array('status' => $query));

            }
        }

    }

    function updateGambarLayanan()
    {
        $update = $this->model->updateGambarLayanan();
        if ($update == 1) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => $update));

        }
    }

    function layananDatatable()
    {

        $queryBuilder = $this->db->select('nama_layanan,id_layanan,kode_layanan,aktif,image')->order_by('nama_layanan ASC')->from('layanan');

        $datatables = new Ngekoding\CodeIgniterDataTables\DataTables($queryBuilder, '3');
        $datatables->only(['nama_layanan', 'kode_layanan', 'aktif', 'image']);


        $datatables->addColumn('action', function ($row) {
            return '<td>
            <div class="dropdown">
                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                    href="#" role="button" data-toggle="dropdown">
                    <i class="dw dw-more"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="edit-layanan dropdown-item" href="javascript:;" id="' . $row->id_layanan . '"><i class="dw dw-edit2"></i>Edit Data</a>
                    <a class="edit-gambar-layanan dropdown-item" href="javascript:;" id="' . $row->id_layanan . '"><i class="dw dw-edit2"></i>Edit Gambar</a>
                    <a class="delete-layanan dropdown-item" href="javascript:;" id="' . $row->id_layanan . '"><i class="dw dw-delete-3"></i>Hapus</a>
                </div>
            </div>
        </td>';
        });

        $datatables->addSequenceNumber();
        $datatables->addSequenceNumber('rowNumber'); // It will be rowNumber

        $datatables->generate(); // done

    }

    function updateLayanan()
    {

        $data = array(
            'id_layanan' => $_POST['id_layanan'],
            'nama_layanan' => $_POST['nama_layanan'],
            'kode_layanan' => $_POST['kode_layanan'],
            'aktif' => $_POST['layanan_aktif']
        );
        $result = $this->model->updateLayanan($data);

        if ($result == 1) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => $result));
        }
    }

    function deleteLayanan()
    {
        $data = array(
            "id_layanan" => $_POST["id_layanan"],
        );

        $query = $this->model->deleteLayanan($data);

        if ($query == 1) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => $query));
        }
    }

    function get_layanan_by_loket()
    {
        $data = array('kode_loket' => $_POST['loket']);
        $query = $this->model->get_layanan_by_loket($data);

        // echo "<pre>";
        // print_r ($query);
        // echo "</pre>";

        echo json_encode($query);

    }

    function getsomedata()
    {

        // $this->db->where('loket.kode_loket', "AMGS");
        $this->db->select('param_antrian.kode_loket, param_antrian.kode_layanan,layanan.nama_layanan,param_antrian.aktif');

        $this->db->join('loket', 'loket.kode_loket = layanan.kode_loket', 'left');
        $this->db->join('param_antrian', 'param_antrian.kode_loket = loket.kode_loket AND loket.kode_loket = "AMGS"', 'left');

        $query = $this->db->get('layanan')->result();

        echo "<pre>";
        print_r($query);
        echo "</pre>";




    }



}

/* End of file Administrator.php and path \application\controllers\Administrator.php */
