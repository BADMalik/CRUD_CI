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
  <h3 style="text-align:center;">Insert Product in the Database</h3>
  <br />
  <form action="insertInDB" method="post" id="image_form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea type="text" name="description" class="form-control" id="description" rows="5"  placeholder="Enter product description"></textarea>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="text" class="form-control" name="price"id="price" placeholder="Enter price">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label>Select Image</label>
            <input type="file" name="file" id="file" required  />
        </div>
        <br />
        <button type="submit"class="btn btn-info" id="upload_button">Upload Image</button>
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