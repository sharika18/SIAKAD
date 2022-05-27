<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Asrama extends CI_Controller{

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
  
  function getAllAsrama()
  {
    $data = array(
      'AR-KEY'  => $this->key
    );
    $getAllAsrama_get = json_decode($this -> curl -> simple_get ($this->API.'/KelasAsrama/getAllAsrama/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getAllAsrama_get)
    {
      echo json_encode($getAllAsrama_get['data']);
    }
    //echo json_encode($getAllVwSantriDetail_get['data']);
    return $getAllAsrama_get;
  }

  function getAllVwKamarDetail()
  {
    $data = array(
      'AR-KEY'  => $this->key
    );
    $getAllVwKamarDetail_get = json_decode($this -> curl -> simple_get ($this->API.'/KelasAsrama/getAllVwKamarDetail/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getAllVwKamarDetail_get)
    {
      echo json_encode($getAllVwKamarDetail_get['data']);
    }
    //echo json_encode($getAllVwSantriDetail_get['data']);
    return $getAllVwKamarDetail_get;
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

  function TambahAsrama()
  { 
    $now = date('Y-m-d H:i:s');
    $data = [
        'NamaAsrama'                => $this->input-> post ('inputNamaAsrama'),
        'NIPPenanggungJawabAsrama'  => $this->input-> post ('selectNIPPenanggungJawab'),
        'CreatedBy'                 => $this->session->userdata('loggedIn')['userName'], //$this->input-> post ('CreatedBy'),
        'CreatedDate'               => $now,
        'ModifiedBy'                => $this->session->userdata('loggedIn')['userName'], //belum diset
        'ModifiedDate'              => $now,
        'AR-KEY'                    => $this->key,
    ];
    $CRUD = $this->curl->simple_post($this->API.'/KelasAsrama/createAsrama/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    $status = 'gagal';

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function EditAsrama()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
      'AsramaID'                  => $this->input-> post ('inputIDD'),
      'NamaAsrama'                => $this->input-> post ('inputNamaAsrama'),
      'NIPPenanggungJawabAsrama'  => $this->input-> post ('selectNIPPenanggungJawab'),
      'ModifiedBy'                => $this->session->userdata('loggedIn')['userName'], //belum diset
      'ModifiedDate'              => $now,
      'AR-KEY'                    => $this->key,
    );
    
    $CRUD = $this->curl->simple_put($this->API.'/KelasAsrama/updateAsrama/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    
    $status = 'gagal';

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }
}
