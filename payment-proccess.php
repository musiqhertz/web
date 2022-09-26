<?php
require('connect.php');
$data = [ 
'user_id' => '1',
'payment_id' => $_POST['razorpay_payment_id'],
'amount' => $_POST['totalAmount'],
'product_id' => $_POST['product_id'],
];
// you can write your database insertation code here
// after successfully insert transaction in database, pass the response accordingly
$query="insert into payment (id,user_id,razorpay_id,amount,status) values('','".$_POST['product_id']."','".$_POST['razorpay_payment_id']."','".$_POST['totalAmount']."','1')";
mysqli_query($connect,$query);

$arr = array('msg' => 'Payment successfully credited', 'status' => true);  
echo json_encode($arr);
?>