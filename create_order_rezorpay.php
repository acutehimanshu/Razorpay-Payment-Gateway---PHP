<?php

/*
Step One for Rezorpay payment Gateway
* @requirement
*	Input
		->Amount
		->Currency
		->Unique order if

	output
		Unique Order id which will use in creating the payment Gateway

*/

public function razorpay_curl_order($amount = '100', $order_id = 'default123', $currency = 'INR')
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"amount\":\"" . $amount . "\",\"currency\":\"" . $currency . "\",\"receipt\":\"" . $order_id . "\",\"payment_capture\":1}");
    curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_sGLCntHTYbHG1i:XXE4AyU8msLNwcS2nZLWA7Hy'); // Its id you have to place your id here 

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = json_decode(curl_exec($ch) , true);
    if (curl_errno($ch))
    {
        $result = array(
            'status' => false,
            'data' => curl_error($ch)
        );
    }
    curl_close($ch);
    return $result;
}

