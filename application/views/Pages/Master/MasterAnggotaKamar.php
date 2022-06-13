<?php
    $idDataTable ="#dgMasterAnggotaKamar";
    $deleteAlertMessage = "Apakah kamu yakin ingin menghapus santri berikut dari anggota asrama :";
    $kamarID = "0";
    if($_GET['kamarID'])
    {
        $kamarID = $_GET['kamarID'];
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
                  <h1>Master Anggota Kamar</h1>
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
                                <select class="custom-select inputDeskripsi" id="selectNISAnggotaKamar" name="selectNISAnggotaKamar" required> 
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
                          <button type="submit" class="btnSubmit btn btn-primary float-right" data-toggle="modal">
                              <?php 
                                $alertBoxSubmitMessage = "Apakah kamu yakin ingin menyimpan data anggota kamar berikut?";
                              ?>
                              Simpan
                          </button>
                        </div>
                    </div>
                  <!-- FORM DATA -->

                  <!-- TABLE DATA -->
                    <div class="card" id="divTable">
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
                  <!-- TABLE DATA -->

                </div>
                <!-- MAIN COLUMN -->
              </div>
              <!-- MAIN ROW -->
            </div>
          </section>
        <!-- MAIN CONTENT -->
      <?php 
        include dirname(__DIR__)."/../Script/ScriptMasterAnggotaKamar.php";  
        include dirname(__DIR__)."/../Common/AlertBoxDeleteFromDatatable.php";
        include dirname(__DIR__)."/../Common/AlertBoxSubmitSantri.php";
      ?>
    </div>
  </body>
</html>




