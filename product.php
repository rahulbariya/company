<?php
include 'include/head.php';
$sql = "SELECT * FROM product
            order by Id asc";
$result = $conn->query($sql);
?>
<body>
<div class="dash-main">
    <?php include 'include/left.php'; ?>
    <div class="dash-top">
        <h1><?= $toptitle; ?></h1>
    </div>
    <div class="dash-right">
        <h1 class="dash-title"><?php echo $pagetitle; ?></h1>
        <div class="dash-head" style="width: 50%; float: none">
            <a href="add_product.php" class="control-btn right"><i class="fa fa-user-plus"></i>Add Product</a>
        </div>
        <table class="tbl-sell" style="width:50%">
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Product Amount</th>
                <th>Edit Product</th>
                <th>Delete Product</th>
            </tr>
            <?php  if($result->num_rows > 0 ){ $i = 1;
                    while ($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row['ProductName']; ?></td>
                        <td><?= $row['ProductAmount'];  ?></td>
                        <td><a href="add_product.php?Id=<?= $row['Id']?>" class="tbl-control-btn green"><i class="fa fa-edit"></i>Edit</a></td>
                        <td><a href="#" class="tbl-control-btn red"><i class="fa fa-trash"></i>delete</a></td>
                    </tr>
                    <?php $i++; }} ?>
        </table>
    </div>
</div>
</body>
</html>