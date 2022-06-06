<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dimension extends CI_Controller{
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
   
    if($getValueByCode_get)
    {
      echo json_encode($getValueByCode_get['data']);
    }
    //echo json_encode($getAllVwSantriDetail_get['data']);
    return $getValueByCode_get;
  }

}
