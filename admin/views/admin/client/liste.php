<?php
            $eloquent =  yii::$app->eloquantClass;

     ## ===*=== [C]HANGE CUSTOMER STATUS ===*=== ##
     if(isset($_POST['change_status']))
     {
         $tableName = $whereValue = $columnValue = null;
         $tableName = "customers";
         $whereValue["id"] = $_POST['customer_status_id'];
         
         if($_POST['current_status'] == "Active")
         {
             $columnValue["customer_status"] = "Inactive";
         }
         else if($_POST['current_status'] == "Inactive")
         {
             $columnValue["customer_status"] = "Active";
         }
         
         $updatecustomerStatus = $eloquent->updateData($tableName, $columnValue, @$whereValue);
     }
     ## ===*=== [C]HANGE CUSTOMER STATUS ===*=== ##


?>

<div class="wrapper">
	<div class="row">
		<div class="col-sm-12">
			<ul class="breadcrumb panel">
				<li> <a href="dashboard.php"> <i class="fa fa-home"></i> Acceuil </a> </li>
				<li> <a href="dashboard.php">Tableau de bord</a></li>
				<li class="active"> Liste des Client </li>
			</ul>
			<section class="panel">
				<header class="panel-heading">
                Liste des Clients
				</header>
				<div class="panel-body">
					
					<?php
						# DELETE CONFIRMATION MESSAGE
						if(isset($_REQUEST['did']))
						{
							if($deletecustomerData > 0)
							{
								echo '<div class="alert alert-success fade in"> 
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
											THE CUSTOMER DATA IS <strong> DELETED SUCCESSFULLY </strong>
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
							if($updatecustomerStatus > 0)
							{
								echo '<div class="alert alert-success fade in">
											<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button> 
											THE CUSTOMER STATUS IS <strong> UPDATED SUCCESSFULLY </strong>
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
						<table class="display table table-bordered" id="dynamic-table">
							<thead>
								<tr>
									<th style="width: 7%"> ID </th>
									<th style="width: 15%"> Nom Complet </th>
									<th style="width: 15%"> Email </th>
									<th style="width: 10%"> Tel </th>
									<th style="width: 22%"> Addresse </th>
									<th style="width: 8%"> Status </th>
									<th style="width: 15%"> Date Ajout</th>
									<th style="width: 8%"> Action </th>
								</tr>
							</thead>
							<tbody>
								
							<?php 
								#== CUSTOMER DATA TABLE
								$n = 1;
								foreach ($customerList as $eachRow) 
								{
									echo '
									<tr class="gradeX">
										<td>'. $n .'</td>
										<td>'. $eachRow["customer_name"] .'</td>
										<td>'. $eachRow["customer_email"] .'</td>
										<td>'. $eachRow["customer_mobile"] .'</td>
										<td>'. $eachRow["customer_address"] .'</td>
										<td>
											<form method="post" action="">
                                            <input type="hidden" name="_csrf" value="'.Yii::$app->request->getCsrfToken().'"/>

												<input type="hidden" name="customer_status_id" value="'. $eachRow["id"] .'"/>
												<input type="hidden" name="current_status" value="'. $eachRow["customer_status"] .'"/>
												<button name="change_status" class="btn btn-info btn-xs" style="width: 76px;" type="submit">'. $eachRow["customer_status"] .'</button>
											</form>
										</td>
										<td>'. $eachRow["created_at"] .'</td>
										<td class="center">
											<a data-id="'. $eachRow['id'] .'" class="btn btn-danger btn-xs deleteButton" href="#deleteModal" style="width: 76px;" data-toggle="modal">
												<i class="fa fa-trash-o"></i> Suprimer
											</a>
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
									<th> Full Name </th>
									<th> Email </th>
									<th> Mobile </th>
									<th> Address </th>
									<th> Status </th>
									<th> SignUp date </th>
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
<!--=*= CUSTOMER LIST SECTION START =*=-->

<!--=*= DELETE MODAL =*=-->
<div class="modal small fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"> Delete Customer? </h4>
			</div>
			<div class="modal-body">
				<h5> Are you sure you want to delete this Customer? </h5>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default"data-dismiss="modal" aria-hidden="true"> Cancel </button> 
				<a href="list-customer.php" class="btn btn-danger" id="modalDelete"> Delete </a>
			</div>
		</div>
	</div>
</div>
<!--=*= DELETE MODAL =*=-->

<!--=*= SCRIPT TO DELETE DATA =*=-->
<script type="text/javascript">
	$('.deleteButton').click(function(){
		var id = $(this).data('id');
		
		$('#modalDelete').attr('href','list-customer.php?did='+id);
	})
</script>	
<!--=*= SCRIPT TO DELETE DATA =*=-->