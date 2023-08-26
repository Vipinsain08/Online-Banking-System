<?php
$ACCOUNTNO = filter_input(INPUT_POST, 'accountno');
$username = filter_input(INPUT_POST, 'username');
$PASSWORD = filter_input(INPUT_POST, 'password');
$REPASSWORD = filter_input(INPUT_POST, 'repassword');
$ADDRESS = filter_input(INPUT_POST, 'address');
$AMOUNT = filter_input(INPUT_POST, 'amount');
$PHONE = filter_input(INPUT_POST, 'phone');
if (!empty($username)){
if (!empty($PASSWORD)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "BANK";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO customer (user_name, password,address, amount, contact) values ('$username','$PASSWORD','$ADDRESS','$AMOUNT','$PHONE')";
if ($conn->query($sql)){
    // echo "Dear ".$username." , your account have successfully generate with account number " .$ACCOUNTNO;
    $sql1 = "select * from customer where user_name='$username' and password='$PASSWORD' and address='$ADDRESS' ";
         $data=mysqli_query($conn,$sql1);
         $total=mysqli_num_rows($data);
         while($result=(mysqli_fetch_assoc($data)))
         {
         echo "Dear ".$username." , your account have successfully generate with account number " .$result['ACCOUNT_NO'];
         header('refresh:7; url=main.html');
        }}

}}
else{
echo "Error: ". $sql ."
". $conn->error;
header('refresh:4; url=main.html');
}
$conn->close();
}


else{
    echo "Password should not be empty";
    die();
    }

?>