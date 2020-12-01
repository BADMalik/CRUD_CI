<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/css/bootstrap.min.css"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    form {
      border: 3px solid #f1f1f1;
    }

    .error {
      background-color: #F8D7DA;
      color: red;
      padding: 5px;
      border-radius: 3px;
      border: 2px solid red;
      /* margin-top:50px; */

    }

    input[type=text],
    input[type=password],
    input[type=tel],
    input[type=email] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    #login {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }
    .validation_error
    {
      background-color: #F8D7DA;
      color: red;
      padding: 5px;
      border-radius: 3px;
      border: 2px solid red;
    }
    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }

    }
  </style>
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/validator/13.1.17/validator.min.js" type="text/javascript"></script>
  <!-- <script src="application/js/validation   .js" type="text/javascript"></script> -->
  <!-- <script src="application/js/js.js" type="text/javascript"></script> -->

  <div class="container">
    <h2>Edit Form</h2>
    <span id="validation_error" class="validation_error" role="alert">

        </span>
    <form id="myForm" method="post">

      <span class=error></span>
      
    <input type="hidden" value="<?php echo $user->id;?>"  name="id">
      <div class="form-group">

        <label for="name"><b>Name</b>
        </label>
        <input type="text" id="name" placeholder="Enter Name" value="<?php echo $user->name;?>"  name="name">
        <span id="name_error" class="error" role="alert">
        </span>
      </div>
      <div class="form-group">
        <label for="Username"><b>Username</b>
        </label>
        <input type="text" placeholder="Enter Username" id="username" name="username" value="<?php echo $user->username; ?>">
        <span id="username_error" role="alert" class="error">

        </span>
      </div>
      <div class="form-group">
        <label for="cell_no"><b>Cell No</b>
        </label>
        <input type="tel" placeholder="Enter cell no" id="cell_no" value="<?php echo $user->cellno; ?>"name="cell_no">
        <span id="cell_no_error" role="alert" class="error">
        </span>
      </div>
      <div class="form-group">
      <label for="Country"><b>Country</b>
        </label>
                <!-- <select id="country"  name="country" onchange="displayCities()"> -->
                <select id="country"  name="country" onchange="getCity()" class="browser-default custom-select custom-select-lg mb-3">
          <option selected disabled value="<?= $countries[0]->id; ?>"><?=$countries[0]->name;?></option>
          <?php foreach ($countries as $country) : ?>
            <option value="<?= $country->id; ?>"><?= $country->name; ?></option>
          <?php endforeach; ?>
        </select>
      <span id="country_error" role="alert" class="error">

        </span>

      </div>
      <div class="form-group">
      <label for="City"><b>City</b>
        </label>
        <select id="city" name="city" class="browser-default custom-select custom-select-lg mb-3">
        </select>
        <span id="city_error" role="alert" class="error">
        </span>
      </div>
      <input type="button"  id="login" value="Login">
    </form>
  </div>
  </form>
  <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script >
      $(document).ready(function()
{
    $("#validation_error").css("display","none");  
    $(".error").css("display", "none");
    $("#name").on("blur", function(){
        if(validator.isAlpha( ( $(this).val())))
        {
            $("#name_error").text(" ");
            $("#name_error").css("display", "none");
            
        }
        else
        {
            // $("name_error").text="";
            $("#name_error").css("display", "block");
            $("#name_error").text("Please enter a valid name ");
        }
    });
    $("#username").on("blur", function(){
        if(validator.isAlphanumeric( ( $(this).val())))
        {
            $("#username_error").text(" ");
            $("#username_error").css("display", "none");
        }
        else
        {
            $("#username_error").css("display", "block");
            $("#username_error").text("Please enter a valid username ");
        }
    });
    $("#cell_no").on("blur", function(){
        var phoneno = /^\d{14}$/;
        if( $(this).val().match(phoneno))
        {
            $("#cell_no_error").text(" ");
            
            $("#cell_no_error").css("display", "none");
        }
        else
        {
            $("#cell_no_error").css("display", "block");
            // $("cell_no_error").text="";
            $("#cell_no_error").text("Please enter a valid 14 digit cell no  ");
        }
    });
});
  $('#login').on('click', function(e) 
  {
          if(validator.isAlpha( ( $("#name").val())))
          {
              $("#name_error").text(" ");
              $("#name_error").css("display", "none");
            
          }
          else
          {
              // $("name_error").text="";
              $("#name_error").css("display", "block");
              $("#name_error").text("Please enter a valid name");
              $("#name").focus();
              // return false;
          }
        if(validator.isAlphanumeric( ( $("#username").val())))
        {
            $("#username_error").text(" ");
            $("#username_error").css("display", "none");
        }
        else
        {
            $("#username_error").css("display", "block");
            // $("username_error").text="";
            $("#username_error").text("Please enter a valid username ");
            $("#username").focus();
            // return false;
        }
        var phoneno = /^\d{14}$/;
        if( $("#cell_no").val().match(phoneno))
        {
            $("#cell_no_error").text(" ");
            
            $("#cell_no_error").css("display", "none");
        }
        else
        {
            $("#cell_no_error").css("display", "block");
            // $("cell_no_error").text="";
            $("#cell_no_error").text("Please enter a valid 14 digit cell no  ");
            $("#cell_no").focus();
        }
        if($("#country").val()==null)
        {
            $("#country_error").css("display", "block");
            // $("cell_no_error").text="";
            $("#country_error").text("Please select a valid country  ");
            $("#country").focus();
            
        }
        else
        {
            $("#country_error").text(" ");
            
            $("#country_error").css("display", "none");
        }
      
        if($("#city").val()==null)
        {
            $("#city_error").css("display", "block");
            $("#city_error").text("Please select a valid city  ");
            $("#city").focus();
        }
        else
        {
            $("#city_error").text(" ");
            
            $("#city_error").css("display", "none");
          
            form=$("#myForm").serialize();
            $.ajax({
            method: 'POST',
            url: "/userUpdate",
            data: form,
            cache: false,
            success: function(data) 
            {
                  var x=JSON.parse(data);      
                    
                            if(x.redirect)
                            {                        
                            
            
            
                                window.location='<?php echo base_url();?>allusers';                    // window.location.href="<?php echo uri_string();?>";
                            }
                            else
                            {
                                    if(x.username)
                                    {
                                        $("#username_error").css("display","block");
                                        $("#username_error").html("The username is already taken!!");
                                        $("#username").focus();
                                    }
                                    else
                                    {
                                        $("#username_error").html("");
                                        $("#username_error").css("display","none");
                                    }                      
                            }
            }
          });
        }
  });
  var country;
  function getCity()
  {
      country = document.getElementById('country').value;
    $.ajax
      (
          {
              method: "POST",
              url: "/country/get_cities/"+country, // returns "[1,2,3,4,5,6]"
              dataType: 'json',
              data:
              {
                  'countryID':country
              }, 
              success: function (data) 
              {
                  $('#city').html('');
                  // $('#city').append('<option disabled value='+$data[0].id+'>'+$data[0].name+'<option>');
                  $.each(data,function(index,value)
                  {
                          $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                  });
              }
          }
      )
  };
  </script>

</body>

</html>
