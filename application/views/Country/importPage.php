<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
<title>Import Data</title>
</head>
<body>
<div class="container box">
  <h3 style="text-align:center;">How to Import CSV Data into Mysql using Codeigniter</h3>
  <br />
  <form method="post" id="import_csv" enctype="multipart/form-data">
        <div class="form-group">
            <label>Select CSV File</label>
            <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
        </div>
        <br />
        <button type="submit" name="import_csv" class="btn btn-info" id="import_button">Import CSV</button>
  </form>
  <br />
  <div id="csv_data"></div>
 </div>
</body>
</html>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<script>
$(document).ready(function()
{
    load_data();
    function load_data()
    {
        $.ajax
        ({
            method:"post",
            url:'loadData',
            success:function(data)
            {
                $('#csv_data').html(data);
            }
        });
    }
});
$("#import_csv").on('submit',function(e)
{
    // alert("hello");
    {
        e.preventDefault();
        $.ajax
        ({
            method:'post',
            url:'importData',
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function()
                {
                    $('#import_button').html('importing');
                },
                success:function(data)
                {
                    $('#import_csv')[0].reset();
                    $('#import_button').attr('disabled', false);
                    $('#import_button').html('Import Done');
                    load_data();
                }
        });
    }
});

</script>