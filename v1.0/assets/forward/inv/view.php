<div class="row well">
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
            <div class="col-md-12 btn btn-danger text-center btn-block">View Invoices</div>
        </div><br>
        <div class="row" style="max-height: 500px; overflow: scroll; margin-right:-30px;">
            <div class="table-responsive">
                <table class="table" border="1">
                    <tr>
                        <th class="col-md-2 col-sm-2 col-xs-2">Invoice Number</th>
                        <th class="col-md-2 col-sm-2 col-xs-2">Invoice Date</th>
                        <th class="col-md-6 col-sm-6 col-xs-6">Invoice To</th>
                        <th class="col-md-2 col-sm-2 col-xs-2">Invoice Amount</th>
                    </tr>
                    <?php
                    $quer = mysqli_query($con,"select * from invoice_s order by inv_nu");
                    while($fetch = mysqli_fetch_array($quer)){
                        $inv_nu = $fetch[0];
                        $inv_amt = $fetch[2];
                        $inv_dt = $fetch[4];
                        $inv_to_id = $fetch[1];
                        $getuser = mysqli_fetch_array(mysqli_query($con,"select * from cust_mer where cust_id=$inv_nu"));
                        $inv_username = $getuser[1];
                        ?>
                        <tr>
                            <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $inv_nu ?></td>
                            <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $inv_dt ?></td>
                            <td class="col-md-6 col-sm-6 col-xs-6"><?php echo $inv_username ?></td>
                            <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $inv_amt ?></td>
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