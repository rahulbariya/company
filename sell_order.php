<?php include 'include/head.php';


$sql = "SELECT sellorder.Id,sellorder.CompanyId,company.CompanyName,sellorder.ChallanDate,sellorder.ChallanNo,sellorder.TruckNo,
        sellorder.BillDate,sellorder.BillNo,sellorder.ProductId,product.ProductName,sellorder.Nos,sellorder.Collar,sellorder.Meter 
        FROM ((sellorder
        INNER JOIN company ON sellorder.CompanyId = company.Id)
        INNER JOIN product ON sellorder.ProductId = product.Id)
        ORDER BY Id desc";

$result = $conn->query($sql);


//print_r($result->fetch_assoc()); exit();




?>
<body>
<div class="dash-main">
    <?php include 'include/left.php'; ?>

    <div class="dash-top">
        <h1><?php echo $toptitle; ?></h1>
    </div>
    <div class="dash-right">
        <h1 class="dash-title">Sell Orders</h1>
        <div class="dash-head">
            <a href="add_order.php" class="control-btn right"><i class="fa fa-user-plus"></i>Add Order</a>
        </div>
        <table class="tbl-sell">
            <tr>
                <th>No</th>
                <th>Company Name</th>
                <th>Challan Date</th>
                <th>Challan No</th>
                <th>Truck No</th>
                <th>Bill Date</th>
                <th>Bill No</th>
                <th>Size</th>
                <th>Nos</th>
                <th>Collar</th>
                <th>Meter</th>
                <th>Edit</th>
            </tr>
            <?php if ($result->num_rows > 0){ $i=1;
            while ($row = $result->fetch_assoc()){  ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td> <?php echo $row['CompanyName'];?> </td>
                <td> <?=  myDate($row['ChallanDate']); ?> </td>
                <td> <?php echo $row['ChallanNo'];?> </td>
                <td> <?php echo $row['TruckNo'];?> </td>
                <td> <?= myDate($row['BillDate']); ?> </td>
                <td> <?php if (empty($row['BillNo'])){ echo '-';} else{echo $row['BillNo'];} ?> </td>
                <td> <?php echo $row['ProductName'];?> </td>
                <td style="font-weight: bold"> <?php echo $row['Nos'];?> </td>
                <td> <?php echo $row['Collar'];?> </td>
                <td> <?php echo $row['Meter'];?> </td>
                <td><a href="edit_order.php?id=<?= $row['Id'] ?>&page=ord" class="tbl-control-btn green"><i class="fa fa-edit"></i></a></td>
            </tr>
            <?php  $i++; }} ?>
        </table>
    </div>
</div>
</body>
</html>
