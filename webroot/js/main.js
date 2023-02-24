$(document).ready(function () {
    jQuery.validator.addMethod("noSpace",
      function (value, element) {
        return value == "" || value.trim().length != 0;
      },
      "**No space please fill the Character"
    );
  
    jQuery.validator.addMethod("lettersonly", 
    function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please"); 

  //   jQuery.validator.addMethod("extension", function (value, element, param) {
  //     param = typeof param === "string" ? param.replace(/,/g, '|') : "pdf|doc|docx|zip|php";
  //     return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
  // }, jQuery.format("Please enter a value with a valid extension."));

    //register form validation
    $("form").validate({
      rules: {
        name: {
          required: true,
          noSpace: true,
          lettersonly:true,
         // minlength: 6,
        },
      
        email: {
          required: true,
          noSpace: true,
          minlength: 5,
        },

        phone: {
          required: true,
          noSpace: true,
          digits: true,
          minlength: 10,
          maxlength: 10,
        },
        password: {
          required: true,
          noSpace: true,
          //minlength: 4,
        },
        cnf_password: {
          required: true,
          noSpace: true,
         // minlength: 4,
          equalTo: "#password",
        },
  
  
        gender: {
          required: true,
          noSpace: true,
        },
        // image_file: {
        //   required: true,
        //   extension: "jpg|png",
          
        // },
      },



      messages: {
        name: {
          required: " **Please enter a First Name",
          //minlength: " **Your First Name must 2 characters",
        },
        email: {
            required: " **Please enter a email",
            email: "**enter valid email",
          },
       
        password: {
          required: " **Please enter a password",
          minlength: " **Your password must consist of at least 6 characters",
        },
        cnf_password: {
          required: " **Please confirm your password",
          minlength: " **Your password must be consist of at least 6 characters",
          equalTo: " **Please enter the same password as in password",
        },
        phone: {
          required: " **Please enter a phone Number",
          digits: "**Only numbers are allowed",
          minlength: " **Your phone number must consist 10 Digits",
          maxlength: " **Phone number only 10 Digits",
        },
        
        gender: {
          required: " **Select gender button",
        },
        image_file: {
          required: " **Please Select Image ",
          extension: "Only image type jpg/png/jpeg/gif is allowed",

        },


      },
  
      // submitHandler: function (form) {
  
      //     $.ajax({
      //       type: "POST",
      //       url: "registration-check.php",
      //       data: $("form").serialize(),
      //       success: function(data){
            
      //         $('#err').html(data)
              
              
      //       },
      //     });
      //   // });
      // },
  
      errorPlacement: function (error, element) {
        if (element.is(":radio")) {
          error.appendTo(".pr");
        } else {
          error.insertAfter(element);
        }
      },
    });
  });