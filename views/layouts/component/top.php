<section>
			<div class="left-side sticky-left-side">														
				<div class="logo">
					<a href="dashboard.php">
						<img src="<?= Yii::$app->request->baseUrl ?>/public/assets/images/favicon/logoBackEnd.png" alt="" height="36px">
					</a>
				</div>
				<div class="logo-icon text-center">
					<a href="dashboard.php">
						<img src="<?= Yii::$app->request->baseUrl ?>/public/assets/images/favicon/logoBackEnd(1).png" alt="" height="34px" width="34px">
					</a>
				</div>
				<div class="left-side-inner">
					
					<!--=*= VISIBLE ON SMALL DEVICES =*=-->
					<div class="visible-xs hidden-sm hidden-md hidden-lg">			
						<div class="media logged-user">
							<img alt="" src="<?= Yii::$app->request->baseUrl ?>/public/uploads/<?php echo  $_SESSION['SMC_login_admin_image']; ?>" class="media-object">
							<div class="media-body">
								<h4> <a href="#"> <?php echo $_SESSION['SMC_login_admin_name']; ?> </a> </h4>
								<span> FULL STACK WEB DEVELOPER </span>
							</div>
						</div>
						<h5 class="left-nav-title"> Account Information </h5>
						<ul class="nav nav-pills nav-stacked custom-nav">
							<li>
								<a href="?exit=lock"> <i class="fa fa-user"></i> <span> Verrouiller l'ecran </span> </a>
							</li>
							<li>
								<a href="?exit=yes"> <i class="fa fa-sign-out"></i> <span> Deconnexion </span> </a>
							</li>
						</ul>
					</div>
					<!--=*= VISIBLE ON SMALL DEVICES =*=-->
					
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li>
							<a href="dashboard.php">
								<i class="fa fa-home"></i> <span> Tableau de Bord</span>
							</a>
						</li>
						
						<?php
							## ===*=== [A]CCESS CONTROL CONTENT START ===*=== ##
							if($_SESSION['SMC_login_admin_type'] == "Root        Admin" || $_SESSION['SMC_login_admin_type'] == "Technical Operator")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-user"></i> <span>Manage Admin</span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_creatadmin').'"> <i class="fa fa-plus-circle"></i> Create Admin </a>
										</li>
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_adminliste').'"> <i class="fa fa-user"></i> List Admin </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Content Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-picture-o"></i></i> <span> Banner</span> </a> <i class="fas fa-sliders-h"></i>
									<ul class="sub-menu-list">
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_crateslidbar').'"> Ajouter un Banner</a>
										</li>
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_listeslidbar').'"> Liste des   Banner </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-users"></i> <span> Gestion des Clients </span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_listesclient').'"> Gestion Des Client </a>
										</li>
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_review').'"> Clients </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Technical Operator")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-folder-open"></i> <span> Gestion des Categorie </span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_creatcategorie').'"> Ajouter Une Categorie </a>
										</li>
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_listcategorie').'"> Liste des Categorie</a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Technical Operator")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-list-alt"></i> <span> Gestion Des Sous Categorie </span> </a>
									<ul class="sub-menu-list">
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_subcategorie').'"> Ajuter un Sous Categorie </a>
										</li>
										<li>
											<a href="'. yii::$app->request->baseurl.'/'.md5('admin_listesubcat').'"> Liste Des Sous Categorie </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Content Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-th"></i> <span> Gestion des produits </span> </a>
									<ul class="sub-menu-list">
										<li>
										<a href="'. yii::$app->request->baseurl.'/'.md5('admin_addproduits').'"> Ajouter Un Produits </a>
										</li>
										<li>
										<a href="'. yii::$app->request->baseurl.'/'.md5('admin_listeproduits').'"> Liste des produits </a>
										</li>
									</ul>
								</li>
								';
							}
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list">
									<a href="#"> <i class="fa fa-tags"></i> <span> Commande</span> </a> <i class="fas fa-sort-amount-up-alt"></i>
									<ul class="sub-menu-list">
										<li>
										<a href="list-order.php"> Commande </a>
										</li>
										<li>
										<a href="invoice-list.php">factures </a>
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
											<a href="pages.php"> Pages </a>
										</li>										
										<li>
											<a href="pages-details.php"> Pages Details </a>
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
										<img src="<?= Yii::$app->request->baseUrl ?>/public/uploads/<?php $_SESSION['SMC_login_admin_image']; ?>" alt="" />
										<?php echo $_SESSION['SMC_login_admin_name']; ?> 
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