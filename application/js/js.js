var country;
var city =[];

// var url = ''+<?php echo base_url();?>;
function getCity()
{
    country = document.getElementById('country').value;
//     alert(url);
    $.ajax
    (
        {
            method: "POST",
            url: "/country/get_cities/"+country, // returns "[1,2,3,4,5,6]"
            dataType: 'json',
            //how to see input data 
            data:
            {
                'countryID':country
            }, // jQuery will parse the response as JSON
            success: function (data) 
            {
                $('#city').html('');
                // $('#city').append('<option disabled value='+$data[0].id+'>'+$data[0].name+'<option>');
                $.each(data,function(index,value)
                {
                        $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
        //     }
            }
        }
    )
};

