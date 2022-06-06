<?php
    $idDataTable ="#dgMasterAsrama";
    $deleteAlertMessage = "Apakah kamu yakin ingin menghapus asrama berikut:";
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

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form action="" method="post" id="formSubmit">
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
                                <select class="custom-select" id="selectNIPPenanggungJawab" name="selectNIPPenanggungJawab" required></select>
                              </div>
                            </div>
                          </div>
                          <input type="hidden" class="form-control" id="inputID" name="inputID"/>
                         
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
                  <!-- FORM DATA -->

                  <!-- TABLE DATA -->
                    <div class="card" id ="divTable">
                      <div class="card-header">
                        <h3 class="card-title">Data Asrama</h3>
                      </div>
                      
                      <div class="card-body">
                        <table id="dgMasterAsrama" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Asrama</th>
                            <th>Penanggung Jawab</th>
                            <th>NIP Penanggung Jawab</th>
                            <th>Act</th>
                          </tr>
                          </thead>
                        </table>
                      </div>
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
        include dirname(__DIR__)."/../Common/AlertBoxSubmitSantri.php";
        include dirname(__DIR__)."/../Script/ScriptMasterAsrama.php";  
      ?>
      
    </div>
  </body>
</html>




