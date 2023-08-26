<?php
$ACCOUNTNO = filter_input(INPUT_POST, 'accountno');
$username = filter_input(INPUT_POST, 'username');
$PASSWORD = filter_input(INPUT_POST, 'password');
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
    $sql = "select * from customer where account_no='$ACCOUNTNO' and password='$PASSWORD' ";
    if ($conn->query($sql)){
        $result=mysqli_query($conn,$sql);
        $COUNT=mysqli_num_rows($result);        
        if($COUNT>0){
            $success="Successful";
        }
        else{
            echo "login unsuccessful";
        }

    }
    else{
    echo "Error: ". $sql ."
    ". $conn->error;
    header('refresh:4; url=main.html');
    }
    // $conn->close();
    }
    
    }
    else{
        echo "Password should not be empty";
        die();
        }
    }
    ?>