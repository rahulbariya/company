<?php
include 'include/head.php';

$errcompanyName=$errownerName=$errcompanyAdd='';
$companyName=$ownerName=$companyAdd='';

if (isset($_POST['submit'])) {
    $errcompanyName = alphaValidation($_POST['companyName']);
    $errownerName = alphaValidation($_POST['ownerName']);
    $errcompanyAdd = alphaValidation($_POST['companyAdd']);

    $companyName = ucwords(trim($_POST['companyName']));
    $ownerName = ucwords(trim($_POST['ownerName']));
    $companyAdd = ucwords(trim($_POST['companyAdd']));

  if ($errcompanyName == '' && $errownerName == '' && $errcompanyAdd == '' ) {

        if ($_POST['submit'] == 'Add'){
            $sql = "INSERT INTO company VALUES (null,'$companyName','$ownerName','$companyAdd')";
        }
        elseif ($_POST['submit'] == 'Update'){
            $id = $_GET['id'];
            $sql = "UPDATE company SET CompanyName = '$companyName',OwnerName = '$ownerName',CompanyAddress = '$companyAdd' where Id = '$id'";
        }
        $result = $conn->query($sql);
        if ($result == true){
            header('location:company.php');
        }
    }
}

if (!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql = "SELECT * FROM company where Id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $id = $row['Id'];
    $companyName = $row['CompanyName'];
    $ownerName = $row['OwnerName'];
    $companyAdd = $row['CompanyAddress'];
}
?>
<body>
<div class="dash-main">
    <?php include 'include/left.php'; ?>
    <div class="dash-top">
        <h1><?php echo $toptitle; ?></h1>
    </div>
    <div class="dash-right">
        <h1 class="dash-title">Add Company</h1>
        <div class="dash-head">
            <a href="company.php" class="control-btn left"><i class="fa fa-reply"></i>Back</a>
        </div>
        <div class="dash-contain-wapper">
            <div class="edit-name order">
                <form id="add_company" name="add_company" method="post" action="#">
                    <div class="form-field">
                        <label class="form-label" for="companyName">Company Name :</label>
                        <input type="text" name="companyName" placeholder="Company Name" class="form-input" value="<?php echo $companyName; ?>">
                        <?php if(!empty($errcompanyName)){ ?><span class="server-err"><?php echo $errcompanyName; ?></span><?php } ?>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="ownerName">Owner Name :</label>
                        <input type="text" name="ownerName" placeholder="Owner Name" class="form-input" value="<?php echo $ownerName; ?>">
                        <?php if(!empty($errownerName)){ ?><span class="server-err"><?php echo $errownerName; ?></span><?php } ?>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="companyAdd">Company Address :</label>
                        <input type="text" name="companyAdd" placeholder="Company Address" class="form-input" value="<?php echo $companyAdd; ?>">
                        <?php if(!empty($errcompanyAdd)){ ?><span class="server-err"><?php echo $errcompanyAdd; ?></span><?php } ?>
                    </div>
                    <div class="form-field">
                        <label class="form-label"></label>
                        <?php if (!empty($_GET['id'])){ ?>
                            <input type="submit" name="submit" value="Update" class="btn btn-small form-input">
                        <?php } else{ ?>
                            <input type="submit" name="submit" value="Add" class="btn btn-small form-input">
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>