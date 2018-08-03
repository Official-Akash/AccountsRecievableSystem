<div class="row well">
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
            <div class="col-md-12 btn btn-danger text-center btn-block">DEBIT NOTE</div>
        </div><br>
        <div class="row" style="max-height: 500px; overflow: scroll; margin-right:-30px;">
            <div class="table-responsive">
                <table class="table" border="1">
                    <tr>
                        <th class="col-md-2 col-sm-2 col-xs-2">Invoice Number</th>
                        <th class="col-md-2 col-sm-2 col-xs-2">Invoice Date</th>
                        <th class="col-md-4 col-sm-4 col-xs-4">Invoice To</th>
                        <th class="col-md-2 col-sm-2 col-xs-2">Invoice Amount</th>
                        <th class="col-md-2 col-sm-2 col-xs-2">Due Date</th>
                    </tr>
                    <?php
                    $quer = mysqli_query($con,"select * from invoice_s where status='NO' order by inv_nu");
                    while($fetch = mysqli_fetch_array($quer)){
                        $inv_nu = $fetch[0];
                        $inv_amt = $fetch[2];
                        $inv_file = $fetch[3];
                        $inv_dt = $fetch[4];
                        $inv_to_id = $fetch[1];
                        $getuser = mysqli_fetch_array(mysqli_query($con,"select * from cust_mer where cust_id=$inv_nu"));
                        $inv_username = $getuser[1];
                        $today = date('d-m-Y');
                        $due_date = $fetch[5];
                        if(date('d-m-Y') > date('d-m-Y', strtotime($due_date))){
                            continue;
                        }else {
                            ?>
                            <tr>
                                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $inv_nu ?></td>
                                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $inv_dt ?></td>
                                <td class="col-md-4 col-sm-4 col-xs-4"><?php echo $inv_username ?></td>
                                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $inv_amt ?></td>
                                <td class="col-md-2 col-sm-2 col-xs-2"><?php echo $due_date ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
</div>