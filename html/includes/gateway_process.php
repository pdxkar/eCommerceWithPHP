<?php 
//The gateway_process.php file is in Chapter 10 pages 296-7.
//Define the access URL
if($live){
	define ('GATEWAY_API_URL','https://secure.authorize.net/gateway/transact.dll');
	
}else{
	define ('GATEWAY_API_URL','https://test.authorize.net/gateway/trasact.dll');
}
//Define your authorize.net merchant information
$data['x_login']='75sqQ96qHEP8';
$data['x_tran_key']='7r83Sb4HUd58Tz5p';
//Define the Advanced Integration Method values
$data['x_version']='3.1';
$data['x_delim_data']='TRUE';
$data['x_delim_char']='|';
$data['x_relay_response']='FALSE';
//Indicate the transaction method.
//A method value of CC means this is a credit card transaction.  An alternative is ECHECK.
$data['x_method']='CC';
//Add the order information:
$data['x_amount']=$order_total;
$data['x_invoice_num']=$order_id;
$data['x_cust_id']=$customer_id;
//Convert the data to a series of name=value pairs
//Using a foreach loop, each element in $data will be turned into the format name=value.
//Each value is URL-encoded, to make it safe to use in a request, and each name=value pair is 
//separated by an apersand.  The final ampersand is chopped off as a last step.
$post_string = '';
foreach($data as $k => $v){
	$post_string .="$k=" .urlencode($v)."&";
}
$post_string = rtrim($post_string, '& ');
//set up the cURL request
$request = curl_init(GATEWAY_API_URL);
curl_setopt($request, CURLOPT_HEADER,0);
curl_setopt($request, RETURNTRANSFER,1);
curl_setopt($request, POSTFIELDS,$post_string);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER,FALSE);
//execute the cURL request
$response = curl_exec($request);
curl_close($request);
//convert the response into an array
$response_array=explode($data["x_delim_char"],$post_response);