<!--=*= EDIT SLIDER SECTION START =*=-->
<div class="wrapper">
	<div class="row">
		<div class="col-lg-12">
			<ul class="breadcrumb panel">
				<li> <a href="dashboard.php"> <i class="fa fa-home"></i> Acceuil</a> </li>
				<li> <a href="dashboard.php">Tableau de Board </a> </li>
				<li class="active"> Modifier la Banner </li>
			</ul>
			<section class="panel"> 
				<header class="panel-heading">
					Modifier la Banner
				</header>
				<div class="panel-body">
					
					<?php 
						#== UPDATE CONFIRMATION MESSAGE
						if(isset($_POST['try_update']))
						{
							if($queryResult > 0)
							{
								echo '<div class="alert alert-success fade in">
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
											Les DONNER DE LA BANNER <strong> ONT ETE MODIFER AVEC SUCCES </strong>
										</div>';
							}
							else
							{
								echo '<div class="alert alert-warning fade in"> 
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button> 
										    ECHEC DE MODIFICATION <strong> VEUILLEZ REESSAYER </strong>
										</div>';
							}
						}
					?>
					
					<div class="form">
						<form class="form-horizontal" role="form" method="post"action="<?= yii::$app->request->baseUrl.'/'.md5('admin_updateslider') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>

                          <div class="form-group">
								<label for="SliderTitle" class="col-lg-2 col-sm-2 control-label">  Titre </label>
								<div class="col-lg-7">
									<input name="slider_title" value="<?= $queryResult[0]['slider_title'] ?>" type="text" class="form-control" required >
								</div>
							</div>
							<div class="form-group">
								<label for="SliderImage" class="control-label col-md-2 ">  Image </label>
								<div class="controls col-md-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<span class="btn btn-default btn-file">
											<input name="slider_file" type="file" class="default" onchange="readURL(this);" set-to="div4" value="<?php echo $queryResult[0]['slider_file']; ?>"/>
										</span>
										<span class="fileupload-preview" style="margin-left:5px;"></span>
										<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
									</div>
								</div>
							</div>
							<div class="form-group last">
								<label for="SliderPreview" class="control-label col-md-2"> Apercue</label>
								<div class="col-md-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 400px; height: 200px;">
											<img style="height: 100%; width: 100%;" src="<?= yii::$app->params['SLIDES_DIRECTORY'] . $queryResult[0]['slider_file'] ?>" alt="" id="div4" />
										</div>
									</div>
									<br/>
								</div>
							</div>
							<div class="form-group">
								<label for="SliderSequence" class="col-lg-2 col-sm-2 control-label"> Sequence</label>
								<div class="col-lg-7">
									<input name="slider_sequence" value="<?= $queryResult[0]['slider_sequence'] ?>" type="number" class="form-control">
								</div>
							</div>
							<div class="form-group ">
								<label for="SliderStatus" class="control-label col-lg-2">  Status </label>
								<div class="col-lg-7">
									<select class="form-control m-bot15" name="slider_status">
										<option <?php if($queryResult[0]['slider_status'] == "Active") echo "selected"; ?>> Active </option>
										<option <?php if($queryResult[0]['slider_status'] == "Inactive") echo "selected"; ?>> Inactive </option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button name="try_update" class="btn btn-primary" type="submit"> Modifier </button>
									<a href="list-slider.php" class="btn btn-default" style="text-decoration: none;"> Retourner a la liste </a>
								</div>
							</div>
						</form>	
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<!--=*= EDIT SLIDER SECTION END =*=-->														