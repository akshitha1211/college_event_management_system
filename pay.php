<?php
include_once 'classes/db1.php';
if(isset($_GET)){
    $id = $_GET['id'];
    $usn = $_GET['usn'];
}
$query_rid="SELECT rid from registered WHERE event_id=$id AND usn=$usn";
$res=mysqli_query($conn,$query_rid);
if ($res->num_rows > 0) {
    $amt = $res->fetch_assoc();
    $rid=$amt['rid'];
    echo 'rid:' . $rid;
}
$query="SELECT event_price from events WHERE event_id=$id";
$result=mysqli_query($conn,$query);
if ($result->num_rows > 0) {
    $amt = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>cems</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body style="background-repeat: no-repeat;">
<div class="container">
<div class="row">
<div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Payment</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>USN</label>
                            <input type="text" class="form-control" name="billing_usn" id="billing_usn" placeholder="Enter USN" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="billing_name" id="billing_name" placeholder="Enter name" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="billing_email" id="billing_email" placeholder="Enter email" required="">
                        </div>
                        
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="billing_mobile" id="billing_mobile" placeholder="Enter mobile number" required="">
                        </div>
                        
                         <div class="form-group">
                            <label>Payment Amount</label>
                            <input type="text" class="form-control" name="payAmount" id="payAmount" value="<?php echo $amt['event_price']; ?>" placeholder="Enter Amount" required="" autofocus="">
                        </div>
						
	<!-- submit button -->
	<button  id="PayNow" class="btn btn-success btn-lg btn-block" >Submit & Pay</button>
                       
                    </div>
                </div>
            </div>
</div>
</div>

<script>
    //Pay Amount
    jQuery(document).ready(function($){

jQuery('#PayNow').click(function(e){
	var paymentOption='';
    let billing_usn = $('#billing_usn').val();
let billing_name = $('#billing_name').val();
	let billing_mobile = $('#billing_mobile').val();
	let billing_email = $('#billing_email').val();
  var shipping_name = $('#billing_name').val();
	var shipping_mobile = $('#billing_mobile').val();
	var shipping_email = $('#billing_email').val();
var paymentOption= "netbanking";
var payAmount = $('#payAmount').val();
var eventid = <?php echo json_encode($id); ?>;
			
var request_url="submitpayment.php";
		var formData = {
            billing_usn:billing_usn,
			billing_name:billing_name,
			billing_mobile:billing_mobile,
			billing_email:billing_email,
			shipping_name:shipping_name,
			shipping_mobile:shipping_mobile,
			shipping_email:shipping_email,
			paymentOption:paymentOption,
			payAmount:payAmount,
			action:'payOrder'
		}
		
		$.ajax({
			type: 'POST',
			url:request_url,
			data:formData,
			dataType: 'json',
			encode:true,
		}).done(function(data){
		
		if(data.res=='success'){
				var orderID=data.order_number;
				var orderNumber=data.order_number;
				var options = {
    "key": data.razorpay_key, // Enter the Key ID generated from the Dashboard
    "amount": data.userData.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "EVEPLANNER", //your business name
    "description": data.userData.description,
    "image": "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.creativefabrica.com%2Fproduct%2Fevent-planning-icon-2%2F&psig=AOvVaw0WoANYD-9umtDpWGtI3KyD&ust=1711469312730000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCKD3opXmj4UDFQAAAAAdAAAAABAF",
    "order_id": data.userData.rpay_order_id, //This is a sample Order ID. Pass 
    "handler": function (response){
        var rid = <?php echo $rid; ?>;

    window.location.replace("payment-success.php?oid="+orderID+"&rp_payment_id="+response.razorpay_payment_id+"&rp_signature="+response.razorpay_signature+"&rid="+rid);
    
    

    },
    "modal": {
    "ondismiss": function(){
         window.location.replace("payment-success.php?oid="+orderID);
     }
},
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": data.userData.name, //your customer's name
        "email": data.userData.email,
        "contact": data.userData.mobile //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "EVEPLANNER"
    },
    "config": {
    "display": {
      "blocks": {
        "banks": {
          "name": 'Pay using '+paymentOption,
          "instruments": [
           
            {
                "method": paymentOption
            },
            ],
        },
      },
      "sequence": ['block.banks'],
      "preferences": {
        "show_default_blocks": true,
      },
    },
  },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){

    window.location.replace("payment-failed.php?oid="+orderID+"&reason="+response.error.description+"&paymentid="+response.error.metadata.payment_id);

         });
      rzp1.open();
     e.preventDefault(); 
}
 
});
 });
    });

</script>
<a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>

</body>
</html>
