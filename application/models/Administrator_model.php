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

    function delete($data) {
        $query = $this->db->where('id_loket', $data["id_loket"])->delete('loket');
        
        if ($this->db->affected_rows()== 1) {
            return true;
        }else {
            return "Gagal Memproses";
        }
    }

    function updateLoket($data) {
        $update = array_diff_key($data, array_flip(['id_loket']));
        
        $query = $this->db->where('id_loket', $data['id_loket'])->update('loket',$update);
        
        if ($this->db->affected_rows() >= 1) {
            return true;
        }else {
            return "Gagal Memproses";
        }
        
        
    }

}


/* End of file Administrator_model.php and path \application\models\Administrator_model.php */
