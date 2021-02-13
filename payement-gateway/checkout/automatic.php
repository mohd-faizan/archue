<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->
 <html>
  <head>
    <title>Lead payment</title>
    <style>
      form{
        position: relative;
        width: 500px;
        margin: 0 auto;
        margin-top: 2rem;
      }
      .razorpay-payment-button {
        border: 1px solid #eee;
    padding: 10px 25px;
    background: #fa8a11;
    color: #000;
    cursor: pointer;
    transition: 0.1s all linear;
    position: absolute;
    z-index: 1;
    bottom: 11px;
    right: 7px;
      }
      .user-details {
            margin-top: 2rem;
            box-shadow: 0 0 10px #555;
            margin: 0 auto;
            position: relative;
          }
          .user-details .body{
            padding: 20px;
            color: #555;
        }
        .user-details .header {
          background: #fa8a11;
          text-align: center;
          padding: 10px;
          color: white;
        }
        .user-details .header h2{
          margin: 0;
        }
        .cancel-button{
          background: #fff;
          padding: 9px 25px;
    color: #fff;
    text-decoration: none;
    position: absolute;
    right: 123px;
    background: #555;
    bottom: 11px;
}
        }
       
    </style>
  </head>
  <body>
<form action="verify.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>

  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
  <div class="user-details">
      <div class="header">
        <h2>Archue</h2>
      </div>
      <div class="body">
      <h3>Name: <?php echo $data['name']?></h3>
      <h3>Lead Cost: <?php echo $data['amount'] / 100?></h3>
      <h3>Email: <?php echo $data['prefill']['email']?></h3>
      <h3>Contact Number: <?php echo $data['prefill']['contact'];?></h3>
      <h3>Lead Description: <?php echo $data['description'];?></h3>
      <br><br>
      <a class="cancel-button" href="/leads">Cancel</a>
      </div>
  </div>
</form>
</body>