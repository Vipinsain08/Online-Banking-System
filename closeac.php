<?php
include 'login.php';
    if($success=="Successful"){
        $sql = "DELETE FROM CUSTOMER WHERE ACCOUNT_NO=$ACCOUNTNO";
        if ($conn->query($sql)){
        echo "Account have been succesfully closed";
        header('refresh:4; url=main.html');
       
        }
        else{
        echo "Error: ". $sql ."
        ". $conn->error;
        header('refresh:4; url=main.html');
        }
        $conn->close();
        
        }
        
        
        ?>