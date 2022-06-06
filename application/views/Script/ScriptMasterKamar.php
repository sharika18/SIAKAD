<script type="text/javascript">
  $(document).ready(function()
  {
    var asramaID = <?php echo $asramaID?>;
    var idToBeDeleted = '';
    var formAction = 'Tambah';
    $('#dgMasterKamar').dataTable();
    $('#formTitle').html("Tambah Data");
    getAsrama();
    showAllKamar();

    function resetForm()
    {
      formAction = 'Tambah';
      $('#formTitle').html("Tambah Data");
      
      $('#inputID').val("");
      $('#inputNamaKamar').val("");
      //$('#selectAsramaID').val("");
    }

    function showAllKamar()
    { 
      //alert('<?php echo base_url('Kamar/getAllVwKamarDetailByAsramaID/')?>'+asramaID);
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('Kamar/getAllVwKamarDetailByAsramaID/')?>'+asramaID,
            async : true,
            dataType : 'json',
            success : function(data){
                
                data.sort(function(a, b)
                {
                    var aName = a.NamaKamar.toLowerCase();
                    var bName = b.NamaKamar.toLowerCase(); 
                    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                });

                var html = '';
                var hrefKamar = '<?php echo base_url()?>'+'AnggotaKamar?modul=masterAnggotaKamar&kamarID=';
                var i;
                var jumlahAnggotaKamar = 'Belum ada anggota';
                for(i=0; i<data.length; i++){
                  if(data[i].JumlahAnggotaKamar > 0)
                  {
                    jumlahAnggotaKamar = '<b>'+data[i].JumlahAnggotaKamar + '</b> Anggota';
                  }
                  //alert(data[i].NamaKamar);
                  html += '<tr>'+
                              '<td>'+data[i].NamaAsrama+'</td>'+
                              '<td>'+data[i].NamaKamar+'</td>'+
                              '<td>'+jumlahAnggotaKamar+'</td>'+
                              '<td style="text-align:right;">'+
                                  '<a href="'+hrefKamar+data[i].KamarID+'&asramaID='+data[i].AsramaID+'" class="btn btn-primary btn-sm item_edit" title="Lihat Anggota Kamar">'+
                                      '<i class="fas fa-eye"></i>'+
                                  '</a>'+
                                  '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" title="Edit Kamar"'+
                                    'data-kamar_id="'+data[i].KamarID+'" '+  
                                    'data-asrama_id="'+data[i].AsramaID+'" '+  
                                    'data-nama_kamar="'+data[i].NamaKamar+'" '+
                                    '>'+
                                      '<i class="fas fa-edit"></i>'+
                                  '</a>'+
                              '</td>'+
                              '</tr>';
                }
                $('#bodyDgMasterKamar').html(html);
            },
            error:function(data){
              $("#dgMasterKamar").dataTable().fnDestroy()
              $('#dgMasterKamar').dataTable();
            }

        });
    }

    function getAsrama()
    {
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('Asrama/getAllAsrama')?>',
            async : true,
            dataType : 'json',
            success : function(data){
              data.sort(function(a, b)
              {
                  var aName = a.NamaAsrama.toLowerCase();
                  var bName = b.NamaAsrama.toLowerCase(); 
                  return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
              });

              var html = '<option value="">-- Pilih Asrama --</option>';
              var i;
              for(i=0; i<data.length; i++){
                  html += '<option value="'+data[i].AsramaID+'">'+data[i].NamaAsrama+'</option>';
              }
              $('#selectAsramaID').html(html);
              if(asramaID != 0)
              {
                $('#selectAsramaID').val(asramaID);
              }
            },
            error:function(data){
            }

        });
    }

    function saveKamar()
    {
      var selectAsramaID  = $('#selectAsramaID').val();
      var inputNamaKamar  = $('#inputNamaKamar').val();

      $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Kamar/TambahKamar')?>",
            //dataType : "JSON",
            data : 
            {
              selectAsramaID:selectAsramaID ,  
              inputNamaKamar:inputNamaKamar

            },
            success: function(data){
              if(data == 'sukses')
              {
                var $successMessage = "Kamar <b>"+inputNamaKamar+"</b> berhasil disimpan";
                toastr.success($successMessage);
              }else
              {
                var $errorMessage = "Kamar <b>"+inputNamaKamar+"</b> gagal disimpan";
                toastr.error($errorMessage);
              }
            },
            error: function(data){
              var $errorMessage = "Asrama <b>"+inputNamaAsrama+"</b> gagal disimpan";
              toastr.error($errorMessage);
            }
        });
        return false;
    }

    function editKamar()
    {
      var inputID                   = $('#inputID').val();
      var inputNamaKamar            = $('#inputNamaKamar').val();
      var selectAsramaID            = $('#selectAsramaID').val();

      $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Kamar/EditKamar')?>",
            //\dataType : "JSON",
            data : 
            {
              inputID:inputID,  
              selectAsramaID:selectAsramaID ,  
              inputNamaKamar:inputNamaKamar

            },
            success: function(data){
              if(data == 'sukses')
              {
                var $successMessage = "Asrama <b>"+inputNamaKamar+"</b> berhasil diubah";
                toastr.success($successMessage);
              }else
              {
                var $errorMessage = "Asrama <b>"+inputNamaKamar+"</b> gagal diubah";
                toastr.error($errorMessage);
              }

              showAllKamar();
              resetForm();
            },
            error: function(data){
              var $errorMessage = "Asrama <b>"+inputNamaKamar+"</b> gagal diubah";
              toastr.error($errorMessage);
            }
        });
        return false;
    }

    $('#bodyDgMasterKamar').on('click','.item_edit',function()
    {
      formAction = 'Edit';
      
      var ID = $(this).data('kamar_id');
      var NamaKamar = $(this).data('nama_kamar');
      var AsramaID = $(this).data('asrama_id');
      
      $('#inputID').val(ID);
      $('#inputNamaKamar').val(NamaKamar);
      $('#selectAsramaID').val(AsramaID);

      $('#formTitle').html("Edit Data");
        //replaceClass("divFormData", "card card-primary", "card card-warning");
        //replaceClass("btnSumbit", "btnSubmit btn btn-primary float-right", "btnSubmit btn btn-warning float-right");
    });

    //ADD EVENT LISTENER
    document.getElementById("selectAsramaID").addEventListener("change", function(){
      asramaID = $("#selectAsramaID").val();
      showAllKamar();
      
      $('#inputNamaKamar').val("");
    });
    document.getElementById("btnCancel").addEventListener("click", function(){
      resetForm();
    });

    document.getElementById("btnSave").addEventListener("click", function(){
      if(formAction == 'Tambah'){
        saveKamar();
      }else if(formAction == 'Edit'){
        editKamar();
      }
    });
  });
</script>