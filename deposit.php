<?php
include 'login.php';
$AMOUNT=filter_input(INPUT_POST, 'amount');
$ACCOUNT_NO = filter_input(INPUT_POST, 'accountno');
    if($success=="Successful"){
        $sql = "UPDATE Customer SET AMOUNT = AMOUNT+$AMOUNT WHERE ACCOUNT_NO = $ACCOUNTNO;";
        if ($conn->query($sql)){
            $sql = "select * from customer where account_no='$ACCOUNT_NO' and password='$PASSWORD' ";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            while($result=(mysqli_fetch_assoc($data)))
            {
            echo "Dear ".$result['USER_NAME']." , your account balance is " .$result['AMOUNT']."after deposit of  $AMOUNT";
            header('refresh:7; url=main.html');
        header('refresh:3; url=main.html');
       
        }}}
        else{
        echo "Error: ". $sql ."
        ". $conn->error;
        header('refresh:4; url=main.html');
        }
        $conn->close();
        
        ?>