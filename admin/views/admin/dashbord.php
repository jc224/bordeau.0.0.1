<!--=*= DASHBOARD SECTION START =*=-->
<div class="wrapper">	
	<div class="row states-info" style="text-transform: uppercase;">
		<div class="col-md-3">
			<div class="panel red-bg">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-usd"></i>
						</div>
						<div class="col-xs-8">
<<<<<<< HEAD
							<span class="state-title">  Vente Totale </span>
=======
							<span class="state-title"> Total Sale </span>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							<h4 class="counter"> <?= $totalSale ?> </h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel blue-bg">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-tags"></i>
						</div>
						<div class="col-xs-8">
<<<<<<< HEAD
							<span class="state-title"> Venes ce mois-ci</span>
=======
							<span class="state-title"> Sales This Month </span>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							<h4 class="counter"> <?= $monthSale ?> </h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel green-bg">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-gavel"></i>
						</div>
						<div class="col-xs-8">
<<<<<<< HEAD
							<span class="state-title"> Nouvelle Commande </span>
=======
							<span class="state-title"> New Order </span>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							<h4 class="counter"> <?= $totalOrder ?> </h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel yellow-bg">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-file-text"></i>
						</div>
						<div class="col-xs-8">
							<span class="state-title"> Total Tax </span>
							<h4 class="counter"> <?= $totalTax ?> </h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="row states-info" style="text-transform: uppercase;">
		<div class="col-md-3">
			<div class="panel green-bg">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-dot-circle-o"></i>
						</div>
						<div class="col-xs-8">
<<<<<<< HEAD
							<span class="state-title">Nouveaux produits  </span>
=======
							<span class="state-title"> New Products Added </span>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							<h4 class="counter"> <?= $newProduct ?> </h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel yellow-bg">
				
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-anchor"></i>
						</div>
						<div class="col-xs-8">
<<<<<<< HEAD
							<span class="state-title"> Produit Totale</span>
=======
							<span class="state-title"> Total Products </span>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							<h4 class="counter"> <?= $totalProduct ?></h4>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel red-bg">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-chain"></i>
						</div>
						<div class="col-xs-8">
<<<<<<< HEAD
							<span class="state-title"> Souscris au Newsletter  </span>
=======
							<span class="state-title"> Newsletter Subscriber </span>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							<h4 class="counter"> <?= $totalSubscriber ?> </h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel blue-bg">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-4">
							<i class="fa fa-user"></i>
						</div>
						<div class="col-xs-8">
<<<<<<< HEAD
							<span class="state-title"> Total Client </span>
=======
							<span class="state-title"> Register Customer </span>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							<h4 class="counter"> <?= $totalCustomer ?> </h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<div class="profile-pic text-center">
								<img alt="" src="<?= Yii::$app->request->baseUrl ?>/public/uploads/<?php echo  $_SESSION['SMC_login_admin_image']; ?>">
							</div>
							<div class="text-center" style="padding-bottom: 10px;">
								<h3> <?php echo $_SESSION['SMC_login_admin_name']; ?> </h3>
<<<<<<< HEAD
							</div>
							<a class="btn p-follow-btn pull-left" href="#"> <i class="fa fa-check"></i> Suivez Nous</a>
=======
								<h5 class="designation"> FULL STACK WEB DEVELOPER </h5>
							</div>
							<a class="btn p-follow-btn pull-left" href="#"> <i class="fa fa-check"></i> Following</a>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							<ul class="p-social-link pull-right">
								<li class="active">
									<a href="#">
										<i class="fa fa-github"></i>
									</a>
								</li>
								<li class="active">
									<a href="#">
										<i class="fa fa-stack-overflow"></i>
									</a>
								</li>
								<li class="active">
									<a href="#">
										<i class="fa fa-linkedin"></i>
									</a>
								</li>										
								<li class="active">
									<a href="#">
										<i class="fa fa-facebook"></i>
									</a>
								</li>									
								<li class="active">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
								</li>									
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<div style="margin-bottom: 10px;">
								<a class="btn p-follow-btn" href="mailto:md.aamroni@hotmail.com"> 
