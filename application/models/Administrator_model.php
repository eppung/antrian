<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator_model extends CI_Model
{


    public function insert($data)
    {

        do {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';

            for ($i = 0; $i < 4; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }

            // return $randomString;
        } while ($this->db->where('kode_loket', $randomString)->get('loket')->num_rows() > 0);



        $cek = $this->db->where('nama_loket', $data['nama_loket'])->get('loket')->num_rows();

        $data['kode_loket'] = $randomString;

        // cek loket yang sama
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
        $result = array();
        // $this->db->select('loket.kode_loket,  param_antrian.kode_layanan, param_antrian.aktif');
        $this->db->select('nama_loket,kode_loket,aktif');
        $this->db->where('loket.kode_loket', $data['loket']['kode_loket']);
        // $this->db->join('param_antrian', 'param_antrian.kode_loket =loket.kode_loket', 'left');
        // $this->db->join('layanan', 'param_antrian.kode_layanan = layanan.kode_layanan', 'left');
        $query = $this->db->get('loket')->row_array();
        $result['loket'] = $query;

        $this->db->select('kode_loket,kode_layanan');

        $this->db->where('kode_loket', $data['loket']['kode_loket']);

        if ($this->db->get('param_antrian')->num_rows() > 0) {
            $result['layanan'] = $this->db->get('param_antrian')->row_array();
        }

        $dataToArray = (array) $data;
    $loketData = array_diff_assoc($data['loket'],$result['loket']);
        if (isset($result['layanan'])) {
            $layananLoket = array_diff_assoc($result['layanan'], $dataToArray['layanan']);
            print_r($layananLoket);
        }
    
        
$this->db->where('kode_loket',$data['loket']['kode_loket']);
$this->db->update('loket',$loketData);
echo "<pre>";
print_r ($this->db->affected_rows());
echo "</pre>";




exit;


        // $query = $this->db->where('kode_loket', $data['kode_loket'])
        // ->update('loket', $update);

        // if ($this->db->affected_rows() >= 1) {
        //     return true;
        // } else {
        //     return "Gagal Memproses";
        // }
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

    function updateGambarLayanan()
    {
        if ($_FILES['iconLayanan']['error'] == 0) {

            //ambil nama data untuk tahu nama gambar
            $this->db->where('kode_layanan', $_POST['kode_layanan']);
            $oldImage = $this->db->get('layanan')->row();

            //uppload gambar
            $config['upload_path'] = "./assets/images/iconLayanan"; //path folder file upload
            $config['allowed_types'] = 'gif|jpg|png'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload

            $this->load->library('upload', $config); //call library upload 
            //cek jika file ada pada direktori
            if ($oldImage->image != null && file_exists("./assets/images/iconLayanan/" . $oldImage->image)) {
                //hapus file terpilih
                unlink("./assets/images/iconLayanan/" . $oldImage->image);
            }

            if ($this->upload->do_upload("iconLayanan")) { //upload file

                $dataImage = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

                $image = $dataImage['upload_data']['file_name']; //set file name ke variable image

                //update nama gambar
                $this->db->where('kode_layanan', $_POST['kode_layanan']);
                $this->db->set('image', $image);

                if ($this->db->update('layanan')) {
                    return true;
                } else {
                    return $this->db->error();
                }

            }

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

    }

    function deleteLayanan($data)
    {
        $this->db->where('id_layanan', $data["id_layanan"]);
        $query = $this->db->get('layanan')->row();

        if (file_exists("./assets/images/iconLayanan/" . $query->image)) {
            if (unlink("./assets/images/iconLayanan/" . $query->image)) {
                $this->db->where('id_layanan', $data["id_layanan"]);
                $this->db->delete('layanan');
            }

        } else {
            $this->db->where('id_layanan', $data["id_layanan"]);
            $this->db->delete('layanan');
        }


        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return "Gagal Memproses";
        }
    }

    function get_layanan_by_loket($data)
    {
        // $CI =& get_instance();
        //  $CI->load->model('Setting_model');
        //  $ClientIP= $CI->Setting_model->get_client_ip()();

        //  $this->db->where('ip_komputer', $ClientIP);
        //  $loket = $this->db->get('param_komputer')->row();


        $this->db->select(' layanan.kode_layanan,layanan.nama_layanan,param_antrian.aktif');

        $this->db->join('loket', 'loket.kode_loket = layanan.kode_loket', 'left');
        $this->db->join('param_antrian', 'param_antrian.kode_loket = loket.kode_loket AND loket.kode_loket = ' . '"' . $data['kode_loket'] . '"', 'left');
        return $this->db->get('layanan')->result();


    }



}


/* End of file Administrator_model.php and path \application\models\Administrator_model.php */
