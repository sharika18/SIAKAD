<?php
    $idDataTable ="#dgMasterKamar";
    $deleteAlertMessage = "Apakah kamu yakin ingin menghapus kamar berikut:";
    
    $asramaID = "0";
    IF($_GET['asramaID'])
    {
        $asramaID = $_GET['asramaID'];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- CONTENT HEADER -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Master Kamar</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?modul=home">Home</a></li>
                    <li class="breadcrumb-item active"><a href="Asrama?modul=masterAsrama">Master Asrama</a></li>
                    <li class="breadcrumb-item active">Master Kamar</li>
                  </ol>
                  
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
        <!-- CONTENT HEADER -->

        <!-- MAIN CONTENT -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">

                  <!-- FORM DATA -->
                    <div class="card card-primary" id="divForm">
                    
                      <div class="card-header">
                        <h3 class="card-title" id="formTitle"></h3>
                      </div>
                      <!-- form start -->
                      <form method="post" id="formSubmit">
                          <div class="card-body">
                            <div class="row">  
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Asrama</label>
                                  <select class="custom-select" id="selectAsramaID" name="selectAsramaID" required> 
                                    
                                    
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                  <label>Nama Kamar</label>
                                  <input type="text" id="inputNamaKamar" name="inputNamaKamar" required
                                      class="form-control inputDeskripsi" placeholder="Nama Asrama" pattern="[^']+">
                                  </div>
                              </div>
                            </div>
                            <input type="hidden" class="form-control" id="inputID" name="inputID"/>
                          </div>
                        </form>
                        <div class="card-footer">
                          <button type="button" class="btn btn-default" id="btnCancel">Cancel</button>
                          <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal">
                              <?php 
                                $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan data karyawan berikut?";
                              ?>
                              Simpan
                          </button>
                        </div>
                    </div>
                  <!-- FORM DATA -->

                  <!-- TABLE DATA -->
                    <div class="card" id="divTable">
                      <div class="card-header">
                        <h3 class="card-title">Data Karyawan</h3>
                      </div>
                      
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="dgMasterKamar" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Asrama</th>
                              <th>AsramaID</th>
                              <th>Kamar</th>
                              <th>Jumlah Anggota</th>
                              <th>Act</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  <!-- TABLE DATA -->

                </div>
                <!-- MAIN COLUMN -->
              </div>
              <!-- MAIN ROW -->
            </div>
          </section>
        <!-- MAIN CONTENT -->
      <?php 
        include dirname(__DIR__)."/../Script/ScriptMasterKamar.php";  
        include dirname(__DIR__)."/../Common/AlertBoxDeleteFromDatatable.php";
        include dirname(__DIR__)."/../Common/AlertBoxSubmitSantri.php";
      ?>
    </div>
    <!-- ./wrapper -->
  </body>
</html>




