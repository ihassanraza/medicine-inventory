<?php
include 'db/connection.php';
$user_id = $_SESSION['id'];
$id_query = "select * from user where id = ".$user_id;
$query = mysqli_query( $conn, $id_query ) or die("Id not fetch");
$fetch = mysqli_fetch_array( $query );
$fetch_id = $fetch['id'];
$stock_data = "select * from stock_in where user_id = '$fetch_id'";
$check_query = mysqli_query( $conn, $stock_data ) or die("Not Selected");
$check_rows = mysqli_num_rows( $check_query );
// Specfic Stock Data
$check_specfic_rows = '';
$specfic_data = "select * from stock_in where user_id = '$fetch_id' AND expiry_date < DATE_ADD(curdate(), INTERVAL 6 MONTH)";
$check_specfic_query = mysqli_query( $conn, $specfic_data ) or die("Not Selected");
$check_specfic_rows = mysqli_num_rows( $check_specfic_query );
?>
<div class="mims-main-screen">
    <div id="upcoming-exp">
        <h1 class="mt-4">Upcoming Expiry</h1>
            <div class="responsive-table">
                <table id="data-tables" class="table table-striped table-bordered" style="overflow:scroll">
                    <thead>
                        <tr>
                            <th>Stock ID</th>
                            <th>Medicine</th>
                            <th>Quantity</th>
                            <th>Expiry Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if( $check_specfic_rows > 0 ) {
                            while( $fetch_specfic_data = mysqli_fetch_array( $check_specfic_query ) ) {
                                ?>
                                <tr>
                                    <td><?php echo $fetch_specfic_data['package_no']; ?></td>
                                    <td><?php echo $fetch_specfic_data['medicine']; ?></td>
                                    <td><?php echo $fetch_specfic_data['quantity']; ?></td>
                                    <td><?php echo $fetch_specfic_data['expiry_date']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Stock ID</th>
                            <th>Medicine</th>
                            <th>Quantity</th>
                            <th>Expiry Date</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
    </div>
</div>