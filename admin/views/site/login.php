

<div class="container">
			<form class="form-signin" method="post" action="<?= yii::$app->request->baseUrl.'/'.md5('site_login') ?>">
                    <?php
								$token2 = Yii::$app->getSecurity()->generateRandomString();
								$token2 = str_replace('+','.',base64_encode($token2));
								?>
								<!-- DEBUT : BASIC HIDDEN IMPUT FOR THE FORM --> 
								<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
								<input type="hidden" name="token2" value="<?= $token2 ?>"/>		
				<div class="form-signin-heading text-center">
					<h1 class="sign-title"> Connection </h1>
					<img class="disable d-flex" src="<?= yii::$app->request->baseUrl ?>/web/public/assets/images/favicon/loginBackEnd.png" alt="" style="height: 126px;"/>
				</div>
				<div class="login-wrap">
					<input name="username" type="email" class="form-control" placeholder="Email" >
					<input name="password" type="password" class="form-control" placeholder="Mots de passe" >
					<button name="try_login" class="btn btn-lg btn-login btn-block" type="submit">
						<i class="fa fa-check"></i>
					</button>
					<div class="registration">Vous n'êtes pas encore membre? <a href="registration.php"> Cree votre Boutique </a></div>
				</div>
			</form>
		</div>	
