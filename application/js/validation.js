// $(document).ready(function()
// {
    
//     // alert($("#country").val());
//     $(".error").css("display", "none");
//     $("#name").on("blur", function(){
//         // if($(this).value)
//         // $("#name_error").text($(this).val());
//         if(validator.isAlpha( ( $(this).val())))
//         {
//             $("#name_error").text(" ");
//             $("#name_error").css("display", "none");
            
//         }
//         else
//         {
//             // $("name_error").text="";
//             $("#name_error").css("display", "block");
//             $("#name_error").text("Please enter a valid name ");
//         }
//     });
//     $("#email").on("blur", function(){
//         // if($(this).value)
//         // $("#name_error").text($(this).val());
//         if(validator.isEmail( ( $(this).val())))
//         {
//             $("#email_error").text(" ");
//             $("#email_error").css("display", "none");
            
//         }
//         else
//         {
//             $("#email_error").css("display", "block");
//             // $("email_error").text="";
//             $("#email_error").text("Please enter a valid email ");
//         }
//     });
//     $("#username").on("blur", function(){
//         // if($(this).value)
//         // $("#name_error").text($(this).val());
//         if(validator.isAlphanumeric( ( $(this).val())))
//         {
//             $("#username_error").text(" ");
//             $("#username_error").css("display", "none");
//         }
//         else
//         {
//             $("#username_error").css("display", "block");
//             // $("username_error").text="";
//             $("#username_error").text("Please enter a valid username ");
//         }
//     });
//     $("#cell_no").on("blur", function(){
//         // if($(this).value)
//         // $("#name_error").text($(this).val());
//         var phoneno = /^\d{14}$/;
//         if( $(this).val().match(phoneno))
//         {
//             $("#cell_no_error").text(" ");
            
//             $("#cell_no_error").css("display", "none");
//         }
//         else
//         {
//             $("#cell_no_error").css("display", "block");
//             // $("cell_no_error").text="";
//             $("#cell_no_error").text("Please enter a valid 14 digit cell no  ");
//         }
//     });
// });
