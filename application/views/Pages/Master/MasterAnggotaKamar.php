<?php                                                         
      include dirname(__DIR__)."/../Values/ValueMasterAnggotaKamar.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  
		
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Anggota Kamar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
              <li class="breadcrumb-item active"><a href="Kamar?modul=masterKamar&asramaID=0">Master Kamar</a></li>
              <li class="breadcrumb-item active">Master Anggota Kamar</li>
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
            <div class="card card-primary" id="divFormData">
            
              <div class="card-header">
                <h3 class="card-title" id="formTitle"></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" id="formSubmit">
                <div class="card-body">
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Asrama</label>
                        <select class="custom-select" data-live-search="true" id="selectAsramaID" name="selectAsramaID" required> 
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama Kamar</label>
                          <select class="custom-select" id="selectKamarID" name="selectKamarID" required> 
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Anggota</label>
                        <select class="custom-select" id="selectNISAnggotaKamar" name="selectNISAnggotaKamar" required> 
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Status Anggota</label>
                          <select class="custom-select inputDeskripsi" id="selectStatusAnggota" name="selectStatusAnggota" required> 
                          </select>
                        </div>
                  </div>
                  </div>
                  <input type="hidden" class="form-control" id="inputID" name="inputID"/>
                </div>
              </form>
                <div class="card-footer">
                  <button type="button" class="btn btn-default" id="btnCancel">Cancel</button>
                  <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal" id="btnSubmit">
                      <?php 
                        $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan data berikut?";
                      ?>
                      Simpan
                  </button>
                </div>
            </div>

            <!-- FORM TABLE DATA -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Anggota Kamar</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dgMasterAnggotaKamar" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Asrama</th>
                    <th>Kamar</th>
                    <th>Nama Anggota</th>
                    <th>Status Anggota</th>
                    <th>Act</th>
                  </tr>
                  </thead>
                  <tbody id="bodyDgMasterAnggotaKamar">
                    
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

    include dirname(__DIR__)."/../Script/ScriptMasterAnggotaKamar.php";  
    include dirname(__DIR__)."/../Common/AlertBoxDeleteFromDatatable.php";
    include dirname(__DIR__)."/../Common/AlertBoxSubmitSantri.php";
    $this->load->view('Common/Alert');
  ?>
</div>
<!-- ./wrapper -->
</body>
</html>




