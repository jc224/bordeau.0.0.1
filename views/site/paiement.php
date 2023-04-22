
<!--=*= PAYMENT CONTENT START =*=-->
<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Payment Integration</li>
			</ol>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<ul class="checkout-progress-bar">
						<li><span>Orders & Shipping</span></li>	
						<li class="active"><span>Payment Integration</span></li>	
						<li><span>Review &amp; Status</span></li>
					</ul>
				</div>
				<div class="row">
					<div class="col-lg-8">
						<div class="mb-4">
							<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
						</div>
						
						<?php 
							#== PAYMENT GATEWAY DATA
							if(isset($_POST['proceed_to_payment']) || isset($_POST['update_shipping']))
							{
								$sslc =yii::$app->sslcommerzClass;
								#==INITIATE (TRANSACTION DATA, WHETHER REDIRECT OR DISPALY IN PAGE)
								$payment_options = $sslc->initiate($post_data, true);
							
								// echo '<h3>Card Payment</h3>';
								// echo '<table>';
								// 	echo '<tr>';
								// 		foreach ($payment_options['cards'] as $row) 
								// 		{
								// 			echo '<td style="width: 165px;">' . $row['name'] .'</td>';
								// 		}
								// 	echo '</tr>';
								// 	echo '<tr>';
								// 		foreach ($payment_options['cards'] as $row) 
								// 		{
								// 			echo '<td style="width: 165px;">' . $row['link'] .'</td>';
								// 		}
								// 		echo '</tr>';
								// echo '</table>';
									
								// 	echo "<hr>";
									
								// 	echo '<h3>Mobile Wallet Payment</h3>';
								// 	echo '<table>';
								// 		echo '<tr>';
								// 			foreach ($payment_options['mobile'] as $row) 
								// 			{
								// 				echo '<td style="width: 165px;">' . $row['name'] .'</td>';
								// 			}
								// 		echo '</tr>';
								// 		echo '<tr>';
								// 			foreach ($payment_options['mobile'] as $row) 
								// 			{
								// 				echo '<td style="width: 165px;">' . $row['link'] .'</td>';
								// 			}
								// 		echo '</tr>';
								// 	echo '</table>';
								
								// echo "<hr>";
								
								// echo '<h3>Internet Banking Payment</h3>';
								// echo '<table>';
								// 	echo '<tr>';
								// 		foreach ($payment_options['internet'] as $row) 
								// 		{
								// 			echo '<td style="width: 165px;">' . $row['name'] .'</td>';
								// 		}
								// 	echo '</tr>';
								// 	echo '<tr>';
								// 		foreach ($payment_options['internet'] as $row) 
								// 		{
								// 			echo '<td style="width: 165px;">' . $row['link'] .'</td>';
								// 		}
								// 	echo '</tr>';
								// echo '</table>';
								
								// echo "<hr>";
								
								// echo '<h3>Other Payment Options</h3>';
								// echo '<table>';
								// 	echo '<tr>';
								// 		foreach ($payment_options['others'] as $row) 
								// 		{
								// 			echo '<td style="width: 165px;">' . $row['name'] .'</td>';
								// 		}
								// 	echo '</tr>';
								// 	echo '<tr>';
								// 		foreach ($payment_options['others'] as $row) 
								// 		{
								// 			echo '<td style="width: 165px;">' . $row['link'] .'</td>';
								// 		}
								// 	echo '</tr>';
								// echo '</table>';	
							}
						?>
						
					</div>
					<div class="col-lg-4">
						<div class="mb-4">
							<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
						</div>
						<h3> Cash on Delivery </h3>
						<table class="table">
							<tr>
								<td>
                                <form method="post"  action="<?= Yii::$app->request->baseUrl.'/'.md5('site_statuts')?>">
                                   <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>

										<div class="form-group-custom-control">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" name="payment_values" value="1" class="custom-control-input" id="address-save">
												<label class="custom-control-label" for="address-save">Liuvraison en Especes</label>
											</div>
											<button type="submit" name="cash_on_delivery" class="btn btn-block btn-sm btn-primary">Confirmer le Paiement à  la livraison</button>
										</div>
									</form>
								</td>
							</tr>
						</table>
						<article class="entry">
							<div class="entry-body">
								<div class="entry-date">
									<span class="day bg-light"> <?php echo date("d"); ?> </span>
									<span class="month bg-info"> <?php echo date("M"); ?> </span>
								</div>
								<h3 class="text-info">Sugesstion  de paiement</h3>
								<div class="entry-content">
									<p class="text-justify" style="font-size: 14px;">
										<!-- Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
										inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. -->
									</p>
								</div>
							</div>
						</article>
						<div>
							<h3>Adresse de Livraison</h3>
							<div class="shipping-step-addresses">
								<div class="shipping-address-box active" style="width: 100%;">
									<ul class="text-justify" style="font-size: 14px;">
									
									<?php
										#== SHIPPING DETAILS
										echo'
										<li>'. @$shipcstmResult[0]['shipcstmr_name'] .'</li>
										<li>'. @$shipcstmResult[0]['shipcstmr_profession'] .'</li>
										<li>'. @$shipcstmResult[0]['shipcstmr_streetadd'] .'</li>
										<li>'. @$shipcstmResult[0]['shipcstmr_city']. " " .@$shipcstmResult[0]['shipcstmr_zip'] .'</li>
										<li>'. @$shipcstmResult[0]['shipcstmr_country'] .'</li>
										<li>'. @$shipcstmResult[0]['shipcstmr_mobile'] .'</li>
										<br/>
										<li>
											<button type="button" class="btn btn-sm float-right" style="color: #fff; background-color: #ff5501;" data-toggle="modal" data-target="#exampleModal">
												<i class="icon-pencil"></i> Modifier 
											</button>
										</li>';
									?>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mb-8">
		<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
	</div>
