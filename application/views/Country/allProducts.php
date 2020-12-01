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
<title>Products</title>
</head>
<body>
<?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-success" role="alert">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            
                                    <p><?php echo $this->session->flashdata('success'); ?></p>
                                    </div>
                                    
                    <?php } ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>Name</td>
                
                <td>Description</td>
                
                <td>Price</td>
                
                <td>Representation</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product):?>
                <tr class="products">
                    <td ><?= $product->name;?></td>
                    <td ><?= $product->price;?></td>
                    <td ><?= $product->description;?></td>
                    <td><img height="150" width="150" src="<?=$product->image;?>"></td>
                    <td>
                        
                        <button data-id=<?= $product->id;?> data-price=<?= $product->price;?>
                                class="btn btn-primary">Add To Cart
                        </button>
                        <input type="number" style="width:50px;" max="99" class="quantity" min="0">
                        
                    </td>
                    <td><a href="/viewproduct/<?php echo $product->id; ?>">Edit</a></td>
                </tr>    
            <?php endforeach; ?>

        </tbody>
    </table>
    <a href="/insertProduct">Insert Product</a>
    <a href="/checkout">Proceed To Checkout</a>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<script>
    var quantity=
$(document).ready(function()
{              
            var button;
            var id ;
            var price ;
            var quantity;
         
    $('.products').on('click','button',function()
    {
        
        quantity = $(this).closest('tr').find('input').val();
        if
        (     
                quantity==null || 
                quantity<=0 ||
                quantity==undefined        
        )
        {
            alert('false');
        }
        else
        {   price= $(this).data('price');
            id =$(this).data('id');
            quantity = $(this).closest('tr').find('input').val();
            button = $(this).closest('tr').find('button');
            price = price * quantity;
            alert(price);
            $.ajax
            (
                {
                    method:'post',
                    url:'updatecart',
                    data:
                    {
                        'id':id,
                        'quantity':quantity,
                        'price':price
                    },
                    success:function(data)
                    {
                        
                        button.html('Items added Successfully').addClass('btn-success');
                        
                    }
                }
            );
        }
    });
})

</script>