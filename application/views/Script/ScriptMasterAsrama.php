<script type="text/javascript">
  $(document).ready(function()
  {
    var idToBeDeleted = '';
    var formAction = 'Tambah';
    
    $('#formTitle').html("Tambah Data");
    getPenanggungJawab();
    showAllAsrama();

    function replaceClass(id, oldClass, newClass) {
        var elem = $(`#${id}`);
        if (elem.hasClass(oldClass)) {
            elem.removeClass(oldClass);
        }
        elem.addClass(newClass);
    }

    function resetForm()
    {
      formAction = 'Tambah';
      $('#formTitle').html("Tambah Data");
      
      $('#inputID').val("");
      $('#inputNamaAsrama').val("");
      $('#selectNIPPenanggungJawab').val("");
    }

    function showAllAsrama()
    { 
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('Asrama/getAllAsrama')?>',
            async : true,
            dataType : 'json',
            success : function(data){
              //alert(data.length);
                var html = '';
                var hrefEdit = '<?php echo base_url()?>'+'Asrama/getAllVwKamarDetail?modul=masterKaryawan&act=Edit';
                var i;
                for(i=0; i<data.length; i++){
                  html += '<tr>'+
                              '<td>'+data[i].NamaAsrama+'</td>'+
                              '<td>'+data[i].NamaPenanggungJawab+'</td>'+
                              '<td style="text-align:right;">'+
                                  '<a href="javascript:void(0);" class="btn btn-primary btn-sm item_edit" title="Lihat Kamar"'+
                                    'data-asrama_id="'+data[i].AsramaID+'" '+  
                                    'data-nama_asrama="'+data[i].NamaAsrama+'" '+
                                      'data-nip_penanggungjawab="'+data[i].NIPPenanggungJawabAsrama+'"'+
                                    '>'+
                                      '<i class="fas fa-eye"></i>'+
                                  '</a>'+
                                  '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" title="Edit Kamar"'+
                                    'data-asrama_id="'+data[i].AsramaID+'" '+  
                                    'data-nama_asrama="'+data[i].NamaAsrama+'" '+
                                      'data-nip_penanggungjawab="'+data[i].NIPPenanggungJawabAsrama+'"'+
                                    '>'+
                                      '<i class="fas fa-edit"></i>'+
                                  '</a>'+
                              '</td>'+
                              '</tr>';
                }
                $('#bodyDgMasterAsrama').html(html);
            },
            error:function(data){
            }

        });
    }

    function getPenanggungJawab()
    {
      
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('Karyawan/getVwKaryawanDetail')?>',
            async : true,
            dataType : 'json',
            success : function(data){
              data.sort(function(a, b)
              {
                  var aName = a.NamaLengkap.toLowerCase();
                  var bName = b.NamaLengkap.toLowerCase(); 
                  return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
              });

              var html = '<option value="">-- Pilih Penanggung Jawab --</option>';
              var i;
              for(i=0; i<data.length; i++){
                  html += '<option value="'+data[i].NIP+'">'+data[i].NIP+' - '+data[i].NamaLengkap+'</option>';
              }
              $('#selectNIPPenanggungJawab').html(html);
            },
            error:function(data){
            }

        });
    }

    function saveAsrama()
    {
      var inputNamaAsrama          = $('#inputNamaAsrama').val();
      var selectNIPPenanggungJawab  = $('#selectNIPPenanggungJawab').val();

      $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Asrama/TambahAsrama')?>",
            //dataType : "JSON",
            data : 
            {
              inputNamaAsrama:inputNamaAsrama ,  
              selectNIPPenanggungJawab:selectNIPPenanggungJawab

            },
            success: function(data){
              if(data == 'sukses')
              {
                var $successMessage = "Asrama <b>"+inputNamaAsrama+"</b> berhasil disimpan";
                toastr.success($successMessage);
              }else
              {
                var $errorMessage = "Asrama <b>"+inputNamaAsrama+"</b> gagal disimpan";
                toastr.error($errorMessage);
              }
              showAllAsrama();
              resetForm();
            },
            error: function(data){
              var $errorMessage = "Asrama <b>"+inputNamaAsrama+"</b> gagal disimpan";
              toastr.error($errorMessage);
            }
        });
        return false;
    }

    function editAsrama()
    {
      var inputID                   = $('#inputID').val();
      var inputNamaAsrama           = $('#inputNamaAsrama').val();
      var selectNIPPenanggungJawab  = $('#selectNIPPenanggungJawab').val();

      $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Asrama/EditAsrama')?>",
            //\dataType : "JSON",
            data : 
            {
              inputID:inputID,  
              inputNamaAsrama:inputNamaAsrama ,  
              selectNIPPenanggungJawab:selectNIPPenanggungJawab

            },
            success: function(data){
              if(data == 'sukses')
              {
                var $successMessage = "Asrama <b>"+inputNamaAsrama+"</b> berhasil diubah";
                toastr.success($successMessage);
              }else
              {
                var $errorMessage = "Asrama <b>"+inputNamaAsrama+"</b> gagal diubah";
                toastr.error($errorMessage);
              }
              
              showAllAsrama();
              resetForm();
            },
            error: function(data){
              var $errorMessage = "Asrama <b>"+inputNamaAsrama+"</b> gagal diubah";
              toastr.error($errorMessage);
            }
        });
        return false;
    }

    $('#bodyDgMasterAsrama').on('click','.item_edit',function()
    {
      formAction = 'Edit';
      
      var ID = $(this).data('asrama_id');
      var NamaAsrama = $(this).data('nama_asrama');
      var NIPPenanggungJawab = $(this).data('nip_penanggungjawab');
      
      $('#inputID').val(ID);
      $('#inputNamaAsrama').val(NamaAsrama);
      $('#selectNIPPenanggungJawab').val(NIPPenanggungJawab);

      $('#formTitle').html("Edit Data");
        //replaceClass("divFormData", "card card-primary", "card card-warning");
        //replaceClass("btnSumbit", "btnSubmit btn btn-primary float-right", "btnSubmit btn btn-warning float-right");
    });

    //ADD EVENT LISTENER
    document.getElementById("btnCancel").addEventListener("click", function(){
      resetForm();
    });

    document.getElementById("btnSave").addEventListener("click", function(){
      if(formAction == 'Tambah'){
        saveAsrama();
      }else if(formAction == 'Edit'){
        editAsrama();
      }
    });
  });
</script>