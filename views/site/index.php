<?php             $homeCtrl = yii::$app->homeClass;?>

<!--=*= HOME SECTION START =*=-->
<main class="main">
	<div class="home-top-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="home-slider owl-carousel owl-carousel-lazy">
						
					<?php 
						#== DYNAMIC SLIDER IMAGES
						foreach($slidesList AS $eachSlide)
						{
							echo '
							<div class="home-slide">
								<img class="owl-lazy" src="'.Yii::$app->request->baseUrl.'/web/public/assets/images/lazy.png" data-src="'.Yii::$app->params['SLIDES_DIRECTORY'] . $eachSlide['slider_file'].'" alt="slider image">
								<div class="home-slide-content">
									<h1 class="text-primary">'.$eachSlide['slider_title'].'</h1>
								</div>
							</div>';
						}
					?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="info-boxes-container">
		<div class="container">
			<div class="info-box">
				<i class="icon-shipping"></i>
				<div class="info-box-content">
					<h4>FREE SHIPPING & RETURN</h4>
					<p>Free shipping on all orders over $99.</p>
				</div>
			</div>
			<div class="info-box">
				<i class="icon-us-dollar"></i>
				<div class="info-box-content">
					<h4>MONEY BACK GUARANTEE</h4>
					<p>100% money back guarantee</p>
				</div>
			</div>
			<div class="info-box">
				<i class="icon-support"></i>
				<div class="info-box-content">
					<h4>ONLINE SUPPORT 24/7</h4>
					<p>Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="home-product-tabs">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="featured-products-tab" data-toggle="tab" href="#featured-products" role="tab" aria-controls="featured-products" aria-selected="true">Men</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane  show active" id="featured-products" role="tabpanel" aria-labelledby="featured-products-tab">
							<div class="row row-sm">
								
							<?php
								#== MEN'S PRODUCT BASE ON LAST ADDED AND IN STOCK
								echo $homeCtrl->productLister($menProducts);
							?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="home-product-tabs">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="featured-products-tab" data-toggle="tab" href="#featured-products" role="tab" aria-controls="featured-products" aria-selected="true">Women</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane  show active" id="featured-products" role="tabpanel" aria-labelledby="featured-products-tab">
							<div class="row row-sm">
								
							<?php
								#== WOMEN'S PRODUCT BASE ON LAST ADDED AND IN STOCK
								echo $homeCtrl->productLister($womenProducts);
							?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="home-product-tabs">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="featured-products-tab" data-toggle="tab" href="#featured-products" role="tab" aria-controls="featured-products" aria-selected="true">Watch</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane  show active" id="featured-products" role="tabpanel" aria-labelledby="featured-products-tab">
							<div class="row row-sm">
								
							<?php
								#== WATCH'S PRODUCT BASE ON LAST ADDED AND IN STOCK
								echo($homeCtrl->productLister($watchProducts));

							?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="partners-container">
		<div class="container">
			<div class="partners-carousel owl-carousel owl-theme">
				<a href="#" class="partner">
					<img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/brand/brand(1).png" alt="logo">
				</a>
				<a href="#" class="partner">
					<img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/brand/brand(2).png" alt="logo">
				</a>
				<a href="#" class="partner">
					<img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/brand/brand(3).png" alt="logo">
				</a>
				<a href="#" class="partner">
					<img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/brand/brand(4).png" alt="logo">
				</a>
				<a href="#" class="partner">
					<img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/brand/brand(5).png" alt="logo">
				</a>				
				<a href="#" class="partner">
					<img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/brand/brand(1).png" alt="logo">
				</a>				
				<a href="#" class="partner">
					<img src="<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/brand/brand(2).png" alt="logo">
				</a>
			</div>
		</div>
	</div>
</main>
<!--=*= HOME SECTION START =*=-->