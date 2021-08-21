<div class="mims-main-screen">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
    <?php
    include 'db/connection.php';
    $user_id = $_SESSION['id'];
    $id_query = "select * from user where id = ".$user_id;
    $query = mysqli_query( $conn, $id_query ) or die("Id not fetch");
    $fetch = mysqli_fetch_array( $query );
    $fetch_id = $fetch['id'];
    // Data 
    $specfic_data = "select * from stock_in where user_id = ".$fetch_id;
    $check_specfic_query = mysqli_query( $conn, $specfic_data ) or die("Not Selected");
    $check_specfic_rows = mysqli_num_rows( $check_specfic_query );
    // Allocate Submit
    if( isset($_POST['allocatesubmit']) ) {
        $medicine_name = $_POST['medicine'];
        $expiryStatus  = $_POST['expiryStatus'];
        $batch         = $_POST['batch'];
        $quantity      = $_POST['quantity'];
        $to            = $_POST['to'];
        $remarks       = $_POST['remarks'];
        if( !empty( $medicine_name && $expiryStatus && $quantity  ) ) {
            // check medicine quantity against medicine name
            $check_med_quantity = "select * from stock_in where user_id = '$fetch_id' AND medicine = '$medicine_name' AND quantity != 0";
            $check_med_quantity_query = mysqli_query( $conn, $check_med_quantity ) or die("Not Selected");
            $check_quantity_rows = mysqli_num_rows( $check_med_quantity_query );
            $fetch_quantity_data = mysqli_fetch_array( $check_med_quantity_query );
            $med_quantity_id = $fetch_quantity_data['id'];
            $remaining_quantity = $fetch_quantity_data['quantity'] - $quantity;
            if( $quantity > $fetch_quantity_data['quantity'] ) {
                $error_msg = '<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">';
                $error_msg .= '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                $error_msg .= '<div>';
                $error_msg .= '<strong>Enter Correct Quantity.</strong>';
                $error_msg .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                $error_msg .= '</div>';
                $error_msg .= '</div>';
                echo $error_msg;
            }
            else {
                $update_med_quantity = "update stock_in set quantity = '$remaining_quantity' where user_id = '$fetch_id' AND id  = '$med_quantity_id'";
                $update_query = mysqli_query( $conn, $update_med_quantity );
                if( $update_query ) {
                    // insert allocate data to allocate table
                    $insert_allocate = "INSERT INTO allocate ". "(user_id, medicine, expiry_status, batch, quantity, store_to, remarks) "."VALUES ". "('$fetch_id', '$medicine_name', '$expiryStatus', '$batch', '$quantity', '$to', '$remarks')";
                    $alloc_insert_query = mysqli_query( $conn, $insert_allocate );

                    $error_msg = '<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">';
                    $error_msg .= '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#check-circle-fill"/></svg>';
                    $error_msg .= '<div>';
                    $error_msg .= '<strong>Medicine Successfuly Allocated.</strong>';
                    $error_msg .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    $error_msg .= '</div>';
                    $error_msg .= '</div>';
                    echo $error_msg;
                }
                else {
                    $error_msg = '<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">';
                    $error_msg .= '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                    $error_msg .= '<div>';
                    $error_msg .= '<strong>Medicine Allocation Failed!</strong>';
                    $error_msg .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    $error_msg .= '</div>';
                    $error_msg .= '</div>';
                    echo $error_msg;
                }
            }
            if( $remaining_quantity == 0 ) {
                $delete_med = "delete from stock_in where user_id = '$fetch_id' AND id  = '$med_quantity_id' ";
                $delete_query = mysqli_query( $conn, $delete_med );
            }
        }
        else {
            $error_msg = '<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">';
            $error_msg .= '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
            $error_msg .= '<div>';
            $error_msg .= '<strong>Required field must be filled.</strong>';
            $error_msg .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            $error_msg .= '</div>';
            $error_msg .= '</div>';
            echo $error_msg;
        }
    }
    ?>
    <div id="allocate">
        <h1 class="mt-4">Allocate</h1>
        <pre>Note : * Required Information!</pre>
        <form class="mt-4" action="" method="post">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="medicine">Medicine <span class="text-danger">*</span></label>
                        <select class="form-control" name="medicine" id="medicine">
                            <?php
                            while( $fetch_specfic_data = mysqli_fetch_array( $check_specfic_query ) ) {
                                ?>
                                <option value="<?php echo $fetch_specfic_data['medicine']; ?>"><?php echo $fetch_specfic_data['medicine']; ?></option>
                                <?php
                            }
                            ?> 
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="expiryStatus">Expiry Status <span class="text-danger">*</span></label>
                        <select class="form-control" name="expiryStatus" id="expiryStatus">
                            <option value="notexpired">Not Expired</option>
                            <option value="expired">Expired</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="batch">Batch</label>
                        <input type="number" class="form-control" name="batch" id="batch">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="quantity">Quantity <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="quantity" id="quantity">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="to">To</label>
                        <input type="text" class="form-control" name="to" id="to">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" name="remarks" id="remarks">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-2 col-md-2">
                    <input type="submit" class="form-control btn btn-success" name="allocatesubmit" value="Submit">
                </div>
                <div class="col-lg-2 col-md-2">
                    <input type="reset" class="form-control btn btn-outline-danger" name="stockinreset" value="Reset">
                </div>
            </div>
        </form>
    </div>
</div>