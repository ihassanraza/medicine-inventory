<?php
include 'db/connection.php';
// User Id
$user_id = $_SESSION['id'];
$id_query = "select * from user where id = ".$user_id;
$query = mysqli_query( $conn, $id_query ) or die("Id not fetch");
$fetch = mysqli_fetch_array( $query );
$fetch_id = $fetch['id'];
// check stock report
$check_specfic_rows = '';
if( isset($_POST['allocatesubmit']) && !empty($_POST['SMedicineName']) ) {
    $medicine_name = $_POST['SMedicineName'];
    $specfic_data = "select * from stock_in where user_id = '$fetch_id' AND medicine = '$medicine_name'";
    $check_specfic_query = mysqli_query( $conn, $specfic_data ) or die("Not Selected");
    $check_specfic_rows = mysqli_num_rows( $check_specfic_query );
    // get remaing data
    $remaining_data = "select * from allocate where user_id = '$fetch_id' AND medicine = '$medicine_name'";
    $remaining_query = mysqli_query( $conn, $remaining_data ) or die("Not Selected");
    $remaing_rows = mysqli_num_rows( $remaining_query );
}
?>
<div class="mims-main-screen">
    <div id="stock-reporting">
        <h1 class="mt-4">Stock Report</h1>
        <pre>Note : * Required Information!</pre>
        <form class="mt-4" action="" method="post">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="SMedicineName">Medicine <span class="text-danger">*</span></label>
                        <input type="text" name="SMedicineName" class="form-control" id="SMedicineName" placeholder="Search Medicine">
                    </div>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="form-group mt-2">
                        <label for="submit"></label>
                        <input type="submit" class="form-control btn btn-success" name="allocatesubmit" id="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
        <?php
        if( $check_specfic_rows > 0  ) {
            ?>
            <div class="responsive-table">
                <table id="data-tables" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Stock Id</th>
                            <th>Medicine</th>
                            <th>Distributor</th>
                            <th>Manufacturer</th>
                            <th>Manufacturing Date</th>
                            <th>Expiry Date</th>
                            <th>Remaining Stock</th>
                            <th>Entered Stock</th>
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
                                <td><?php echo $fetch_specfic_data['manufacturing_date']; ?></td>
                                <td><?php echo $fetch_specfic_data['expiry_date']; ?></td>
                                <td><?php echo $fetch_specfic_data['quantity']; ?></td>
                                <?php
                                if( $remaing_rows > 0 ) {
                                    while( $fetch_remaining_data = mysqli_fetch_array( $remaining_query ) ) {
                                        ?>
                                        <td><?php echo $fetch_remaining_data['quantity'] + $fetch_specfic_data['quantity']; ?></td>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                    <td><?php echo $fetch_specfic_data['quantity']; ?></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Stock Id</th>
                            <th>Medicine</th>
                            <th>Distributor</th>
                            <th>Manufacturer</th>
                            <th>Manufacturing Date</th>
                            <th>Expiry Date</th>
                            <th>Remaining Stock</th>
                            <th>Entered Stock</th>
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
                            <th>Remaining Stock</th>
                            <th>Entered Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Remaining Stock</th>
                            <th>Entered Stock</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <?php
        }
        ?>
    </div>
</div>
