<?php
    include 'include/head.php';
    $sql = "SELECT * FROM company where Status='Enable' ORDER BY Id asc";
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
            <a href="add_company.php" class="control-btn right"><i class="fa fa-user-plus"></i>Add Company</a>
        </div>
        <table class="tbl-sell tbl-company">
            <tr>
                <th>No</th>
                <th>Company Name</th>
                <th>Owner Name</th>
                <th>Company Address</th>
                <!--<th>Account</th>-->
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php if ($result->num_rows > 0){ $i=1;
            while ($row = $result->fetch_assoc()){  ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class="font-bold"><?php echo ucwords($row['CompanyName']); ?></td>
                    <td><?php echo ucwords($row['OwnerName']); ?></td>
                    <td><?php echo ucwords($row['CompanyAddress']); ?></td>
                    <!--<td><a href="#" class="tbl-control-btn blue"><i class="fa fa-eye"></i>view</a></td>-->
                    <td><a href="add_company.php?id=<?php echo $row['Id'];?>"  class="tbl-control-btn green"><i class="fa fa-pencil-square-o"></i>Edit</a></td>
                    <td><a href="#"  class="tbl-control-btn red"><i class="fa fa-trash"></i>delete</a></td>
                </tr>
            <?php  $i++; }} ?>
        </table>
    </div>
</div>
</body>
</html>