<<<<<<< HEAD
									<i class="fa fa-envelope"></i> &nbsp; bangaly@gmail.com
=======
									<i class="fa fa-envelope"></i> &nbsp; md.aamroni@hotmail.com 
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
								</a>
							</div>
							<div style="margin-bottom: 10px;">
								<a class="btn p-follow-btn" href="callto:8801316440504" style="margin-right: 8px;"> 
<<<<<<< HEAD
									<i class="fa fa-phone"></i> &nbsp; +224 623 516 202
								</a>
								
=======
									<i class="fa fa-phone"></i> &nbsp; +880 1316 440504
								</a>
								<a class="btn p-follow-btn" href="skype:live:.cid.5ed7daebee5e7820"> 
									<i class="fa fa-skype"></i> &nbsp; md.aamroni
								</a>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					
					<section class="panel">
						<div class="carousel slide auto panel-body" id="c-slide">
							<ol class="carousel-indicators out">
								<li data-target="#c-slide" data-slide-to="0" class="active"></li>
								<li data-target="#c-slide" data-slide-to="1" class=""></li>
								<li data-target="#c-slide" data-slide-to="2" class=""></li>
								<li data-target="#c-slide" data-slide-to="3" class=""></li>
							</ol>
							<div class="carousel-inner">
								<div class="item text-center active">
									<h3> SUPERSHOP | ONLINE SHOPPING STORE </h3>
									<p> frontEnd Development </p>
									<p class="text-muted">
										supershop.com is a eCommerce application where all of the data is totally dynamic content
									</p>
								</div>
								<div class="item text-center">
									<h3> SUPERSHOP | ONLINE SHOPPING STORE </h3>
									<p> frontEnd Development </p>
									<p class="text-muted">
										and also lightweight as well, so that it will be load fast as user expectation and friendly
									</p>
								</div>
								<div class="item text-center">
									<h3> SUPERSHOP | ONLINE SHOPPING STORE </h3>
									<p> backEnd Development </p>
									<p class="text-muted">
										in this application, designed with MVC pattern and also clean coding standard
									</p>
								</div>								
								<div class="item text-center">
									<h3> SUPERSHOP | ONLINE SHOPPING STORE </h3>
									<p> backEnd Development </p>
									<p class="text-muted">
										without any framework, in raw PHP this application is totally dynamic for crud operation
									</p>
								</div>
							</div>
							<a class="left carousel-control" href="#c-slide" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right carousel-control" href="#c-slide" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</section>
					
				</div>
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-body p-states green-box">
							<div class="summary pull-left">
								<h4>Front End <span>Skiils</span></h4>
								<span>Designing Languages &amp; Libraries</span>
								<h5> HTML, CSS, Boostrap, SASS, JavaScript, jQuery & Ajax </h5>
							</div>
							<div id="expense" class="chart-bar"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-body p-states green-box">
							<div class="summary pull-left">
								<h4>Back End <span>Skiils</span></h4>
								<span>Programming Languages, Framework &amp; Database</span>
								<h5>PHP, MySQL, Laravel, Python</h5>
							</div>
							<div id="pro-refund" class="chart-bar"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-body p-states green-box">
							<div class="summary pull-left">
								<h4>Adobe Professional <span>Skiils</span></h4>
								<span>Softwares and Platforms</span>
								<h5>Adobe Photoshop CC | Adobe Illustrator CC </h5>
							</div>
							<div id="expense2" class="chart-bar"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-body p-states green-box">
							<div class="summary pull-left">
								<h4>Others <span>Skiils</span></h4>
								<span>Softwares and Platforms</span>
								<h5> Microsoft Office 2019 | SEO | Digital Marketing </h5>
							</div>
							<div id="expense2" class="chart-bar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--=*= DASHBOARD SECTION END =*=-->