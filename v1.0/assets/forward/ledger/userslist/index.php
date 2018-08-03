<div class="row" style="margin-left: 0; margin-right: 0;">
    <div class="col-md-1 col-sm-12"></div>
    <div class="col-md-10 col-sm-12">
        <div class="row">
            <div class="col-md-12" style="background-color: #2b542c; color: white; text-align: center; padding: 10px; border-radius: 10px;">
                Ledger
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <label for="userslists">Select Customer Code</label>
                <select name="userslists" id="userslists" class="form-control">
                    <option value="">--------------</option>
                    <?php
                    $select_users = mysqli_query($con,"select * from cust_mer");
                    while($fetch = mysqli_fetch_array($select_users)){
                        $user_code = $fetch[0];
                        ?>
                        <option value="<?php echo $user_code ?>"><?php echo $user_code ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div><br>
        <div class="row well" id="show_ledger"></div>
    </div>
    <div class="col-md-1 col-sm-12"></div>
</div>