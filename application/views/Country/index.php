<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
<title>list page</title>
<style>
  .action 
  {
    background-color: #e0e0e0;
    padding: 8px 18px;
    color:red;
    text-decoration: none;
    border: 1px solid black;
    border-radius:5px;
    /* underline: none; */
  }
</style>
</head>
<body>

<table id="dataTable" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone No.</th>
        <th>Country</th>
        <th>City</th>
    </tr>
    </thead>
    <tbody>
      <?php foreach($users as $user) :?>
      <tr>
          <td class="id"><?= $user->id;?></td>
          <td class="name"><?= $user->name;?></td>         
          <td class="username"><?= $user->username;?></td>        
          <td class="email"><?= $user->email;?></td>       
          <td class="cellno"><?= $user->cellno;?></td>     
          <td class="country"><?= $user->country_name;?></td>   
          <td class="city"><?= $user->city_name;?>
          <td>
              <input type="button" class="delete" data-id=<?php echo $user->id;?> value="Delete">
              <a href="/editUser/<?php echo $user->id;?>">Edit</a>
              
          </td>
        
          
      </tr>
      <?php endforeach;?>
    </tbody>
</table>
<div class="container">
<a class="action" href="country">Add New</a>
<a class="action" href="print">Print</a>
<a class="action" href="import">Import Data</a>
</div>
<script>
  
  $('.delete').on('click',function(e) 
{
  
      var id = $(this).data('id');
      var elem = $(this);
    $.ajax
    ({  
            method:"POST",
            url:'/deleteUser',
            dataType:'json',
            data:
            {
              'id':id
            },
            success:function(){
              // alert(data);
              // location.reload();
              
              elem.closest("tr").remove();
              // Moves up from <button> to <td>
                  // .parent();  remove(); 
                  // $(this).parent()             // Moves up from <button> to <td>
                  // .parent().remove();
                  // var row=$(this).closest("tr");
                  // alert(row);
                  // row.remove();  
            }
    });
});
// $('.edit').on('click',function(e)
// {
//   var id =$(this).data('id');
//   // alert($(this).closest('tr'));
//   // var tr =$(this).closest('tr');
//   // var array = 
//   // {
//   //   "id":id,
//   //   "name":tr.find('.name').text(),
//   //   "username":tr.find('.username').text(),
//   //   "email":tr.find('.email').text(),
//   //   "country":tr.find('.country').text(),
//   //   "city":tr.find('.city').text(),
//   //   "cellno":tr.find('.cellno').text(),
//   // };
//     // alert(id);
//   $.ajax
//   ({
//       method:"POST",
//       data:
//       {
//         'id':id
//       },
//       dataType:'json',
//       url:'/editUser/',
//       success:function(data)
//       {
//         window.location='<?php echo base_url();?>editUserPage/'+data.id;
//         // window.location.replace('/edit/'+data.id)‌​;
//         // console.log(data.id);
        
//       }
//   });
// });
</script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
<!-- <script src="<?php echo base_url();?>application/js/js.js"></script> -->
</body>
</html>