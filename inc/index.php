<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>exoSQL</title>
</head>
<body>

<div class="col-md-12">   
 <div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="iamgurdeeposahan" src="https://bootdey.com/img/Content/avatar/avatar6.png" style="width: 71px; border-radius: 43px;">
						</div>
					</div>
                    <div class="selection"><?php require '../database.php'; ?></div>
                    
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>Company Name.</h5>
							<p>+1 3649-6589 <i class="fa fa-phone"></i></p>
							<p>company@gmail.com <i class="fa fa-envelope-o"></i></p>
							<p>USA <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5 id="orderName"> </h5>
							<p><b>Mobile :</b> +1 12345-4569</p>
                            <p><b>Email :</b> <span id="orderEmail"></span></p>
							<p><b>Address :</b> New York, USA</p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
                        <h3>Date :<span id="orderDate"></span></h3>
						</div>
					</div>
				</div>
            </div>
			 
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <h3>Détails de la commande</h3>
                     <p>ID de commande : <span id="orderId"></span></p>
<!-- <p>Produits : <span id="orderProducts"></span></p> -->
                        <tr>
                            <td class="col-md-9 orderProductsData"></td>
                            <td class="col-md-3 orderPriceData"><i class="fa fa-inr"></i></td>
                        </tr>
                        <tr>
                            <td class="col-md-9 orderProductsData"></td>
                            <td class="col-md-3 orderPriceData"><i class="fa fa-inr"></i></td>
                        </tr>
                        <tr>
                            <td class="col-md-9 orderProductsData"></td>
                            <td class="col-md-3 orderPriceData"><i class="fa fa-inr"></i></td>
                        </tr>
                        <tr>
                            
                       
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger  "><h2><strong><i class="fa fa-inr orderTotalPrice"></i></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> 15 Aug 2016</p>
							<h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Stamp</h1>
						</div>
					</div>
				</div>
            </div>
			
        </div>    
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../main.js"></script> -->


    
</body>
</html>