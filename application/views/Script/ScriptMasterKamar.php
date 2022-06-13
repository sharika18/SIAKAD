<script type="text/javascript">
//FUNCTION
  $(document).ready(function()
  {
    var asramaID = <?php echo $asramaID?>;
    resetFormBehavior();

    //VARIABLES
      //GENERAL
      var hrefDetailKamar = '<?php echo base_url()?>'+'AnggotaKamar?modul=masterAnggotaKamar&kamarID=';
      //FORM
      var inputID             = '';  
      var selectAsramaID      = '';            
      var inputNamaKamar      = "";          

      function setFormValue()
      {
          $("#inputID").val(inputID);
          $("#selectAsramaID").val(selectAsramaID);
          $("#inputNamaKamar").val(inputNamaKamar);
      }

      function setDataValue()
      {
          inputID             = $('#inputID').val();   
          selectAsramaID      = $('#selectAsramaID').val();          
          inputNamaKamar      = $('#inputNamaKamar').val();  
      }
    
    //RESET FUNCTION
      function resetFormValue()
      {
          $("#inputID").val("");
          $("#selectAsramaID").val("");
          $("#inputNamaKamar").val("");
      }

      function resetFormBehavior()
      {
          formAction = "Tambah";
          $('#formTitle').html(formAction+" Data");
          getAsrama();
      }
    
    //FETCH DATA TO DATATABLE
      var table = $("#dgMasterKamar").DataTable({
          ajax: '<?php echo base_url('Kamar/getAllVwKamarDetailByAsramaID/')?>'+asramaID,
          "destroy": true,
          columns: 
          [
              { data: 'NamaAsrama' },
              { 
                data: 'AsramaID', 
                visible : false 
              },
              { data: 'NamaKamar'},
              { data: 'JumlahAnggotaKamar' },
              {
                  data: "KamarID" , 
                  render : function ( data, type, row, meta ) 
                  {
                    return '<button class="btn btn-warning btn-sm item-edit"'+
                              'data-id="'+data+'" '+
                            '><i class="fas fa-edit"></i></button>'+
                            '<a href="'+hrefDetailKamar+''+data+'" class="btn btn-primary btn-sm">'+
                              '<i class="fas fa-eye"></i>'+
                            '</a>';
                  }
              }
          ],
      });
    
    //FETCH DATA TO OPTIONS
      function getAsrama()
      {
          $.ajax({
              type  : 'ajax',
              url   : '<?php echo base_url('Asrama/getAllAsrama')?>',
              async : true,
              dataType : 'json',
              success : function(data)
              {
                var data = data.data;
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

    //GET DATA FOR EDIT
      //ON CLICK ACTION BUTTON
      $('#dgMasterKamar').on('click', '.item-edit', function ()
      {
        formAction = "Edit";
        $('#formTitle').html(formAction+" Data");
        var data = table.row($(this).parents('tr')).data();     
        
        inputID             = data['KamarID'];  
        selectAsramaID      = data['AsramaID'];          
        inputNamaKamar      = data['NamaKamar'];
        setFormValue();

        $(window).scrollTop($('#divForm').offset().top);
      });
    
    //CRUD ACTION
      //SAVE
      function saveData()
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
              success: function(data)
              {
                if(data == 'sukses')
                {
                  var $successMessage = "Kamar <b>"+inputNamaKamar+"</b> berhasil disimpan";
                  toastr.success($successMessage);
                }else
                {
                  var $errorMessage = "Kamar <b>"+inputNamaKamar+"</b> gagal disimpan";
                  toastr.error($errorMessage);
                }
                table.ajax.reload();
                $(window).scrollTop($('#divTable').offset().top);
              },
              error: function(data)
              {
                var $errorMessage = "Fetch API Error";
                toastr.error($errorMessage);
              }
          });
          return false;
      }
      
      //EDIT
      function editData()
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
              success: function(data)
              {
                if(data == 'sukses')
                {
                  var $successMessage = "Asrama <b>"+inputNamaKamar+"</b> berhasil diubah";
                  toastr.success($successMessage);
                }else
                {
                  var $errorMessage = "Asrama <b>"+inputNamaKamar+"</b> gagal diubah";
                  toastr.error($errorMessage);
                }
                table.ajax.reload();
                $(window).scrollTop($('#divTable').offset().top);
              },
              error: function(data)
              {
                var $errorMessage = "Fetch API Error";
                toastr.error($errorMessage);
              }
          });
          return false;
      }
    
    //ADD EVENT LISTENER
      document.getElementById("btnCancel").addEventListener("click", function()
      {
          resetFormValue();
          resetFormBehavior();
      });

      document.getElementById("btnSave").addEventListener("click", function()
      {
          if(formAction == 'Tambah'){
              saveData();
              //alert("Save");
          }else if(formAction == 'Edit'){
              editData();
              //alert("Edit");
          }
          resetFormValue();
          resetFormBehavior();
      });

      document.getElementById("selectAsramaID").addEventListener("change", function()
      {
          asramaID = $("#selectAsramaID").val();
          //alert(asramaID);
          table.ajax.url('<?php echo base_url('Kamar/getAllVwKamarDetailByAsramaID/')?>'+asramaID).load();
      });
  });
</script>