<?php
    namespace app\components;
    use Yii;
    use yii\base\component;
    use yii\web\Controller;
    use yii\base\InvalidConfigException;

    Class homeClass extends Component {
        public $connect ;
		
		### CONNECTION MANAGER
		public function __construct()
		{
            $this->connect = \Yii::$app->db;

		}


        public function productLister($productList)
    	{
            $photo='';
            foreach($productList AS $eachProduct)
            {
                if(empty($eachProduct['product_master_image'])){
                    $productImage = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image";     
                }
                else{
                    $productImage = Yii::$app->params['PRODUCT_DIRECTORY'] . $eachProduct['product_master_image'];
                                  
                    $photo.= '
                <div class="col-6 col-md-3">
                    <div class="product">
                        <figure class="product-image-container">
                            <a href="'.Yii::$app->request->baseUrl.'/'.md5("site_produit").'/'.$eachProduct['id'].'" class="home-image">
                                <img src="'. $productImage .'" alt="product" style="width: 277px; height: 277px;">
                            </a>
                            <a href="'.Yii::$app->request->baseUrl.'/'.md5("site_produit").'/'.$eachProduct['id'].' " class="btn-quickview"> Details</a>
                        </figure>
                        <div class="product-details">
                            <!--<div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                </div>
                            </div>-->
                            <h2 class="product-title">
                                <a href="'.Yii::$app->request->baseUrl.'/'.md5("site_produit").'/'.$eachProduct['id'].'">'. $eachProduct['product_name'] .'</a>
                            </h2>
                            <div class="price-box">
                                <span class="product-price">'. $eachProduct['product_price']. " " . Yii::$app->params['CURRENCY']  .'</span>
                            </div>
                            <div class="product-action">
                                <form method="post" action="">
                                <input type="hidden" name="_csrf" value="'.Yii::$app->request->getCsrfToken().'"/>

                                    <button class="paction add-wishlist" title="Ajouter  a la liste des favorie"><span>Ajouter  a la liste des favorie</span></button>
                                    <input type="hidden" name="cart_product_id" value="'. $eachProduct['id'] .'"/>
                                    <input type="hidden" name="cart_product_quantity" value="1"/>
                                    <button name="add_to_cart" class="paction add-cart" type="submit" title="Ajoute au panier" style="margin-left: 7px; padding-top: 6px;">
                                        <span>Ajoute au panier</span>
                                    </button>
                                    <button class="paction add-compare" title="Add to Compare"><span>Add to Compare</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
                }
            }
            return $photo;
	   }
   }
        
   
     
	