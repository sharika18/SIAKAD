<script>
//VALIDATION FUNCTION
$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            //
        }
    });
    $.validator.addMethod(
        "checkSelect", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) > 0);
        },
        "This field is required"
    );
    $.validator.addMethod(
        "checkStatus", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) > 0);
        },
        "Status Izin belum dipilih"
    );
    $.validator.addMethod(
        "checkUnit", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) > 0);
        },
        "Unit belum dipilih"
    );
    $('#formSubmit').validate({
        rules: {
            selectNIS: {
                checkSelect: true
            },
            selectJenis: {
                checkSelect: true
            },
            selectAlasanIzin: {
                checkSelect: true
            },
            selectStatus: {
                checkSelect: true
            },
            inputKeterangan: {
                checkSelect: true
            },
           
        },
        messages: {
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
    });
});

//CREATE NIP
$(function () {
    var selectedDate=document.getElementById("dateTanggalMulai").value;  
    
    $("#dateTanggalMulai").datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDate
    });

    var selectedDate=document.getElementById("dateTanggalAkhir").value;  
    
    $("#dateTanggalAkhir").datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDate
    });

    // $("#divDateTMT").on("change.datetimepicker", ({date}) => {
    //     var selectedDateTMT = document.getElementById("dateTMT").value; //Get the current date
    //     var formmatDateTMT = moment(selectedDateTMT).format('YYYYMMDD');  
    //     $('#inputNIP').val(formmatDateTMT);
    // })
});
</script>