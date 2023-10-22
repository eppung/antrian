<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Antrian_model
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

class Antrian_model extends CI_Model {

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

  function getLayanan() {
    return $this->db->get('layanan')->result();
    
  }

  // ------------------------------------------------------------------------

}

/* End of file Antrian_model.php */
/* Location: ./application/models/Antrian_model.php */