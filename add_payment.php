<?php
include 'include/head.php';

$CompanyId=$CompanyName=$creditAmount=$creditDate=$creditBy=$remark="";


$sqlCompany = "SELECT Id,CompanyName FROM company ORDER BY Id asc";
$selectCompany = $conn->query($sqlCompany);

if(!empty($_GET['Id'])){
    $pagetitle = "Edit Payment";
    $Id = $_GET['Id'];
    $sql = "SELECT payment.*,company.CompanyName FROM payment
            INNER JOIN company ON payment.CompanyId = company.Id
            where payment.Id = '$Id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $CompanyId = $row['CompanyId'];
    $CompanyName = $row['CompanyName'];
    $creditAmount = $row['Amount'];
    $creditDate = date_format(date_create($row['CreditDate']),"d-m-Y");
    $creditBy = $row['Creditby'];
    $remark = $row['Remark'];
}

if(isset($_POST['submit'])){

    $Id = $_POST['Id'];
    $CompanyId = $_POST['company'];
    $creditAmount = $_POST['creditAmount'];
    $creditDate = date_format(date_create($_POST['creditDate']),"Y-m-d");
    $creditBy = $_POST['creditBy'];
    $remark = ucfirst($_POST['remark']);

    if ($_POST['submit'] == 'Update' ){
        $sql = "UPDATE payment SET CompanyId='$CompanyId',Amount='$creditAmount',CreditDate='$creditDate',Creditby='$creditBy',Remark='$remark' WHERE Id=$Id";
        //echo $sql; exit();
    }
    else{
        $sql = "INSERT INTO payment VALUES (NULL,'$CompanyId','$creditAmount','$creditDate','$creditBy','$remark')";
    }

    $result = $conn->query($sql);

    if($result == true){
        header('location:payment.php');
    }
}


?>
<body>
<div class="dash-main">
    <?php include 'include/left.php'; ?>
    <div class="dash-top">
        <h1><?php echo $toptitle; ?></h1>
    </div>
    <div class="dash-right">
        <h1 class="dash-title"><?php echo $pagetitle; ?></h1>
        <div class="dash-head">
            <a href="payment.php" class="control-btn left"><i class="fa fa-reply"></i>Back</a>
        </div>
        <div class="dash-contain-wapper">
            <div class="edit-name order">
                <form name="add-payment" method="post" action="#" id="add_payment">
                    <div class="form-field">
                        <label class="form-label">Select Company :</label>

                        <div class="select">
                            <select class="slct" id="company" name="company">



                                <?php if (!empty($_GET['Id'])) { ?>
                                    <option value="">Company</option>
                                    <?php foreach ($selectCompany as $key => $value){ ?>

                                        <option  value="<?=$value['Id']?>" <?php if($CompanyId == $value['Id']){echo"selected";} ?> > <?= $value['CompanyName'];?></option>
                                    <?php } ?>

                               <?php } else{   ?>

                                    <option value="">Company</option>
                                    <?php foreach ($selectCompany as $key => $value){
                                        echo "<option value=".$value['Id'].">".$value['CompanyName']."</option>";
                                    } ?>
                               <?php }?>

                            </select>
                        </div>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Credit Amount :</label>
                        <input type="text" name="creditAmount" placeholder="Amount" class="form-input" value="<?php echo $creditAmount; ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Credit Date :</label>
                        <input type="text" name="creditDate" id="creditDate" placeholder="Credit Date" class="form-input" value="<?php echo $creditDate; ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Credit By :</label>
                        <div class="select">
                            <select class="slct" id="creditBy" name="creditBy">
                                <?php if (!empty($_GET['Id'])) { ?>
                                    <option value="">Select</option>
                                    <option value="1" <?php if($creditBy == "Cheque"){echo 'selected';}?> >Cheque</option>
                                    <option value="2" <?php if($creditBy == "Cash"){echo 'selected';}?>>Cash</option>
                                    <option value="3" <?php if($creditBy == "Cheque/Cash"){echo 'selected';}?>>Cheque/Cash</option>
                                <?php } else{ ?>
                                    <option value="">Select</option>
                                    <option value="1">Cheque</option>
                                    <option value="2">Cash</option>
                                    <option value="3">Cash/Cheque</option>
                               <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Remark :</label>
                        <input type="text" name="remark" placeholder="Remark" class="form-input" value="<?php echo $remark; ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label"></label>
                        <?php if(!empty($_GET['Id'])){  ?>
                            <input type="submit" name="submit" value="Update" class="btn btn-small form-input">
                        <?php } else{  ?>
                            <input type="submit" name="submit" value="Add" class="btn btn-small form-input">
                       <?php } ?>
                    </div>
                    <?php if (!empty($_GET['Id'])){ ?>
                        <input type="hidden" value="<?= $_GET['Id']; ?>" name="Id">
                   <?php } ?>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>