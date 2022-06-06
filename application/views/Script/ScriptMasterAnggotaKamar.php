<script type="text/javascript">
  $(document).ready(function()
  {
    var asramaID = <?php echo $asramaID?>;
    var kamarID = <?php echo $kamarID?>;
    var idToBeDeleted = '';
    var formAction = 'Tambah';
    $('#dgMasterAnggotaKamar').dataTable();
    $('#formTitle').html("Tambah Data");
    showKamar();
    getAsrama();
    getKamar();
    getAnggotaKamar();
    getStatusAnggota();

    function resetForm()
    {
      formAction = 'Tambah';
      $('#formTitle').html("Tambah Data");
      
      $('#selectAsramaID').val("");
      $('#selectNISAnggotaKamar').val("");
      $('#selectStatusAnggota').val("");
      
      showKamar();
      getAsrama();
      getKamar();
      getAnggotaKamar();
      getStatusAnggota();

    }

    function showKamar()
    { 
      <?php 
        $deleteAlertMessage = "Apakah kamu yakin ingin menghapus santri berikut dari anggota asrama :";
      ?>
      //alert( '<?php echo base_url('AnggotaKamar/getDistinctAnggotaByKamarID/')?>'+kamarID);
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('AnggotaKamar/getDistinctAnggotaByKamarID/')?>'+kamarID,
            async : true,
            dataType : 'json',
            success : function(data){
              //alert(data.length);
                var html = '';
                var hrefKamar = '<?php echo base_url()?>'+'Kamar?modul=masterKamar&asramaID=';
                var i;
                for(i=0; i<data.length; i++){
                  html += '<tr>'+
                              '<td>'+data[i].NamaAsrama+'</td>'+
                              '<td>'+data[i].NamaKamar+'</td>'+
                              '<td class="tdDeskripsi">'+data[i].NamaAnggotaKamar+'</td>'+
                              '<td>'+data[i].StatusAnggotaKamar+'</td>'+
                              '<td style="text-align:right;">'+
                                  '<button  id="biayaId" class="btnDelete btn btn-danger btn-sm item_delete"'+ 
                                    'data-id="'+data[i].AnggotaKamarID+'" '+
                                    'data-toggle="modal"'+ 
                                    'data-target="#modalDelete"><i class="far fa-trash-alt"></i>'+
                                  '</button>'+
                              '</td>'+
                              '</tr>';
                }
                $('#bodyDgMasterAnggotaKamar').html(html);
            },
            error:function(data){
              $("#dgMasterAnggotaKamar").dataTable().fnDestroy()
              $('#dgMasterAnggotaKamar').dataTable();
            }

        });
    }

    function getKamar()
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

                var html = '<option value="">-- Pilih Kamar --</option>';
              var i;
              for(i=0; i<data.length; i++){
                  html += '<option value="'+data[i].KamarID+'">'+data[i].NamaKamar+'</option>';
              }
              $('#selectKamarID').html(html);

              if(kamarID != 0)
              {
                $('#selectKamarID').val(kamarID);
              }
            },
            error:function(data){
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

    function getAnggotaKamar()
    { 
      //alert('<?php echo base_url('AnggotaKamar/getAllVwKamarDetailByAsramaID/')?>'+asramaID);
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('AnggotaKamar/getNotAnggotaKamar/')?>'+asramaID,
            async : true,
            dataType : 'json',
            success : function(data){
                
                data.sort(function(a, b)
                {
                    var aName = a.NamaLengkap.toLowerCase();
                    var bName = b.NamaLengkap.toLowerCase(); 
                    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                });

                var html = '<option value="">-- Pilih Anggota --</option>';
              var i;
              for(i=0; i<data.length; i++){
                  html += '<option value="'+data[i].NIS+'">'+data[i].NIS+' - '+data[i].NamaLengkap+'</option>';
              }
              $('#selectNISAnggotaKamar').html(html);
            },
            error:function(data){
            }

        });
    }

    function getStatusAnggota()
    { 
      
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url('Dimension/getValueByCode/statusAnggotaKamar')?>',
            async : true,
            dataType : 'json',
            success : function(data){
                
                data.sort(function(a, b)
                {
                    var aName = a.value.toLowerCase();
                    var bName = b.value.toLowerCase(); 
                    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                });

                var html = '<option value="">-- Pilih Status --</option>';
              var i;
              for(i=0; i<data.length; i++){
                  html += '<option value="'+data[i].value+'">'+data[i].value+'</option>';
              }
              $('#selectStatusAnggota').html(html);
            },
            error:function(data){
            }

        });
    }

    function save()
    {
      var selectKamarID           = $('#selectKamarID').val();
      var selectNISAnggotaKamar   = $('#selectNISAnggotaKamar').val();
      var selectStatusAnggota     = $('#selectStatusAnggota').val();

      $.ajax({
            type : "POST",
            url  : "<?php echo base_url('AnggotaKamar/TambahAnggotaKamar')?>",
            //dataType : "JSON",
            data : 
            {
              selectKamarID:selectKamarID ,  
              selectNISAnggotaKamar:selectNISAnggotaKamar,
              selectStatusAnggota:selectStatusAnggota

            },
            success: function(data){
              if(data == 'sukses')
              {
                var $successMessage = "Data berhasil disimpan";
                toastr.success($successMessage);
              }else
              {
                var $errorMessage = "Data gagal disimpan";
                toastr.error($errorMessage);
              }
            },
            error: function(data){
              var $errorMessage = "Data gagal disimpan";
              toastr.error($errorMessage);
            }
        });
        return false;
    }

    function deleteData()
    {
      var ID  = $('#inputID').val();
      $.ajax({
            type : "POST",
            url  : '<?php echo base_url('AnggotaKamar/HapusAnggotaKamar/')?>'+ID,
            success: function(data){
              if(data == 'sukses')
              {
                var $successMessage = "Data berhasil dihapus";
                toastr.success($successMessage);
              }else
              {
                var $errorMessage = "Data gagal dihapus";
                toastr.error($errorMessage);
              }
            },
            error: function(data){
              var $errorMessage = "Data gagal dihapus";
              toastr.error($errorMessage);
            }
        });
        return false;
    }

    //ADD EVENT LISTENER
    document.getElementById("selectAsramaID").addEventListener("change", function(){
      
      //$('#dgMasterAnggotaKamar tbody').empty();
      // $('#dgMasterAnggotaKamar').append($('<tbody>'));  
      asramaID = $("#selectAsramaID").val();
      kamarID = 0;
      showKamar();
      getKamar();
    });
    document.getElementById("selectKamarID").addEventListener("change", function(){
      kamarID = $("#selectKamarID").val();
      showKamar();
    });
    document.getElementById("btnCancel").addEventListener("click", function(){
      resetForm();
    });

    document.getElementById("btnSave").addEventListener("click", function(){
      if(formAction == 'Tambah'){
        save();
      }
      resetForm();
    });

    document.getElementById("btnDelete").addEventListener("click", function(){
      deleteData();
      resetForm();
    });
  });
</script>