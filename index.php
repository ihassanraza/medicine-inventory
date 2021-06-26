<?php
session_start();
if (!$_SESSION['mims']) {
	header('Location: login.php');
}
include 'header.php';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$link = "https";
else
$link = "http";
$link .= "://";
$link .= $_SERVER['HTTP_HOST'];
$link .= $_SERVER['REQUEST_URI'];
$current_url =  $link;
$home_url = 'http://localhost/medicine-inventory/';
if( !empty( $home_url ) && ( $home_url == $current_url ) ) {
    $dashboard_active = 'class="active"';
} else {
    $dashboard_active = 'class=""';
}
if( isset( $_GET['stock'] ) ) {
    $stock = $_GET['stock'];
}
if( !empty( $stock ) && ( $stock == 'stock-aknowledgment' || $stock == 'upcoming-exp' || $stock == 'stock-report' || $stock == 'stock-in' || $stock == 'allocate' ) ) {
    if( $stock == 'stock-aknowledgment' ) {
        $rstock_active = 'class="active"';
    }
    elseif( $stock == 'upcoming-exp' ) {
        $upexp_active = 'class="active"';
    }
    elseif( $stock == 'stock-report' ) {
        $streport_active = 'class="active"';
    }
    elseif( $stock == 'stock-in' ) {
        $stockin_active = 'class="active"';
    }
    elseif( $stock == 'allocate' ) {
        $allocate_active = 'class="active"';
    }
}
?>
<body>
    <div class="dashboard-overlay"></div>
    <div class="mims-dashbaord-wrapper">
        <div class="mims-dashboard-sidebar">
            <button type="button" class="dashboard-menu-button"><span class="fa fa-align-justify"></span></button>
            <div class="brand-logo"><a href="#"><h5>Ghulam Ghous & Son's</h5></a></div>
            <ul>
                <li <?php if( !empty($dashboard_active) ) echo $dashboard_active; ?> ><a href="<?php echo $home_url; ?>"><span class="fa fa-dashboard"></span>Dashboard</a></li>
                <li <?php if( !empty($rstock_active) ) echo $rstock_active; ?> ><a href="<?php echo '?stock=stock-aknowledgment'; ?>"><span class="fa fa-check-square-o"></span>Receive Stock</a></li>
                <li <?php if( !empty($upexp_active) ) echo $upexp_active; ?> ><a href="<?php echo '?stock=upcoming-exp'; ?>"><span class="fa fa-warning"></span>Upcoming Expiry</a></li>
                <li <?php if( !empty($streport_active) ) echo $streport_active; ?> ><a href="<?php echo '?stock=stock-report'; ?>"><span class="fa fa-medkit"></span>Stock Report</a></li>
                <li <?php if( !empty($stockin_active) ) echo $stockin_active; ?> ><a href="<?php echo '?stock=stock-in'; ?>"><span class="fa fa-plus"></span>Stock In</a></li>
                <li <?php if( !empty($allocate_active) ) echo $allocate_active; ?> ><a href="<?php echo '?stock=allocate'; ?>"><span class="fa fa-minus"></span>Allocate</a></li>
                <li><a href="logout.php"><span class="fa fa-sign-in"></span>Log Out</a></li>
            </ul>
        </div>
        <div class="mims-dashboard-container">
            <div class="dahsboard-top-header">
                <h2><?php echo $_SESSION['mims']?></h2>
            </div>
            <?php
            if( isset( $stock ) && !empty( $stock )  ) {
                require_once 'stock/'.$stock.'.php';
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>