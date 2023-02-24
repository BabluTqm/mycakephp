$(document).ready(function () {
    jQuery.validator.addMethod("noSpace",
      function (value, element) {
        return value == "" || value.trim().length != 0;
      },
      "**No space please fill the Character"
    );


    /*****************************Password Method ********************************/
    jQuery.validator.addMethod("Uppercase",
    function (value) {
      return /[A-Z]/.test(value);
    },
    "**Your Password must contain at least one UpperCase Character"
  );

    jQuery.validator.addMethod("lowercase",
    function (value) {
      return /[a-z]/.test(value);
    },
    "**Your Password must contain at least one Lower Character"
    );

    jQuery.validator.addMethod("specialChar",
    function (value) {
      return /[!@#$%&*_-]/.test(value);
    },
    "**Your Password must contain at least one Special Character"
    );

    jQuery.validator.addMethod("Numberic",
    function (value) {
      return /[0-9]/.test(value);
    },
    "**Your Password must contain at least one Numeric Value"
    );


    /********************************************************************************/


  
    jQuery.validator.addMethod("lettersonly", 
    function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "**Please Letters only Not fill Space"); 




    //register form validation
    $("form").validate({
      rules: {
        'user_profile[first_name]': {
          required: true,
          noSpace: true,
          lettersonly:true,
         // minlength: 6,
        },
        'user_profile[last_name]': {
          required: true,
          noSpace: true,
          lettersonly:true,
         // minlength: 6,
        },
        'user_profile[address]': {
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

        'user_profile[contact]': {
          required: true,
          noSpace: true,
          digits: true,
          minlength: 10,
          maxlength: 10,
        },
        password: {
          required: true,
          noSpace: true,
          Uppercase: true,
          lowercase: true,
          specialChar: true,
          Numberic: true,



        },

        confirm_password: {
          required: true,
          noSpace: true,
         // minlength: 4,
          equalTo: "#password",
        },
  
  
        gender: {
          required: true,
          noSpace: true,
        },
        title : {
          required: true,
          noSpace: true,
          maxlength: 50,
        },

        body : {
          required: true,
          noSpace: true,
          maxlength: 200,
        },


        

//////////////////Product Validation//////////////////


        'products[product_title]':{
          required: true,
          noSpace: true,
          minlength: 20,
        
        },
        'products[product_description]':{
          required: true,
          noSpace: true,
          maxlength: 5000,
        },
        'products[images]':{
          required: true,
          
        },
       'products[product_tags]':{
        required: true,
        noSpace: true,
        minlength: 20,
        maxlength: 30,
       }
       
      },



      messages: {
        'user_profile[first_name]': {
          required: " **Please enter a First Name",
           
        },
        'user_profile[last_name]': {
          required: " **Please enter a Last Name",
           
        },
        'user_profile[address]': {
          required: " **Please enter Address",
           
        },
        email: {
            required: " **Please enter a email",
            email: "**enter valid email",
          },
       
        password: {
          required: " **Please enter a password",
          minlength : " **Your password must consist of at least 6 characters",
          // characters : '**Please Enter atleast 1 Upper Case.',
          // lowercase : '**Please Enter atleast 1 Lower Case.',
          // specialChar : '**Please Enter atleast 1 Special Char.',
          // Numberic : '**Please Enter atleast 1 Numeric Value.',

        },
        confirm_password: {
          required: " **Please confirm your password",
          minlength: " **Your password must be consist of at least 6 characters",
          equalTo: " **Please enter the same password as in password",
        },
        'user_profile[contact]': {
          required: " **Please enter a phone Number",
          digits: "**Only numbers are allowed",
          minlength: " **Your phone number must consist 10 Digits",
          maxlength: " **Phone number only 10 Digits",
        },
        
        // gender: {
        //   required: " **Select gender button",
        // },
        // image_file: {
        //   required: " **Please Select Image ",
        //   extension: "Only image type jpg/png/jpeg/gif is allowed",

        // },
        title : { 
          maxlength: "**Please Only type  50 characters Title ",
        },
        body : { 
          maxlength: "**Please Only type  200 characters ",
        },

        'products[product_title]':{
          required: " **Please enter Title Product",
             minlength: " **Your Title must consist 20 character",
             maxlength: " **Your Title only consist 30 character",
          },
   
          'products[product_description]':{
           required: " **Please enter Product Descripation",
           minlength: " **Your Descripation must consist 200 character ",
           maxlength: " **Your Descripation must only 200 character ",
   
          },
          'products[images]':{
           required: " **Please enter Product Image",
   
          },
   
          'products[product_tags]':{
           required: " **Please enter Product Tag",
             minlength: " **Your tag tag must 12 character",
             maxlength: " **Your Title only consist 30 character",
   
          }
   


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