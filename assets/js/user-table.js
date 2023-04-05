

$(document).ready(function() {
  $('#user_table').DataTable({
    "fnCreatedRow": function(nRow, aData, iDataIndex) {
      $(nRow).attr('id', aData[0]);
    },
    'serverSide': 'true',
    'processing': 'true',
    "bProcessing": true,
    "responsive": true,
    
    'paging': 'true',
    'ajax': {
      'url': '../include/user-function.php',
      'type': 'post',
      'data':{action:"view"},
    },
    "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": [5]
      },

    ]
  });
});
$(document).ready(function() {

  $('#user_table').on('click', '.editbtn ', function(event) {
    event.preventDefault();
    
    //var table = $('#user_table').DataTable();
    //var trid = $(this).closest('tr').attr('id');
    
    var id = $(this).data('id');
    $('#User_Modal').modal('show');
    
    $.ajax({
      url: "../include/user-function.php",
      type: 'post',
      data: {
        editId: id
      },
      success: function(data) {
        var json = JSON.parse(data);
        var lang=json.user_language;
        var orglang=lang.split(',');
        $("#image").val('');
        $('input[name="language"]').prop("checked", false);
        $('#id').val(id);
        $('#name').val(json.user_name);
        $('#email').val(json.user_email);
        $('#pwd').val(json.user_pwd);
        $('#user_avatar').val(json.user_image);

        //$('#img').val(json.user_image);
        $("#avatar").html(
          `<img src="../assets/uploads/${json.user_image}" width="80px" height="80px" style="border-radius:100% !important;">`);
        //$('#uploaded_image img').attr('src','../assets/uploads/'+json.user_image);

        for(i=0;i<orglang.length;i++){
          $('input[name="language"][value="'+orglang[i]+'"]').prop("checked", true);
        }


        
      }
    })
    
  });
});
$(document).ready(function() {
$('#errorCheck').hide();
$("#updateForm").validate({
    rules: {
        name: "required",
        email: "required",
        pwd: "required",
        language: "required",
        pwd: {
            required: true,
            minlength: 5
        },
        
        image:{
          extension: "jpg|jpeg|pdf|doc|docx|png"
        },
        language: {
            required: true,
            minlength: 2
        },
        remember: "required"
    },
    messages: {
        
        pwd: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        image:{
            required: "Please provide an image",
            extension: "Only image type jpg/png/jpeg/gif is allowed"

        },
        language: {
            required: "Please check the language",
            minlength: "Select atleast two languages"
        },
        name: "Please enter a valid name",
        email: "Please enter a valid email address",
        agree1: "Please accept our policy"
    },
    errorPlacement: function(error, element) {
        if (element.attr("name") == "language") {
            $('#errorCheck').show();
            error.addClass("ui red pointing label transition");
            $('#errorCheck').html(error);
        } else {
            error.addClass("ui red pointing label transition");
            error.insertAfter(element.parent());
        }
    },
    highlight: function(element, errorClass, validClass) {
        $(element).parents(".row").addClass(errorClass);

    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).parents(".row").removeClass(errorClass);
    },

    submitHandler:function(form,e){
        e.preventDefault();
        var lang = [];
        $.each($("input[name='language']:checked"), function(){
        lang.push($(this).val());
        });
        var form = $("#updateForm");
        data=new FormData(form[0]);
        data.append('action','update');
        data.append('language',lang);

        //var url = form.attr('action');
        $.ajax({
            type: 'POST',
            url: "../include/user-function.php",
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
              if(data.status='success'){
                swal("Updated Data", "Your Selected Data has been updated.", "success");
                setTimeout(function() {
                  $('#User_Modal').modal('hide')
                }, 2000);
                var table = $('#user_table').DataTable(); 
                table.draw(false);
              }else{
                swal("Cancelled", "Something went wrong", "error");   
              }
            },
            error: function(data) {
              swal("Cancelled", "Something went wrong ", "error");   

            }
        });
    },
});
});
$(document).on('click', '.deleteBtn', function(event) {
  var table = $('#user_table').DataTable();
  event.preventDefault();
  var id = $(this).data('id');
  swal({   
    title: "Are you sure?",   
    text: "You will not be able to recover this imaginary file!",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Yes, delete it!",   
    cancelButtonText: "Cancel",   
    closeOnConfirm: false,   
    closeOnCancel: false  
    }, function(isConfirm){  
      if (isConfirm) {     
        $.ajax({
          url: "../include/user-function.php",
          data: {
            deleteId: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'success') {
              table.draw(false);
              swal("Deleted!", "Your Selected Data has been deleted.", "success");
            } else {
              swal("Cancelled", "Your data is safe", "error");   
              
            }
          }
        });   
      }else {     
        swal("Cancelled", "Your data is safe", "error");   
      } 
  });
})





