<<<<<<< HEAD


<div class="container">
			<form class="form-signin" method="post" action="<?= yii::$app->request->baseUrl.'/'.md5('site_login') ?>">
                    <?php
=======
	
		<div class="container">
        <form class="form-signin" method="post"  action="<?= Yii::$app->request->baseUrl.'/'.md5('site_index')?>">
			<?php
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
								$token2 = Yii::$app->getSecurity()->generateRandomString();
								$token2 = str_replace('+','.',base64_encode($token2));
								?>
								<!-- DEBUT : BASIC HIDDEN IMPUT FOR THE FORM --> 
								<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
<<<<<<< HEAD
								<input type="hidden" name="token2" value="<?= $token2 ?>"/>		
				<div class="form-signin-heading text-center">
					<h1 class="sign-title"> Connection </h1>
					<img class="disable d-flex" src="<?= yii::$app->request->baseUrl ?>/web/public/assets/images/favicon/loginBackEnd.png" alt="" style="height: 126px;"/>
				</div>
				<div class="login-wrap">
					<input name="username" type="email" class="form-control" placeholder="Email" >
=======
								<input type="hidden" name="token2" value="<?= $token2 ?>"/>					<div class="form-signin-heading text-center">
					<h1 class="sign-title">Connection </h1>
					<img class="disable" src="<?= Yii::$app->request->baseUrl ?>/public/assets/images/favicon/loginBackEnd.png" alt="" style="height: 126px;"/>
				</div>
				<div class="login-wrap">
					<input name="username" type="email" class="form-control" placeholder="Email " >
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
					<input name="password" type="password" class="form-control" placeholder="Mots de passe" >
					<button name="try_login" class="btn btn-lg btn-login btn-block" type="submit">
						<i class="fa fa-check"></i>
					</button>
<<<<<<< HEAD
					<div class="registration">Vous n'êtes pas encore membre? <a href="registration.php"> Cree votre Boutique </a></div>
				</div>
			</form>
		</div>	
=======
					<div class="registration"> Pas Encore Membre <a href="registration.php"> Ajouter Votre Boutique </a></div>
				</div>
			</form>
		</div>	
		
		<!--=*= JS FILES SOURCE START =*=-->
		<script src="./public/js/jquery-3.5.1.min.js"></script>
		<script src="./public/js/bootstrap.min.js"></script>
		<script src="./public/js/modernizr.min.js"></script>
		<!--=*= JS FILES SOURCE END =*=-->
		
	</body>
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
