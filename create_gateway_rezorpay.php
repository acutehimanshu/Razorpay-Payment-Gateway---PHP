<?php

// Include the Order creation function
include('create_order_rezorpay.php');

// Call the function and get the order if
$res = razorpay_curl_order('100', 'default123', 'INR');
// Whatever response you will get from CURl you have to use Below

?>

<!DOCTYPE html>
<html>

<head>
    <title>Rezorpay Payment Gateway</title>
</head>

<body>
    <!-- Click here for Payment -->
    <button id="rzp-button1">
        <p>Pay with Razorpay</p>

        <!-- Script for caling the payment Gatewat -->
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var options = {
                "key": "rzp_live_sGLCntHTYbHG1i",
                "amount": "1500",    //  = INR 1
                "currency": "INR", //  = INR 1
                "name": "name Of User", // you can put User Name here
                "description": "Payment for Poktor", // Any Description
                "image": "https://cdn.razorpay.com/logos/7K3b6d18wHwKzL_medium.png", // logo URL must be https
                "order_id": "<?php echo $res['id']; ?>", // 
                "handler": function(response) {
                    alert(response.razorpay_payment_id);
                    alert(response);
                    console.log(response);
                },
                "prefill": {
                    "name": "name",
                    "email": "email",
                    "contact": "contact",
                },
                "notes": {
                    "address": "Address"
                },
                "theme": {
                    "color": "#6A59CE"
                }
            };
            var rzp1 = new Razorpay(options);
            document.getElementById("rzp-button1").onclick = function(e) {
                rzp1.open();
                e.preventDefault();
            }
        </script>
</body>

</html>