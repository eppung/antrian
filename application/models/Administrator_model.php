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

// $this->db->affected_rows();

    function delete($data) {
        $query = $this->db->where('id_loket', $data["id_loket"])->delete('loket');
        
        
        echo "<pre>";
        print_r ($query->delete('loket'));
        echo "</pre>";
        
        // if ($query->affected_rows() == 1) {
        //     return true;
        // }else {
        //     return "Gagal Memproses";
        // }
        
        
    }

}


/* End of file Administrator_model.php and path \application\models\Administrator_model.php */
