<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model','setting');
        
    }

    public function index()
    {
        $data['data'] = $this->setting->get_param_komputer();
        $this->load->view('setting/index',$data);
    }

    function get_loket() {
      
        if (isset($_GET["q"])) {
            $term = $_GET["q"];
        }else {
            $term='';
        }
        
        $query['items'] = $this->setting->getloket($term);
        
        echo json_encode($query);
        
    }

    function update_loket()  {
      
        $data = $_POST;
        $result = $this->setting->update_loket($data);
        echo($result);
    }
}

/* End of file Setting.php and path \application\controllers\Setting.php */


