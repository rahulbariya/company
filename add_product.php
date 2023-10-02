<?php
include 'include/head.php';

$productNameErr=$productAmountErr=$errExist='';


if(!empty($_GET['Id'])){
    $pagetitle = "Edit Product";
    $Id = $_GET['Id'];
    $sql = "SELECT * FROM product
            where Id = '$Id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $productNameErr = $row['ProductName'];
    $productAmountErr = $row['ProductAmount'];
}

if(isset($_POST['submit'])){
    $productName = trim($_POST['productName']);
    $productAmount = trim($_POST['productAmount']);

    $sqlAvailable = "SELECT Id,ProductName FROM product where ProductName = '$productName'";
    $result = $conn->query($sqlAvailable);
    $rowAvailable = $result->fetch_assoc();
    if($rowAvailable['ProductName'] > 0){
        $Id = $_POST['Id'];
        if ($_POST['submit'] == 'Update'){
            if($rowAvailable['ProductName'] == $productName && $rowAvailable['Id'] !== $Id){
                header('location:add_product.php?Err=exist');
            }
            else{
                $sql = "UPDATE product SET ProductName='$productName',ProductAmount='$productAmount' WHERE Id=$Id";
                $result = $conn->query($sql);
                if($result == true){
                    header('location:product.php');
                }
            }
        }
        else{
            header('location:add_product.php?Err=exist');
            //$errExist = "Product Already Exist";

        }
    }
    else{
        $sql = "INSERT INTO product VALUES (NULL,'$productName','$productAmount','Enable')";
        $result = $conn->query($sql);
        if($result == true){
            header('location:product.php');
        }
    }
}

?>
<body>
<div class="dash-main">
    <?php include 'include/left.php'; ?>
    <div class="dash-top">
        <h1><?= $toptitle ?></h1>
    </div>
    <div class="dash-right">
        <h1 class="dash-title"><?php echo $pagetitle; ?></h1>
        <div class="dash-head">
            <a href="product.php" class="control-btn left"><i class="fa fa-reply"></i>Back</a>
        </div>
        <div class="dash-contain-wapper">

            <div class="edit-name order">

                <form name="add-product" method="post" action="#" id="add_product">
                    <?php if(!empty($_GET['Err'])){ ?>
                        <div class="form-field">
                            <label class="form-label"></label>
                            <p class="errserver">Product Already Exist<a href="#" class="errbtn" id="btn-close"><i class="fa fa-close"></i></a> </p>
                        </div>
                    <?php } ?>

                    <div class="form-field">
                        <label class="form-label">Product Name :</label>
                        <input type="text" name="productName" placeholder="Product Name" class="form-input" value="<?= $productNameErr ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Product Amount :</label>
                        <input type="text" name="productAmount" placeholder="Product Amount" class="form-input" value="<?= $productAmountErr ?>">
                    </div>
                    <div class="form-field">
                        <label class="form-label"></label>
                        <?php if(!empty($_GET['Id'])){  ?>
                            <input type="submit" name="submit" value="Update" class="btn btn-small form-input">
                            <input type="hidden" value="<?= $_GET['Id']; ?>" name="Id">
                        <?php } else{  ?>
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