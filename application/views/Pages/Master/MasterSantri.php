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
                    <th>ID</th>
                    <th>NIS</th>
                    <th>Nama Santri</th>
                    <th>NIK Wali</th>
                    <th>Kelas</th>
                    <th>Asrama</th>
                    <th>Act</th>
                  </tr>
                  </thead>
                  <tbody>
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
    include dirname(__DIR__)."/../Common/AlertBoxSubmit.php";
    //include dirname(__DIR__)."/../Script/ScriptMasterSantri.php";  
    
    include dirname(__DIR__)."/../Script/FormRegistrasiScript.php";
    include dirname(__DIR__)."/../Script/formRegisterValidationScript.php";
    $this->load->view('Common/Alert');
  ?>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  // $('#btnNIKAyah').on('click',function(){
  //   var nikAyah = $('#inputNIKAyah').val();
  //   var namaLengkap = '';
  //   var tempatLahir = '';
  //   var tanggalLahir = '';
  //   var pendidikanTerakhir = '';
  //   var pekerjaan = '';
  //   var penghasilan = '';
  //   var noHandphone = '';
  //   $.ajax({
  //     type  : 'ajax',
  //     url   : ''+nikAyah,
  //     async : true,
  //     dataType : 'json',
  //     success : function(data){
  //         var html = '';
  //         var i;
  //         for(i=0; i<data.length; i++){
  //             html += '<option value="'+data[i].NamaLengkap+'">'+data[i].NamaLengkap+'</option>';
  //             namaLengkap += data[i].NamaLengkap;
  //             tempatLahir += data[i].TempatLahir;
  //             tanggalLahir += data[i].TanggalLahir;
  //             pendidikanTerakhir += data[i].PendidikanTerakhir;
  //             pekerjaan += data[i].Pekerjaan;
  //             penghasilan += data[i].PenghasilanPerBulan;
  //             noHandphone += data[i].NomorHandphone;
  //         }
  //         $('#inputNamaLengkapAyah').val(namaLengkap);
  //         $('#inputTempatLahirAyah').val(tempatLahir);
  //         $('#dateTanggalLahirAyah').val(tanggalLahir);
  //         $('#selectPendidikanAyah').val(pendidikanTerakhir);
  //         $('#selectPekerjaanAyah').val(pekerjaan);
  //         $('#selectPenghasilanAyah').val(penghasilan);
  //         $('#inputNomorHPAyah').val(noHandphone);
  //     },
  //     error : function(data){
  //         $('#inputNamaLengkapAyah').val(namaLengkap);
  //         $('#inputTempatLahirAyah').val(tempatLahir);
  //         $('#dateTanggalLahirAyah').val(tanggalLahir);
  //         $('#selectPendidikanAyah').val(pendidikanTerakhir);
  //         $('#selectPekerjaanAyah').val(pekerjaan);
  //         $('#selectPenghasilanAyah').val(penghasilan);
  //         $('#inputNomorHPAyah').val(noHandphone);
  //     }

  //   });
  // });

    $(document).ready(function(){
        $('#mydata').dataTable();
        
        function getOrangTuaByNIK(varChoice){
          //var inputID = '#inputNIKAyah';
          //ID
          var inputID = '#inputNIK'+varChoice;
          var namaID = '#inputNamaLengkap'+varChoice;
          var tempatLahirID = '#inputTempatLahir'+varChoice;
          var tanggalLahirID = '#dateTanggalLahir'+varChoice;
          var pendidikanID = '#selectPendidikan'+varChoice;
          var pekerjaanID = '#selectPekerjaan'+varChoice;
          var penghasilanID = '#selectPenghasilan'+varChoice;
          var handphoneID = '#inputNomorHP'+varChoice;

          //SET VALUE
          var nikAyah = $(inputID).val();
          var namaLengkap = '';
          var tempatLahir = '';
          var tanggalLahir = '';
          var pendidikanTerakhir = '';
          var pekerjaan = '';
          var penghasilan = '';
          var noHandphone = '';
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('Santri/getOrangTuaByNIK/')?>'+nikAyah,
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].NamaLengkap+'">'+data[i].NamaLengkap+'</option>';
                    namaLengkap += data[i].NamaLengkap;
                    tempatLahir += data[i].TempatLahir;
                    tanggalLahir += data[i].TanggalLahir;
                    pendidikanTerakhir += data[i].PendidikanTerakhir;
                    pekerjaan += data[i].Pekerjaan;
                    penghasilan += data[i].PenghasilanPerBulan;
                    noHandphone += data[i].NomorHandphone;
                }
                $(namaID).val(namaLengkap);
                $(tempatLahirID).val(tempatLahir);
                $(tanggalLahirID).val(tanggalLahir);
                $(pendidikanID).val(pendidikanTerakhir);
                $(pekerjaanID).val(pekerjaan);
                $(penghasilanID).val(penghasilan);
                $(handphoneID).val(noHandphone);
            },
            error : function(data){
                $(namaID).val(namaLengkap);
                $(tempatLahirID).val(tempatLahir);
                $(tanggalLahirID).val(tanggalLahir);
                $(pendidikanID).val(pendidikanTerakhir);
                $(pekerjaanID).val(pekerjaan);
                $(penghasilanID).val(penghasilan);
                $(handphoneID).val(noHandphone);
            }

          });
        }
        document.getElementById("btnNIKAyah").addEventListener("click", function(){getOrangTuaByNIK('Ayah');});
        document.getElementById("btnNIKIbu").addEventListener("click", function(){getOrangTuaByNIK('Ibu');});
        //function show all product
        function show_product(){
            $.ajax({
                //alert(nikAyah);
                type  : 'ajax',
                url   : '<?php echo base_url('Santri/getOrangTuaByNIK/3276031012940004')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var namaLengkap = '';

                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].NamaLengkap+'">'+data[i].NamaLengkap+'</option>';
                        namaLengkap += data[i].NamaLengkap;
                    }
                    $('#selectUkuranBaju').html(html);
                    //$('#inputNamaLengkapAyah').val(namaLengkap);
                    //alert('a');
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




