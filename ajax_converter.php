<?php
//Get Posted data
$amount = $_POST['amount'];
$from = $_POST['from'];
$to = $_POST['to'];

//make string to be put in API
$string = "1".$from."=?".$to;

//Call Google API
$google_url = "http://www.google.com/ig/calculator?hl=en&q=".$string;

//Get and Store API results into a variable
$result = file_get_contents($google_url);

//Explode result to convert into an array
$result = explode('"', $result);

################################
# Right Hand Side
################################
$converted_amount = explode(' ', $result[3]);
$conversion = $converted_amount[0];
$conversion = $conversion * $amount;
$conversion = round($conversion, 2);

//Get text for converted currency
$rhs_text = ucwords(str_replace($converted_amount[0],"",$result[3]));

//Make right hand side string
$rhs = $conversion.$rhs_text;

################################
# Left Hand Side
################################
$google_lhs = explode(' ', $result[1]);
$from_amount = $google_lhs[0];

//Get text for converted from currency
$from_text = ucwords(str_replace($from_amount,"",$result[1]));

//Make left hand side string
$lhs = $amount." ".$from_text;

################################
# Make the result
################################

echo $lhs." = ".$rhs;exit;
?>