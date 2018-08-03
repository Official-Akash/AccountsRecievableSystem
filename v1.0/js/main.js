$(function(){
    var errorfieldlogin = document.getElementById('_ad4');

    $("#_ad1").click(function(){

        var one = $("#_ad2").val();
        var two = $("#_ad3").val();

        if(one == '' || two == ''){
            errorfieldlogin.innerHTML = "BOTH FIELDS ARE REQUIRED!";
            setInterval(newab_c,3000);
        }else{
            var data = "one="+one+"&two="+two;
            $.ajax({

                url:'assets/moredata/loginreq.php',
                method:'post',
                data:data,
                success:function(data){
                    if(data === 'ok'){
                        window.location.reload();
                    }else{
                        errorfieldlogin.innerHTML = data;
                        setInterval(newab_c,3000);
                    }
                }

            });
        }
    });

    var newab_c = function(){
        errorfieldlogin.innerHTML = "";
    };

    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        $(this).removeClass("btn-default").addClass("btn-primary");
    });

    //customer create
    $("#_custCreate").click(function(){
        var cust1 = $("#_cust1").val();
        var cust2 = $("#_cust2").val();
        var cust3 = $("#_cust3").val();
        var err = document.getElementById('alerError');
        if(cust1 == '' || cust2 == '' || cust3 == ''){
            err.innerHTML = "All fields are required";
        }else{
            var data = "one="+cust1+"&two="+cust2+"&three="+cust3;
            $.ajax({
                url:"assets/forward/users/send.php",
                data:data,
                type:"post",
                success:function(data){
                    if(data === "ok"){
                        window.location.reload();
                    }else{
                        err.innerHTML = data;
                    }
                }
            });
        }
    });

    //product create
    $("#_proCreate").click(function(){
        var pro1 = $("#_pro1").val();
        var pro2 = $("#_pro2").val();
        var pro3 = $("#_pro3").val();
        var err = document.getElementById('aalerError');
        if(pro1 == '' || pro2 == '' || pro3 == ''){
            err.innerHTML = "All fields are required";
        }else{
            var data = "one="+pro1+"&two="+pro2+"&three="+pro3;
            $.ajax({
                url:"assets/forward/products/send.php",
                data:data,
                type:"post",
                success:function(data){
                    if(data === "ok"){
                        window.location.reload();
                    }else{
                        err.innerHTML = data;
                    }
                }
            });
        }
    });

    //create invoice
    $("#_invCreate").click(function () {
        var customer = parseInt($("#cust_nu").text());
        var products = parseInt($("#itcd1").text()); //for more than one create array
        var qty = parseInt($("#qty1").text()); //for more than one create array
        var pro_price = parseInt($("#pri1").text()); //for more than one create array
        var total = parseInt($("#totp1").text());
        var datee = $("#inv_date").text();
        /*for(var i=1;i<=$("#inv_data tbody tr").length;i++) {
            products.push(parseInt($("#itcd"+i).text()));
            qty.push(parseInt($("#qty"+i).text()));
            pro_price.push(parseInt($("#pri"+i).text()));
            total = total + parseInt($("#totp"+i).text());
        }*/
        var data = "a="+customer+"&b="+products+"&c="+qty+"&d="+pro_price+"&e="+total+"&f="+datee;
        //console.log(data);
        $.ajax({
            url:'//localhost/ARS/assets/forward/inv/send.php',
            type:'post',
            data:data,
            success:function (data) {
                if(data === 'ok'){
                    window.location.reload();
                }else{
                    $("#err_invoice").html(data);
                }
            }
        });
    });

    //get invoices of a user
    $("#user_list").change(function(){
        var userid=$(this).val();
        var err = document.getElementById('user_inv_err');
        var inv_list_field = document.getElementById('inv_list');
        if(userid != ''){
            $.ajax({
                url:'//localhost/ARS/assets/forward/payment/send.php',
                type:'post',
                data:'uid='+userid,
                success:function (data) {
                    if(data != 'No') {
                        $("#upp").hide();
                        err.innerHTML = '';
                        inv_list_field.innerHTML = data;
                    }else{
                        err.innerHTML = 'No Pending Invoice Found for Requested Customer';
                    }
                }
            });
        }
    });

    //get invoices of a user
    $("#userslists").change(function(){
        var userid = $("#userslists").val();
        var show_ledger = document.getElementById('show_ledger');
        if(userid != ''){
            $.ajax({
                url:'//localhost/ARS/assets/forward/ledger/userslist/send.php',
                type:'post',
                data:'uidi='+userid,
                success:function (data) {
                    show_ledger.innerHTML = data;
                }
            });
        }
    });

});

function submit_amt_for_inv() {
    var inv_num = $('#inv_select_list').val();
    var narr = $("#nar").val();
    var amt_to_dep = $("#amt_invv").val();
    var err = document.getElementById('user_inv_err');
    if(inv_num == '' || narr == '' || amt_to_dep == ''){
        err.innerHTML = "All fields Re required!";
    }else{
        var data = 'one='+inv_num+'&two='+narr+'&three='+amt_to_dep;
        $.ajax({
            url:'//localhost/ARS/assets/forward/payment/moresend.php',
            type:'post',
            data:data,
            success:function (data) {
                if(data === 'ok'){
                    window.location.reload();
                }else{
                    err.innerHTML = data;
                }
            }
        });
    }
}

function gene(){
    var toPrint = document.getElementById('toPrint');
    var popupWin = window.open('', '_blank', 'width=1000,height=780,location=no,left=200px');
    popupWin.document.open();
    popupWin.document.write('<html><title>Customer Outstanding Report</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="//localhost/ARS/css/index.css"><link rel="stylesheet" href="//localhost/ARS/css/bootstrap.min.css"><script src="//localhost/ARS/js/jquery-3.2.1.min.js"></script><script src="//localhost/ARS/js/bootstrap.min.js"></script><script src="//localhost/ARS/js/main.js"></script></head><body onload="window.print()">')
    popupWin.document.write(toPrint.innerHTML);
    popupWin.document.write('</html>');
    popupWin.document.close();
}

function ledger_gene(){
    var toPrint = document.getElementById('show_ledger');
    var popupWin = window.open('', '_blank', 'width=1000,height=780,location=no,left=200px');
    popupWin.document.open();
    popupWin.document.write('<html><title>Customer Ledger || ARS</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="//localhost/ARS/css/index.css"><link rel="stylesheet" href="//localhost/ARS/css/bootstrap.min.css"><script src="//localhost/ARS/js/jquery-3.2.1.min.js"></script><script src="//localhost/ARS/js/bootstrap.min.js"></script><script src="//localhost/ARS/js/main.js"></script></head><body onload="window.print()">')
    popupWin.document.write(toPrint.innerHTML);
    popupWin.document.write('</html>');
    popupWin.document.close();
}