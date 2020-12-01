<?php $total=0;?>
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
<title>checkout</title>
</head>
<body>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

                
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td colspan="3">Name</td>
                
                <td colspan="3">Quantity</td>
                
                <td colspan="3">Price</td>
                
                <td>Total Price</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item):?>
                <tr class="items">
                    <td colspan="3"><?= $item->name;?></td>
                    <td colspan="3"><?= $item->quantity;?></td>
                    <td colspan="3"><?= $item->price;?></td>
                    <td><?= $item->price* $item->quantity;
                            $total+=$item->price* $item->quantity;?></td>
                </tr>    
            <?php endforeach; ?>
               <tr>
                   <td colspan="9">
                   <p>Sub Total</p>
                   </td>
                    
                   <td>
                        <?php echo $total;?>
                    </td>
               </tr> 
        </tbody>
    </table>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal">
  Proceed To payment
</button>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog"  >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" class="align-left" id="modalTitle">Please Enter Payment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
    <form role="form" action="/stripePost" method="post" class="require-validation" 
        data-cc-on-file="false"data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"id="payment-form">
        <div class="modal-body">
                        <div class='form-row row'>
                            <div class='col form-group required'>
                                <label class='control-label'>Name on Card</label> <input required id="card-name"
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col form-group required'>
                                <label class='control-label'>Card Number</label> <input id="card-number"
                                    class='form-control' required size='4' name='card' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-4 form-group required'>
                                
                                <label for="cvc">CVC</label>
                            </div>
                            <div style='margin-bottom:0px;'  class='col-4  form-group required'>
                                <label for="exp-m">Expiration Month</label>    
                            </div>
                        
                        
                            <div class='col-4  form-group required'>
                                <label for="exp-y">Expiration Year</label>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-4 form-group required'>
                                
                                <input class=' form-control' required id="card-cvc" name="card-cvc" size='2' type='text'>
                            </div>
                            <div class='col-4  form-group required'>
                            <input
                                   id="card-mm" class='form-control' required name="card-mm" placeholder="MM" size='3' type='text'>
                            </div>
                            <div class='col-4  form-group required'>
                                <input

                                
                                    class='form-control' required name="card-yy" id="card-yy" placeholder="YYYY"size='3' type='text'>
                            </div>
                        </div>
                </div>
      <div class='form-row row'>
                            <div class='col-md-12 error form-group'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
      <div class="modal-footer">
      
                            <div class="col-xs-12">
                                <input type="hidden" name="total" value="<?php echo $total; ?>">
                                <button class="btn btn-primary btn-lg btn-block submit"  type="submit">Pay Now <?= $total;?> $</button>
                            </div>
                        <!-- </div> -->
      </div>
    </form>
    </div>
  </div>
</div>
<script src="https://js.stripe.com/v2/"></script>
            </body>
</html>
<script>
// function proceed()
// {
//     var form = $('.require-validation');
// alert(form);
// }
$(function() 
{
    // alert("hello");
    
    // var $form = $(".require-validation");
    //  var errorMessage = $form.find('div.error').css('display', 'none');
    //  $errorMessage.removeClass('alert-danger');
    // errorMessage.;
    //  errorMessage.find('.alert').removeClass('alert-danger');
        var $form = $(".require-validation");
        console.log($form);
        var errorMessage = $form.find('div.error').css('display', 'none');
    $('form.require-validation').bind('.submit submit', function(e) 
    {
        // alert("hello");
       
        // var errorMessage = $form.find('div.error').css('display', 'none');
        console.log($form);
        // return false;
            var inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector);
            // console.log($inputs);
            valid         = true;
       
    if (!$form.data('cc-on-file')) 
    {
        
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
     
        Stripe.createToken
        (
                {
                    number: $('#card-number').val(),
                    cvc: $('#card-cvc').val(),
                    exp_month: $('#card-mm').val(),
                    exp_year: $('#card-yy').val()
                },  stripeResponseHandler
        );
    }
    
  });
      
  function stripeResponseHandler(status, response) {
        if (response.error) {
           alert('error');
           return false;
        } else {
            alert('success');
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }

    // console.log($form.data());
    }
     
});

</script>