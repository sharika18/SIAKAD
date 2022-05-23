<?php                                                         
      include dirname(__DIR__)."/../Values/ValueActivityPerizinan.php"; 
      include dirname(__DIR__)."/../Values/ListofValue.php"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  
	<style>
    .alnright { text-align: right; }
    .alncenter { text-align: center; vertical-align: top; }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perizinan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
              <li class="breadcrumb-item active">Perizinan</li>
            </ol>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- FORM TAMBAH DATA -->
            <div class="card card-primary">
            
              <div class="card-header">
                <h3 class="card-title"><?php echo $_GET['act'] ?> Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url()?>Karyawan/<?php echo $act?>" method="post" id="formSubmit">
                <div class="card-body">
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nomor Induk Santri</label>
                        <select class="custom-select" id="selectNIS" name="selectNIS" required> 
                          <option value="0">-- Pilih NIS --</option>
                          <?php
                            if($pendidikanIsNotNull)
                            {
                              for ($i=0; $i< count($pendidikan); $i++)
                              {
                                $selected = "";
                                if($pendidikanID == $pendidikan[$i]['pendidikanID'])
                                {
                                  $selected = 'selected = "selected"';
                                }
                                echo '
                                
                                <option value="'.$pendidikan[$i]['pendidikanID']. '"' .$selected. '>' .$pendidikan[$i]['Pendidikan']. '</option>
                                ';
                              } 
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Mulai Izin</label>
                          <div class="datepicker input-group date" data-target-input="nearest" id="divDateTMT">
                              <input type="text" class="form-control datetimepicker-input" data-target="#dateTanggalMulai" id="dateTanggalMulai" name="dateTanggalMulai" required/>
                              <div class="input-group-append" data-target="#dateTanggalMulai" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Akhir Izin</label>
                          <div class="datepicker input-group date" data-target-input="nearest" id="divDateTMT">
                              <input type="text" class="form-control datetimepicker-input" data-target="#dateTanggalAkhir" id="dateTanggalAkhir" name="dateTanggalAkhir" required/>
                              <div class="input-group-append" data-target="#dateTanggalAkhir" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </div>  
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jenis Izin</label>
                        <select class="custom-select" id="selectJenis" name="selectJenis" required> 
                          <option value="0">-- Pilih Jenis Izin --</option>
                          <option value="Y">Izin Tidak Sekolah</option>
                          <option value="N">Izin Keluar Pondok</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Status Izin</label>
                          <select class="custom-select" id="selectStatus" name="selectStatus" required> 
                            <option value="0">-- Pilih Status --</option>
                            <option value="Sedang Izin">Sedang Izin</option>
                            <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                            <option value="Sudah Pulang">Sudah Pulang</option>
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alasan Izin</label>
                        <select class="custom-select" id="selectAlasanIzin" name="selectAlasanIzin" required> 
                          <option value="0">-- Pilih Izin --</option>
                          <?php
                            if($pendidikanIsNotNull)
                            {
                              for ($i=0; $i< count($pendidikan); $i++)
                              {
                                $selected = "";
                                if($pendidikanID == $pendidikan[$i]['pendidikanID'])
                                {
                                  $selected = 'selected = "selected"';
                                }
                                echo '
                                
                                <option value="'.$pendidikan[$i]['pendidikanID']. '"' .$selected. '>' .$pendidikan[$i]['Pendidikan']. '</option>
                                ';
                              } 
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea rows="3" id="inputKeterangan" name="inputKeterangan" required
                              class="form-control">
                            </textarea>
                        </div>
                    </div>
                  </div>
                  <!-- <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$Id?>"/>
                  <input type="hidden" class="form-control" id="txtID" name="CreatedBy" value="<?=$CreatedBy?>"/>
                  <input type="hidden" class="form-control" id="txtID" name="CreatedDate" value="<?=$CreatedDate?>"/> -->
                  <p class="error"><?php echo $this->session->flashdata('GagalDeleteBiaya');?></p>
                  
                </div>
                <!-- /.card-body -->

              </form>
                <div class="card-footer">
                  <a href="<?php echo base_url()?>Karyawan?modul=masterKaryawan&act=Tambah" 
                    class="btn btn-default">Cancel</a>
                  <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal">
                      <?php 
                      $alertBoxSubmitMessage = "Apakah kamu yakin ingin menambahkan data berikut?";
                      echo $_GET['act'] 
                      ?>
                  </button>
                </div>
            </div>

            <!-- FORM TABLE DATA -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Perizinan Santri Tahun <b> <?=date('Y');?> </b></h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dgMasterKaryawan" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th rowspan = 2>ID</th>
                    <th class="all alncenter" rowspan = 2>NIS - Nama Lengkap</th>
                    <th class="all alncenter" colspan = 3>Data Izin</th>
                    <th class="all alncenter" rowspan = 2>Act</th>
                  </tr>
                  <tr>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <?php 
    include dirname(__DIR__)."/../Common/AlertBoxDelete.php";
    include dirname(__DIR__)."/../Common/AlertBoxSubmit.php";
    include dirname(__DIR__)."/../Script/ScriptActivityPerizinan.php";  
    $this->load->view('Common/Alert');
  ?>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
    $(document).ready(function(){
        show_product(); //call function show all product
         
        $('#mydata').dataTable();
          
        //function show all product
        function show_product(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('Perizinan/getValueByCode/ukuranBajuCelana')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].value+'">'+data[i].value+'</option>';
                    }
                    $('#selectAlasanIzin').html(html);
                }
 
            });
          // alert("a");
          // var html = '';
          // html += '<option value="0">koko</option>';
          //           $('#selectAlasanIzin').append(html);
        }
    });
 
</script>
</body>
</html>




