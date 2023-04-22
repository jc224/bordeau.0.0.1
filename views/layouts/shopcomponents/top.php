<?php
		
			$eloquent =yii::$app->eloquantClass;
			## ===*=== [F]ETCH CATEGORIES DATA FOR DISPLAY IN NAVIGATION BAR ===*=== ##
			$columnName = $tableName = $whereValue = null;
			$columnName = "*";
			$tableName = "categories";
			$whereValue['category_status'] = "Active";
			$categoryMenu = $eloquent->selectData($columnName, $tableName, @$whereValue);
			## ===*=== [F]ETCH CATEGORIES DATA FOR DISPLAY IN NAVIGATION BAR ===*=== ##
			
			
			## ===*=== [I]NSERT DATA TO CART ITEM ===*=== ##
			if(isset($_POST['add_to_cart']))
			{
				#== IF USER IS LOGGED IN
				if(@$_SESSION['SSCF_login_id'] > 0)
				{
					#== CHECK FIRST: IS THIS ITEM AVAILABLE IN CART OR NOT?
					$columnName = $tableName = $whereValue = null;
					$columnName = "*";
					$tableName = "shopcarts";
					$whereValue["customer_id"] = $_SESSION['SSCF_login_id'];
					$whereValue["product_id"] = $_POST['cart_product_id'];
					$availabilityInCart = $eloquent->selectData($columnName, $tableName, @$whereValue);
					#== IF AVAILABLE
					if(!empty($availabilityInCart))
					{
						
						#== UPDATE THE EXISTING ITEM QUANTITY IN CART
						$columnName = $tableName = $whereValue = null;
						$tableName = "shopcarts";
						$columnValue["quantity"] = $_POST['cart_product_quantity'] + $availabilityInCart[0]['quantity'];
						$whereValue["customer_id"] = $_SESSION['SSCF_login_id'];
						$whereValue["product_id"] = $_POST['cart_product_id'];
						$updateCartResult = $eloquent->updateData($tableName, $columnValue, @$whereValue);
						$_SESSION['ADD_TO_CART_RESULT'] = $updateCartResult;
					
					}
					else
					{
						#== INSERT ITEMS INTO THE ADD TO CART
						$columnValue = $tableName = null;
						$tableName = "shopcarts";
						$columnValue["customer_id"] = @$_SESSION['SSCF_login_id'];
						$columnValue["product_id"] = $_POST['cart_product_id'];
						$columnValue["quantity"] = $_POST['cart_product_quantity'];
						$columnValue["created_at"] = date("Y-m-d H:i:s");
						$addToCartResult = $eloquent->insertData($tableName, $columnValue);

						$_SESSION['ADD_TO_CART_RESULT'] = $addToCartResult;
					}
				}
				else
				{
					#== IF USER NOT LOGGED IN THEN NOTHING WILL BE HAPPEN
				
					$_SESSION['ADD_TO_CART_RESULT'] = 0;
				}
			}
			## ===*=== [I]NSERT DATA TO CART ITEM ===*=== ##
			
			
			## ===*=== [G]ET CART SUMMARY DATA BASED ON JOIN QUERY ===*=== ##
			$columnName = $tableName = $joinType = $onCondition = $whereValue = $formatBy = null;
			$columnName["1"] = "shopcarts.quantity";
			$columnName["2"] = "products.id";
			$columnName["3"] = "products.product_name";
			$columnName["4"] = "products.product_price";
			$columnName["5"] = "products.product_master_image";
			$tableName["MAIN"] = "shopcarts";
			$joinType = "INNER";
			$tableName["1"] = "products";
			$onCondition["1"] = ["shopcarts.product_id", "products.id"];
			$whereValue["shopcarts.customer_id"] = @$_SESSION['SSCF_login_id'];
			$formatBy["DESC"] = "shopcarts.id";
			$myaddcartItems = $eloquent->selectJoinDataprodu($columnName, $tableName, $joinType, $onCondition, @$whereValue, @$formatBy, @$paginate);
			
			
			
			## ===*=== [G]ET CART SUMMARY DATA BASED ON JOIN QUERY ===*=== ##
			
			
			## ===*=== [I]NSERT NEWSLETTERS DATA | FOR BOTH SUCH AS FOOTER AND MODAL ===*=== ##
			if(isset($_POST['news_subscribe']))
			{
				$tableName = $columnValue = null;
				$tableName = "newsletters";
				$columnValue["newsletter_email"] = $_POST['user_newsletter'];
				$columnValue["created_at"] = date("Y-m-d H:i:s");
				$subscribeResult = $eloquent->insertData($tableName, $columnValue);
			}
			## ===*=== [I]NSERT NEWSLETTERS DATA | FOR BOTH SUCH AS FOOTER AND MODAL ===*=== ##
		?>
		<!--=*= MAIN SECTION START =*=-->
				<!--=*= MAIN SECTION START =*=-->
		<div class="page-wrapper">
			<header class="header" id="header">
				<div class="header-top">
					<div class="container">
						<div class="header-left header-dropdowns">
							<div class="header-dropdown">
								<a href="#">GNF</a>
								<div class="header-menu">
									<!-- <ul>
										<li><a href="#">EUR</a></li>
										<li><a href="#">USD</a></li>
									</ul> -->
								</div>
							</div>
							<div class="header-dropdown">
							<li><a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/favicon/fr.png" alt="France flag">FRENCH</a></li>
								<div class="header-menu">
									<ul>
										<li><a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/favicon/en.png" alt="England flag">ENGLISH</a></li>
										<li><a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/favicon/fr.png" alt="Guinee flag">FRENCH</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="header-right">
							<p class="welcome-msg">Passez Une bonne journée ! 
								
								<?php 
									#== GREETING MESSAGE | IF USER LOGGED IN OR NOT
									if(@$_SESSION['SSCF_login_id'] > 0) {
										echo '<b>'. @$_SESSION['SSCF_login_user_name'] .'</b>' ;
										} else {
										echo '<b> Invite </b>' ;
									}
								?>
								
							</p>
							<div class="header-dropdown dropdown-expanded">
								<a href="#">Links</a>
								<div class="header-menu">
									<ul>
										<li><a href="<?= Yii::$app->request->baseUrl.'/'.md5("site_acount") ?>">MON COMPTE</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl.'/'.md5("site_contact") ?>">Nous Contacter</a></li>
										
										<?php
											#== IF USER AVAILABLE | APPEARED DYNAMICALLY
											if(@$_SESSION['SSCF_login_id'] > 0) 
											{
												echo '<li><a href="'.Yii::$app->request->baseUrl.'/'.md5("site_deconnection").'">Deconnection</a></li>';
											}
											else 
											{
												echo '<li><a href="'.Yii::$app->request->baseUrl.'/'.md5("site_login").'">Connection</a></li>';	
											}
										?>
										
									</ul>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="header-middle">
					<div class="container">
						<div class="header-left">
							<a href="index.php" class="logo">
								<img style="height: 60px;" src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/favicon/logoFrontEnd.png" alt="SuperShop Logo">
							</a>
						</div>
						
						<!--=*= SEARCH BAR =*=-->
						<div class="header-center" style="padding-left: -20px;">
								<form  method="post" action="<?= Yii::$app->request->baseUrl.'/'.md5('site_recherche')?>">
								<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
								<div class="input-group" style="width: 100%; margin: 0px 60px;">
									<input type="search" class="form-control" name="keywords" id="search" placeholder="Tapez votre mot-clé de recherche" required>
									<div class="input-group-append">
										<button class="btn btn-sm btn-primary" type="submit"><i class="icon-magnifier"></i> RECHERCHER </button>
									</div>
									<div class="list-group list-group-flush list-style" id="show-list">
										
									</div>
								</div>
							</form>
						</div>
						<!--=*= SEARCH BAR =*=-->
						
						<div class="header-right">
							<button class="mobile-menu-toggler" type="button"><i class="icon-menu"></i></button>
							<div class="header-contact"><span>Appelez-nous maintenant</span>
								<a href="tel:#"><strong>+224 623 516 202</strong></a>
							</div>
							<div class="dropdown cart-dropdown">
								<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
									<span class="cart-count"> <?php echo count(@$myaddcartItems); ?> </span>
								</a>
								<div class="dropdown-menu" >
									<div class="dropdownmenu-wrapper">
										<div class="dropdown-cart-header">
											<span><?php echo count(@$myaddcartItems); ?> Elements</span>
											
											<?php
												if(count(@$myaddcartItems) > 0)
												{
													echo '<a href="'.Yii::$app->request->baseUrl.'/'.md5("site_card").'"> View Cart </a>';
												}
												else
												{
													echo '<a href="'.Yii::$app->request->baseUrl.'/'.md5("dite_index").'"> View Cart </a>';
												}
											?>
											
										</div>
										<div class="dropdown-cart-products">
											
											<?php 
												#== LIST OF ADD TO CARTED PRODUCT IN VIEW CART
												$subTotal = 0;
												foreach(@$myaddcartItems AS $eachCartItem)
												{
													echo '
													<div class="product">
														<div class="product-details">
															<h4 class="product-title">
																<a href="product.php?id='. $eachCartItem['id'] .'">'.$eachCartItem['product_name'].'</a>
															</h4>
															<span class="cart-product-info">
															<span class="cart-product-qty">'.$eachCartItem['quantity'].'</span> X '. Yii::$app->params['CURRENCY']. ' ' . $eachCartItem['product_price'].'</span>
														</div>
														<figure class="product-image-container">
															<a href="product.php?id='. $eachCartItem['id'] .'" class="checkout-image">
																<img src="'. Yii::$app->params['PRODUCT_DIRECTORY'] . $eachCartItem['product_master_image'].'" alt="product">
															</a>
														</figure>
													</div>
													';
													$subTotal += ($eachCartItem['quantity'] * $eachCartItem['product_price']);
												}
											?>
											
										</div>
										<div class="dropdown-cart-total">
											<span>Sous-total</span>
											<span class="cart-total-price"><?php echo   $subTotal . " " . Yii::$app->params['CURRENCY'] ; ?></span>
										</div>
										<div class="dropdown-cart-action">
											
											<?php
												if(count(@$myaddcartItems) > 0)
												{
													echo '<a href="'.Yii::$app->request->baseUrl.'/'.md5("site_card").'" class="btn btn-block"> Checkout </a>';
												}
												else
												{
													echo '<a href="'.Yii::$app->request->baseUrl.'/'.md5("site_index").'" class="btn btn-block"> Checkout </a>';
												}
											?>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header-bottom sticky-header">
					<div class="container">
						<nav class="main-nav">
							<ul class="menu sf-arrows">
								<li class="active"><a href="index.php">ACCEUIL</a></li>
								
								<?php
									#== CREATE DYNAMIC MAIN MENU FROM CATEGORIES
									foreach($categoryMenu as $eachCategory)
									{
										echo'
										<li><a href="#" class="sf-with-ul">'.$eachCategory['category_name'].'</a>
										<ul>';
										
										# GET SUBCATEGORIES DATA FOR SUB MENU BASED ON MAIN CATEGORIES
										$columnName = $tableName = $whereValue = null;
										$columnName = "*";
										$tableName = "subcategories";
										$whereValue['category_id'] = $eachCategory['id'];
										$subcategoryMenu = $eloquent->selectData($columnName, $tableName, @$whereValue);	
										
										foreach($subcategoryMenu as $eachSubcategory)
										{
											echo '<li><a href="'.Yii::$app->request->baseUrl.'/'.md5("site_categorie").'/'.$eachSubcategory['id'].'">'.$eachSubcategory['subcategory_name'].'</a></li>';
										}
										
										echo '</ul>
										</li>';
									}
								?>
								
							</ul>
						</nav>
					</div>
				</div>
			</header>		