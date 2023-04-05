$('#errorCheck').hide();
$("#signupForm").validate({
    rules: {
        name: "required",
        email: "required",
        pwd: "required",
        image: "required",
        language: "required",
        pwd: {
            required: true,
            minlength: 5
        },
        
        image:{
            required: true,
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
        $('#errorCheck').show();


    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).parents(".row").removeClass(errorClass);
        $('#errorCheck').hide();
    },

    submitHandler:function(form,e){
        e.preventDefault();
        var lang = [];
        $.each($("input[name='language']:checked"), function(){
        lang.push($(this).val());
        });
        var form = $("#signupForm");
        data=new FormData(form[0]);
        data.append('action','insert');
        data.append('language',lang);

        //var url = form.attr('action');
        $.ajax({
            type: 'POST',
            url: "include/user-function.php",
            data: data,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if(data.status=='success'){
                    swal({
                        title: "Successfully Submitted Data",
                        text: "Account Created",
                        icon: "success",
                        type: 'success',
                        timer: 9000,
                    }, function () {  
                        $("#signupForm")[0].reset();
                    });
                }else{
                    swal({
                        title: "Error!!!!",
                        text: "Something went wrong",
                        icon: "error",
                        type:"error",
                        timer: 9000,
                    });
                }
            },
            error: function(data) {
                // Some error in ajax call
                swal({
                    title: "Error",
                    text: "Something went wrong",
                    icon: "error",
                    timer: 9000,
                });
            }
        });
    },
});
    
    
    
    


    
    
    
    








