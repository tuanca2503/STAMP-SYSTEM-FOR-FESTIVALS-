<?php
    include "inc/header.php";
?>
<?php
    $showCart=$cart->showCart();
    $showBill = $bill->showBill();
    
?>
    <div class="container">
			<div class="newspaper-x-breadcrumbs">
				<span>
					<a itemprop="url" href="index.php">
						<span itemprop="title">Home </span>
					</a>
				</span>
				<span class="newspaper-x-breadcrumb-sep">/</span>
				<span >
				<a itemprop="url" href="#">
					<span itemprop="title">Login</span>
				</a>
				</span>
				<br>
				
			</div>
		</div>
        <br>
    <div class="container " style="background-color:#04132d; border-radius:25px">
        <div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
            <div class="text-uppercase">
                <p>Order detail</p>
            </div>
            <div class="h4"><?=$format->formatDate(date("m/d/Y"))?></div>
            <div class="pt-1">
                <p>Order #12615 is currently<b class="text-dark"> processing</b></p>
            </div>
            
            <div class="btn close text-white"> &times; </div>
        </div>
        <div class="wrapper bg-white">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr class="text-uppercase text-muted">
                            <th scope="col">product</th>
                            <th scope="col" class="text-right">total</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Items: <?=Session::get('cart')?></th>
                            <td class="text-right"><b><?=Session::get('total')?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
                if ($showCart) {
                    $i = 0;
                    while ($result = $showCart->fetch_assoc()) {
                        $i++; ?>
            <div class="d-flex justify-content-start align-items-center list my-2 py-1">
                <div><b><?=$result['quantity']?></b></div>
                <div class="mx-3"> <img src="uploads/<?=$result['img']?>" alt="apple" class="rounded-circle" width="30" height="30"> </div>
                <div class="order-item"><?=$result['name']?></div><br>
                
               

            </div>
            <?php
               }

            }
            ?>
            
    <div class="pt-2 border-bottom mb-3"></div>
        <div class="d-flex justify-content-start align-items-center pl-3">
        <div class="text-muted">Note&nbsp;</div>
        <div class="ml-auto"> <img src="https://postandparcel.info/wp-content/uploads/2020/07/Delivery-Hero-Logo-1.jpg" alt="" width="30" height="30"> <label>Delivery service may take longer because of the Covid-19 pandemic</label> </div>
    </div>
    
            <div class="row border rounded p-1 my-3">
                <div class="col-md-6 py-3">
                    <div class="d-flex flex-column align-items start"> <b>Address</b>
                        <p class="text-justify pt-2"> <?=Session::get('fullname')?></p>
                        <p class="text-justify"><?=Session::get('address')?></p>
                    </div>
                </div>
                <div class="col-md-6 py-3">
                    <div class="d-flex flex-column align-items start"> <b>Phone</b>
                        <p class="text-justify pt-2"><?=Session::get('telephone')?></p>
                        <p class="text-justify"><?=Session::get('email')?></p>
                    </div>
                </div>
                <div class="col-md-6 py-3">
                <?php
                if ($showBill) {
                    $i = 0;
                    while ($result = $showBill->fetch_assoc()) {
                        $i++; ?>
                    <div class="d-flex flex-column align-items start"> <b>Order date</b>
                        <p class="text-justify pt-2"><?=$format->formatDate($result['orderdate'])?></p>
                        <p class="text-justify"><?=Session::get('email')?></p>
                    </div>
                    
                   
                </div>
                <div class="col-md-6 py-3">
                    <div class="d-flex flex-column align-items start"> <b>Payment method</b>
                        <p class="text-justify pt-2"><?=$result['paymethod']?></p>
                    </div>
                </div>
                <?php
                    }
                }
                    ?>
            </div>
            
            <!-- <div class="pl-3 font-weight-bold">Related Subsriptions</div>
            <div class="d-sm-flex justify-content-between rounded my-3 subscriptions">
                <div> <b>#9632</b> </div>
                <div></div>
                <div>Status: Processing</div>
                <div> Total: <b> $68.8 for 10 items</b> </div>
            </div> -->
        </div>
    </div>
</div>
<?php
    include "inc/footer.php";
?>
<style>
    #order-heading {
    background-color: #edf4f7;
    position: relative;
    border-top-left-radius: 25px;
    max-width: 800px;
    padding-top: 20px;
    margin: 30px auto 0px
}

#order-heading .text-uppercase {
    font-size: 0.9rem;
    color: #777;
    font-weight: 600
}

#order-heading .h4 {
    font-weight: 600
}

#order-heading .h4+div p {
    font-size: 0.8rem;
    color: #777
}

.close {
    padding: 10px 15px;
    background-color: #777;
    border-radius: 50%;
    position: absolute;
    right: -15px;
    top: -20px
}

.wrapper {
    padding: 0px 50px 50px;
    max-width: 800px;
    margin: 0px auto 40px;
    border-bottom-left-radius: 25px;
    border-bottom-right-radius: 25px
}

.table th {
    border-top: none
}

.table thead tr.text-uppercase th {
    font-size: 0.8rem;
    padding-left: 0px;
    padding-right: 0px
}

.table tbody tr th,
.table tbody tr td {
    font-size: 0.9rem;
    padding-left: 0px;
    padding-right: 0px;
    padding-bottom: 5px
}

.table-responsive {
    height: 100px
}

.list div b {
    font-size: 0.8rem
}

.list .order-item {
    font-weight: 600;
    color: #6db3ec
}

.list:hover {
    background-color: #f4f4f4;
    cursor: pointer;
    border-radius: 5px
}

label {
    margin-bottom: 0;
    padding: 0;
    font-weight: 900
}

button.btn {
    font-size: 0.9rem;
    background-color: #66cdaa
}

button.btn:hover {
    background-color: #5cb99a
}

.price {
    color: #5cb99a;
    font-weight: 700
}

p.text-justify {
    font-size: 0.9rem;
    margin: 0
}

.row {
    margin: 0px
}

.subscriptions {
    border: 1px solid #ddd;
    border-left: 5px solid #ffa500;
    padding: 10px
}

.subscriptions div {
    font-size: 0.9rem
}

@media(max-width: 425px) {
    .wrapper {
        padding: 20px
    }

    body {
        font-size: 0.85rem
    }

    .subscriptions div {
        padding-left: 5px
    }

    img+label {
        font-size: 0.75rem
    }
}
</style>