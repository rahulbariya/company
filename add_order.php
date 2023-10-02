<?php
    include 'include/head.php';
    $errcompanyName=$errownerName=$errcompanyAdd='';
    $companyName=$ownerName=$companyAdd='';
    $todayDate = date("d-m-yy");


    $sqlCompany = "SELECT Id,CompanyName FROM company ORDER BY Id asc";
    $selectCompany = $conn->query($sqlCompany);
    $sqlProduct = "SELECT Id,ProductName FROM product ORDER BY Id asc";
    $selectProduct = $conn->query($sqlProduct);

    if (isset($_POST['submit'])) {
        $companyId = trim($_POST['company']);
        $challanDate = trim($_POST['challanDate']);
        $challanNo = trim($_POST['challanNo']);
        $truckNo = strtoupper(trim($_POST['truckNo']));
        $ProductId = trim($_POST['size']);
        $nos = trim($_POST['nos']);
        $collar = trim($_POST['collar']);
        $meter = trim($_POST['meter']);

        $sql = "INSERT INTO sellOrder(Id,CompanyId,ChallanDate,ChallanNo,TruckNo,ProductId,Nos,Collar,Meter) VALUES 
                (NULL,'$companyId','$challanDate','$challanNo','$truckNo','$ProductId','$nos','$collar','$meter')";
            $result = $conn->query($sql);
            if ($result == true){
                header('location:sell_order.php');
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
        <h1 class="dash-title">Add order</h1>
        <!--<ul class="breadcrumb">
            <?/*=  $breadcrumb */?>
        </ul>-->
        <div class="dash-head">
            <a href="sell_order.php" class="control-btn left"><i class="fa fa-reply"></i>Back</a>
        </div>
        <div class="dash-contain-wapper">
            <div class="edit-name order">
                <form name="add_order" method="post" action="#" id="add_order" enctype=”multipart/form-data”>
                    <div class="form-field">
                        <label class="form-label">Select Company :</label>
                        <div class="select">
                            <select class="slct" id="company" name="company">
                                <option value="">Company</option>
                                <?php foreach ($selectCompany as $key => $value){
                                    echo "<option value=".$value['Id'].">".$value['CompanyName']."</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Challan Date :</label>
                        <input type="text" id="challanDate" name="challanDate" placeholder="Challan Date" class="form-input" value="<?php echo $todayDate;?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Challan No :</label>
                        <input type="text" name="challanNo" placeholder="Challan No" class="form-input">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Truck No :</label>
                        <input type="text" name="truckNo" placeholder="Truck No" class="form-input" style="text-transform:uppercase">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Select Size :</label>
                        <div class="select">
                            <select class="slct" name="size" id="size">
                                <option value="">Size</option>
                                <?php foreach ($selectProduct as $key => $value){
                                    echo "<option value=".$value['Id'].">".$value['ProductName']."</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-field">
                        <label class="form-label">Nos :</label>
                        <input type="text" name="nos" id="nos" placeholder="Nos" class="form-input">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Collar :</label>
                        <input type="text" name="collar" placeholder="Collar" class="form-input">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Meter :</label>
                        <input type="text" name="meter" id="meterInput" placeholder="Meter" class="form-input" readonly>
                    </div>
                    <div class="form-field">
                        <label class="form-label"></label>
                        <input type="submit" name="submit" value="Add" class="btn btn-small form-input" id="btn-add-order">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>