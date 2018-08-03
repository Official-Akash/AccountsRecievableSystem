<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <button type="button" id="invoices" class="btn btn-primary" href="#tab1" data-toggle="tab">
            <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
            <div class="hidden-xs">Create Invoices</div>
        </button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" id="viewinvoices" class="btn btn-default" href="#tab2" data-toggle="tab">
            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
            <div class="hidden-xs">Add Payment</div>
        </button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" id="products" class="btn btn-default" href="#tab3" data-toggle="tab">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            <div class="hidden-xs">Products</div>
        </button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" id="debitnote" class="btn btn-default" href="#tab4" data-toggle="tab">
            <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
            <div class="hidden-xs">DEBIT NOTE</div>
        </button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" id="customers" class="btn btn-default" href="#tab5" data-toggle="tab">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <div class="hidden-xs">Customer Outstanding Report</div>
        </button>
    </div>
</div>
<div class="well">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <?php
            require($path."/ARS/assets/forward/inv/index.php");
            ?>
        </div>
        <div class="tab-pane fade in" id="tab2">
            <?php
                require($path."/ARS/assets/forward/payment/index.php");
            ?>
        </div>
        <div class="tab-pane fade in" id="tab3">
            <?php
            require($path."/ARS/assets/forward/products/index.php");
            ?>
        </div>
        <div class="tab-pane fade in" id="tab4">
            <?php
            require($path."/ARS/assets/forward/debit/index.php");
            ?>
        </div>
        <div class="tab-pane fade in" id="tab5">
            <?php
            require($path."/ARS/assets/forward/users/index.php");
            ?>
        </div>
    </div>
</div>