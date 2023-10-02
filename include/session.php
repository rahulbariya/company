<?php
    session_start();
    //$_SESSION['userId']=1;
    //$_SESSION['username']="Rahul";
    //$_SESSION['userEmail']="rahul@gmail.com";


   // print_r($_SESSION); exit();

    if(empty($_SESSION['Id']) && empty($_SESSION['User']) && empty($_SESSION['Username']) && empty($_SESSION['Email'])){
        header('location:login.php');
    }

        //echo "Hello"; exit();
        //header('location:dashboard.php');

    /*else{
        //echo "<br>login"; exit();
        //header('location:dashboard.php');
        header('location:login.php');

    }*/

/*if(empty($_SESSION)){
    echo "dashboeard"; exit();


    header('location:login.php');
    //header('location:dashboard.php');
}*/

?>
