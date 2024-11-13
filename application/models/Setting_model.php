<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Setting_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Setting_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  function get_param_komputer()
  {
    $ipaddr = $this->get_client_ip();
    // $this->db->select('ip_komputer ,loket.kode_loket as id,,ip_server_antrian,websocket,ip_display,nama_loket as text,');

    $this->db->where('ip_komputer', $ipaddr);
    $this->db->join('loket', 'loket.kode_loket = param_komputer.kode_loket', 'left');

    $query = $this->db->get('param_komputer');
    if ($query->num_rows() > 0) {

      return $query->row();
    } else {
      return array('code' => 404);
    }

  }

  function getLoket($term)
  {
    $this->db->select('id_loket, nama_loket as full_name, kode_loket');
    $this->db->like('nama_loket', $term);
    // $this->db->or_like('kode_loket',$term); 
    return $this->db->get('loket')->result_array();

  }

  function update_loket($data)
  {
    //cek datanya
    $ipaddr = $this->get_client_ip();
    $this->db->where('ip_komputer', $ipaddr);
    $query = $this->db->get('param_komputer');
    //cari loket
    $this->db->where('kode_loket', $data['select_loket']);
    $loket = $this->db->get('param_komputer');
    if ($loket->num_rows() > 0) {
      return "loket sudah ada";
    } else if ($query->num_rows() > 0) {
      $dataupdate = array(
        'kode_loket' => $data['select_loket'],
        'ip_server_antrian' => $data['input_server_antrian'],
        'websocket' => $data['input_ip_websocket'],
        'ip_display' => $data['input_ip_display']
      );

      $this->db->where('ip_komputer', $ipaddr);
      $this->db->update('param_komputer', $dataupdate);
      if ($this->db->affected_rows() > 0) {
        return true;
      } else {
        return false;
      }

    } else {
      $datainsert = array(
        'ip_komputer' => $ipaddr,
        'kode_loket' => $data['select_loket'],
        'ip_server_antrian' => $data['input_server_antrian'],
        'websocket' => $data['input_ip_websocket'],
        'ip_display' => $data['input_ip_display']
      );

      if ($this->db->insert('param_komputer', $datainsert)) {
        return true;
      } else {
        return false;
      }
    }



  }

  function get_client_ip()
  {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
      $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
      $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
      $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
      $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
      $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
      $ipaddress = getenv('REMOTE_ADDR');
    else
      $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }

  // ------------------------------------------------------------------------

}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */