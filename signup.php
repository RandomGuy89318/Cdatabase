<?php
 require "conn.php";

 if(!empty($_POST['uname']) && !empty($_POST['pword']) && !empty('email')){


    $uname=$_POST['uname'];
    $pword=$_POST['pword'];
    $email=$_POST['email'];

    $sql="Insert Into users (Name,Password,Email) VALUES ('".$uname."','".$pword."','".$email."')";

    if(mysqli_query($conn, $sql)){
        echo "Success";
    }else{
        echo "Fail";
    }
 }else{
    echo "Field Required";
 }
?>