<div class="mims-main-screen">
    <div id="stock-reporting">
        <h1 class="mt-4">Stock Report</h1>
        <form class="mt-4" action="" method="post">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="SMedicineName">Medicine</label>
                        <input type="text" class="form-control" id="SMedicineName" placeholder="Search Medicine">
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
    </div>
    <?php include 'footer.php' ?>
</div>
