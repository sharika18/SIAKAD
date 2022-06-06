<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class AnggotaKamar extends CI_Controller{

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

  function getNotAnggotaKamar()
  {
    $data = array(
      'AR-KEY'  => $this->key
    );
    $getNotAnggotaKamar_get = json_decode($this -> curl -> simple_get ($this->API.'/Santri/getNotAnggotaKamar/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getNotAnggotaKamar_get)
    {
      echo json_encode($getNotAnggotaKamar_get['data']);
    }
    //echo json_encode($getAllVwSantriDetail_get['data']);
    return $getNotAnggotaKamar_get;
  }

  function getDistinctAnggota()
  {
    $data = array(
      'AR-KEY'  => $this->key
    );
    $getDistinctAnggota_get = json_decode($this -> curl -> simple_get ($this->API.'/KelasAsrama/getDistinctAnggota/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getDistinctAnggota_get)
    {
      echo json_encode($getDistinctAnggota_get['data']);
    }
    //echo json_encode($getAllVwSantriDetail_get['data']);
    return $getDistinctAnggota_get;
  }

  function getDistinctAnggotaByKamarID($KamarID = '')
  {
    $data = array(
      'AR-KEY'  => $this->key,
      'KamarID'   => $KamarID
    );
    $getDistinctAnggotaByKamarID_get = json_decode($this -> curl -> simple_get ($this->API.'/KelasAsrama/getDistinctAnggotaByKamarID/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getDistinctAnggotaByKamarID_get)
    {
      echo json_encode($getDistinctAnggotaByKamarID_get['data']);
    }
    //echo json_encode($getAllVwSantriDetail_get['data']);
    return $getDistinctAnggotaByKamarID_get;
  }

  function index()
  {
    $this->load->view('media');
  }

  function TambahAnggotaKamar()
  { 
    $now = date('Y-m-d H:i:s');
    $data = [
        'KamarID'                   => $this->input-> post ('selectKamarID'),
        'NISAnggotaKamar'           => $this->input-> post ('selectNISAnggotaKamar'),
        'StatusAnggota'             => $this->input-> post ('selectStatusAnggota'),
        'CreatedBy'                 => $this->session->userdata('loggedIn')['userName'], //$this->input-> post ('CreatedBy'),
        'CreatedDate'               => $now,
        'ModifiedBy'                => $this->session->userdata('loggedIn')['userName'], //belum diset
        'ModifiedDate'              => $now,
        'AR-KEY'                    => $this->key,
    ];
    $CRUD = $this->curl->simple_post($this->API.'/KelasAsrama/createAnggotaKamar/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    $status = 'gagal';

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function EditAnggotaKamar()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
      'KamarID'         => $this->input-> post ('selectKamarID'),
      'NISAnggotaKamar' => $this->input-> post ('selectNISAnggotaKamar'),
      'StatusAnggota'   => $this->input-> post ('selectStatusAnggota'),
      'ModifiedBy'      => $this->session->userdata('loggedIn')['userName'], //belum diset
      'ModifiedDate'    => $now,
      'AR-KEY'          => $this->key,
    );
    
    $CRUD = $this->curl->simple_put($this->API.'/KelasAsrama/updateAnggotaKamar/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    
    $status = 'gagal';

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }

  function HapusAnggotaKamar($AnggotaKamarID)
  {
    $data = array(
      'AR-KEY'          => $this->key,
      'AnggotaKamarID'  => $AnggotaKamarID
    );
    $CRUD =  $this->curl->simple_delete       
    ($this->API.'/KelasAsrama/deleteAnggotaKamar/', array('AR-KEY'=>$this->key, 'id'=>$AnggotaKamarID));
      
    $status = 'gagal';

    if($CRUD)
    {
      $status = 'sukses';
    }
    echo($status);
  }
}
