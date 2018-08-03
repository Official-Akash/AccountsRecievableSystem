<!--New user modal-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create a new Customer</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="alerError" class="text-danger text-center"></div>
                </div>
                <div class="row">
                    <div class="col-md-1 col-sm-1 hidden-xs"></div>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="row">
                            <label for="_cust1">Customer Name</label>
                            <input type="text" class="form-control" id="_cust1" name="_cust1" required/>
                        </div>
                        <div class="row">
                            <label for="_cust2">Customer Email</label>
                            <input type="email" class="form-control" id="_cust2" name="_cust2" required/>
                        </div>
                        <div class="row">
                            <label for="_cust3">Customer Contact</label>
                            <input type="text" class="form-control" id="_cust3" name="_cust3" required/>
                        </div>
                        <div class="row">
                            <div class="btn btn-success" id="_custCreate">Create</div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 hidden-xs"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 hidden-sm"></div>
    <div class="col-md-6 col-sm-12 btn btn-primary" data-toggle="modal" data-target="#myModal">Create New User</div>
    <div class="col-md-3 hidden-sm"></div>
    <!--div class="col-md-6 col-sm-6 col-xs-6 btn btn-default" data-toggle="modal" data-target="#delUserModal">Delete User</div-->
</div>

<div class="row well" id="toPrint">
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
    <div class="col-md-8 col-sm-2 col-xs-12">
        <div class="row">
            <div class="col-md-12 btn btn-success btn-block">Buyers Details</div>
        </div>
        <div class="row" style="max-height: 600px; overflow: scroll">
            <div class="table-responsive">
                <table class="table" border="1" id="cust_outs_repo">
                    <tr>
                        <th class="col-md-8 col-sm-8 col-xs-8">Name</th>
                        <th class="col-md-4 col-sm-4 col-xs-4">Amount Debited</th>
                    </tr>
                    <?php
                    $quer = mysqli_query($con,"select * from cust_mer where cust_debit!=0 order by cust_id");
                    $total = 0;
                    while($fetch = mysqli_fetch_array($quer)){
                        $name = $fetch[1];
                        $debit = $fetch[4];
                        $total = $total + $debit;
                        ?>
                        <tr>
                            <td class="col-md-8 col-sm-8 col-xs-8"><?php echo $name ?></td>
                            <td class="col-md-4 col-sm-4 col-xs-4">&#x20B9; <?php echo $debit ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6"></div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <h4><strong>***Subtotal:&nbsp;&nbsp;&#x20B9; <?php echo $total ?></strong></h4>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3"></div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <button class="btn btn-block btn-warning" onclick="gene()">Generate Report</button>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3"></div>
</div>