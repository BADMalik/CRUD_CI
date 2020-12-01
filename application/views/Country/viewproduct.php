
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
<!-- <title><?php echo $product->name;?></title> -->
</head>
<body style="padding:50px 20px;">
    <div class="container">
        <h2>Title</h2>
        <p><?php echo $props[0]->name;?></p>
        <h4>Description</h4>
        <p><?php echo $props[0]->description;?></p>
        
        <h4>Price</h4>
        <p><?php echo $props[0]->price;?>$</p>
        
        <h4>Example</h4>
        <img src="<?php echo $props[0]->image;?>" height="300" width="300">
            
    </div>
    <a href="/allproducts">Go Back</a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>