</main>
<!--=*= PAYMENT CONTENT START =*=-->

<!--=*= EDIT SHIPPING DETAILS MODAL START =*=-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h2 class="modal-title text-light" id="exampleModalLabel">Edit Shipping Address</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group required-field">
								<label for="">Full Name</label>
								<input type="text" name="shipcstmr_name_upd" class="form-control" name="" value="<?php echo @$shipcstmResult[0]['shipcstmr_name']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-7">
									<div class="form-group required-field">
										<label>Street Address </label>
										<input type="text" name="shipcstmr_streetadd_upd" class="form-control" value="<?php echo @$shipcstmResult[0]['shipcstmr_streetadd']; ?>">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group required-field">
										<label>City </label>
										<input type="text" name="shipcstmr_city_upd" class="form-control" value="<?php echo @$shipcstmResult[0]['shipcstmr_city']; ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Profession <span class="text-warning">(optional)</span></label>
										<input type="text" name="shipadd_prfsion_upd" class="form-control" value="<?php echo @$shipcstmResult[0]['shipcstmr_profession']; ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="form-group required-field col-sm-4">
									<label>Phone Number </label>
									<input type="tel" name="shipadd_phn_upd" class="form-control" value="<?php echo @$shipcstmResult[0]['shipcstmr_mobile']; ?>">
								</div>
								<div class="form-group required-field col-sm-4">
									<label>Zip Code</label>
									<input type="text" name="shipadd_zopc_upd" class="form-control" value="<?php echo @$shipcstmResult[0]['shipcstmr_zip']; ?>" required>
								</div>
								<div class="form-group required-field col-sm-4">
									<label>Country</label>
									<input type="text" name="shipadd_cntry_upd" class="form-control" value="<?php echo @$shipcstmResult[0]['shipcstmr_country']; ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
					<button type="submit" name="update_shipping" class="btn btn-sm btn-info">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--=*= EDIT SHIPPING DETAILS MODAL END =*=-->