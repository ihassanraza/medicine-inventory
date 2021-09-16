<?php
session_start();
include 'db/connection.php';
$user_id = $_SESSION['id'];
$id_query = "select * from user where id = ".$user_id;
$query = mysqli_query( $conn, $id_query ) or die("Id not fetch");
$fetch = mysqli_fetch_array( $query );
$fetch_id = $fetch['id'];
$stock_data = "select * from stock_in where user_id = '$fetch_id'";
$check_query = mysqli_query( $conn, $stock_data ) or die("Not Selected");
$check_rows = mysqli_num_rows( $check_query );
// One Month Upcoimg Expiary Stock Data
$check_specfic_rows = '';
$one_month_data = "select medicine, quantity from stock_in where user_id = '$fetch_id' AND expiry_date < DATE_ADD(curdate(), INTERVAL 3 MONTH)";
$one_specfic_query = mysqli_query( $conn, $one_month_data ) or die("Not Selected");                       
$data = array();                                               
foreach( $one_specfic_query as $row ) {
    $data[] = $row;
}
print_r(json_encode($data));                        
?>