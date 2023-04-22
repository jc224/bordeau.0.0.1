
<!--=*= LOG IN SECTION START =*=-->
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
				<li class="breadcrumb-item active" aria-current="page">Connection</li>
			</ol>
		</div>
	</nav>  
	<div class="container">
		
		<?php
			if(isset($_POST['user_login']))
			{
				#== ERROR MESSAGE IF USER IS EMPTY OR NOT REGISTER
				if(empty($userLogin))
				{
					echo '<div class="alert alert-danger">Cet utilisateurs n\'existe pas veuillez reissayer</div>';
				}
			}
		?>
		
		<div class="row">
			<div class="col">
				<div class="featured-boxes">
					<div class="row">
						<div class="col-md-5 offset-md-1">
						</div>
						<div class="col-md-5 offset-md-1">
							<div class="featured-box featured-box-primary text-left mt-5">
								<div class="box-content">
									<h2 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Connection</h2>
									<form action="" id="frmSignIn" method="post" action="<?= Yii::$app->request->baseUrl.'/'.md5('site_login')?>" class="needs-validation">
                                       <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                                        <div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">E-mail</label>
												<input type="email" name="user_email" class="form-control form-control-lg" placeholder="" required>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<a class="float-right" href="user-password.php">(Mots de passe Oublier?)</a>
												<label class="font-weight-bold text-dark text-2">Mots de passem</label>
												<input type="password" name="user_pass" class="form-control form-control-lg" placeholder="" required>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-lg-6">
												<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
											</div>
										</div>
										<div class="form-footer">
											<a href="index.php" class="btn btn-outline-warning">
												<i class="icon-angle-double-left"></i>ACCEUIL
											</a>
											<div class="form-footer-right">
												<button type="submit" name="user_login" class="btn btn-primary">CONNEXION</button>
											</div>
										</div>
										<div class="form-row">
											<div class="font-weight-bold text-info text-2">
												OU | <a href="<?= Yii::$app->request->baseUrl.'/'.md5("site_acount") ?>" class="btn btn-info">Ajouter un compte</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>	
<!--=*= LOG IN SECTION END =*=-->