<div class="mims-main-screen">
    <div id="stock-in">
        <h1 class="mt-4">Add Stock</h1>
        <form class="mt-4" action="" method="post">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="packageNo">Package No</label>
                        <input type="text" class="form-control" id="packageNo">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="referenceNumber">Reference Number</label>
                        <input type="text" class="form-control" id="referenceNumber">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="receivingDate">Receiving Date</label>
                        <input type="date" class="form-control" id="receivingDate">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="physicalInspection">Physical Inspection</label>
                        <select class="form-control" id="physicalInspection">
                        <option value="na">NA</option>
                        <option value="inprocess">In Process</option>
                        <option value="complted">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="dtlInspection">DTL Inspection</label>
                        <select class="form-control" id="dtlInspection">
                        <option value="na">NA</option>
                        <option value="inprocess">In Process</option>
                        <option value="complted">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="distributor">Distributor</label>
                        <input type="text" class="form-control" id="distributor">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="manufacturer">Manufacturer</label>
                        <input type="text" class="form-control" id="manufacturer">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="batch">Batch</label>
                        <input type="text" class="form-control" id="batch">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="manufacturingDate">Manufacturing Date</label>
                        <input type="date" class="form-control" id="manufacturingDate">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="date" class="form-control" id="expiryDate">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="medicine">Medicine</label>
                        <input type="text" class="form-control" id="Medicine">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity">
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
