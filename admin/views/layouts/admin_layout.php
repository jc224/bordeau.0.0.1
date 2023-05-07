<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
$asset = AppAsset   ::register($this);
$baseUrl = $asset->baseUrl;

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Yii::getAlias('@web/public/assets/images/favicon/faviconBackEnd.png')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>

        <?php
			$pageName = basename($_SERVER['PHP_SELF']);
			$pageName = str_replace('.php', '', $pageName);

			if($pageName === 'index')
			{
				$pageTitle = ucwords('Online Shopping');
			}
			else
			{
				$strReplace =  str_replace('-', ' ', $pageName);
				$pageTitle = ucwords($strReplace);
			}
		?>
		<title>SuperShop | <?php echo $pageTitle ?> </title>
		<?php $this->head() ?>
			
</head>
	<body class="sticky-header">
		<?php $this->beginBody() ?>

		<?= $this->render('component/top.php', ['baseUrl' => $baseUrl]) ?>

		
				<?= $content ?>
		

		<?= $this->render('component/footer.php', ['baseUrl' => $baseUrl]) ?>
	


		<!--=*= UPLOADED FILE PREVIEWER SCRIPT START =*=-->
		
		<!--=*= UPLOADED FILE PREVIEWER SCRIPT END =*=-->


		<!--=*= NUMBER COUNTER LIBRARIES START =*=-->

		<script type="text/javascript">
			$(".counter").counterUp({delay: 1, time: 300});
		</script>
		<!--=*= NUMBER COUNTER LIBRARIES END =*=-->


		<!--=*= SUMMERNOTE RICHTEXT EDITOR START =*=-->
		<script type="text/javascript">
			$(document).ready(function() {
				$('#summerOne').summernote();
				$('#summerTwo').summernote();
			});
		</script>
		<!--=*= SUMMERNOTE RICHTEXT EDITOR END =*=-->

		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					var div_id  = $(input).attr('set-to');
					reader.onload = function (e) {
						$('#'+div_id).attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			
			$(".default").change(function(){
				readURL(this);
			});
		</script>

		<!--=*= COMMON SCRITP FOR ALL PAGES =*=-->

		<!--=*= DISABLE IMAGE DRAG START =*=-->
		<script type="text/javascript">
			$("img").mousedown(function(){
				return false;
			});
		</script>
		<!--=*= DISABLE IMAGE DRAG END =*=-->
		<?php $this->endBody() ?>
	</body>
	
</html>
<?php $this->endPage() ?>
