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
$asset = AppAsset::register($this);
$baseUrl = $asset->baseUrl;

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
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
			<title> SuperShop | <?php echo $pageTitle ?> </title>

   <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<?php $this->beginBody() ?>

<?= $this->render('shopcomponents/top.php', ['baseUrl' => $baseUrl]) ?>


		<?= $content ?>


<?= $this->render('shopcomponents/footer.php', ['baseUrl' => $baseUrl]) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
