<!--=*= CART SECTION START =*=-->
<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav mb-1">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
			</ol>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				
				<?php 
					#== DELETE CONFIRMATION MESSAGE
					if(isset($_POST['remove_cart']))
					{
						if($deleteCart > 0)
						{
							echo '<div class="alert alert-success">The Cart Item is deleted successfully</div>';
						} 
						else 
						{
							echo '<div class="alert alert-danger">Something went wrong! Unable to delete. Please recheck.</div>';
						}
					}
					
					#== DISCOUNT CONFIRMATION MESSAGE
					if(isset($_POST['discount_amnt']))
					{
						if(@$getDiscount > 0) {
							echo '
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Congratulation!</strong> You have get BDT '. @$_SESSION['SSCF_DISCOUNT_AMOUNT'] .' tk discount.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
						} 
						else 
						{
							echo '
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Be Careful</strong> and don\'t try to become a fruad...!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>';
						}
					}
				?>
				
				<div class="cart-table-container">
					<table class="table table-cart">
						<thead>
							<tr>
								<th class="product-col">Product</th>
								<th class="price-col">Prix</th>
								<th class="qty-col">Qty</th>
								<th class="price-col">Prix Promo</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								#== DYNAMIC CART PRODUCT LIST
								foreach($myShopcartItems AS $eachCartItems)
								{
									echo '
                                    <form  method="post" action="'. Yii::$app->request->baseUrl.'/'.md5('site_card').'">
                                    <input type="hidden" name="_csrf" value="'.Yii::$app->request->getCsrfToken().'"/>

										<tr class="product-row">
											<td class="product-col">
												<figure class="product-image-container">
													<a href="product.php?id='. $eachCartItems['id'].'" class="shopcart-image">
														<img src="' . Yii::$app->request->baseUrl."/web/public/uploads/products/"  . $eachCartItems['product_master_image']. '" alt="product">
													</a>
												</figure>
												<h2 class="product-title">
													<a href="product.php?id='. $eachCartItems['id'].'">'.$eachCartItems['product_name'].'</a>
												</h2>
											</td>
											<td>'. $eachCartItems['product_price'].  " ". Yii::$app->params['CURRENCY'] .  '</td>
											<td style="max-width: 60px;">
												<input name="quantity" class="form-control" type="number" min="1" value="'.@$eachCartItems['quantity'].'">
											</td>
											<td>'  . ($eachCartItems['product_price'] * $eachCartItems['quantity']) . " " . Yii::$app->params['CURRENCY'] .'</td>
											<td class="bb">
												<div class="d-flex checkout-steps-action">
													<input type="hidden" name="cart_id" value=" ' . $eachCartItems['id'] . ' " />
													<button name="update_cart" type="submit" class="btn btn-sm btn-outline-info">Modifier</button> &nbsp;
													<input type="hidden" name="remove_id" value=" ' . $eachCartItems['id'] . ' " />
													<button name="remove_cart" type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
												</div>
											</td>
										</tr>
									</form>
									';
								}
							?>
							
						</tbody>
						<tfoot>
							<tr>
								<td colspan="8" class="clearfix">
									<div class="float-left">
										<a href="<?=Yii::$app->request->baseUrl.'/'.md5("site_index")?>" class="btn btn-outline-success">Continuer l'achat</a>
									</div>
								</td>
							</tr>                    
						</tfoot>
					</table>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="cart-summary">
					<h3>SOMMAIRE</h3>
					<table class="table table-totals">
						<tbody>
							<tr>
								<td>Prix Total</td>
								<td>
									
									<?php 
										#== SUBTOTAL PRICE SUMMATION
										$cartSubtotal = 0;
										foreach ($myShopcartItems AS $eachSubtotal)
										{
											$cartSubtotal += ($eachSubtotal['quantity'] * $eachSubtotal['product_price']);
										}
										echo  $cartSubtotal. " " .Yii::$app->params['CURRENCY'] ;
									?>
									
								</td>
							</tr>
							<tr>
								<td>Tax</td>
								<td><?php $tax = ($cartSubtotal * Yii::$app->params['TAX']) / 100; echo $tax  . " " .Yii::$app->params['CURRENCY'] ; ?></td>
							</tr>
							<tr>
								<td>Tax livraison</td>
								<td>
									<?= Yii::$app->params['CURRENCY'] . " "; ?>
									<span id="charge">
										
										<?php 
											if(@$fobCost <= 0)
											{
												echo 0;
											}
											else 
											{
												echo @$fobCost; 
											}
										?>
										
									</span>
								</td>
							</tr>								
							<tr>
								<td>Montant de remise</td>
								<td>  <?= @$_SESSION['SSCF_DISCOUNT_AMOUNT'];?>  <?= Yii::$app->params['CURRENCY'] . " "; ?> </td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td>Commande  Totale</td>
								<td>
									<?=   $grandTotal = round((($cartSubtotal + $tax) - @$_SESSION['SSCF_DISCOUNT_AMOUNT']) + $fobCost) . " " .Yii::$app->params['CURRENCY'] ; ?>
								</td>
							</tr>
						</tfoot>
					</table>
					<span id="message" style="display: none;">
						<div class="alert alert-warning fade show" role="alert">
							Confirm <strong> Delivery Charge </strong> Prior to Order
						</div>
					</span>
					<div class="checkout-methods">
						
						<?php
							if(!empty(@$fobCost))
							{
						?>
							
						<form action="<?= Yii::$app->request->baseUrl.'/'.md5("site_commande")?>" method="post">
                             <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
	
						<?php 
							}
						?>
							<input type="hidden" name="cartsub_total" value="<?php echo $cartSubtotal; ?>">
							<input type="hidden" name="tax_total" value="<?php echo $tax; ?>">
							<input type="hidden" name="discount_amount" value="<?php echo @$_SESSION['SSCF_DISCOUNT_AMOUNT']; ?>">
							<input type="hidden" name="delivery_charge" value="<?php echo @$fobCost; ?>">
							<input type="hidden" name="grand_total" value="<?php echo $grandTotal; ?>">
							<button name="submit_order" id="fEvent" class="btn btn-block btn-sm btn-primary">Passer à la commande</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="cart-discount">
					<h4>Apply Discount Code</h4>
					<form action="" method="post">
						<div class="input-group">
							<input name="dscnt_cd" type="text" class="form-control form-control-sm" placeholder="Enter discount code" required>
							<div class="input-group-append">
								<button name="discount_amnt" class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="cart-discount">
					<h4>Shipping Methods</h4>
					<form action="" method="post">
						<div class="input-group">
							<select class="form-control" name="shipping_method">
								<option> select shipping method </option>
								<option value="50"> BDT 50 Tk Inside of Dhaka </option>
								<option value="120"> BDT 120 Tk Outside of Dhaka</option>
							</select>
							<div class="input-group-append">
								<button name="fob" class="btn btn-sm btn-info" type="submit">Confirm Shipping</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="mb-6">
		<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
	</div>
</main>
<!--=*= CART SECTION START =*=-->




<!--=*= ORDER PLACED FORM CART =*=-->
<script type="text/javascript">
	$(document).ready(function(){
		var data = $('#charge').html();
		$('#fEvent').click(function(){
			if(data == 0){
				$('#message').show();
			}
		});
	});
</script>
<!--=*= ORDER PLACED FORM END =*=-->