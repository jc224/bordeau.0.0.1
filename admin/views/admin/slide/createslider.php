<div class="wrapper">
	<div class="row">
		<div class="col-lg-12">
			<ul class="breadcrumb panel">
				<li> <a href="dashboard.php"><i class="fa fa-home"></i> Acceuil </a> </li>
				<li> <a href="dashboard.php"> Tabeau de Board </a> </li>
				<li class="active"> Ajouter une Banner </li>
			</ul>
			<section class="panel">
				<header class="panel-heading">
					Ajouter une Banner
				</header>
				<div class="panel-body">
					
					<?php
						#== INSERT CONFIRMATION MESSAGE
						if( $req != "")
						{
							if($req > 0)
							{


								echo '<div class="alert alert-success fade in"> 
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
											La BAnner a ete ajouter<strong>  avec succes </strong>
										</div>';
							}
							else
							{
								echo '<div class="alert alert-warning fade in"> 
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button> 
											Erreur d\'ajout<strong> Veuillez reisaayer </strong>
										</div>';
							}
						}
					?>
					
					<form class="form-horizontal" role="form" method="post" action="<?= yii::$app->request->baseUrl.'/'.md5('admin_crateslidbar') ?>" enctype="multipart/form-data">
                     <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>

                        <div class="form-group">
							<label for="SliderTitle" class="col-lg-2 col-sm-2 control-label">Titre De la Banner </label>
							<div class="col-lg-7">
								<input name="slider_title" type="text" class="form-control" placeholder="Titre" required >
							</div>
						</div>
						<div class="form-group">
							<label for="SliderImage" class="control-label col-md-2 ">  Image de la Banner</label>
							<div class="controls col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<span class="btn btn-default btn-file">
										<input name="slider_file" type="file" class="default" onchange="readURL(this);" set-to="div3" required />
									</span>
									<span class="fileupload-preview" style="margin-left:5px;"></span>
									<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
								</div>
							</div>
						</div>
						<div class="form-group last">
							<label for="SliderPreview" class="control-label col-md-2"> Apercue </label>
							<div class="col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 400px; height: 200px;">
										<img src="http://www.placehold.it/400x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" id="div3" style="width: 100%; height: 100%;"/>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="SliderSequence" class="col-lg-2 col-sm-2 control-label"> Sequence </label>
							<div class="col-lg-7">
								<input name="slider_sequence" type="number" class="form-control" placeholder="Sequence d'apparition" required>
							</div>
						</div>
						<div class="form-group ">
							<label for="SliderStatus" class="control-label col-lg-2"> Status </label>
							<div class="col-lg-7">
								<select name="slider_status" class="form-control m-bot15" required>
									<option> Active </option>
									<option> Inactive </option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button name="create_slider" class="btn btn-success" type="submit"> Enregistrer </button>
								<button class="btn btn-default" type="reset"> Annuler </button>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>