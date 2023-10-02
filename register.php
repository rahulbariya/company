<?php

session_start();
if(!empty($_SESSION['Id']) && !empty($_SESSION['User']) && !empty($_SESSION['Username']) && !empty($_SESSION['Email'])){
    header('location:dashboard.php');
}

require "include/conn.php";
include "include/validate_function.php";
$errFname=$errLname=$errMobile=$errEmail=$errPass=$errCpass='';
$firstname=$lastname=$email=$mobile='';

if (isset($_POST['submit'])) {
    $errFname = FnameValidation($_POST['firstname']);
    $errLname = LnameValidation($_POST['lastname']);
    $errMobile = mobileValidation($_POST['mobile']);
    $errEmail = emailValidate($_POST['email']);
    $errPass = passValidate($_POST['password']);
    if (!empty($_POST['password']) && strlen($_POST['password']) > 4) {
         $errCpass = cpassValidate($_POST['password'], $_POST['confirm_password']);
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    /*$email = $email_slug = $_POST['email'];
    $password = $_POST['password'];*/

    if ($errFname == '' && $errLname == '' && $errMobile == '' && $errEmail == '' && $errPass == '' && $errCpass == '') {

        $sql = "INSERT INTO register VALUES (null,'$firstname','$lastname','$email','$password','$mobile','')";
        $result = $conn->query($sql);

        if ($result == true){
            header('location:login.php?q=true');
        }
    }

}
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="/my_project/css/style.css?v=2.1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto:400,700&display=swap" rel="stylesheet">

    <script src="/my_project/js/jquery-3.4.1.min.js"></script>
    <script src="/my_project/js/jquery.validate.min.js"></script>
    <script src="/my_project/js/validate_init.js?v=1.5"></script>
    <script src="/my_project/js/dropdown_box.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--------------------------------Jquery library----------------------------------------->
    <!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>-->
</head>
<body>
<section clas="main-wrapper">
    <div class="login-page register-page">
        <div class="outer-wrapper">
            <div class="inner-wrapper">
                <div class="login-box">
                    <div class="login-head">
                        <h1>Register</h1>
                    </div>
                    <div class="login-contain">
                        <form action="#" method="post" id="register_form">
                            <div class="reg-fname">
                                <input type="text" name="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>">
                                <?php if(!empty($errFname)){ ?><span class="server-err"><?php echo $errFname; ?></span><?php } ?>
                            </div>
                            <div class="reg-lname">
                                <input type="text" name="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>">
                                <?php if(!empty($errLname)){ ?><span class="server-err"><?php echo $errLname; ?></span><?php } ?>
                            </div>
                            <input type="text" name="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>">
                            <?php if(!empty($errMobile)){ ?><span class="server-err"><?php echo $errMobile; ?></span><?php } ?>

                            <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
                            <?php if(!empty($errEmail)){ ?><span class="server-err"><?php echo $errEmail; ?></span><?php } ?>

                            <input type="password" name="password" placeholder="Password">
                            <?php if(!empty($errPass)){ ?><span class="server-err"><?php echo $errPass; ?></span><?php } ?>

                            <input type="password" name="confirm_password" placeholder="Confim Password">
                            <?php if(!empty($errCpass)){ ?><span class="server-err"><?php echo $errCpass; ?></span><?php } ?>

                            <input type="submit" name="submit" value="Register" class="btn">
                        </form>
                        <span class="frg-link"><a href="login.php">Login</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
