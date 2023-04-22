<?php 
	if($validation == true)	
	{ 
	?>
	
	<!--=*= INVOICE TABLE FOR SSLCOMERZ =*=-->
	<main class="main">
		<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2 printClose">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">ACCEUIl</a></li>
					<li class="breadcrumb-item active" aria-current="page">Commander</li>
				</ol>
			</div>
		</nav>
		<div class="container">
			<div class="text-center printClose">
				<ul class="checkout-progress-bar">
					<li><span>Orders & Shipping</span></li>	
					<li><span>Payment Integration</span></li>	
					<li class="active"><span>Review &amp; Status</span></li>
				</ul>
			</div>
			<div class="text-right">
				<button type="submit" onclick="print_current_page()" target="_blank" class="btn btn-sm btn-outline-warning printClose">&#128438; Imprimer</button>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-12">
					<div class="invoice-header">
						<div class="row">
							<div class="col-md-3 col-xs-2">
								<div class="invoice-title">
									<h1>Commande</h1>
									<img class="logo-print" src="<?= yii::$app->request->baseUrl?>/web/public/assets/images/favicon/logoFrontEnd.png" alt="" style="width: 220px; height: 60px;">
								</div>
							</div>
							<div class="invoice-info  col-md-9 col-xs-10">
								<div style="padding-left: 340px;">
									<div class="row">
										<div class="col-md-6 col-sm-6 text-left">
											
											<?php 
												echo' <p> '. $customerResult[0]['customer_name'] .'<br>'. $customerResult[0]['customer_address'] .'</p>';
											?>
											
										</div>
										<div class="col-md-6 col-sm-6 text-left">
											
											<?php 
												echo '<p>Phone: '. $customerResult[0]['customer_mobile'] .'<br> Email : '. $customerResult[0]['customer_email'] .'</p>';
											?>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row invoice-to">
						<div class="col-md-9 col-sm-4 pull-left">
							<h4>Invoice To:</h4>
							
							<?php
								echo '<h2>'. @$shippingDetails[0]['shipcstmr_name'] .'</h2>
								<p>'. @$shippingDetails[0]['shipcstmr_profession'] .'<br>'.'+88' .
										@$shippingDetails[0]['shipcstmr_mobile'] .'<br>'.
										@$shippingDetails[0]['shipcstmr_streetadd'] .'<br>'.
										@$shippingDetails[0]['shipcstmr_city'] . "-" . @$shippingDetails[0]['shipcstmr_zip'] .'<br>'.
										@$shippingDetails[0]['shipcstmr_country'] .'<br>
								</p>';
							?>
							
						</div>
						<div class="col-md-3 col-sm-5 pull-right">
							<div class="row">
								<div class="col-md-4 col-sm-5 inv-label">Invoice #</div>
								<div class="col-md-8 col-sm-7"><?= $invoiceresultPG[0]['invoice_id'];;?></div>
							</div>
							<div class="row">
								<div class="col-md-4 col-sm-5 inv-label">Date #</div>
								<div class="col-md-8 col-sm-7"><?= date("M-d-Y H:i:s A");?></div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12 inv-label">
									<h3 class="inv-label">TOTAL PAID</h3>
									<h2 style="font-size: 40px; font-weight: bold">
										<?= Yii::$app->params['CURRENCY'] . " " . @$getdetailsResult[0]['grand_total']; ?>
									</h2>
								</div>
							</div>
						</div>
					</div>
					<table class="table table-invoice" >
						<thead>
							<tr>
								<th>#</th>
								<th>Item Description</th>
								<th class="text-center">Unit Cost</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$n = 1;
								foreach($getdetailsResult AS $eachData)
								{
									echo'
									<tr>
										<td>'. $n .'</td>
										<td>
											<div style="font-weight: bold;">'. $eachData['product_name'] .'</div>
											<div style="margin-bottom: -10px;">'. $eachData['product_summary'] .'</div>
										</td>
										<td class="text-center">'. $eachData['product_price'] .'</td>
										<td class="text-center">'. $eachData['prod_quantity'] .'</td>
										<td class="text-center">'. $eachData['prod_quantity'] * $eachData['product_price'] .'</td>
									</tr>';
									$n++;
								}
							?>
							
						</tbody>
					</table>
					<div class="row">
						<div class="col-md-8 col-xs-7 payment-method">
							<h4>Payment Method</h4>
							<p>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<p>2. Pellentesque tincidunt pulvinar magna quis rhoncus.</p>
							<p>3. Cras rhoncus risus vitae congue commodo.</p>
							<p style="font-style: normal; font-size: 17px;" class="inv-label mt-1 mb-2"> 
								<span style="color: orange; font-weight: bold;">IN AMOUNT: </span>
								<?php echo $getAmount->inAwords($getdetailsResult[0]['grand_total']) . ' TAKA ONLY'; ?>
							</p>
							<h3 class="inv-label itatic">Thank you for your business</h3>
						</div>
						<div class="col-md-4 col-xs-5 invoice-block pull-right">
							<ul class="unstyled amounts">
								<li>Sub-Total amount :
									<?= Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['sub_total']; ?>
								</li>
								<li>Discount :
									<?= Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['discount_amount']; ?>
								</li>
								<li>TAX 
									<?= Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['tax']; ?>
								</li>
								<li class="grand-total">Grand Total : 
									<?= Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['grand_total']; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="checkout-steps-action">
						<a href="index.php" class="btn btn-outline-success float-right printClose">Done</a>
					</div>
				</div>
			</div>
		</div>
		<div class="mb-6">
			<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
		</div>
	</main>	
	<!--=*= INVOICE TABLE FOR SSLCOMERZ =*=-->
	
	<?php 
	} 
	else if(isset($_POST['cash_on_delivery']))
	{
		if($_POST['payment_values'] = 1)
		{
		?>
		
		<!--=*= INVOICE TABLE FOR CASH ON DELIVERY =*=-->
		<main class="main">
			<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2 printClose">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Invoice</li>
					</ol>
				</div>
			</nav>
			<div class="container">
				<div class="text-center printClose">
				<ul class="checkout-progress-bar">
					<li><span>Orders & Shipping</span></li>	
					<li><span>Payment Integration</span></li>	
					<li class="active"><span>Review &amp; Status</span></li>
				</ul>
				</div>
				<div class="text-right">
					<button type="submit" onclick="print_current_page()" target="_blank" class="btn btn-sm btn-outline-warning printClose">&#128438; Print</button>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-12">
						<div class="invoice-header">
							<div class="row">
								<div class="col-md-3 col-xs-2">
									<div class="invoice-title">
										<h1>invoice</h1>
										<img class="logo-print" src="public/assets/images/favicon/logoFrontEnd.png" alt="" style="width: 220px; height: 60px;">
									</div>
								</div>
								<div class="invoice-info  col-md-9 col-xs-10">
									<div style="padding-left: 340px;">
										<div class="row">
											<div class="col-md-6 col-sm-6 text-left">
												<?php 
													echo' <p> '. $customerResult[0]['customer_name'] .'<br>'. $customerResult[0]['customer_address'] .'</p>';
												?>
											</div>
											<div class="col-md-6 col-sm-6 text-left">
												<?php 
													echo '<p>Phone: '. $customerResult[0]['customer_mobile'] .'<br> Email : '. $customerResult[0]['customer_email'] .'</p>';
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row invoice-to">
							<div class="col-md-9 col-sm-4 pull-left">
								<h4>Invoice To:</h4>
								
								<?php
									echo '<h2>'. @$shippingDetails[0]['shipcstmr_name'] .'</h2>
									<p>'. @$shippingDetails[0]['shipcstmr_profession'] .'<br>'.'+88' .
											@$shippingDetails[0]['shipcstmr_mobile'] .'<br>'.
											@$shippingDetails[0]['shipcstmr_streetadd'] .'<br>'.
											@$shippingDetails[0]['shipcstmr_city'] . "-" . @$shippingDetails[0]['shipcstmr_zip'] .'<br>'.
											@$shippingDetails[0]['shipcstmr_country'] .'<br>
									</p>';
								?>
								
							</div>
							<div class="col-md-3 col-sm-5 pull-right">
								<div class="row">
									<div class="col-md-4 col-sm-5 inv-label">Invoice #</div>
									<div class="col-md-8 col-sm-7"><?= $invoiceresultCOD[0]['invoice_id'];?></div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-5 inv-label">Date #</div>
									<div class="col-md-8 col-sm-7"><?= date("M-d-Y H:i:s A");?></div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 inv-label">
										<h3 class="inv-label">TOTAL DUE</h3>
										<h2 style="font-size: 40px; font-weight: bold">
											<?= Yii::$app->params['CURRENCY'] . " " . @$getdetailsResult[0]['grand_total']; ?>
										</h2>
									</div>
								</div>
							</div>
						</div>
						<table class="table table-invoice" >
							<thead>
								<tr>
									<th>#</th>
									<th>Item Description</th>
									<th class="text-center">Unit Cost</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Total</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									$n = 1;
									foreach($getdetailsResult AS $eachData)
									{
										echo'
										<tr>
											<td>'. $n .'</td>
											<td>
												<div style="font-weight: bold;">'. $eachData['product_name'] .'</div>
												<div style="margin-bottom: -10px;">'. $eachData['product_summary'] .'</div>
											</td>
											<td class="text-center">'. $eachData['product_price'] .'</td>
											<td class="text-center">'. $eachData['prod_quantity'] .'</td>
											<td class="text-center">'. $eachData['prod_quantity'] * $eachData['product_price'] .'</td>
										</tr>';
										$n++;
									}
								?>
								
							</tbody>
						</table>
						<div class="row">
							<div class="col-md-8 col-xs-7 payment-method">
								<h4>Payment Method</h4>
								<p>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								<p>2. Pellentesque tincidunt pulvinar magna quis rhoncus.</p>
								<p>3. Cras rhoncus risus vitae congue commodo.</p>
								<p style="font-style: normal; font-size: 17px;" class="inv-label mt-1 mb-2"> 
									<span style="color: orange; font-weight: bold;">IN AMOUNT: </span>
									<?php echo $getAmount->inAwords($getdetailsResult[0]['grand_total']) . ' TAKA ONLY'; ?>
								</p>
								<h3 class="inv-label itatic">Thank you for your business</h3>
							</div>
							<div class="col-md-4 col-xs-5 invoice-block pull-right">
								<ul class="unstyled amounts">
									<li>Sub - Total amount : <?= Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['sub_total'] ;?></li>
									<?php 
										#== IF CUSTOMER GET DISCOUNT
										if(@$getdetailsResult[0]['discount_amount'] > 0)
										{
											echo '<li>Discount : ' . Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['discount_amount'] . '</li>';				
										}
									?>
									<li>Discount :
										<?= Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['discount_amount']; ?>
									</li>
									<li>TAX 
										<?php echo '(' . Yii::$app->params['TAX'] . '%) :' . " " . Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['tax']; ?>
									</li>
									<li class="grand-total">Grand Total : 
										<?php echo Yii::$app->params['CURRENCY'] . " " . $getdetailsResult[0]['grand_total']; ?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="checkout-steps-action">
							<a href="index.php" class="btn btn-outline-success float-right printClose">Done</a>
						</div>
					</div>
				</div>
			</div>
			<div class="mb-6">
				<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
			</div>
		</main>
		<!--=*= INVOICE TABLE FOR CASH ON DELIVERY =*=-->
		
		<?php
		}
	} 
	else 
	{
	?>
	
	<!--=*= 404 SECTION START =*=-->
	<main class="main">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">404 error</li>
				</ol>
			</div>
		</nav>	
		<div class="container">
			<div class="text-center">
				<div class="http-error-main">
					<h2 class="text-warning" style="font-size: 140px;">404!</h2>
					<p style="font-size: 18px;">We\'re sorry, but the page you were looking for doesn\'t exist.</p>
					<div class="mb-8">
						<!-- used to create space between footer and main content -->
					</div>
					<a href="index.php" class="btn btn-outline-info">Back to Home</a>
				</div>
			</div>
		</div>
		<div class="mb-5">
			<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
		</div>
	</main>
	<!--=*= 404 SECTION START =*=-->
	
	<?php
	}
?>


<script type="text/javascript">
function print_current_page(){
	window.print();
}
</script>

<style>
@media print {
	#header, #footer, .printClose {display: none;}
}
</style>
<!--=*= SCRIPT TO PRINT DOCUMENT END =*=-->