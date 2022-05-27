<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
include_once (dirname(__FILE__) . "/Email.php");

class Santri extends Email
{

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
   
    if($getValueByCode_get)
    {
      echo json_encode($getValueByCode_get['data']);
    }
    return $getValueByCode_get;
  }
  
  function getUserByEmail($email = '')
  {
    $data = array(
      'AR-KEY'  => $this->key,
      'email'   => $email
    );
    $getUserByEmail_get = json_decode($this -> curl -> simple_get ($this->API.'/User/getUserByEmail/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getUserByEmail_get)
    {
      echo json_encode($getUserByEmail_get['data']);
    }
    return $getUserByEmail_get;
  }

  function getAllVwSantriDetail()
  {
    $data = array(
      'AR-KEY'  => $this->key
    );
    $getAllVwSantriDetail_get = json_decode($this -> curl -> simple_get ($this->API.'/Santri/getAllVwSantriDetail/', $data, array(CURLOPT_BUFFERSIZE => 10)),true); 
   
    if($getAllVwSantriDetail_get)
    {
      echo json_encode($getAllVwSantriDetail_get['data']);
    }
    //echo json_encode($getAllVwSantriDetail_get['data']);
    return $getAllVwSantriDetail_get;
  }
  //CREATE ORANG TUA
  function createAyah()
  {
    $now = date('Y-m-d H:i:s');

    $data = [
			'NIK'                   => $this->input-> post('inputNIKAyah'),
      'NamaLengkap'           => $this->input-> post('inputNamaLengkapAyah'),
      'TempatLahir'           => $this->input-> post('inputTempatLahirAyah'),
      'TanggalLahir'          => $this->input-> post('dateTanggalLahirAyah'),
      'PendidikanTerakhir'    => $this->input-> post('selectPendidikanAyah'),
      'Pekerjaan'             => $this->input-> post('selectPekerjaanAyah'),
      'PenghasilanPerBulan'   => $this->input-> post('selectPenghasilanAyah'),
      'NomorHandphone'        => $this->input-> post('inputNomorHPAyah'),
      'Email'                 => "",
      'CreatedBy'             => $this->session->userdata('loggedIn')['userName'],
      'CreatedDate'           => $now,
      'ModifiedBy'            => $this->session->userdata('loggedIn')['userName'],
      'ModifiedDate'          => $now,
			'AR-KEY'        	      => $this->key,   
		];
    $insert = $this->curl->simple_post($this->API.'/Santri/createOrangTua/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    // if($insert)
    // {
    //     $this->session->set_flashdata('success',$this->successPost);
    // }else
    // {
    //     $this->session->set_flashdata('error',$this->errorPost);
    // }
    //print_r($data);
    //$this->load->view('media', $data);
  }

  function createIbu()
  {
    $now = date('Y-m-d H:i:s');

    $data = [
			'NIK'                   => $this->input-> post('inputNIKIbu'),
      'NamaLengkap'           => $this->input-> post('inputNamaLengkapIbu'),
      'TempatLahir'           => $this->input-> post('inputTempatLahirIbu'),
      'TanggalLahir'          => $this->input-> post('dateTanggalLahirIbu'),
      'PendidikanTerakhir'    => $this->input-> post('selectPendidikanIbu'),
      'Pekerjaan'             => $this->input-> post('selectPekerjaanIbu'),
      'PenghasilanPerBulan'   => $this->input-> post('selectPenghasilanIbu'),
      'NomorHandphone'        => $this->input-> post('inputNomorHPIbu'),
      'Email'                 => "",
      'CreatedBy'             => $this->session->userdata('loggedIn')['userName'],
      'CreatedDate'           => $now,
      'ModifiedBy'            => $this->session->userdata('loggedIn')['userName'],
      'ModifiedDate'          => $now,
			'AR-KEY'        	      => $this->key,   
		];
    $insert = $this->curl->simple_post($this->API.'/Santri/createOrangTua/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    // if($insert)
    // {
    //     $this->session->set_flashdata('success',$this->successPost);
    // }else
    // {
    //     $this->session->set_flashdata('error',$this->errorPost);
    // }
    //print_r($data);
    //$this->load->view('media', $data);
  }

  function createWali()
  {
    $now = date('Y-m-d H:i:s');

    $data = [
			'NIK'                   => $this->input-> post('inputNIKWali'),
      'NamaLengkap'           => $this->input-> post('inputNamaLengkapWali'),
      'TempatLahir'           => $this->input-> post('inputTempatLahirWali'),
      'TanggalLahir'          => $this->input-> post('dateTanggalLahirWali'),
      'PendidikanTerakhir'    => $this->input-> post('selectPendidikanWali'),
      'Pekerjaan'             => $this->input-> post('selectPekerjaanWali'),
      'PenghasilanPerBulan'   => $this->input-> post('selectPenghasilanWali'),
      'NomorHandphone'        => $this->input-> post('inputNomorHPWali'),
      'Alamat'                => $this ->input-> post('inputAlamatWali'),
      'Email'                 => $this->input-> post('emailEmailWali'),
      'CreatedBy'             => $this->session->userdata('loggedIn')['userName'],
      'CreatedDate'           => $now,
      'ModifiedBy'            => $this->session->userdata('loggedIn')['userName'],
      'ModifiedDate'          => $now,
			'AR-KEY'        	      => $this->key,   
		];
    $insert = $this->curl->simple_post($this->API.'/Santri/createOrangTua/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
  }
  //UPDATE ORANG TUA
  function updateAyah()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
      'NIK'                   => $this->input-> post('inputNIKAyah'),
      'NamaLengkap'           => $this->input-> post('inputNamaLengkapAyah'),
      'TempatLahir'           => $this->input-> post('inputTempatLahirAyah'),
      'TanggalLahir'          => $this->input-> post('dateTanggalLahirAyah'),
      'PendidikanTerakhir'    => $this->input-> post('selectPendidikanAyah'),
      'Pekerjaan'             => $this->input-> post('selectPekerjaanAyah'),
      'PenghasilanPerBulan'   => $this->input-> post('selectPenghasilanAyah'),
      'NomorHandphone'        => $this->input-> post('inputNomorHPAyah'),
      'ModifiedBy'            => $this->session->userdata('loggedIn')['userName'],
      'ModifiedDate'          => $now,
			'AR-KEY'        	      => $this->key,
    );
    $update = $this->curl->simple_put($this->API.'/Santri/updateOrangTua/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
  }

  function updateIbu()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
      'NIK'                   => $this->input-> post('inputNIKIbu'),
      'NamaLengkap'           => $this->input-> post('inputNamaLengkapIbu'),
      'TempatLahir'           => $this->input-> post('inputTempatLahirIbu'),
      'TanggalLahir'          => $this->input-> post('dateTanggalLahirIbu'),
      'PendidikanTerakhir'    => $this->input-> post('selectPendidikanIbu'),
      'Pekerjaan'             => $this->input-> post('selectPekerjaanIbu'),
      'PenghasilanPerBulan'   => $this->input-> post('selectPenghasilanIbu'),
      'NomorHandphone'        => $this->input-> post('inputNomorHPIbu'),
      'ModifiedBy'            => $this->session->userdata('loggedIn')['userName'],
      'ModifiedDate'          => $now,
			'AR-KEY'        	      => $this->key,
    );
    $update = $this->curl->simple_put($this->API.'/Santri/updateOrangTua/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
  }

  function updateWali()
  {
    $now = date('Y-m-d H:i:s');
    $data = array(
      'NIK'                   => $this->input-> post('inputNIKWali'),
      'NamaLengkap'           => $this->input-> post('inputNamaLengkapWali'),
      'TempatLahir'           => $this->input-> post('inputTempatLahirWali'),
      'TanggalLahir'          => $this->input-> post('dateTanggalLahirWali'),
      'PendidikanTerakhir'    => $this->input-> post('selectPendidikanWali'),
      'Pekerjaan'             => $this->input-> post('selectPekerjaanWali'),
      'PenghasilanPerBulan'   => $this->input-> post('selectPenghasilanWali'),
      'NomorHandphone'        => $this->input-> post('inputNomorHPWali'),
      'Alamat'                => $this ->input-> post('inputAlamatWali'),
      'Email'                 => $this->input-> post('emailEmailWali'),
      'ModifiedBy'            => $this->session->userdata('loggedIn')['userName'],
      'ModifiedDate'          => $now,
			'AR-KEY'        	      => $this->key,
    );
    $update = $this->curl->simple_put($this->API.'/Santri/updateOrangTua/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    // if($update)
    // {
    //     $this->session->set_flashdata('success',$this->successPut);
    // }else
    // {
    //     $this->session->set_flashdata('error',$this->errorPut);
    // }
    //redirect('Karyawan?modul=masterKaryawan&act=Tambah');
  }
  function createSantri()
  {
    $now = date('Y-m-d H:i:s');

    $data = [
			'NIS' 		          => $this->input-> post('inputNIS'),
      'NamaLengkap' 		  => $this->input-> post('inputNamaLengkapSantri'),
			'NamaPanggilan' 	  => $this->input-> post('inputNamaPanggilan'),
			'TempatLahir' 		  => $this->input-> post('inputTempatLahirSantri'),
			'TanggalLahir' 		  => $this->input-> post('dateTanggalLahirSantri'),
			'NIK' 			  	    => $this->input-> post('inputNIKSantri'),
			'JenisKelamin' 		  => $this->input-> post('radioJenisKelaminSantri'),
	    'AnakKe' 			      => $this->input-> post('inputAnakKe'),
			'DariBerapaSaudara' => $this->input-> post('inputDariBerapaSaudara'),
			'TinggiBadan' 		  => $this->input-> post('inputTinggiBadan'),
			'BeratBadan' 		    => $this->input-> post('inputBeratBadan'),
			'AlamatSantri' 		  => $this->input-> post('inputAlamatSantri'),
			'AsalSekolah' 		  => $this->input-> post('inputAsalSekolah'),
			'UkuranBaju' 		    => $this->input-> post('selectUkuranBaju'),
			'UkuranCelana' 		  => $this->input-> post('selectUkuranCelana'),
			'UkuranJilbab' 		  => $this->input-> post('selectUkuranJilbab'),
			'NIKAyah'           => $this ->input-> post('inputNIKAyah'),
      'NIKIBU'            => $this ->input-> post('inputNIKIbu'),
      'NIKWali'           => $this ->input-> post('inputNIKWali'),
      'KuotaIzin'         => 80,
      'CreatedBy'         => $this->session->userdata('loggedIn')['userName'],
      'CreatedDate'       => $now,
      'ModifiedBy'        => $this->session->userdata('loggedIn')['userName'],
      'ModifiedDate'      => $now,
			'AR-KEY'        	  => $this->key,
		];
    $insert = $this->curl->simple_post($this->API.'/Santri/createSantri/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    // if($insert)
    // {
    //     $this->session->set_flashdata('success',$this->successPost);
       
    // }else
    // {
    //     $this->session->set_flashdata('error',$this->errorPost);
    // }
    echo($insert);
    //print_r($data);
    //$this->load->view('media', $data);
  }

  function createUser()
  {
    $now = date('Y-m-d H:i:s');

    $data = [
			'userName'          => $this->input-> post ('inputNamaLengkapWali'),
      'email'             => $this->input-> post ('emailEmailWali'),
      'password'          => $this->input-> post ('dateTanggalLahirWali'),
      'NIK'               =>  $this->input-> post ('inputNIKWali'),
      'Role'              => 'Wali',
      'CreatedBy'         => $this->session->userdata('loggedIn')['userName'],
      'CreatedDate'       => $now,
      'ModifiedBy'        => $this->session->userdata('loggedIn')['userName'],
      'ModifiedDate'      => $now,
			'AR-KEY'        	  => $this->key,
		];
    $insert = $this->curl->simple_post($this->API.'/User/createUser/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    if($insert)
    {
      $subject = "SIAKAD Application";
      $message = 
      "
      Assalamualaikum wr. Wb 
      <br>Dear<b> " 
      .$this -> input->post ('inputNamaLengkapWali')
      ."</b>, <br><br>Berikut ini Username & Password untuk masuk ke dalam aplikasi SIAKAD
      <br><br>
      Username :".$this ->input-> post ('emailEmailWali')."
      <br>
      Password :".$this ->input-> post ('dateTanggalLahirWali')."
      Demikian disampaikan dan terima kasih.";

      $this->sendMail($this ->input-> post ('emailEmailWali'), "", $subject, $message);
       
    }

    echo($insert);
  }

  function TambahSantri()
  {
    $nikAyah = $this->input-> post('inputNIKAyah');
    $nikIbu = $this->input-> post('inputNIKIbu');
    $nikWali = $this->input-> post('inputNIKWali');

    $dataAyah = $this->getOrangTuaByNIK($nikAyah);
    if(empty($dataAyah))
    {
      echo "Ayah NULL";
      $this->createAyah();
    }

    $dataIbu = $this->getOrangTuaByNIK($nikIbu);
    if(empty($dataIbu))
    {
      echo "Ibu NULL";
      $this->createIbu();
    }

    $dataWali = $this->getOrangTuaByNIK($nikWali);
    if(empty($dataWali))
    {
      echo "Wali NULL";
      $this->createWali();
    }else{
      $this->updateWali();
    }

    
    $email = $this -> input->post ('emailEmailWali');
    if(empty($this->getUserByEmail($email)))
    {
      echo "Email NULL";
      $this->createUser();
    }

    $this->createSantri();
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