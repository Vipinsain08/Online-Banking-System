<?php
include 'login.php';
$AMOUNT=filter_input(INPUT_POST,'amount');
    if($success=="Successful"){
        $sql = "UPDATE Customer SET AMOUNT = AMOUNT-$AMOUNT WHERE ACCOUNT_NO = $ACCOUNTNO;";
        if ($conn->query($sql)){
        echo "New record is inserted sucessfully";
        header('refresh:3; url=main.html');
       
        }
        else{
        echo "Error: ". $sql ."". $conn->error;
        header('refresh:4; url=main.html');
        }
        $conn->close();
        }
        ?>