<?php
session_start();
if(!empty($_SESSION['Id']) && !empty($_SESSION['User']) && !empty($_SESSION['Username']) && !empty($_SESSION['Email'])){
    header('location:dashboard.php');
}

require "include/conn.php";
include "include/validate_function.php";
$errEmail=$errPass=$email_slug="";
$_GET['q']='';

    if (isset($_POST['submit']))
    {
        $errEmail = emailValidate($_POST['email']);
        $errPass = passValidate($_POST['password']);
        $email = $email_slug = $_POST['email'];
        $password = $_POST['password'];

        if ($errEmail == '' && $errPass == '') {
            $sql = "SELECT * FROM register WHERE Email='$email' and Password='$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                session_start();
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['Id'] = $row['Id'];
                    $_SESSION['User'] = ucfirst($row['Firstname']);
                    $_SESSION['Username'] = ucfirst($row['Firstname']) . ' ' . ucfirst($row['Lastname']);
                    $_SESSION['Email'] = $row['Email'];

                    print_r($_SESSION);
                    header('location:dashboard.php');
                }
            }
            else {
                $errPass = "Email or Password Incorrect";
            }
        }
    }
?>

<html>
    <head>
        <title>Login</title>
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
            <div class="login-page">
                <div class="outer-wrapper">
                    <div class="inner-wrapper">
                        <div class="login-box">
                            <div class="login-head">
                                <h1>Login</h1>
                            </div>
                            <div class="login-contain">
                                <?php if ($_GET['q'] == 'true'){?><p style="color: #28B463;font-weight: bold">You are successfully register Login Here</p><?php } ?>
                                <form action="#" method="post" id="login_form" >
                                    <input type="text" name="email" placeholder="Email" value="<?php echo $email_slug; ?>">
                                    <?php if(!empty($errEmail)){ ?><span class="server-err"><?php echo $errEmail; ?></span><?php } ?>
                                    <input type="password" name="password" placeholder="Password">
                                    <?php if(!empty($errPass)){ ?><span class="server-err"><?php echo $errPass; ?></span><?php } ?>
                                    <input type="submit" name="submit" value="Submit" class="btn">
                                </form>
                                <span class="frg-link"><a href="#">Forgot your Password</a> </span>
                            </div>
                        </div>
                        <div class="reg-link">
                            <span class="frg-link"><a href="register.php">Creat new account</a> </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
                                                                                                                                                                                     