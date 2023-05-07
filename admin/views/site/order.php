
<!--=*= ORDER SUBMISSION SECTION START =*=-->
<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Orders & Shipping</li>
			</ol>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<ul class="checkout-progress-bar">
						<li class="active"><span>Orders & Shipping</span></li>	
						<li><span>Payment Integration</span></li>	
						<li><span>Review &amp; Status</span></li>
					</ul>
				</div>
				
				<?php
					#== SUBMISSION CONFIRMATION IMAGE WHEN ORDER PLACED IS SUCCESFULLY DONE
					if(isset($_POST['submit_order']))
					{
						if(@$saveorderDetails > 0)
						echo '
						<div class="d-flex justify-content-center">
							<img src="public/assets/images/success.png" alt="" class="img-fluid">
						</div>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Dear Mr. <strong> ' . $_SESSION['SSCF_login_user_name'] . ' </strong>, 
							thanks for your order submission. Please fill up the below <b> Shipping Details </b>, so that we delivered your product at your destination.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
					}
					
					#== LOGGED IN CONFIRMATION MESSAGE
					else if( isset($_POST['user_login']) )
					{
						if(@$_SESSION['SSCF_login_id'] > 0)
						echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Dear Mr. <strong> ' . $_SESSION['SSCF_login_user_name'] . ' </strong>, 
							thanks for your order submission. Please fill up the below <b> Shipping Details </b>, so that we delivered your product at your destination.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
					}
					
					#== REGISTRATION CONFIRMATION MESSAGE
					else if(isset($_POST['customerRegistration']))
					{
						if($registerCustomer['LAST_INSERT_ID'] > 0)
						echo '
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Dear Customer you have succesfully <b> Registered</b>.
							Please <b> Login </b> and submit your shipping address details.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
					}
				?>

			</div>
		</div>
		<div class="mb-6">
			<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-5">
						<ul class="checkout-steps">
							<h2 class="step-title">Connection</h2>
							<li>
                            <form method="post"  action="<?= Yii::$app->request->baseUrl.'/'.md5('site_commande')?>">
                                   <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                                <div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">E-mail</label>
												<input type="email" name="user_email" class="form-control form-control-lg" placeholder="" required>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">Mots de passem</label>
												<input type="password" name="user_pass" class="form-control form-control-lg" placeholder="" required>
											</div>
										</div>
									<p>You already have an account with us. Sign in or continue..</p>
									<div class="form-footer">
										<button type="submit" name="user_login" class="btn btn-primary">Connexion</button>
										<a href="forgot-password.php" class="forget-pass"> Mots de passe Oublier?</a>
									</div>
								</form>
							</li>
							<div class="checkout-discount">
								<h2 class="step-title">
									<a data-toggle="collapse" href="#checkout-discount-section" class="collapsed" role="button" aria-expanded="false" aria-controls="checkout-discount-section">
										CREE UN NOUVEAU COMPTE
									</a>
								</h2>
								<li>
									<div class="collapse" id="checkout-discount-section">
                                    <form method="post"  action="<?= Yii::$app->request->baseUrl.'/'.md5('site_commande')?>">
                                   <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                                   <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group required-field">
                                                <label for="acc-name" class="font-weight-bold text-dark text-2">Nom</label>
                                                <input type="text" class="form-control" name="acc_fname" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group required-field">
                                                <label for="acc-mname" class="font-weight-bold text-dark text-2">Prenom</label>
                                                <input type="text" class="form-control"  name="acc_lname" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required-field">
                                <label for="acc-email" class="font-weight-bold text-dark text-2">Email</label>
                                <input type="email" class="form-control"  name="acc_email" placeholder="bordeau224@gmail.com" required>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group required-field">
                                                <label for="acc-password" class="font-weight-bold text-dark text-2">Mots de Pass</label>
                                                <input type="password" class="form-control" name="acc_password" required>
                                            </div>					
                                        </div>									
                                        <div class="col-md-5">
                                            <div class="form-group required-field">
                                                <label for="acc-password" class="font-weight-bold text-dark text-2">Numero de telephone</label>
                                                <input type="text" class="form-control" name="acc_mobile" placeholder="0224*********" required>
                                            </div>					
                                        </div>					
                                    </div>					
                                </div>					
                            </div>	
                            <div class="form-group required-field">
                                <label for="acc-email" class="font-weight-bold text-dark text-2">Addresse</label>
                                <input type="text" class="form-control" name="acc_address" placeholder="" required>
                            </div>					
                            <div class="mb-2">
                                <!--=*= CREATE A EMPTY SPACE BETWEEN CONTENT =*=-->
                            </div>
                            <div class="required text-right">* Required Field</div>
                            <div class="form-footer">
                                <a href="<?= Yii::$app->request->baseUrl.'/'.md5("site_index")?>" class="btn btn-outline-warning"><i class="icon-angle-double-left"></i>Acceuil</a>
                                <div class="form-footer-right">
                                    <button type="submit" name="userRegistration" class="btn btn-outline-success">Enregistrer</button>
                                </div>
                            </div>
										</form>
									</div>
								</li>
							</div>
						</ul>
					</div>
					<div class="col-lg-5 offset-lg-2">
						<ul class="checkout-steps">
							<li>
								<h2 class="step-title mb-2">Addresse de Livraison</h2>
                                <form method="post"  action="<?= Yii::$app->request->baseUrl.'/'.md5('site_paiement')?>">
                                   <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>

                                    <div class="form-group required-field">
										<label> Prénom </label>
										<input type="text" id="f1" name="shipadd_fname" class="form-control">
									</div>
									<div class="form-group required-field">
										<label>Nom</label>
										<input type="text" id="f2" name="shipadd_lname" class="form-control">
									</div>
									<div class="form-group">
										<label>Profession <span class="text-warning">(optional)</span></label>
										<input type="text" name="shipadd_cmpny" class="form-control">
									</div>
									<div class="form-group required-field">
										<label>Street Address </label>
										<input type="text" id="f3"  hidden name="shipadd_stadd" class="form-control">
									</div>
									<div class="form-group required-field">
										<label>Quartier </label>
										<input type="text" id="f4" name="shipadd_cty" class="form-control">
									</div>
									<div class="form-group required-field">
										<label> Code Postal</label>
										<input type="text" id="f5" name="shipadd_zopc" class="form-control">
									</div>
									<div class="form-group">
										<label>Pays</label>
										<input type="text" name="shipadd_cntry" class="form-control" value="Guinnee">
									</div>
									<div class="form-group required-field">
										<label>Numero </label>
										<div class="form-control-tooltip">
											<input type="tel" id="f6" name="shipadd_phn" class="form-control">
											<span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right">
												<i class="icon-question-circle"></i>
											</span>
										</div>
									</div>
										<div id="error-message"></div>
									<button type="submit" name="proceed_to_payment" id="save-data" class="btn btn-sm btn-warning float-right"> 
                                        Valider et proceder au paiement
									</button>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="mb-6">
		<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
	</div>
</main>
<!--=*= ORDER SUBMISSION SECTION START =*=-->

<script type="text/javascript">
	$(document).ready(function(){
		$('#save-data').click(function(e){
			
			var fName = $("#f1").val();
			var lName = $("#f2").val();
			var stAdd = $("#f3").val();
			var city = $("#f4").val();
			var zipCode = $("#f5").val();
			var phone = $("#f6").val();
            return true;
			// if(fName == '' || lName == '' || stAdd == '' || city == '' || zipCode == '' || phone == '') {
			// 	e.preventDefault();				
			// 	$("#error-message").html('<div class="alert alert-warning alert-dismissible fade show" role="alert">All fields <b>*</b> are required!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').slideDown();
			// } else {
			// 	return true;
			// }
		});
	});
</script>