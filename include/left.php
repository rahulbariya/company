<div class="dash-left">
    <div class="user-profile">
        <span class="dash-user-img"><img src="images/rahul_prof.jpg" alt="Rahul Bariya" border="1"></span>
        <p class="username"><?= $_SESSION['Username'] ?></p>
    </div>
    <div class="dash-list">
        <li><i class="fa fa-dashboard"></i><a <?php if($pagename == 'dashboard.php'){echo 'class="active"';}?> href="dashboard.php">Dashboard</a></li>
        <li> <i class="fa fa-truck"></i><a <?php if($pagename == 'sell_order.php' || $pagename == 'add_order.php' ||
         ($pagename=='edit_order.php' && !empty($_GET['page']))  )
         {echo 'class="active"';}
         ?> href="sell_order.php">Sell Order</a></li>
       
        <li>
            <i class="fa fa-drivers-license-o"></i><a 
            <?php
                if($pagename=='company_accounts.php' || $pagename=='account.php' || 
                ($pagename=='edit_order.php' && !empty($_GET['cmpId'])) )
                    {
                        echo 'class="active"';
                    }
            ?> 
            href="company_accounts.php">Company Account</a>
        </li>
        <!--<li><i class="fa fa-users"></i><a href="#">Lauber</a></li>-->

        <li><i class="fa fa-briefcase"></i><a <?php if($pagename == 'payment.php' || $pagename == 'add_payment.php'){echo 'class="active"';}?> href="payment.php">Credit Payment</a></li>
        <!--<li><i class="fa fa-briefcase"></i><a <?php /*if($pagename == 'add_payment.php'){echo 'class="active"';}*/?> href="add_payment.php">Add Payment</a></li>-->

        <li><i class="fa fa-tags"></i><a <?php if($pagename == 'product.php' || $pagename == 'add_product.php'){echo 'class="active"';}?> href="product.php">Product</a></li>

        <li><i class="fa fa-bank"></i><a <?php if($pagename == 'company.php' || $pagename == 'add_company.php'){echo 'class="active"';}?> href="company.php">Company</a></li>
        <!-- <li><i class="fa fa-book"></i><a <?php /*if($pagename == 'add_company.php'){echo 'class="active"';}*/?> href="add_company.php">Add Company</a></li>-->


        <li><i class="fa fa-user-circle"></i><a <?php if($pagename == 'edit_profle.php'){echo 'class="active"';}?> href="edit_profle.php">Admin Profile</a></li>
        <li><i class="fa fa-user-o"></i><a <?php if($pagename == 'logout.php'){echo 'class="active"';}?> href="logout.php">Logout</a></li>
    </div>
</div>