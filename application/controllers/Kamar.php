<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Kamar extends CI_Controller{

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
  
  function getAllVwKamarDetailByAsramaID($AsramaID = '')
  {
    $data = array(
      'AR-KEY'  => $this->key,
      'AsramaID'   => $AsramaID
    );
    $getAllVwKamarDetailByAsramaID_get = json_decode($this -> curl -> simple_get ($this->API.'/KelasAsrama/getAllVwKamarDetailByAsramaID/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getAllVwKamarDetailByAsramaID_get)
    {
      echo json_encode($getAllVwKamarDetailByAsramaID_get['data']);
    }
    return $getAllVwKamarDetailByAsramaID_get;
  }

  function index()
  {
    $this->load->view('media');
  }

  function TambahKamar()
  { 
    $now = date('Y-m-d H:i:s');
    $data = [
        'AsramaID'                  => $this->input-> post ('selectAsramaID'),
        'NamaKamar'                 => $this->input-> post ('inputNamaKamar'),
        'CreatedBy'                 => $this->session->userdata('loggedIn')['userName'], //$this->input-> post ('CreatedBy'),
        'CreatedDate'               => $now,
        'ModifiedBy'                => $this->session->userdata('loggedIn')['userName'], //belum diset
        'ModifiedDate'              => $now,
        'AR-KEY'                    => $this->key,
    ];
    $CRUD = $this->curl->simple_post($this->API.'/KelasAsrama/createKamar/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    $status = 'gagal';

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function EditKamar()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
      'KamarID'         => $this->input-> post ('inputID'),
      'AsramaID'        => $this->input-> post ('selectAsramaID'),
      'NamaKamar'       => $this->input-> post ('inputNamaKamar'),
      'ModifiedBy'      => $this->session->userdata('loggedIn')['userName'], //belum diset
      'ModifiedDate'    => $now,
      'AR-KEY'          => $this->key,
    );
    
    $CRUD = $this->curl->simple_put($this->API.'/KelasAsrama/updateKamar/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    
    $status = 'gagal';

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }
}
