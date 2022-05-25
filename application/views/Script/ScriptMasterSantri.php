<script type="text/javascript">
    $(document).ready(function(){
        showAllSantri();

        function showAllSantri()
        {
          
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url('Santri/getAllVwSantriDetail')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                  //alert(data.length);
                    var html = '';
                    var hrefEdit = '<?php echo base_url()?>'+'Karyawan/getKaryawanByNIP?modul=masterKaryawan&act=Edit';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].NIS+'</td>'+
                                '<td>'+data[i].NamaLengkap+'</td>'+
                                '<td>'+data[i].NamaLengkapWali+'</td>'+
                                '<td>'+data[i].Jenjang+' - '+data[i].NamaKelas+'</td>'+
                                '<td>'+data[i].NamaAsrama+' - '+data[i].NamaKamar+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<div class="btn-group">'+
                                      '<a  href="'+hrefEdit+'" class="btnEdit btn btn-warning btn-sm"><i class="fas fa-edit"></i>'+
                                      '</a>'+
                                      '<button  id="biayaId" class="btnDelete btn btn-danger btn-sm"'+
                                        'data-toggle="modal"'+
                                        'data-target="#modalDelete"><i class="far fa-trash-alt"></i>'+
                                      '</button>'+
                                    '</div>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#bodyDgMasterSantri').html(html);
                },
                error:function(data){
                }
 
            });
        }

        function getOrangTuaByNIK(varChoice)
        {
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
          var emailID = '#emailEmail'+varChoice;
          var divID = '#divBiodata'+varChoice+' *';
          //alert(divID);

          //SET VALUE
          var nikAyah = $(inputID).val();
          var namaLengkap = '';
          var tempatLahir = '';
          var tanggalLahir = '';
          var pendidikanTerakhir = '';
          var pekerjaan = '';
          var penghasilan = '';
          var noHandphone = '';
          var email = '';
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
                    email += data[i].Email;
                }
                $(namaID).val(namaLengkap);
                $(tempatLahirID).val(tempatLahir);
                $(tanggalLahirID).val(tanggalLahir);
                $(pendidikanID).val(pendidikanTerakhir);
                $(pekerjaanID).val(pekerjaan);
                $(penghasilanID).val(penghasilan);
                $(handphoneID).val(noHandphone);
                $(emailID).val(email);
                $(divID).prop("disabled", true);

                $(emailID).prop("disabled", false);
                $("#btnTambah").prop("disabled", true);
                if(email != '')
                {
                  //alert("email tidak kosong");
                  $(emailID).prop("disabled", true);
                  $("#btnTambah").prop("disabled", false);
                }
            },
            error : function(data){
                $(namaID).val(namaLengkap);
                $(tempatLahirID).val(tempatLahir);
                $(tanggalLahirID).val(tanggalLahir);
                $(pendidikanID).val(pendidikanTerakhir);
                $(pekerjaanID).val(pekerjaan);
                $(penghasilanID).val(penghasilan);
                $(handphoneID).val(noHandphone);
                $(emailID).val(email);
                $(divID).prop("disabled", false);

                $("#emailEmailWali").prop("disabled", false);
                $("#btnTambah").prop("disabled", true);
            }

          });
        }

        function saveSantri()
        {
          
          $('#divBiodataAyah *').prop("disabled", false);
          $('#divBiodataIbu *').prop("disabled", false);
          $('#divBiodataWali *').prop("disabled", false);

          var inputNIKAyah          = $('#inputNIKAyah').val();
          var inputNamaLengkapAyah  = $('#inputNamaLengkapAyah').val();
          var inputTempatLahirAyah  = $('#inputTempatLahirAyah').val();
          var dateTanggalLahirAyah  = $('#dateTanggalLahirAyah').val();
          var selectPendidikanAyah  = $('#selectPendidikanAyah').val();
          var selectPekerjaanAyah   = $('#selectPekerjaanAyah').val();
          var selectPenghasilanAyah = $('#selectPenghasilanAyah').val();
          var inputNomorHPAyah      = $('#inputNomorHPAyah').val();

          var inputNIKIbu          = $('#inputNIKIbu').val();
          var inputNamaLengkapIbu  = $('#inputNamaLengkapIbu').val();
          var inputTempatLahirIbu  = $('#inputTempatLahirIbu').val();
          var dateTanggalLahirIbu  = $('#dateTanggalLahirIbu').val();
          var selectPendidikanIbu  = $('#selectPendidikanIbu').val();
          var selectPekerjaanIbu   = $('#selectPekerjaanIbu').val();
          var selectPenghasilanIbu = $('#selectPenghasilanIbu').val();
          var inputNomorHPIbu      = $('#inputNomorHPIbu').val();

          var inputNIKWali          = $('#inputNIKWali').val();
          var inputNamaLengkapWali  = $('#inputNamaLengkapWali').val();
          var inputTempatLahirWali  = $('#inputTempatLahirWali').val();
          var dateTanggalLahirWali  = $('#dateTanggalLahirWali').val();
          var selectPendidikanWali  = $('#selectPendidikanWali').val();
          var selectPekerjaanWali   = $('#selectPekerjaanWali').val();
          var selectPenghasilanWali = $('#selectPenghasilanWali').val();
          var inputAlamatWali       = $('#inputAlamatWali').val();
          var inputNomorHPWali      = $('#inputNomorHPWali').val();
          var emailEmailWali        = $('#emailEmailWali').val();

          var inputNIS                = $('#inputNIS').val();
          var inputNamaLengkapSantri  = $('#inputNamaLengkapSantri').val();
          var inputNamaPanggilan      = $('#inputNamaPanggilan').val();
          var inputTempatLahirSantri  = $('#inputTempatLahirSantri').val();
          var dateTanggalLahirSantri  = $('#dateTanggalSantri').val();
          var inputNIKSantri          = $('#inputNIKSantri').val();
          var radioJenisKelaminSantri = $('input[name="radioJenisKelaminSantri"]:checked').val();
          var inputAnakKe             = $('#inputAnakKe').val();
          var inputDariBerapaSaudara  = $('#inputDariBerapaSaudara').val();
          var inputTinggiBadan        = $('#inputTinggiBadan').val();
          var inputBeratBadan         = $('#inputBeratBadan').val();
          var inputAlamatSantri       = $('#inputAlamatSantri').val();
          var inputAsalSekolah        = $('#inputAsalSekolah').val();
          var selectUkuranBaju        = $('#selectUkuranBaju').val();
          var selectUkuranCelana      = $('#selectUkuranCelana').val();
          var selectUkuranJilbab      = $('#selectUkuranJilbab').val();

          $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Santri/TambahSantri')?>",
                //dataType : "JSON",
                data : 
                {
                  inputNIS:inputNIS ,  
                  inputNamaLengkapSantri:inputNamaLengkapSantri ,  
                  inputNamaPanggilan:inputNamaPanggilan ,  
                  inputTempatLahirSantri:inputTempatLahirSantri ,  
                  dateTanggalLahirSantri:dateTanggalLahirSantri ,  
                  inputNIKSantri:inputNIKSantri ,  
                  radioJenisKelaminSantri:radioJenisKelaminSantri ,  
                  inputAnakKe:inputAnakKe ,  
                  inputDariBerapaSaudara:inputDariBerapaSaudara ,  
                  inputTinggiBadan:inputTinggiBadan ,  
                  inputBeratBadan:inputBeratBadan ,  
                  inputAlamatSantri:inputAlamatSantri ,  
                  inputAsalSekolah:inputAsalSekolah ,  
                  selectUkuranBaju:selectUkuranBaju ,  
                  selectUkuranCelana:selectUkuranCelana ,  
                  selectUkuranJilbab:selectUkuranJilbab ,  

                  //AYAH
                  inputNIKAyah:inputNIKAyah ,  
                  inputNamaLengkapAyah:inputNamaLengkapAyah ,  
                  inputTempatLahirAyah:inputTempatLahirAyah ,  
                  dateTanggalLahirAyah:dateTanggalLahirAyah ,  
                  selectPendidikanAyah:selectPendidikanAyah ,  
                  selectPekerjaanAyah:selectPekerjaanAyah ,  
                  selectPenghasilanAyah:selectPenghasilanAyah ,  
                  inputNomorHPAyah:inputNomorHPAyah ,  
                  //IBU 
                  inputNIKIbu:inputNIKIbu ,  
                  inputNamaLengkapIbu:inputNamaLengkapIbu ,  
                  inputTempatLahirIbu:inputTempatLahirIbu ,  
                  dateTanggalLahirIbu:dateTanggalLahirIbu ,  
                  selectPendidikanIbu:selectPendidikanIbu ,  
                  selectPekerjaanIbu:selectPekerjaanIbu ,  
                  selectPenghasilanIbu:selectPenghasilanIbu ,  
                  inputNomorHPIbu:inputNomorHPIbu ,  
                  //WALI 
                  inputNIKWali:inputNIKWali ,  
                  inputNamaLengkapWali:inputNamaLengkapWali ,  
                  inputTempatLahirWali:inputTempatLahirWali ,  
                  dateTanggalLahirWali:dateTanggalLahirWali ,  
                  selectPendidikanWali:selectPendidikanWali ,  
                  selectPekerjaanWali:selectPekerjaanWali ,  
                  selectPenghasilanWali:selectPenghasilanWali ,  
                  inputNomorHPWali:inputNomorHPWali ,  
                  inputAlamatWali:inputAlamatWali ,  
                  emailEmailWali:emailEmailWali

                },
                success: function(data){
                  toastr.success("Data santri berhasil disimpan");
                  showAllSantri();

                  $('#inputNIKAyah').val("");
                  $('#inputNamaLengkapAyah').val("");
                  $('#inputTempatLahirAyah').val("");
                  $('#dateTanggalLahirAyah').val("");
                  $('#selectPendidikanAyah').val("");
                  $('#selectPekerjaanAyah').val("");
                  $('#selectPenghasilanAyah').val("");
                  $('#inputNomorHPAyah').val("");

                  $('#inputNIKIbu').val("");
                  $('#inputNamaLengkapIbu').val("");
                  $('#inputTempatLahirIbu').val("");
                  $('#dateTanggalLahirIbu').val("");
                  $('#selectPendidikanIbu').val("");
                  $('#selectPekerjaanIbu').val("");
                  $('#selectPenghasilanIbu').val("");
                  $('#inputNomorHPIbu').val("");

                  $('#inputNIKWali').val("");
                  $('#inputNamaLengkapWali').val("");
                  $('#inputTempatLahirWali').val("");
                  $('#dateTanggalLahirWali').val("");
                  $('#selectPendidikanWali').val("");
                  $('#selectPekerjaanWali').val("");
                  $('#selectPenghasilanWali').val("");
                  $('#inputNomorHPWali').val("");
                  $('#inputAlamatWali').val("");
                  $('#emailEmailWali').val("");

                  $('#inputNIS').val("");
                  $('#inputNamaLengkapSantri').val("");
                  $('#inputNamaPanggilan').val("");
                  $('#inputTempatLahirSantri').val("");
                  $('#dateTanggalSantri').val("");
                  $('#inputNIKSantri').val("");
                  $('#inputAnakKe').val("");
                  $('#inputDariBerapaSaudara').val("");
                  $('#inputTinggiBadan').val("");
                  $('#inputBeratBadan').val("");
                  $('#inputAlamatSantri').val("");
                  $('#inputAsalSekolah').val("");
                  $('#selectUkuranBaju').val("");
                  $('#selectUkuranCelana').val("");
                  $('#selectUkuranJilbab').val("");
                },
                error: function(data){
                  alert('error');
                }
            });
            return false;

        }
        
        function getUserByEmail()
        {
          //SET VALUE
          var email = $('#emailEmailWali').val();
          var varNIK = $('#inputNIKWali').val();
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('Santri/getUserByEmail/')?>'+email,
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    if(data[i].NIK != varNIK)
                    {
                        html += '<font color="red">'+
                        '<small><b>'+email+'</b> sudah digunakan oleh NIK <b>'+data[i].NIK+'</b></small> </br>'+
                        '<small>silahkan masukkan email valid lainnya</small>'+
                        '</font>'
                        ;
                        
                        $('#emailEmailWali').val("");
                    }
                }
                $('#divEmailWali').html(html);
                $('#btnTambah').prop("disabled", true);
            },
            error : function(data){
              $('#divEmailWali').html('');
              $('#btnTambah').prop("disabled", false);
            }

          });
        }
        
        $("input[name='ckBiodataWali']").change(function(){

          var email = '';
          $("#divBiodataWali *").prop("disabled", false);
          $("#emailEmailWali").prop("disabled", false);
          $("#inputNIKWali").prop("disabled", false);
          $("#btnTambah").prop("disabled", true);
          $('#divEmailWali').html('');
          resetValues();

          if($(this).val() == '1')
          {
              valuesBiodataAyah();
              email = $('#emailEmailAyah').val();
              $("#divBiodataWali *").prop("disabled", true);
              $("#inputNIKWali").prop("disabled", true);
          }
          else if($(this).val() == '2')
          {
              valuesBiodataIbu();
              email = $('#emailEmailIbu').val();
              $("#divBiodataWali *").prop("disabled", true);
              $("#inputNIKWali").prop("disabled", true);
          }

          if(email != '')
          {
            $("#emailEmailWali").prop("disabled", true);
            $("#btnTambah").prop("disabled", false);
          }
          setValueBiodataWali();

        });

        $("input[name='emailEmailWali']").change(function(){
          //$("#btnTambah").prop("disabled", true);
          getUserByEmail();
        });


        //ADD EVENT LISTENER
        document.getElementById("inputNIKAyah").addEventListener("change", function(){getOrangTuaByNIK('Ayah');});
        document.getElementById("inputNIKIbu").addEventListener("change", function(){getOrangTuaByNIK('Ibu');});
        document.getElementById("inputNIKWali").addEventListener("change", function(){getOrangTuaByNIK('Wali');});
        
        document.getElementById("btnSave").addEventListener("click", function(){saveSantri();});
        document.getElementById("btnCheckEmail").addEventListener("click", function(){getUserByEmail();});

    });
</script>