<?php

include 'include/head.php';
$Id = $_GET['Id'];
$sqlCname = "SELECT CompanyName FROM Company WHERE Id = $Id";
$CompanyName = $conn->query($sqlCname)->fetch_assoc()['CompanyName'];


/****************************************************************************************************/
/*$sql_CountOrder = "SELECT COUNT(Id) FROM sellorder WHERE CompanyId = $Id";
$CountOrder = $conn->query($sql_CountOrder)->fetch_assoc()["COUNT(Id)"];

$sql_CountPayment = "SELECT COUNT(Id) FROM payment WHERE CompanyId = $Id";
$CountPayment = $conn->query($sql_CountPayment)->fetch_assoc()["COUNT(Id)"];

if($CountOrder > $CountPayment){
    $payrow_len = $CountOrder - $CountPayment;
}else{
    $orderrow_len = $CountPayment - $CountOrder;
}*/

$sql = "SELECT 
            sellorder.ID,sellorder.ChallanNo,sellorder.TotalAmount,   
            payment.CompanyId,payment.Amount
        FROM company
        LEFT JOIN sellorder ON company.Id = sellorder.CompanyId   
        LEFT JOIN payment ON company.Id = payment.CompanyId    
		WHERE company.Id = 10
		GROUP BY  sellorder.ChallanNo
        ";

//     COUNT(payment.Amount)
//

/**/
/*LEFT JOIN payment ON company.Id = payment.CompanyId)*/

/****************************************************************************************************/

$sql = "SELECT sellorder.*,
		company.CompanyName,
		product.ProductName
        FROM ((sellorder
        LEFT JOIN company ON sellorder.CompanyId = company.Id)
        LEFT JOIN product ON sellorder.ProductId = product.Id)
		WHERE sellorder.CompanyId = $Id
        ORDER BY sellorder.Id ASC";
$resultOrder = $conn->query($sql);
//print_r($resultOrder); exit();

/*while ($row = $resultOrder->fetch_assoc()) {
    print_r($row); echo "<br>";
}exit();*/


/*while ($row = $resultAS->fetch_assoc()){
    print_r($row); echo "<br>";
} exit()*/;

$sqlTotal = "SELECT sum(Total) as T1,sum(GST) as T2,sum(TotalAmount) as T3 FROM sellorder WHERE CompanyId = $Id";
$resultTotal = $conn->query($sqlTotal);
$rowTotal = $resultTotal->fetch_assoc();

$sqlPay = "SELECT * FROM payment WHERE CompanyId = $Id ORDER BY CreditDate";
$resultPay = $conn->query($sqlPay);

$sqlTpay = "SELECT sum(Amount) as Totalpay FROM payment WHERE CompanyId = $Id";
$resultTpay = $conn->query($sqlTpay);
$rowTpay = $resultTpay->fetch_assoc();
$totalAmount = $rowTpay['Totalpay'];

?>
<body>
<div class="dash-main">
    <?php include 'include/left.php'; ?>
    <div class="dash-top">
        <h1><?= $toptitle; ?></h1>
    </div>
    <div class="dash-right company-acc">
        <h1 class="dash-title"><?= $CompanyName; ?> Account</h1>
        <div class="dash-head">
            <a href="company_accounts.php" class="control-btn left"><i class="fa fa-reply"></i>Back</a>
        </div>
        <table class="tbl-sell" style="width: 72%">
            <tr>
                <th>Edit</th>
                <th>No</th>
                <th>Challan Date</th>
                <th>Challan No</th>
                <th>Bill Date</th>
                <th>Bill No</th>
                <th>Size</th>
                <th>Nos</th>
                <th style="font-size: 12px;">Collar</th>
                <th>Meter</th>
                <th>Rate</th>
                <th>Total</th>
                <th>GST 18%</th>
                <th>Total Amount</th>
                <!--<th class="pay-head">Credit Amount</th>
                <th class="pay-head">Credit Date</th>
                <th class="pay-head">Credit By</th>-->

            </tr>
            <?php
                if($resultOrder->num_rows > 0){ $i=1;
			    while ($row = $resultOrder->fetch_assoc()) {
			?>
            <tr style="padding: 5px;">
                <td><a href="edit_order.php?id=<?=$row['Id']?>&cmpId=<?=$_GET['Id']?>&N=CA" class="tbl-control-btn green"><i class="fa fa-edit"></i></a></td>
                <td><?= $i; ?></td>
                <td><?=  myDate($row['ChallanDate']);?></td>
                <td><?= $row['ChallanNo'];?></td>
                <td><?= myDate($row['BillDate']) ?></td>
                <td><?= !empty($row['BillNo']) ? $row['BillNo'] : '-'; ?></td>
                <td><?= $row['ProductName'];?></td>
                <td class="font-bold"><?= $row['Nos'];?></td>
                <td><?= $row['Collar'];?></td>
                <td><?= $row['Meter'];?></td>
                <td><?= $row['Rate']==0 ? null : moneyFormatIndia($row['Rate']); ?></td>
                <td><?= $row['Total']==0 ? null : moneyFormatIndia($row['Total']); ?></td>
                <td><?= $row['GST']==0 ? null : moneyFormatIndia($row['GST']); ?></td>
                <td class="font-bold"><?= $row['TotalAmount']==0 ? null : moneyFormatIndia($row['TotalAmount']); ?></td>
                <!--<td class="pay-data color"><?php /*echo 200; */?></td>
                <td class="pay-data"><?php /*echo myDate($row['CreditDate']); */?></td>
                <td class="pay-data"><?php /*echo $row['Creditby']; */?></td>-->
            </tr>
            <?php $i++;} ?>
                <tr style="background-color: #566573">
                    <td colspan="3" class="font-bold" style="color: #FFF">Total</td>
                    <td colspan="8"></td>
                    <td class="font-bold" style="color: #FFF"><?= moneyFormatIndia($rowTotal['T1']) ?></td>
                    <td class="font-bold" style="color: #FFF"><?= moneyFormatIndia($rowTotal['T2']) ?></td>
                    <td class="font-bold" style="color: #FFF"><?= moneyFormatIndia($rowTotal['T3']) ?></td>
                </tr>
            <?php }else { ?>
              <tr><td colspan="14">No result available</td></tr>
            <?php  }?>
        </table>
        <table class="tbl-sell" style="width: 27%">

            <tr class="tbl-pay-data">
                <th>Credit Amount</th>
                <th>Credit Date</th>
                <th>Credit By</th>
            </tr>
            <?php
                if($resultPay->num_rows > 0){ $i=1;
                while ($rowPay = $resultPay->fetch_assoc()) {
             ?>
            <tr class="tbl-pay-data">
                <td class="font-bold"><?= $rowPay['Amount'] ?></td>
                <td><?= myDate($rowPay['CreditDate']) ?></td>
                <td><?= $rowPay['Creditby'] ?></td>
            </tr>
            <?php $i++;} ?>
            <tr class="tbl-pay-data" style="background-color: #566573">
                <td class="font-bold" style="color: #FFF"><?= moneyFormatIndia($totalAmount) ?></td>
                <td colspan="2" class="font-bold" style="color: #FFF">Total</td>
            </tr>
            <?php } else{ ?>
                <td colspan="14">No result available</td>
            <?php    }?>
        </table>
    </div>
</div>
</body>
</html>
