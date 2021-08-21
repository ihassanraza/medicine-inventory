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
        $check_insert = '';
        if( isset( $_POST['stockinsubmit'] ) ) {
            $packageNo          = $_POST['packageNo'];
            $referenceN0        = $_POST['referenceNumber']; 
            $receivingDate      = $_POST['receivingDate'];
            $physicalInspection = $_POST['physicalInspection'];
            $dtlInspection      = $_POST['dtlInspection'];
            $distributor        = $_POST['distributor'];
            $manufacturer       = $_POST['manufacturer'];
            $batch              = $_POST['batch'];
            $manufacturingDate  = $_POST['manufacturingDate'];
            $expiryDate         = $_POST['expiryDate'];
            $medicine           = $_POST['medicine'];
            $quantity           = $_POST['quantity'];
            if( !empty( $packageNo && $referenceN0 && $receivingDate && $physicalInspection && $dtlInspection && $distributor && $manufacturer && $batch && $manufacturingDate && $expiryDate && $medicine && $quantity ) ) {
                $insrt_query = "INSERT INTO stock_in ". "(user_id,package_no,reference_no,receiving_date,physical_inspecation,dtl_inspecation,distributor,manufacturer,batch,manufacturing_date,expiry_date,medicine,quantity) "."VALUES ". "('$fetch_id','$packageNo','$referenceN0','$receivingDate','$physicalInspection','$dtlInspection','$distributor','$manufacturer','$batch','$manufacturingDate','$expiryDate','$medicine','$quantity')";
                $check_insert = mysqli_query( $conn, $insrt_query );
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
            if( $check_insert ) {
                $error_msg = '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">';
                $error_msg .= '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#check-circle-fill"/></svg>';
                $error_msg .= '<div>';
                $error_msg .= '<strong>Data Inserted Successfuly.</strong>';
                $error_msg .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                $error_msg .= '</div>';
                $error_msg .= '</div>';
                echo $error_msg;
            }
        }
    ?>
    <div id="stock-in">
        <h1 class="mt-4">Add Stock</h1>
        <pre>Note : * Required Information!</pre>
        <form class="mt-4" action="" method="POST">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="packageNo">Package No <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="packageNo" id="packageNo">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="referenceNumber">Reference Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="referenceNumber" id="referenceNumber">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="receivingDate">Receiving Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="receivingDate" id="receivingDate">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="physicalInspection">Physical Inspection <span class="text-danger">*</span></label>
                        <select class="form-control" id="physicalInspection" name="physicalInspection">
                        <option value="na">NA</option>
                        <option value="inprocess">In Process</option>
                        <option value="complted">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="dtlInspection">DTL Inspection <span class="text-danger">*</span></label>
                        <select class="form-control" name="dtlInspection" id="dtlInspection">
                        <option value="na">NA</option>
                        <option value="inprocess">In Process</option>
                        <option value="complted">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="distributor">Distributor <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="distributor" id="distributor">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="manufacturer">Manufacturer <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="manufacturer" id="manufacturer">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="batch">Batch <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="batch" id="batch">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="manufacturingDate">Manufacturing Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="manufacturingDate" id="manufacturingDate">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="expiryDate" id="expiryDate">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="medicine">Medicine <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="medicine" id="medicine">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="quantity">Quantity <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="quantity" id="quantity">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-2 col-md-2">
                    <input type="submit" class="form-control btn btn-success" name="stockinsubmit" value="Save">
                </div>
                <div class="col-lg-2 col-md-2">
                    <input type="reset" class="form-control btn btn-outline-danger" name="stockinreset" value="Reset">
                </div>
            </div>
        </form>
    </div>
</div>