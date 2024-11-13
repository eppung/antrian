<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Mike42\Escpos\PrintConnectors\DummyPrintConnector;
use Mike42\Escpos\Printer;
/**
 *
 * Controller Print_controller
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Print_controller extends CI_Controller
{

    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $connector = new DummyPrintConnector();
    $printer = new Printer($connector);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("Hello Eppung!\n\n");
    $printer -> setJustification(Printer::JUSTIFY_RIGHT);
    $printer -> text("Kanan\n");
    $printer -> setJustification(Printer::JUSTIFY_LEFT);
    $printer -> text("setandar\n");
    $printer -> cut();
    $data = $connector -> getData();
    $base64data=base64_encode($data);
    $printer -> close();
    
    
    echo ($base64data);
  }

}


/* End of file Print_controller.php */
/* Location: ./application/controllers/Print_controller.php */