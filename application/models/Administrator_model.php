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

    function delete($data)
    {
        $query = $this->db->where('id_loket', $data["id_loket"])->delete('loket');

        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return "Gagal Memproses";
        }
    }

    function updateLoket($data)
    {
        $update = array_diff_key($data, array_flip(['id_loket']));

        $query = $this->db->where('id_loket', $data['id_loket'])->update('loket', $update);

        if ($this->db->affected_rows() >= 1) {
            return true;
        } else {
            return "Gagal Memproses";
        }
    }

    //LAYANAN
    function cekKodeLayanan($data)
    {
        $query = $this->db->where("kode_layanan", $data)->get('layanan')->num_rows();
        return $query;
    }

    public function insertLayanan($data)
    {
        $cek = $this->db->where('nama_layanan', $data['nama_layanan'])->get('layanan')->num_rows();

        //cek loket yang sama
        if ($cek > 0) {
            return "Data sudah ada";
        } else {
            //uppload gambar
            $config['upload_path'] = "./assets/images/iconLayanan"; //path folder file upload
            $config['allowed_types'] = 'gif|jpg|png'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload

            $this->load->library('upload', $config); //call library upload 
            if ($this->upload->do_upload("iconLayanan")) { //upload file
                $dataImage = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

                $image = $dataImage['upload_data']['file_name']; //set file name ke variable image
                $data['image'] = $image; //sisipkan nama image ke array
            }
            $this->db->insert('layanan', $data);
            return true;
        }
    }

    function updateLayanan($data)
    {

        //ambil data berdasarkan id_layanan
        $layanan = $this->db->where('id_layanan', $data['id_layanan'])->get('layanan')->row_array();
        $layanandiff = array_diff($data, $layanan);


        foreach ($layanandiff as $key => $value) { //jika ada data yang sudah ada

            if ($key != "aktif") {
                $resultlayanandiff = $this->db->where($key, $value)->get('layanan')->num_rows();

                if ($resultlayanandiff >= 1) {
                    return str_replace("_", " ", $key) . " sudah ada";
                    break;
                }
            }


        }


        //proses update
        $queryUpdate = $this->db->where('id_layanan', $data['id_layanan'])->set($data)->update('layanan');


        if ($this->db->affected_rows() == 1) {
            return true;
        } else {



            return "gagal memproses data";
        }






        //cak 


    }

    function deleteLayanan($data)
    {
        $query = $this->db->where('id_layanan', $data["id_layanan"])->delete('layanan');

        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return "Gagal Memproses";
        }
    }

}


/* End of file Administrator_model.php and path \application\models\Administrator_model.php */
