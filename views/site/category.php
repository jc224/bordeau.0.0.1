<?php             $eloquent =  yii::$app->eloquantClass;
?>
<!--=*= CATEGORY SECTION START =*=-->
<main class="main">
	<div class="banner banner-cat" style="background-image: url('<?=Yii::$app->request->baseUrl."/web/public/uploads/banners/". $categoryResult[0]['subcategory_banner']; ?>');">
		<div class="banner-content container">
			<h2 class="banner-subtitle"><span>check out our latest collection <?= date("Y"); ?></span></h2>
			<h1 class="banner-title">
				<?= @$categoryResult[0]['subcategory_name']; ?>
			</h1>
			<a href="#" class="btn btn-primary">Shop Now</a>
		</div>
	</div>
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item"><a href="#"><?= @$categoryResult[0]['category_name']; ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><?= $categoryResult[0]['subcategory_name']; ?></li>
			</ol>
		</div>
	</nav>
	<div class="container">
		<nav class="toolbox horizontal-filter">
			<div class="toolbox-left">
				<div class="filter-toggle">
					<span>Filters:</span>
					<a href=#>&nbsp;</a>
				</div>
			</div>
			<div class="toolbox-item toolbox-sort">
				<div class="select-custom">
					<select name="orderby" class="form-control">
						<option value="menu_order" selected="selected">DEFAULT SORTING</option>
						<option value="popularity">POPULARITY</option>
						<option value="date">NEW PRODUCT</option>
						<option value="price">PRICE (LOW to HIGH)</option>
						<option value="price-desc">PRICE (HIGH to LOW)</option>
					</select>
				</div>
				<a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a>
			</div>
			<div class="toolbox-item">
				<div class="toolbox-item toolbox-show">
					
					<?php
						if(!empty($categoryDetails))
						{
							echo '<label>Showing '. ($cp + 1) . '–' . $text . ' of ' . $nod.' results</label>'; 
						}
						else
						{
							echo '<label>Showing 0-0 of 0 results</label>'; 
						}
					?> 
					
				</div>
				<div class="layout-modes">
					<a href="category.php" class="layout-btn btn-grid active" title="Grid">
						<i class="icon-mode-grid"></i>
					</a>
					<a href="category-list.php" class="layout-btn btn-list" title="List">
						<i class="icon-mode-list"></i>
					</a>
				</div>
			</div>
			<div class="toolbox-item">
			</nav>
			<div class="row products-body">
				<div class="col-lg-9 main-content">
					
					<?php
						# IF PRODUCT IS UNAVAILABLE AN IMAGE WIL BE APPEAR
						if(empty($categoryDetails))
						{
							echo "<div class='d-flex justify-content-center'>
										<img src='".Yii::$app->request->baseUrl."/web/public/assets/images/sorry.png' style='width: auto; height:400px;'/>
									</div>";
						}
					?>
					
					<div class="row row-sm category-grid">
						
						<?php
							# PRODUCT DATA BASED ON SUBCATEGORY
							if(!empty($categoryDetails))
							{
								foreach($categoryDetails AS $eachCategory)
								{
									# ASSIGN A NEW VARIABLE IF PRODUCT IMAGE IS NOT UNAVAILABLE
									if(empty($eachCategory['product_master_image']))
									{
										$productImage = "<img src='".Yii::$app->request->baseUrl."web/public/assets/images/no-product-found.png'>";
                                        die($productImage);

                                    } 
									else 
									{
										$productImage = Yii::$app->request->baseUrl."/web/public/uploads/products/".$eachCategory['product_master_image'];
									}
									echo '
									<div class="col-6 col-md-4 col-xl-3">
										<div class="grid-product">
											<figure class="product-image-container">
												<a href="product.php?id='.$eachCategory['id'].'" class="categoryflexgrid-image">
													<img src="'. $productImage .'" alt="product">
												</a>
												<a href="ajax/product-quick-view.html" class="btn-quickview">Quick View</a>
											</figure>
											<div class="product-details">
												<div class="ratings-container">
													<div class="product-ratings">
														<span class="ratings" style="width:80%"></span>
													</div>
												</div>
												<h2 class="product-title">
													<a href="product.php?id='.$eachCategory['id'].'">' . $eachCategory['product_name'] . '</a>
												</h2>
												<div class="price-box">
													<span class="product-price">' . Yii::$app->params['CURRENCY']  . " " . $eachCategory['product_price'] . '</span>
												</div>
												<div class="product-grid-action d-flex justify-content-center" style="display: inline;">
													<form method="post" action="">
														<button href="#" class="paction add-wishlist" title="Add to Wishlist">
															<span>Add to Wishlist</span>
														</button>
														<input type="hidden" name="cart_product_id" value="'. $eachCategory['id'] .'"/>
														<input type="hidden" name="cart_product_quantity" value="1"/>
														<button type="submit" name="add_to_cart" class="paction add-cart" title="Add to Cart" style="margin-left: 7px; padding-top: 6px;">
															<span>Add to Cart</span>
														</button>
														<button href="#" class="paction add-compare" title="Add to Compare">
															<span>Add to Compare</span>
														</button>
													</form>
												</div>
											</div>
										</div>
									</div>
									';
								}
							}
						?>
						
					</div>
					<nav class="toolbox toolbox-pagination">
						<div class="toolbox-item toolbox-show">
							
							<?php
								if(!empty($categoryDetails))
								{
									echo '<label>Showing '. ($cp + 1) . '–' . $text . ' of ' . $nod.' results</label>'; 
								}
							?>
							
						</div>
						
						<?php
							if(!empty($categoryDetails))
							{
						?>
							
							<ul class="pagination">
								<li class="page-item">
									
									<a class="page-link page-link-btn" href="category.php?page=<?= $previous ?>">
										<span class="page-link"><i class="icon-angle-left"></i> Previous &nbsp;</span>
									</a>
								</li>
								
								<?php 
									#== PAGINATION NUMBER
									echo $pageNumber;
								?>
								
								<li class="page-item">
									<a class="page-link page-link-btn" href="category.php?page=<?= $next ?>">
										<span class="page-link">&nbsp; Next <i class="icon-angle-right"></i></span>
									</a>
								</li>
							</ul>
							
						<?php
							}
						?>
						
					</nav>
				</div>
				<div class="sidebar-overlay"></div>
				<aside class="sidebar-shop col-lg-3 order-lg-first">
					<div class="sidebar-wrapper">
						<div class="widget">
							<h3 class="widget-title">
								<a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">
									
									<?php
										#== SUBCATEGORY CATEGORY NAME
										echo $categoryResult[0]['category_name'];
									?>
									
								</a>
							</h3>
							<div class="collapse show" id="widget-body-2">
								<div class="widget-body">
									<ul class="cat-list">
										
										<?php
											#== RELEVANT SUBCATEGORY LIST BASED ON CATEGORY
											$columnName= $tableName= $whereValue= null;
											$columnName = "*";
											$tableName = "subcategories";
											$whereValue['category_id'] =  $categoryResult[0]['id']; 
											$subcategoryList = $eloquent->selectData($columnName, $tableName, @$whereValue); 
											
											foreach($subcategoryList AS $eachsubcategory)
											{
												echo'<li><a href="category.php?id='.$eachsubcategory['id'].'">'.$eachsubcategory['subcategory_name'].'</a></li>';
											}
											
											
										?>
									</ul>
								</div>
							</div>
						</div>
						<div class="widget">
							<h3 class="widget-title">
								<a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
							</h3>
							<div class="collapse show" id="widget-body-3">
								<div class="widget-body">
									<form action="" method="post">
										<div class="price-slider-wrapper">
											<div id="price-slider"></div>
										</div>
										<div class="filter-price-action">
											<button type="submit" class="btn btn-primary">Filter</button>
											<div class="filter-price-text"> Price: <span id="filter-price-range"></span> </div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="widget">
							<h3 class="widget-title">
								<a data-toggle="collapse" href="#widget-body-6" role="button" aria-expanded="true" aria-controls="widget-body-6">Color</a>
							</h3>
							<div class="collapse show" id="widget-body-6">
								<div class="widget-body">
									<ul class="config-swatch-list d-flex">
										<li class="" style="">
											<a href="#"><span class="color-panel" style="background-color: #1645f3;"></span></a>
											<a href="#"><span class="color-panel" style="background-color: #f11010;"></span></a>
											<a href="#"><span class="color-panel" style="background-color: #fe8504;"></span></a>
											<a href="#"><span class="color-panel" style="background-color: #2da819;"></span></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
	<div class="mb-5">
		<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
	</div>
</main>
<!--=*= CATEGORY SECTION START =*=-->		