<script type="text/javascript">
//FUNCTION
  $(document).ready(function()
  {
    resetFormBehavior();

    //VARIABLES
      //GENERAL
      var hrefDetailAsrama = '<?php echo base_url()?>'+'Kamar?modul=masterKamar&asramaID=';
      //FORM
      var inputID             = '';
      var inputNamaAsrama           = "";
      var selectNIPPenanggungJawab  = "";     

      function setFormValue()
      {
          $("#inputID").val(inputID);
          $("#inputNamaAsrama").val(inputNamaAsrama);
          $("#selectNIPPenanggungJawab").val(selectNIPPenanggungJawab);
      }

      function setDataValue()
      {
          inputID                     = $('#inputID').val();
          inputNamaAsrama             = $('#inputNamaAsrama').val();         
          selectNIPPenanggungJawab    = $('#selectNIPPenanggungJawab').val();  
      }
    //RESET FUNCTION
      function resetFormValue()
      {
          $("#inputID").val("");
          $("#inputNamaAsrama").val("");
          $("#selectNIPPenanggungJawab").val("");
      }

      function resetFormBehavior()
      {
        formAction = "Tambah";
        $('#formTitle').html(formAction+" Data");
        getPenanggungJawab();
      }
    
    //FETCH DATA TO DATATABLE
        var table = $("#dgMasterAsrama").DataTable({
            ajax: '<?php echo base_url('Asrama/getAllAsrama')?>',
            "destroy": true,
            columns: 
            [
                { data: 'NamaAsrama' },
                { data: 'NamaPenanggungJawab' },
                {
                  data : "NIPPenanggungJawabAsrama",
                  visible : false
                },
                {
                    data: "AsramaID" , 
                    render : function ( data, type, row, meta ) 
                    {
                        return '<button class="btn btn-warning btn-sm item-edit"'+
                                  'data-id="'+data+'" '+
                                '><i class="fas fa-edit"></i></button>'+
                                '<a href="'+hrefDetailAsrama+''+data+'" class="btn btn-primary btn-sm">'+
                                  '<i class="fas fa-eye"></i>'+
                                '</a>';
                    }
                },
                // {
                //     targets: -1,
                //     data: null,  
                //     defaultContent: '<button class="btn btn-warning btn-sm item-edit"><i class="fas fa-edit"></i></button>',
                // },
            ],
        });
    
    //FETCH DATA TO OPTIONS  
      function getPenanggungJawab()
      {
          $.ajax({
              type  : 'ajax',
              url   : '<?php echo base_url('Karyawan/getVwKaryawanDetail')?>',
              async : true,
              dataType : 'json',
              success : function(data)
              {
                var data = data.data;

                data.sort(function(a, b)
                {
                    var aName = a.NamaLengkap.toLowerCase();
                    var bName = b.NamaLengkap.toLowerCase(); 
                    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                });

                var html = '<option value="">-- Pilih Penanggung Jawab --</option>';
                var i;
                for(i=0; i<data.length; i++)
                {
                    html += '<option value="'+data[i].NIP+'">'+data[i].NIP+' - '+data[i].NamaLengkap+'</option>';
                }
                $('#selectNIPPenanggungJawab').html(html);
              },
              error:function(data)
              {
              }
          });
      }

    //GET DATA FOR EDIT
      //ON CLICK ACTION BUTTON
      $('#dgMasterAsrama').on('click', '.item-edit', function ()
      {
        formAction = "Edit";
        $('#formTitle').html(formAction+" Data");
        var data = table.row($(this).parents('tr')).data();     

        inputID                   = data['AsramaID'];
        inputNamaAsrama           = data['NamaAsrama'];
        selectNIPPenanggungJawab  = data['NIPPenanggungJawabAsrama'];
        setFormValue();

        $(window).scrollTop($('#divForm').offset().top);
      });
    
    //CRUD ACTION
      //SAVE
      function saveData()
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
              success: function(data)
              {
                if(data == 'sukses')
                {
                  var $successMessage = "Asrama <b>"+inputNamaAsrama+"</b> berhasil disimpan";
                  toastr.success($successMessage);
                }else
                {
                  var $errorMessage = "Asrama <b>"+inputNamaAsrama+"</b> gagal disimpan";
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
        var inputNamaAsrama           = $('#inputNamaAsrama').val();
        var selectNIPPenanggungJawab  = $('#selectNIPPenanggungJawab').val();

        $.ajax({
              type : "POST",
              url  : "<?php echo base_url('Asrama/EditAsrama')?>",
              data : 
              {
                inputID:inputID,  
                inputNamaAsrama:inputNamaAsrama ,  
                selectNIPPenanggungJawab:selectNIPPenanggungJawab

              },
              success: function(data)
              {
                if(data == 'sukses')
                {
                  var $successMessage = "Asrama <b>"+inputNamaAsrama+"</b> berhasil diubah";
                  toastr.success($successMessage);
                }else
                {
                  var $errorMessage = "Asrama <b>"+inputNamaAsrama+"</b> gagal diubah";
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
  });
</script>