<?php

include 'include/head.php';

$id = $_SESSION['Id'];
$sql = "SELECT * FROM register where Id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$id = $row['Id'];
$FirstName = $row['Firstname'];
$LastName = $row['Lastname'];
$Email = $row['Email'];
$Mobile = $row['Contact'];
//$Password = $row['Password'];

if (isset($_POST['submit'])) {
    $FirstName = ucwords(trim($_POST['firstname']));
    $LastName = ucwords(trim($_POST['lastname']));
    $Email = strtolower(trim($_POST['email']));
    $mobile = ucwords(trim($_POST['mobile']));

    $id=$_SESSION['Id'];
    $sql = "UPDATE register SET Firstname = '$FirstName',Lastname = '$LastName',Email = '$Email',Contact='$mobile' where Id = '$id'";
    $result = $conn->query($sql);



if(!empty($_FILES["file"]["name"]))
{

    echo "Hello"; exit();
    if ($_FILES['file']['error'] > 0) {
        echo 'Error during uploading, try again';
    }
    $extsAllowed = array('jpg', 'jpeg', 'png', 'gif');
    $extUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
    if (in_array($extUpload, $extsAllowed)) {
        $target_dir = "upload_img/";
        $name = $target_dir . basename($_FILES["file"]["name"]);
        $result = move_uploaded_file($_FILES['file']['tmp_name'], $name);
    }

}



    if(!empty($_POST['old_password'])){
        $sql = "SELECT Password FROM register where Id='$id'";
        $result = $conn->query($sql);
        $prev_password = $result->fetch_row();
        $old_Password = trim($_POST['old_password']);
        $new_Password = trim($_POST['new_password']);

        if($prev_password[0] == $old_Password)
        {
            $sql = "UPDATE register SET Password ='$new_Password' where Id = '$id'";
            $result = $conn->query($sql);
        }
    }
    if ($result == true){
        header('location:edit_profle.php');
    }
}



?>
<body>
<div class="dash-main">
    <?php include 'include/left.php'; ?>
    <div class="dash-top">
        <h1><?= $toptitle; ?></h1>
    </div>
    <div class="dash-right">
        <h1 class="dash-title">Edit Profile</h1>

        <div class="dash-contain-wapper">
            <div class="edit-prof">
                <img src="upload_img/rahul_prof.jpg" alt="Avatar" class="avatar" height="150" width="150">
                <input type="file" name="file" class="prof-upld" id="img" accept="image/*">
            </div>
            <div class="edit-name">
                <form name="edit_profile" id="edit_profile" method="post" action="#">
                    <div class="reg-fname">
                        <label>Firstname :</label>
                        <input type="text" name="firstname" placeholder="Firstname" value="<?= $FirstName ?>">
                    </div>
                    <div class="reg-lname">
                        <label>Lastname :</label>
                        <input type="text" name="lastname" placeholder="Lastname" value="<?= $LastName ?>">
                    </div>
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email" value="<?= $Email ?>">
                    <label>Mobile</label>
                    <input type="text" name="mobile" placeholder="Mobile" value="<?= $Mobile ?>">
                    <p class="pass-change">Change your account Password</p>
                    <label>Old Password</label>
                    <input type="password" name="old_password" placeholder="Enter Old Password">
                    <label>Enter New Password</label>
                    <input type="password" name="new_password" placeholder="Enter New Password">
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" placeholder="Enter Confim Password">
                    <input type="submit" name="submit" value="Update" class="btn btn-small">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

