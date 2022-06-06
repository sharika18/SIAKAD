<?php                                                         
      include dirname(__DIR__)."/../Values/ValueMasterAsrama.php"; 
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
            <h1>Master Asrama</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
              <li class="breadcrumb-item active">Master Asrama</li>
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
              <form action="<?php echo base_url()?>Karyawan" method="post" id="formSubmit">
                <div class="card-body">
                  <div class="row">  
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Nama Asrama</label>
                        <input type="text" id="inputNamaAsrama" name="inputNamaAsrama" required
                            class="form-control inputDeskripsi" placeholder="Nama Asrama" pattern="[^']+">
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Penanggung Jawab</label>
                        <select class="custom-select" id="selectNIPPenanggungJawab" name="selectNIPPenanggungJawab" required> 
                          
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" class="form-control" id="inputID" name="inputID"/>
                  <!--<input type="hidden" class="form-control" id="txtID" name="CreatedBy" value="<?=$CreatedBy?>"/>
                  <input type="hidden" class="form-control" id="txtID" name="CreatedDate" value="<?=$CreatedDate?>"/> -->
                  <p class="error"><?php echo $this->session->flashdata('GagalDeleteBiaya');?></p>
                  
                </div>
                <!-- /.card-body -->

              </form>
                <div class="card-footer">
                  <button type="button" class="btn btn-default" id="btnCancel">Cancel</button>
                  <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal" id="btnSubmit">
                      <?php 
                        $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan asrama berikut?";
                      ?>
                      Simpan
                  </button>
                </div>
            </div>

            <!-- FORM TABLE DATA -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Asrama</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dgMasterAsrama" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Asrama</th>
                    <th>Penanggung Jawab</th>
                    <th>Act</th>
                  </tr>
                  </thead>
                  <tbody id="bodyDgMasterAsrama">
                    
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


    //include dirname(__DIR__)."/../Common/AlertBoxDeleteFromDatatable.php";
    include dirname(__DIR__)."/../Common/AlertBoxSubmitSantri.php";
    include dirname(__DIR__)."/../Script/ScriptMasterAsrama.php";  
    $this->load->view('Common/Alert');
  ?>
  
</div>
<!-- ./wrapper -->
</body>
</html>




