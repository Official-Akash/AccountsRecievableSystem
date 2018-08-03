<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row well">
            <div class="col-md-1 col-sm-12 col-xs-12"></div>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <div class="row">
                    <div id="inv1" class="btn-danger col-md-12">INVOICE</div>
                </div><br>
                <div class="row">
                    <div id="err_invoice" class="text-center text-danger" style="font-size: larger"></div>
                </div><br>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="row">
                            <div class="col-md-6">Customer Id</div>
                            <div class="col-md-6" id="cust_nu" style="background-color: #9acfea; color: black;" contenteditable="true"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4"></div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="row">
                            <div class="col-md-6">Date:</div>
                            <div class="col-md-6" id="inv_date"></div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <table class="table" id="inv_data" border="1" style="text-align: center">
                        <thead>
                            <tr>
                                <th class="col-md-3 col-sm-3 col-xs-3">Item Code</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Quantity</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Price(in Rupees)</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Total(in Rupees)</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div><br>
                <!--<div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3" contenteditable="false" id="_invTotal" style="background-color: black; color:white; height: 30px;">0</div>
                </div><br>-->
                <div class="row">
                    <div class="col-md-7"></div>
                    <button class="col-md-5 btn btn-success" id="_invCreate">Create Invoice</button>
                </div>
                <script>
                    $(function () {
                        var d = new Date();
                        var curr_date = d.getDate();
                        var curr_month = d.getMonth() + 1;
                        var curr_year = d.getFullYear();
                        document.getElementById('inv_date').innerHTML =  curr_date + "-" + curr_month + "-" + curr_year ;

                        for(var i=1;i<=1;i++){
                            var abc = "<tr>" +
                                "<td class='col-md-3 col-sm-3 col-xs-3 getAmt' id='itcd"+i+"' contenteditable='true'></td>" +
                                "<td class='col-md-3 col-sm-3 col-xs-3 getQty' id='qty"+i+"' contenteditable='true'></td>" +
                                "<td class='col-md-3 col-sm-3 col-xs-3' id='pri"+i+"'></td>" +
                                "<td class='col-md-3 col-sm-3 col-xs-3' id='totp"+i+"'></td>" +
                                "</tr>";
                            $('#inv_data tbody').append(abc);
                        }

                        //load amt
                        $(".getAmt").keydown(function(e){
                            if(e.which === 9){
                                var d = $(this).attr('id');
                                if($("#"+d).text() != '') {
                                    var f = $("#"+d).text();
                                    $.ajax({
                                        url: "//localhost/ARS/assets/forward/inv/load.php",
                                        type: 'post',
                                        data: "tf=" + d +"&ft="+ f,
                                        success: function (data) {
                                            var arr = data.split(",");
                                            $('#pri' + arr[0]).text(arr[1]);
                                        }
                                    });
                                }
                            }
                        });

                        $(".getQty").keydown(function(e){
                            if(e.which === 9) {
                                var f = parseInt($(this).attr('id').slice(3));
                                var k = parseInt($("#pri"+f).text());
                                $("#totp"+f).text(parseInt($(this).text())*k);
                            }
                        });

                    });
                </script>
            </div>
            <div class="col-md-1 col-sm-12 col-xs-12"></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="row">
            <div class="col-md-12 btn btn-success text-center">Products and Codes</div>
        </div>
        <div class="row">
            <table id="pro_list" class="table" border="1">
                <tr>
                    <th class="col-md-3">Item Code</th>
                    <th class="col-md-3">Description</th>
                    <th class="col-md-3">M.R.P</th>
                    <th class="col-md-3">Stock Left</th>
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
                    <td class="col-md-3"><?php echo $id ?></td>
                    <td class="col-md-3"><?php echo $des ?></td>
                    <td class="col-md-3"><?php echo $cost ?></td>
                    <td class="col-md-3"><?php echo $stock ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
        </div>
    </div>
</div>