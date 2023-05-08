
<?php
            $eloquent =  yii::$app->eloquantClass;

## ===*=== [C]HANGE CATEGORY STATUS ===*=== ##
if(isset($_POST['change_status']))
{
	$tableName = $columnValue = $whereValue = null;
	$tableName = "categories";
	$whereValue["id"] = $_POST['category_status_id'];
	
	if($_POST['current_status'] == "Active")
	{
		$columnValue["category_status"] = "Inactive";
	}
	else if($_POST['current_status'] == "Inactive")
	{
		$columnValue["category_status"] = "Active";
	}
	$updatecategoryStatus = $eloquent->updateData($tableName, $columnValue, @$whereValue);
}

?>

<!--=*= CATEGORY LIST SECTION START =*=-->
<div class="wrapper">
	<div class="row">
		<div class="col-sm-12">
        <ul class="breadcrumb panel">
				<li> <a href="dashboard.php"> <i class="fa fa-home"></i> Acceuil </a> </li>
				<li> <a href="dashboard.php"> Categorie</a> </li>
				<li class="active">Liste des categorie</li>
			</ul>
			<section class="panel">
				<header class="panel-heading">
                Liste des categorie
				</header>
				<div class="panel-body">
					
					<?php 
						# DELETE CONFIRMATION MESSAGE
						if(isset($_REQUEST['did']))
						{
							if($deleteCategory > 0)
							{
								echo '<div class="alert alert-success fade in"> 
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
											THE CATEGORY DATA IS <strong> DELETED SUCCESSFULLY </strong>
										</div>';
							}
							else
							{
								echo '<div class="alert alert-warning fade in"> 
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
											SOMETHING WENT WRONG TO DELETE DATA! <strong> PLEASE RECHECK </strong>
										</div>';
							}
						}
						
						# STATUS CHANGE CONFIRMATION MESSAGE
						if(isset($_POST['change_status']))
						{
							if($updatecategoryStatus > 0)
							{
								echo '<div class="alert alert-success fade in">
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button> 
											THE CATEGORY STATUS IS <strong> UPDATED SUCCESSFULLY </strong>
										</div>';
							}
							else
							{
								echo '<div class="alert alert-warning fade in"> 
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
											SOMETHING WENT WRONG TO CHANGE STATUS! <strong> PLEASE RECHECK </strong>
										</div>';
							}
						}
					?>
					
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th style="width:5%"> ID </th>
									<th style="width:67%"> Libell</th>
									<th style="width:10%"> Status </th>
									<th style="width:18%"> Action </th>
								</tr>
							</thead>
							<tbody>
								
								<?php 
									$n=1;
									foreach($categoryList AS $eachRow)
									{
										echo '
										<tr class="gradeA">
											<td>'. $n .'</td>
											<td>'. $eachRow['category_name'] .'</td>
											<td class="center">
												<form method="post" action="">
                                                <input type="hidden" name="_csrf" value="'.Yii::$app->request->getCsrfToken().'"/>

													<input type="hidden" name="category_status_id" value="'.$eachRow['id'].'" />
													<input type="hidden" name="current_status" value="'.$eachRow['category_status'].'" />
													<button name="change_status" class="btn btn-info btn-xs" style="width: 76px;" type="submit">'.$eachRow['category_status'].'</button>
												</form>
											</td>
											<td class="center">
												<div class="row">
													<a data-id="'. $eachRow['id'] .'" class="btn btn-danger btn-xs deleteButton" href="#deleteModal" style="width: 76px;" data-toggle="modal">
														<i class="fa fa-trash-o"></i> Supprimer
													</a>
													<form method="post" action="'.Yii::$app->request->baseUrl.'/'.md5('admin_updatecat').'"  style="display: inline;">
                                                    <input type="hidden" name="_csrf" value="'.Yii::$app->request->getCsrfToken().'"/>

                                                        <input type="hidden" name="category_id" value="'.$eachRow['id'].'"/>
														<button name="try_edit" class="btn btn-warning btn-xs" style="width: 76px;" type="submit">
															<i class="fa fa-pencil-square"></i> Modifier
														</button>
													</form>
												</div>
											</td>
										</tr>
										';
										$n++;
									}
								?>
								
							</tbody>
							<tfoot>
								<tr>
									<th> ID </th>
									<th> Category Name </th>
									<th> Status </th>
									<th> Action </th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<!--=*= CATEGORY LIST SECTION START =*=-->

<!--=*= DELETE MODAL =*=-->
<!-- <div class="modal small fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"> Delete Category </h4>
			</div>
			<div class="modal-body">
				<h5> Are you sure you want to delete this Category? </h5>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default"data-dismiss="modal" aria-hidden="true"> Cancel </button> 
				<a href="list-customer.php" class="btn btn-danger" id="modalDelete"> Delete </a>
			</div>
		</div>
	</div>
</div> -->