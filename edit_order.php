<?php
include 'include/head.php';
$errcompanyName=$errownerName=$errcompanyAdd='';
$companyName=$ownerName=$companyAdd='';

$sqlCompany = "SELECT Id,CompanyName FROM company ORDER BY Id asc";
$selectCompany = $conn->query($sqlCompany);
$sqlProduct = "SELECT Id,ProductName FROM product ORDER BY Id asc";
$selectProduct = $conn->query($sqlProduct);

        $id = $_GET['id'];
        $sql = "SELECT sellorder.*, 
                company.CompanyName,
                product.ProductName
                FROM ((sellorder
                INNER JOIN company ON sellorder.CompanyId = company.Id)
                INNER JOIN product ON sellorder.ProductId = product.Id)
                where sellorder.Id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $companyId = trim($_POST['company']);
    $challanDate = myDateIn(trim($_POST['challanDate']));
    $challanNo = trim($_POST['challanNo']);
    $truckNo = strtoupper(trim($_POST['truckNo']));
    $billDate = myDateIn(trim($_POST['billDate']));
    $billNo = trim($_POST['billNo']);
    $ProductId = trim($_POST['size']);
    $nos = trim($_POST['nos']);
    $collar = trim($_POST['collar']);
    $meter = trim($_POST['meter']);


    if(!empty($_GET['N'])){
        $rate = trim($_POST['rate']);
        $amount = trim($_POST['amount']);
        $gst = trim($_POST['gst']);
        $TotalAmount = trim($_POST['TotalAmount']);


        $sql = "UPDATE sellOrder
            SET CompanyId='$companyId',ChallanDate='$challanDate',ChallanNo='$challanNo',TruckNo='$truckNo',BillDate='$billDate',
            BillNo='$billNo',ProductId='$ProductId',Nos='$nos',Collar='$collar',Meter='$meter',
            Rate='$rate',Total='$amount',GST='$gst',TotalAmount='$TotalAmount'
            WHERE  Id = $id";

            $result = $conn->query($sql);
            if ($result == true){
                header("location:account.php?Id=". $companyId ."");
            }
    }
    else{
        $sql = "UPDATE sellOrder
            SET CompanyId='$companyId',ChallanDate='$challanDate',ChallanNo='$challanNo',TruckNo='$truckNo',BillDate='$billDate',
            BillNo='$billNo',ProductId='$ProductId',Nos='$nos',Collar='$collar',Meter='$meter'
            WHERE  Id = $id";

            $result = $conn->query($sql);
            if ($result == true){
                header('location:sell_order.php');
            }
    }

    
    /*if ($result == true){
        if(!empty($_GET['N'])){
            header("location:account.php?Id=". $id ."");
        }else{
            header('location:sell_order.php');
        }
    }*/
}
?>
<body>
<div class="dash-main">
    <?php include 'include/left.php'; ?>
    <div class="dash-top">
        <h1><?php echo $toptitle; ?></h1>
    </div>
    <div class="dash-right">
        <h1 class="dash-title">Edit Order</h1>
        <div class="dash-head">
            <a href="<?= !empty($_GET['N']) ? 'account.php?Id='.$_GET['cmpId'] .'' : 'sell_order.php' ?> " class="control-btn left"><i class="fa fa-reply"></i>Back</a>
        </div>
        <div class="dash-contain-wapper">
            <div class="edit-name order">
                <form name="add_order" method="post" action="#" id="add_order" enctype=”multipart/form-data”>
                    <div class="form-field">
                        <label class="form-label">Select Company :</label>
                        <div class="select">
                            <select class="slct" id="company" name="company" <?=!empty($_GET['N'])?'readonly':'';?>>
                                <option value="">Company</option>
                                <?php foreach ($selectCompany as $key => $value){ ?>
                                    <option value="<?php echo $value['Id'];?>"<?php if($row['CompanyId'] == $value['Id']){echo "selected";}?>><?= $value['CompanyName'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Challan Date :</label>
                        <input type="text" id="challanDate" name="challanDate" placeholder="Challan Date" class="form-input" value="<?php echo $row['ChallanDate']; ?>" <?=!empty($_GET['N'])?'readonly':'';?>>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Challan No :</label>
                        <input type="text" name="challanNo" placeholder="Challan No" class="form-input" value="<?php echo $row['ChallanNo']; ?>" <?=!empty($_GET['N'])?'readonly':'';?>>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Truck No :</label>
                        <input type="text" name="truckNo" placeholder="Truck No" class="form-input" style="text-transform:uppercase" value="<?php echo $row['TruckNo']; ?>" <?=!empty($_GET['N'])?'readonly':'';?>>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Bill Date :</label>
                        <input type="text" id="billDate" name="billDate" placeholder="Bill Date" class="form-input" value="<?php echo date_format(date_create($row['BillDate']),'d-m-yy'); ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Bill No :</label>
                        <input type="text" name="billNo" placeholder="Bill No" class="form-input" value="<?php echo $row['BillNo']; ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Select Size :</label>
                        <div class="select">
                            <select class="slct" name="size" id="size" <?=!empty($_GET['N'])?'readonly':'';?>>
                                <option value="">Size</option>
                                <?php foreach ($selectProduct as $key => $value){ ?>
                                    <option value="<?php echo $value['Id'];?>"<?php if($row['ProductId'] == $value['Id']){echo "selected";}?>><?= $value['ProductName'] ?></option>
                               <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Nos :</label>
                        <input type="text" name="nos" id="nos" placeholder="Nos" class="form-input" value="<?= $row['Nos']; ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Collar :</label>
                        <input type="text" name="collar" placeholder="Collar" class="form-input" value="<?= $row['Collar']; ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Meter :</label>
                        <input type="text" name="meter" id="meterInput" placeholder="Meter" class="form-input" readonly value="<?= $row['Meter']; ?>">
                    </div>
                    <?php if(!empty($_GET['N'])){  ?>
                        <div class="form-field">
                            <label class="form-label">Rate :</label>
                            <input type="text" name="rate" id="rate" placeholder="Rate" class="form-input" value="<?= $row['Rate']?>">
                        </div>
                        <div class="form-field">
                            <label class="form-label">Amount :</label>
                            <input type="text" name="amount" id="amount" placeholder="Amount" class="form-input" value="<?= $row['Total']?>">
                        </div>
                        <div class="form-field">
                            <label class="form-label">GST18% :</label>
                            <input type="text" name="gst" id="gst" placeholder="GST" class="form-input" value="<?= $row['GST']?>">
                        </div>
                        <div class="form-field">
                            <label class="form-label">Total Amount :</label>
                            <input type="text" name="TotalAmount" id="TotalAmount" placeholder="Total Amount" class="form-input" value="<?= $row['TotalAmount']?>">
                        </div>
                   <?php } ?>
                    <div class="form-field">
                        <label class="form-label"></label>
                        <input type="submit" name="submit" value="Update" class="btn btn-small form-input" id="btn-add-order">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>