<script type="text/javascript">
  $(document).ready(function()
  {
    

    //VARIABLES
      //GENERAL
      var KamarID = <?php echo $kamarID?>;
      var AsramaID = 0;
      //FORM
      var inputID               = '';  
      var selectKamarID         = '';            
      var selectNISAnggotaKamar = "";         
      var selectStatusAnggota   = "";       

      function setFormValue()
      {
          $("#inputID").val(inputID);
          $("#selectKamarID").val(selectKamarID);
          $("#selectNISAnggotaKamar").val(selectNISAnggotaKamar);
          $("#selectStatusAnggota").val(selectStatusAnggota);
      }

      function setDataValue()
      {
          inputID               = $('#inputID').val();   
          selectKamarID         = $('#selectKamarID').val();          
          selectNISAnggotaKamar = $('#selectNISAnggotaKamar').val();         
          selectStatusAnggota   = $('#selectStatusAnggota').val(); 
      }
    //RESET FUNCTION
      function resetFormValue()
      {
          $("#inputID").val("");
          $("#inputselectKamarIDNIP").val("");
          $("#selectNISAnggotaKamar").val("");
          $("#selectStatusAnggota").val("");
      }

      function resetFormBehavior()
      {
          formAction = "Tambah";
          $('#formTitle').html(formAction+" Data");
          getAsrama();
          getAsramaByKamarID();
          getAnggotaKamar();
          getStatusAnggota();
      }
      resetFormBehavior();
    
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
                for(i=0; i<data.length; i++)
                {
                    html += '<option value="'+data[i].AsramaID+'">'+data[i].NamaAsrama+'</option>';
                }
                $('#selectAsramaID').html(html);
                // if(asramaID != 0)
                // {
                //   $('#selectAsramaID').val(asramaID);
                // }
              },
              error:function(data)
              {
                
              },
              complete:function()
              {
                getAsramaByKamarID();
              }

          });
      }

      function getAsramaByKamarID()
      {
          var dt='';
          $.ajax
          ({
              type  : 'ajax',
              url   : '<?php echo base_url('AnggotaKamar/getNamaAsramaByKamarID/')?>'+KamarID,
              async : true,
              dataType : 'json',
              success : function(data)
              {
                var data = data.data;
                dt = data[0].AsramaID;
                $('#selectAsramaID').val(data[0].AsramaID);
               
                //$('#selectKamarID').val(data[0].KamarID);
              },
              error:function(data)
              {
                $('#selectAsramaID').val("");
              },
              complete:function()
              {
                getKamarByAsramaID(dt);
                //alert(dt);
              }

          });
      }

      function getKamarByAsramaID(getAsramaID)
      { 
        //alert(KamarID);
        AsramaID = getAsramaID;
        $.ajax({
              type  : 'ajax',
              url   : '<?php echo base_url('Kamar/getAllVwKamarDetailByAsramaID/')?>'+AsramaID,
              async : true,
              dataType : 'json',
              success : function(data)
              {
                  var data = data.data;
                  data.sort(function(a, b)
                  {
                      var aName = a.NamaKamar.toLowerCase();
                      var bName = b.NamaKamar.toLowerCase(); 
                      return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                  });

                  var html = '<option value="">-- Pilih Kamar --</option>';
                  var i;
                for(i=0; i<data.length; i++)
                {
                    html += '<option value="'+data[i].KamarID+'">'+data[i].NamaKamar+'</option>';
                }
                $('#selectKamarID').html(html);

                if(KamarID != 0)
                {
                  $('#selectKamarID').val(KamarID);
                } 
              },
              error:function(data)
              {
                $('#selectKamarID').html('');
              }

          });
      }

      function getAnggotaKamar()
      { 
          $.ajax({
              type  : 'ajax',
              url   : '<?php echo base_url('AnggotaKamar/getNotAnggotaKamar/')?>',
              async : true,
              dataType : 'json',
              success : function(data)
              {   
                  data.sort(function(a, b)
                  {
                      var aName = a.NamaLengkap.toLowerCase();
                      var bName = b.NamaLengkap.toLowerCase(); 
                      return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                  });

                  var html = '<option value="">-- Pilih Anggota --</option>';
                var i;
                for(i=0; i<data.length; i++)
                {
                    html += '<option value="'+data[i].NIS+'">'+data[i].NIS+' - '+data[i].NamaLengkap+'</option>';
                }
                $('#selectNISAnggotaKamar').html(html);
              },
              error:function(data)
              {
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
              success : function(data)
              {   
                  data.sort(function(a, b)
                  {
                      var aName = a.value.toLowerCase();
                      var bName = b.value.toLowerCase(); 
                      return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                  });

                  var html = '<option value="">-- Pilih Status --</option>';
                var i;
                for(i=0; i<data.length; i++)
                {
                    html += '<option value="'+data[i].value+'">'+data[i].value+'</option>';
                }
                $('#selectStatusAnggota').html(html);
              },
              error:function(data)
              {
              }

          });
      }
    //ADD EVENT LISTENER
      document.getElementById("selectAsramaID").addEventListener("change", function()
      {
        AsramaID = $("#selectAsramaID").val();
        KamarID = 0;
        getKamarByAsramaID(AsramaID);
      });
  });
</script>