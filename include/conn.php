<?php
        $servername='localhost';
        $username='root';
        $password='';
        $database='my_project';

        $conn=mysqli_connect($servername,$username,$password,$database);
        if($conn->connect_error)
        {
            die("connection Failed" . $conn->connect_errno);
        }
        /*else{
            echo "Connect Successfully";
        }*/
?>
