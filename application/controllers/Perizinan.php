<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Perizinan extends CI_Controller{

  public $success = "Data Berhasil";
  public $error = "Data Gagal";
  public function __construct()
  {
    include "construct.php";
    if(!$this->session->userdata('loggedIn'))
    {
      redirect('Welcome'); 
    }
  }
  
  function getValueByCode($code = '')
  {
    $data = array(
      'AR-KEY'  => $this->key,
      'code'   => $code
    );
    $getValueByCode_get = json_decode($this -> curl -> simple_get ($this->API.'/Dimension/getValueByCode/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    $data = $this->getData();
    $data['lov'] = $getValueByCode_get['data'];
    echo json_encode($getValueByCode_get['data']);
    //print_r($data);
    //$this->load->view('media', $data);
  }

  function getData()
  {
    $data = null;

    return $data;
  }

  function index()
  {
    $data = $this->getData();
    //print_r($data);
    $this->load->view('media', $data);
  }
}
