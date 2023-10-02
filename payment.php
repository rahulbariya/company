<?php
    include 'include/head.php';
    $sql = "SELECT Payment.Id,company.CompanyName,Payment.Amount,Payment.CreditDate,Payment.Creditby,Payment.Remark FROM Payment 
            INNER JOIN company ON Payment.CompanyId = company.Id
            order by CreditDate asc";
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
        <div class="dash-head">
            <a href="add_payment.php" class="control-btn right"><i class="fa fa-user-plus"></i>Add Payment</a>
        </div>
        <table class="tbl-sell">
            <tr>
                <th>No</th>
                <th>Company Name</th>
                <th>Credit Amount</th>
                <th>Credit Date</th>
                <th>Credit By</th>
                <th>Remark</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php  if($result->num_rows > 0 ){ $i = 1;
                    while ($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['CompanyName']; ?></td>
                <td style="font-weight: bold;color: #196F3D;"><?php echo moneyFormatIndia($row['Amount']) ?></td>
                <td><?php echo date_format(date_create($row['CreditDate']),"d-m-y");?></td>
                <td><?php echo $row['Creditby'] ?></td>
                <td><?php echo $row['Remark'] ?></td>
                <td><a href="add_payment.php?Id=<?php echo $row['Id']; ?>" class="tbl-control-btn green"><i class="fa fa-edit"></i>Edit</a></td>
                <td><a href="#" class="tbl-control-btn red"><i class="fa fa-trash"></i>delete</a></td>
            </tr>
            <?php  $i++; }} ?>
        </table>
    </div>
</div>
</body>
</html>