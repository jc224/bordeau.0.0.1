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
