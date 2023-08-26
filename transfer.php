<?php
include 'login.php';
$AMOUNT=filter_input(INPUT_POST, 'amount');
$TACCNO=filter_input(INPUT_POST, 'taccountno');
    if($success=="Successful"){
        $sql = "UPDATE Customer SET AMOUNT = AMOUNT-$AMOUNT WHERE ACCOUNT_NO = $ACCOUNTNO;";
        $sql1 = "UPDATE Customer SET AMOUNT = AMOUNT+$AMOUNT WHERE ACCOUNT_NO = $TACCNO;";

        if ($conn->query($sql)) {if($conn->query($sql1)){
        echo "You have successfully transfered $AMOUNT to $TACCNO";
        header('refresh:3; url=main.html');
       
        }}
        else{
        echo "Error: ". $sql ."". $conn->error;
        header('refresh:4; url=main.html');
        }
        $conn->close();
        }
        
        ?>