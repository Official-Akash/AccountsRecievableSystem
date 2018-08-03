<div class="row well">
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
            <div class="col-md-12 btn btn-warning text-center btn-block">Add Payment</div>
        </div><br>
        <div class="row text-danger text-center" id="user_inv_err"></div>
        <div class="row" id="upp">
            <label for="user_list">Select User Code:</label>
            <select name="user_list" id="user_list" class="form-control">
                <option value="">---------</option>
                <?php
                $getusers=mysqli_query($con,"select * from cust_mer");
                while($fetch = mysqli_fetch_array($getusers)){
                    ?>
                    <option value="<?php echo $fetch[0] ?>"><?php echo $fetch[0] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div id="inv_list" class="row"></div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12"></div>
</div>