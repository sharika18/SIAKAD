<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Santri extends CI_Controller{

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

  function getOrangTuaByNIK($NIK = '')
  {
    $data = array(
      'AR-KEY'  => $this->key,
      'NIK'   => $NIK
    );
    $getValueByCode_get = json_decode($this -> curl -> simple_get ($this->API.'/Santri/getOrangTuaByNIK/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    //$data = $this->getData();
    //$data['lov'] = $getValueByCode_get['data'];
    echo json_encode($getValueByCode_get['data']);
    //print_r($data);
    //$this->load->view('media', $data);
  }

  function getData()
  {
    // $data['VwKaryawanDetail'] = $this->getVwKaryawanDetail();

    // $data['jabatanTugas']     = $this->getAllJabatanTugas();
    // $data['statusKaryawan']   = $this->getAllStatusKaryawan();
    // $data['unit']             = $this->getAllUnit();
    // $data['pendidikan']       = $this->getAllPendidikan();
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
