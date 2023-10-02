<?php
include 'include/head.php';
/*$sql = "SELECT Payment.Id,company.CompanyName,Payment.Amount,Payment.CreditDate,Payment.Creditby,Payment.Remark FROM Payment
            INNER JOIN company ON Payment.CompanyId = company.Id
            order by CreditDate asc";*/

/*$sqlas = "  SELECT
            Payment.CompanyId,sum(Payment.Amount) AS totalcrtAmount
            FROM Payment
            GROUP BY Payment.CompanyId
            order by Payment.CompanyId asc";*/

/*$sqlas = "  SELECT
            sellorder.CompanyId,SUM(sellorder.TotalAmount) AS subtotalAmount
            FROM sellorder
            GROUP BY sellorder.CompanyId
            order by sellorder.CompanyId asc";*/

/*
$sqlas = "  
            SELECT company.Id,company.CompanyName,
                   SUM(sellorder.TotalAmount) AS totalAmount
                   
            FROM company
                    LEFT JOIN sellorder ON company.Id = sellorder.CompanyId
                    
            GROUP BY company.Id
        ";


$sqlas = "  
            SELECT
            C.Id,C.CompanyName,
            SUM(S.TotalAmount) AS totalAmount,
            SUM(P.Amount) AS totalcrtAmountw
            FROM company C
                    JOIN Payment P
                        ON C.Id = P.CompanyId
                    JOIN sellorder S 
                        ON P.CompanyId = S.CompanyId
                    
            GROUP BY C.Id
            order by C.Id asc
        ";
*/
$sql = "  
            SELECT
            company.Id,company.CompanyName,
            SUM(sellorder.TotalAmount) AS totalAmount,
            SUM(Payment.Amount) AS totalcrtAmount
            FROM company
                    LEFT JOIN sellorder 
                    ON company.Id = sellorder.CompanyId  AND 
                    LEFT JOIN Payment 
                    ON company.Id = Payment.CompanyId    
            GROUP BY company.Id
            order by company.Id asc
        ";


//$result = $conn->query($sql);

//$SQL = "SELECT SUM(TotalAmount) AS totalAmount FROM sellorder where CompanyId = 10";



/*$sqlas = "SELECT
            Payment.Id,Payment.CompanyId,sum(Payment.Amount) AS totalcrtAmount
            FROM Payment
            INNER JOIN company ON Payment.CompanyId = company.Id
            GROUP BY Payment.CompanyId
            order by Payment.CompanyId asc";*/     /*sum(sellorder.TotalAmount) AS totalAmount,*/

/*$sqlas = "  SELECT
            Payment.CompanyId,sum(Payment.Amount) AS totalcrtAmount
            FROM ((Payment
            INNER JOIN company ON Payment.CompanyId = company.Id)
            INNER JOIN sellorder ON Payment.CompanyId = sellorder.CompanyId)
            GROUP BY Payment.CompanyId,sellorder.CompanyId
            order by Payment.CompanyId asc";

$resultAS = $conn->query($sqlas);*/

//print_r($result->fetch_assoc()); exit();
/*while ($row = $resultAS->fetch_assoc()){
    print_r($row); echo "<br>";
} exit()*/;

/*
$sql = "
            SELECT
            company.Id,company.CompanyName,
            SUM(sellorder.TotalAmount) AS totalAmount
            FROM company
                    LEFT JOIN sellorder 
                    ON company.Id = sellorder.CompanyId  
            GROUP BY company.Id
            order by totalAmount DESC
        ";
*/

/*
$sql = "
            SELECT
            company.Id,company.CompanyName,
            SUM(sellorder.TotalAmount) AS totalAmount,
            SUM(Payment.Amount) AS totalcrtAmount,
            SUM(sellorder.TotalAmount)-SUM(Payment.Amount) As pendingAmount
            FROM company
                    LEFT JOIN sellorder 
                    ON company.Id = sellorder.CompanyId
                    LEFT JOIN Payment 
                    ON company.Id = Payment.CompanyId    
            GROUP BY company.Id
            order by totalAmount DESC
        ";
/*
$sql = "
            SELECT
            company.Id,company.CompanyName,
            SUM(sellorder.TotalAmount) OVER (PARTITION BY YEAR (sellorder.TotalAmount)) AS totalAmount,
            SUM(Payment.Amount) OVER (PARTITION BY YEAR (Payment.Amount)) AS Payment.Amount,
            SUM(sellorder.TotalAmount)-SUM(Payment.Amount) As pendingAmount 
            FROM company
                    LEFT JOIN sellorder 
                    ON company.Id = sellorder.CompanyId
                    LEFT JOIN Payment 
                    ON company.Id = Payment.CompanyId    
            order by totalAmount DESC
        ";
*/

/*$sql = "
            SELECT
            company.Id,company.CompanyName,
            SUM(sellorder.TotalAmount) AS totalAmount,
            SUM(Payment.Amount) AS totalcrtAmount
            FROM company
                    LEFT JOIN sellorder
                    ON company.Id = sellorder.CompanyId  AND 
                    LEFT JOIN Payment 
                    ON company.Id = Payment.CompanyId    
            GROUP BY company.Id
            order by company.Id asc
        ";*/



/*$sql = "SELECT Id,CompanyName FROM company WHERE Status='Enable'";*/

$sql = "
        SELECT
            company.Id,company.CompanyName,
            SUM(sellorder.TotalAmount) AS totalAmount,
            SUM(Payment.Amount) AS totalcrtAmount,
            SUM(sellorder.TotalAmount)-SUM(Payment.Amount) As pendingAmount 
            FROM company
                    LEFT JOIN sellorder ON company.Id = sellorder.CompanyId
                    LEFT JOIN Payment 
                    ON company.Id = Payment.CompanyId
                    GROUP BY company.Id
           			order by totalAmount DESC
";
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
        <table class="tbl-sell">
            <tr>
                <th>No</th>
                <th>Company Name</th>
                <th>Total Amount</th>
                <th>Credit Amount</th>
                <th>Pending Amount</th>
                <th>View Account</th>
            </tr>
            <?php  if($result->num_rows > 0 ){ $i = 1;
                while ($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td style="font-weight: bold; "><?= $row['CompanyName'] ?></td>
                        <td style="font-weight: bold;color: #1F618D;"><?= !empty($row['totalAmount']) ? moneyFormatIndia($row['totalAmount']) : '-' ?></td>
                        <td style="font-weight: bold;color: #229954;"><?= !empty($row['totalcrtAmount']) ? moneyFormatIndia($row['totalcrtAmount']) : '-' ?></td>
                        <td style="font-weight: bold;color: #B03A2E;"><?= !empty($row['pendingAmount']) ? moneyFormatIndia($row['pendingAmount']) : '-' ?></td>
                        <td><a href="account.php?Id=<?= $row['Id']?>" class="tbl-control-btn blue"><i class="fa fa-eye"></i>View</a></td>
                    </tr>
                    <?php $i++; }} ?>
        </table>
    </div>
</div>
</body>
</html>