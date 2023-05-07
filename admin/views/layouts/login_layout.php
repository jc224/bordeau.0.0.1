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
    <title>Admin Login | Bordeau224</title>
    <?php $this->head() ?>
    <style>

            .login-body {
                background: #65cea7 url("<?= Yii::$app->request->baseUrl ?>/web/public/assets/images/favicon/loginBackEnd.jpg") no-repeat fixed;
                background-size: cover;
                width: 100%;
                height: 100%;
            }
			img {
				-moz-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
				user-select: none;
				-webkit-user-drag: none;
				user-drag: none;
				-webkit-touch-callout: none;
			}
		</style>
</head>
<body class="login-body">
<?php $this->beginBody() ?>

<header ></header>

<main id="main" class="flex-shrink-0" role="main">
    
        <?= $content ?>
</main>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
