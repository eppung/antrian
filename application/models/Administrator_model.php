<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator_model extends CI_Model
{


    public function insert($data)
    {
        $cek = $this->db->where('nama_loket', $data['nama_loket'])->get('loket')->num_rows();

        //cek loket yang sama
        if ($cek > 0) {
            return "Data sudah ada";
        } else {
            $this->db->insert('loket', $data);
            return true;
        }
    }

}


/* End of file Administrator_model.php and path \application\models\Administrator_model.php */
