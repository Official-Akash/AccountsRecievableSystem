<!--New product modal-->
<div id="myProModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new product</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="aalerError" class="text-danger text-center"></div>
                </div>
                <div class="row">
                    <div class="col-md-1 col-sm-1 hidden-xs"></div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="row">
                            <label for="_pro1">Product Name</label>
                            <input type="text" class="form-control" id="_pro1" name="_pro1" required/>
                        </div>
                        <div class="row">
                            <label for="_pro2">Product Price</label>
                            <input type="text" class="form-control" id="_pro2" name="_pro2" required/>
                        </div>
                        <div class="row">
                            <label for="_pro3">Product Quantity</label>
                            <input type="text" class="form-control" id="_pro3" name="_pro3" required/>
                        </div>
                        <div class="row">
                            <div class="btn btn-success" id="_proCreate">Create</div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 hidden-xs"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 hidden-sm"></div>
    <div class="col-md-4 col-sm-12 btn btn-warning" data-toggle="modal" data-target="#myProModal">Add New Product</div>
    <div class="col-md-4 hidden-sm"></div>
    <!--<div class="col-md-6 col-sm-6 col-xs-6 btn btn-default" data-toggle="modal" data-target="#myStockModal">Add stock</div>-->
</div>

<div class="row well">
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
            <div class="col-md-12 btn btn-danger text-center btn-block">Products</div>
        </div><br>
        <div class="row">
            <div class="table-responsive">
                <table class="table" border="1">
                    <tr>
                        <th class="col-md-2 col-sm-2 col-xs-2">Product ID</th>
                        <th class="col-md-6 col-sm-6 col-xs-6">Description</th>
                        <th class="col-md-2 col-sm-2 col-xs-2">Cost</th>
                        <th class="col-md-2 col-sm-2 col-xs-2">Stock left</th>
                    </tr>
                    <?php
                    $quer = mysqli_query($con,"select * from product");
                    while($fetch = mysqli_fetch_array($quer)){
                        $id = $fetch[0];
                        $des = $fetch[1];
                        $cost = $fetch[2];
                        $stock = $fetch[3];
                        ?>
                        <tr>
                            <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $id ?></td>
                            <td class="col-md-6 col-sm-6 col-xs-6"><?php echo $des ?></td>
                            <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $cost ?></td>
                            <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $stock ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
</div>