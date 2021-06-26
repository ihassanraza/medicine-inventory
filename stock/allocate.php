<div class="mims-main-screen">
    <div id="allocate">
        <h1 class="mt-4">Allocate</h1>
        <form class="mt-4" action="" method="post">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="medicine">Medicine</label>
                        <input type="text" class="form-control" id="medicine">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="expiryStatus">Expiry Status</label>
                        <select class="form-control" id="expiryStatus">
                            <option value="notexpired">Not Expired</option>
                            <option value="expired">Expired</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="batch">Batch</label>
                        <select class="form-control" id="batch">
                            <option value="notexpired"></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="to">To</label>
                        <input type="text" class="form-control" id="to">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" id="remarks">
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
