
<?php
$ACCOUNT_NO = filter_input(INPUT_POST, 'accountno');
// $username = filter_input(INPUT_POST, 'username');
// $PASSWORD = filter_input(INPUT_POST, 'password');
 include 'login.php'; 
  if($success=="Successful")
    {
        $sql = "select * from customer where account_no='$ACCOUNT_NO' and password='$PASSWORD' ";
         $data=mysqli_query($conn,$sql);
         $total=mysqli_num_rows($data);
         while($result=(mysqli_fetch_assoc($data)))
         {
         echo "Dear ".$result['USER_NAME']." , your account balance is " .$result['AMOUNT'];
         header('refresh:7; url=main.html');
        }}
        else
        {
        echo "no record found";
        echo "Error: ". $sql ." ". $conn->error;
            header('refresh:4; url=main.html');
        }
        $conn->close();

       
   ?>