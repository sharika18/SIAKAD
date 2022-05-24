<?php                                                         
  include dirname(__DIR__)."/../Values/ValueMasterSantri.php"; 
  include dirname(__DIR__)."/../Values/ListofValue.php"; 
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
            <h1>Master Santri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
              <li class="breadcrumb-item active">Master Santri</li>
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

            <!-- FORM DATA -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $_GET['act'] ?> Data</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <nav class="w-100">
                  <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="data-personal-tab" data-toggle="tab" href="#data-personal" role="tab" aria-controls="data-personal" aria-selected="true">Data Personal</a>
                    <a class="nav-item nav-link" id="data-kelas-asrama-tab" data-toggle="tab" href="#data-kelas-asrama" role="tab" aria-controls="data-kelas-asrama" aria-selected="false">Kelas & Asrama</a>
                  </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="data-personal" role="tabpanel" aria-labelledby="product-desc-tab">
                    <?php
                      include("FormPersonalSantri.php");
                    ?>
                  </div>
                  <div class="tab-pane fade" id="data-kelas-asrama" role="tabpanel" aria-labelledby="product-comments-tab">  
                    <?php
                      include("FormKelas&Asrama.php");
                    ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.FORM DATA -->

            <!-- FORM TABLE DATA -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Santri</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dgMasterSantri" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NIS</th>
                    <th>Nama Santri</th>
                    <th>Nama Wali</th>
                    <th>Kelas</th>
                    <th>Asrama</th>
                    <th>Act</th>
                  </tr>
                  </thead>
                  <tbody id="bodyDgMasterSantri">
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.DATA TABLE -->

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
    include dirname(__DIR__)."/../Common/AlertBoxSubmitSantri.php";
    //include dirname(__DIR__)."/../Script/ScriptMasterSantri.php";  
    
    include dirname(__DIR__)."/../Script/FormRegistrasiScript.php";
    include dirname(__DIR__)."/../Script/formRegisterValidationScript.php";
    include dirname(__DIR__)."/../Script/ScriptMasterSantri.php";
    $this->load->view('Common/Alert');
  ?>
</div>
<!-- ./wrapper -->
<?php 
  ?>
</body>
</html>




