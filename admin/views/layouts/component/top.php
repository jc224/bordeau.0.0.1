<section>
			<div class="left-side sticky-left-side">														
				<div class="logo">
					<a href="<?=yii::$app->request->baseUrl.'/'.md5('site_dashboard') ?>">
						<img src="<?=yii::$app->request->baseUrl ?>/web/public/assets/images/favicon/logoBackEnd.png" alt="" height="36px">
					</a>
				</div>
				<div class="logo-icon text-center">
					<a href="<?=yii::$app->request->baseUrl.'/'.md5('site_dashboard') ?>">
						<img src="<?=yii::$app->request->baseUrl ?>/web//public/assets/images/favicon/logoBackEnd(1).png" alt="" height="34px" width="34px">
					</a>
				</div>
				<div class="left-side-inner">
					
					<!--=*= VISIBLE ON SMALL DEVICES =*=-->
					<div class="visible-xs hidden-sm hidden-md hidden-lg">			
						<div class="media logged-user">
							<img alt="" src="<?php //echo $GLOBALS['ADMINS_DIRECTORY'] . $_SESSION['SMC_login_admin_image']; ?>" class="media-object">
							<div class="media-body">
								<h4> <a href="#"> <?php// echo $_SESSION['SMC_login_admin_name']; ?> </a> </h4>
								<span> FULL STACK WEB DEVELOPER </span>
							</div>
						</div>
						<h5 class="left-nav-title"> Account Information </h5>
						<ul class="nav nav-pills nav-stacked custom-nav">
							<!-- <li>
								<a href="?exit=lock"> <i class="fa fa-user"></i> <span> Lock Screen </span> </a>
							</li> -->
							<li>
								<a href="?exit=yes"> <i class="fa fa-sign-out"></i> <span> Se déconnecter </span> </a>
							</li>
						</ul>
					</div>
					<!--=*= VISIBLE ON SMALL DEVICES =*=-->
					
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li>
							<a href="dashboard.php">
								<i class="fa fa-home"></i> <span>Tableau de bord</span>
							</a>
						</li>
						
						<?php
							## ===*=== [A]CCESS CONTROL CONTENT START ===*=== ##
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Technical Operator")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-user"></i> <span>Admin</span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> <i class="fa fa-plus-circle"></i> Create Admin </a>
										</li>
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> <i class="fa fa-user"></i> List Admin </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Content Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-picture-o"></i></i> <span>Gestion de la Banner </span> </a> <i class="fas fa-sliders-h"></i>
									<ul class="sub-menu-list">
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('admin_crateslidbar').'"> Ajouter une banner </a>
										</li>
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('admin_listeslidbar').'"> Liste des Banners </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-users"></i> <span> Gestion des Clients</span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Liste des Clients </a>
										</li>
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Suivie des client </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Technical Operator")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-folder-open"></i> <span> Gestion des  Categorie </span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Cree un cqtegorie </a>
										</li>
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Liste des categories </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Technical Operator")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-list-alt"></i> <span> Sous Categorie	 </span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Create Sub Category </a>
										</li>
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Sub Category List </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Content Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-th"></i> <span> Gestion des Produits </span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Crée un produit</a>
										</li>
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Liste des produits </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-tags"></i> <span>Gestion des commandes </span> </a> <i class="fas fa-sort-amount-up-alt"></i>
									<ul class="sub-menu-list">
										<li>
										<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Orders List </a>
										</li>
										<li>
										<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Invoice List </a>
										</li>
									</ul>
								</li>';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-tags"></i> <span> SEO </span> </a> <i class="fas fa-sort-amount-up-alt"></i>
									<ul class="sub-menu-list">
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Pages </a>
										</li>										
										<li>
											<a href="'.yii::$app->request->baseUrl.'/'.md5('lient').'"> Pages Details </a>
										</li>
									</ul>
								</li>';
							}
							## ===*=== [A]CCESS CONTROL CONTENT END ===*=== ##
						?>
						
					</ul>
				</div>
			</div>
				
				
				<!--=*= MAIN CONTENT START =*=-->
				<div class="main-content" >
					<div class="header-section">
						<a class="toggle-btn"> <i class="fa fa-bars"></i> </a>
						
						<form class="searchform" action="" method="post">
							<input type="text" class="form-control" name="keyword" placeholder="Search here..." />
						</form>
						
						<div class="menu-right">
							<ul class="notification-menu">
								<li>
									<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<img src="<?php //echo $GLOBALS['ADMINS_DIRECTORY'] . $_SESSION['SMC_login_admin_image']; ?>" alt="" />
										<?php //	echo $_SESSION['SMC_login_admin_name']; ?> 
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
										<li>
											<a href="?exit=lock"><i class="fa fa-user"></i> Lock Screen </a>
										</li>
										<li>
											<a href="?exit=yes"><i class="fa fa-sign-out"></i> Log Out </a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>																																																	