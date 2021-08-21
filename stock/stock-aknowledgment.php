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
if( isset($_POST['submit']) && !empty($_POST['SMedicineName']) ) {
    $medicine_name = $_POST['SMedicineName'];
    $specfic_data = "select * from stock_in where user_id = '$fetch_id' AND medicine = '$medicine_name'";
    $check_specfic_query = mysqli_query( $conn, $specfic_data ) or die("Not Selected");
    $check_specfic_rows = mysqli_num_rows( $check_specfic_query );
}
?>
<div class="mims-main-screen">
    <div id="stock-acknowledgment">
        <h1 class="mt-4">Receive Stock</h1>
        <pre>Note : * Required Information!</pre>
            <form class="mt-4" action="" method="POST">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="SMedicineName">Medicine <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="SMedicineName" id="SMedicineName" placeholder="Search Medicine">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group mt-2">
                            <label for="submit"></label>
                            <input type="submit" class="form-control btn btn-success" name="submit" id="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
            <?php
            if( $check_specfic_rows > 0 ) {
                ?>
                <div class="responsive-table">
                    <table id="data-tables" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Stock ID</th>
                                <th>Medicine</th>
                                <th>Distributor</th>
                                <th>Manufacturer</th>
                                <th>Quantity</th>
                                <th>Receiving Date</th>
                                <th>Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while( $fetch_specfic_data = mysqli_fetch_array( $check_specfic_query ) ) {
                            ?>
                            <tr>
                                <td><?php echo $fetch_specfic_data['package_no']; ?></td>
                                <td><?php echo $fetch_specfic_data['medicine']; ?></td>
                                <td><?php echo $fetch_specfic_data['distributor']; ?></td>
                                <td><?php echo $fetch_specfic_data['manufacturer']; ?></td>
                                <td><?php echo $fetch_specfic_data['quantity']; ?></td>
                                <td><?php echo $fetch_specfic_data['receiving_date']; ?></td>
                                <td><?php echo $fetch_specfic_data['expiry_date']; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Stock ID</th>
                                <th>Medicine</th>
                                <th>Distributor</th>
                                <th>Manufacturer</th>
                                <th>Quantity</th>
                                <th>Receiving Date</th>
                                <th>Expiry Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php
            }
            else {
                ?>
                <div class="responsive-table">
                    <table id="data-tables" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Stock ID</th>
                                <th>Medicine</th>
                                <th>Distributor</th>
                                <th>Manufacturer</th>
                                <th>Quantity</th>
                                <th>Receiving Date</th>
                                <th>Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while( $fetch_data = mysqli_fetch_array( $check_query ) ) {
                                ?>
                                <tr>
                                    <td><?php echo $fetch_data['package_no']; ?></td>
                                    <td><?php echo $fetch_data['medicine']; ?></td>
                                    <td><?php echo $fetch_data['distributor']; ?></td>
                                    <td><?php echo $fetch_data['manufacturer']; ?></td>
                                    <td><?php echo $fetch_data['quantity']; ?></td>
                                    <td><?php echo $fetch_data['receiving_date']; ?></td>
                                    <td><?php echo $fetch_data['expiry_date']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Stock ID</th>
                                <th>Medicine</th>
                                <th>Distributor</th>
                                <th>Manufacturer</th>
                                <th>Quantity</th>
                                <th>Receiving Date</th>
                                <th>Expiry Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
</div>