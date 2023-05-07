<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

    /**
     * Login action.
     *
     * @return Response|string
     */
  
    
   
    public function actionIndex(){
<<<<<<< HEAD
      
     }
 

  
    public function actionLogin()
    {
        $this->layout = '@app/views/layouts/login_layout.php';


        if(isset($_POST['try_login']))
            {
                
                #== LOGIN FORM INPUT FIELD
                $username = $_POST['username'];
                $password = sha1($_POST['password']);
                
                #== CHECK VALUES WHICH USER PASSES THE DATA
                $adminData =yii::$app->adminClass->tryLogin( $username, $password );
                
                if(!empty($adminData))
                {
                    #== CREATE LOGGED IN USER SESSION FOR USAGE ENTRIE APPLICATION IN FURTHER WHERE NEEDED
                    $_SESSION['SMC_login_time'] = date("Y-m-d H:i:s");
                    $_SESSION['SMC_login_id'] = $adminData[0]['id'];
                    $_SESSION['SMC_login_admin_name'] = $adminData[0]['admin_name'];
                    $_SESSION['SMC_login_admin_email'] = $adminData[0]['admin_email'];
                    $_SESSION['SMC_login_admin_image'] = $adminData[0]['admin_image'];
                    $_SESSION['SMC_login_admin_status'] = $adminData[0]['admin_status'];
                    $_SESSION['SMC_login_admin_type'] = $adminData[0]['admin_type'];
                    return $this->redirect(md5('site_dashboard')); // REDIRECT IT TO THE ACTION INDEX

                    #== IF USER ID AND PASSWORD IS VALID THEN REDIRECT TO THE DASHBOARD PAGE 
                }
            }
            ## ===*=== [L]OGIN ACCESS ===*=== ##



        return $this->render('login');




    }

=======

        ## ===*=== [C]ALLING CONTROLLER ===*=== ##
        
            ## ===*=== [O]BJECT DEFINED ===*=== ##
            $homeCtrl = yii::$app->homeClass;
            $eloquent =  yii::$app->eloquantClass;


            ## ===*=== [F]ETCH SLIDER DATA FOR HOME PAGE SLIDER ===*=== ##
            $columnName = $tableName = null;
            $columnName = "*";
            $tableName = "slides";
            $slidesList = $eloquent->selectData($columnName, $tableName);
            ## ===*=== [F]ETCH SLIDER DATA FOR HOME PAGE SLIDER ===*=== ##


            ## ===*=== [F]ETCH MEN'S PRODUCT LIST FOR SHOWING HOME PAGE PRODUCT ===*=== ##
            $columnName = $tableName = $whereValue = null;
            $columnName["1"] = "id";
            $columnName["2"] = "product_name";
            $columnName["3"] = "product_price";
            $columnName["4"] = "product_master_image";
            $tableName = "products";
            $whereValue["category_id"] = 1;	//Men's Category ID
            $whereValue["product_status"] = "In Stock";
            $formatBy["DESC"] = "id";
            $paginate["POINT"] = 0;
            $paginate["LIMIT"] = 8;
            $menProducts = $eloquent->selectData($columnName, $tableName, @$whereValue, @$inColumn, @$inValue, @$formatBy, @$paginate);
            ## ===*=== [F]ETCH MEN'S PRODUCT LIST FOR SHOWING HOME PAGE PRODUCT ===*=== ##


            ## ===*=== [F]ETCH WOMEN'S PRODUCT LIST FOR SHOWING HOME PAGE PRODUCT ===*=== ##
            $columnName = $tableName = $whereValue = $inColumn = $inValue = $formatBy = $paginate = null;
            $columnName["1"] = "id";
            $columnName["2"] = "product_name";
            $columnName["3"] = "product_price";
            $columnName["4"] = "product_master_image";
            $tableName = "products";
            $whereValue["category_id"] = 2;	//Women's Category ID
            $whereValue["product_status"] = "In Stock";
            $formatBy["DESC"] = "id";
            $paginate["POINT"] = 0;
            $paginate["LIMIT"] = 8;
            $womenProducts = $eloquent->selectData($columnName, $tableName, @$whereValue, @$inColumn, @$inValue, @$formatBy, @$paginate);
            ## ===*=== [F]ETCH WOMEN'S PRODUCT LIST FOR SHOWING HOME PAGE PRODUCT ===*=== ##


            ## ===*=== [F]ETCH WATCH'S PRODUCT LIST FOR SHOWING HOME PAGE PRODUCT ===*=== ##
            $columnName = $tableName = $whereValue = $inColumn = $inValue = $formatBy = $paginate = null;
            $columnName["1"] = "id";
            $columnName["2"] = "product_name";
            $columnName["3"] = "product_price";
            $columnName["4"] = "product_master_image";
            $tableName = "products";
            $whereValue["category_id"] = 8;	//Watch Category ID
            $whereValue["product_status"] = "In Stock";
            $formatBy["DESC"] = "id";
            $paginate["POINT"] = 0;
            $paginate["LIMIT"] = 8;
            $watchProducts = $eloquent->selectData($columnName, $tableName, @$whereValue, @$inColumn, @$inValue, @$formatBy, @$paginate);
            ## ===*=== [F]ETCH WATCH'S PRODUCT LIST FOR SHOWING HOME PAGE PRODUCT ===*=== ##

        return $this->render('/site/index',['slidesList'=>$slidesList,'menProducts'=>$menProducts,'womenProducts'=>$womenProducts,'watchProducts'=>$watchProducts]);


    }
 

    public function actionRecherche(){
        ## ===*=== [O]BJECT DEFINED ===*=== ##
        

        
            $homeCtrl = yii::$app->homeClass;
            $eloquent =  yii::$app->eloquantClass;
            $searchCtrl =  yii::$app->searchClass;
            $cp = 0;$text=0;$nod=0;$previous=0;$pageNumber=0;$next=0;

            ## ===*=== [F]ETCH PRODUCT LIST BASED ON PRODUCT TAGS ===*=== ##
            if(isset($_POST['keywords']))
            $_SESSION['search_keywords'] = strip_tags($_POST['keywords']);


            ## ===*=== [M]ATCH THE KEYWORD AGAINST TAGS ===*=== ##
            $searchedProductList = $searchCtrl->searchProduct($_SESSION['search_keywords']);

            #== (nod = Number of Data) COUNT HOW MANY DATA IS AVAILABLE IN THIS SUBCATEGORY
            if(!empty($searchedProductList))
            {	
                $_SESSION['SEARCH_CATEGORY_ID'] = $searchedProductList[0]['category_id'];
                @$nod = count($searchedProductList);
            }

            #== (rpp = Result Per Page) DEFINED HOW MANY RESULT PER PAGE WILL BE DISPLAYED
            $rpp = 8;
            #== (nop = Number of Page) DEFINE HOW MANY PAGE WILL BE APPEAR FOR PAGINATION
            $nop = ceil(@$nod/$rpp);

            #== IF THE PAGE IS NOT SET THEN ITS RENDERING FROM PAGE NO 1
            if(!isset($_GET['page'])) {
                $page = 1;
                } else {
                $page = $_GET['page'];
            }

            #== (cp = Current Page) DEFINE THE DATA DISPLAYED LIMIT
            $cp = ($page -1)*$rpp;	
            $searchedProductList = $searchCtrl->searchProductLimit($_SESSION['search_keywords'], $cp, $rpp);

            if(!empty($searchedProductList))
            {
                $value = count(array_keys($searchedProductList));
            }

            #== TEXT WILL BE RETURN THE CUMULATIVE VALUE OF DATA
            $text = 0;
            if($text > @$nod) {
                $text = @$nod;
                } else if($text < @$nod) {
                $text = $value * $page;
            }

            #== BUTTON OPTION FOR NEXT OR PREVIOUS
            $previous = $page - 1;
            $next = $page + 1;

            #== EMPTY VARIABLE WHICH RETURNS THE NUMBER OF PAGES
            $pageNumber = '';														
            for($i = 1; $i <= $nop; $i++)
            {
                $pageNumber .= '	<li class="page-item"> <a class="page-link active" href="search.php?page='.$i.'">'.$i.'<span class="sr-only">(current)</span></a></li>';
            }
            ## ===*=== [F]ETCH PRODUCT LIST BASED ON PRODUCT TAGS ===*=== ##
            return $this->render('/site/search.php',['searchedProductList'=>$searchedProductList,'cp'=>$cp,'text'=>$text,'nod'=>$nod,'previous'=>$previous,'pageNumber'=>$pageNumber,'next'=>$next]);


    }
    
    // public function actionLogin()
    // {
    //     $this->layout = '@app/views/layouts/login_layout.php';


    //     if(isset($_POST['try_login']))
    //         {
                
    //             #== LOGIN FORM INPUT FIELD
    //             $username = $_POST['username'];
    //             $password = sha1($_POST['password']);
                
    //             #== CHECK VALUES WHICH USER PASSES THE DATA
    //             $adminData =yii::$app->adminClass->tryLogin( $username, $password );
                
    //             if(!empty($adminData))
    //             {
    //                 #== CREATE LOGGED IN USER SESSION FOR USAGE ENTRIE APPLICATION IN FURTHER WHERE NEEDED
    //                 $_SESSION['SMC_login_time'] = date("Y-m-d H:i:s");
    //                 $_SESSION['SMC_login_id'] = $adminData[0]['id'];
    //                 $_SESSION['SMC_login_admin_name'] = $adminData[0]['admin_name'];
    //                 $_SESSION['SMC_login_admin_email'] = $adminData[0]['admin_email'];
    //                 $_SESSION['SMC_login_admin_image'] = $adminData[0]['admin_image'];
    //                 $_SESSION['SMC_login_admin_status'] = $adminData[0]['admin_status'];
    //                 $_SESSION['SMC_login_admin_type'] = $adminData[0]['admin_type'];
    //                 return $this->redirect(md5('site_dashboard')); // REDIRECT IT TO THE ACTION INDEX

    //                 #== IF USER ID AND PASSWORD IS VALID THEN REDIRECT TO THE DASHBOARD PAGE 
    //             }
    //         }
    //         ## ===*=== [L]OGIN ACCESS ===*=== ##


    //     if (!Yii::$app->user->isGuest) {
    //         return $this->goHome();
    //     }



    //     return $this->render('login');




    // }


    public function actionLogin(){

        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        if( isset($_POST['user_login']) )
        {
            #== FETCH DATA FROM THE CUSTOMER TABLE AND VALIDATE WITH SUBMITTED DATA
            $columnName = "*";
            $tableName = "customers";
            $whereValue["customer_email"] = $_POST['user_email'];
            $whereValue["customer_password"] = sha1($_POST['user_pass']);
            $userLogin = $eloquent->selectData($columnName, $tableName, @$whereValue);
            
            #== AFTER VALIDATAION CREATE A SESSION FOR USER ENTIRE FRONT END APPLICATION
            if(!empty($userLogin))
            {
                $_SESSION['SSCF_login_time'] = date("Y-m-d H:i:s");
                $_SESSION['SSCF_login_id'] = $userLogin[0]['id'];
                $_SESSION['SSCF_login_user_name'] = $userLogin[0]['customer_name'];
                $_SESSION['SSCF_login_user_email'] = $userLogin[0]['customer_email'];
                $_SESSION['SSCF_login_user_mobile'] = $userLogin[0]['customer_mobile'];
                $_SESSION['SSCF_login_user_address'] = $userLogin[0]['customer_address'];
                
                echo '<meta http-equiv="Refresh" content="0; url=index.php" />';
            }
        }
        return $this->render('/site/loginUsers.php');
    } 
>>>>>>> 75939c7c8316078e785cec7e3a549d25cb38efd2
   
    public function actionAdddboutique(){
        return $this->render('login');
    }


    public function actionDashboard(){
        Yii::$app->layout = 'admin_layout';


           


            ## ===*=== [F]ETCH SUMMARY DATA ===*=== ##

            #== TOTAL SALE STATUS
            $saleResult = yii::$app->dashboardClass->sumResult('orders', 'grand_total');
            $totalSale = ceil($saleResult[0]['SUM(grand_total)']);	


            #== THIS MONTH SALE STATUS
            $monthResult = yii::$app->dashboardClass->sumByDate('orders', 'grand_total', 'order_date');
            $monthSale = ceil($monthResult[0]['SUM(grand_total)']);


            #== NEWLY ADDED PRODUCT STATUS
            $newResult = yii::$app->dashboardClass->dateData('products', 'created_at');
            $newProduct = count($newResult);	


            #== TOTAL TAX STATUS
            $taxResult = yii::$app->dashboardClass->sumResult('orders', 'tax');
            $totalTax = ceil($taxResult[0]['SUM(tax)']);	


            #== NEW ORDER STATUS
            $orderResult = yii::$app->dashboardClass->getData('orders', 'order_item_status', 'Pending');
            $totalOrder = count($orderResult);


            #== PRODUCT STATUS
            $columnName = $tableName = null;
            $columnName["1"] = "id";
            $tableName = "products";
            $productResult =  yii::$app->eloquantClass->selectData($columnName, $tableName);
            $totalProduct = count($productResult);	


            #== SUBSCRIBER STATUS
            $columnName = $tableName = null;
            $columnName["1"] = "id";
            $tableName = "newsletters";
            $subscriberResult =  yii::$app->eloquantClass->selectData($columnName, $tableName);
            $totalSubscriber = count($subscriberResult);	


            #== CUSTOMER STATUS
            $columnName = $tableName = null;
            $columnName["1"] = "id";
            $tableName = "customers";
            $customerResult =  yii::$app->eloquantClass->selectData($columnName, $tableName);
            $totalCustomer = count($customerResult);
        ## ===*=== [O]BJECT DEFINED ===*=== ##
        return $this->render('/admin/dashbord.php',['totalSale'=>$totalSale,'monthSale'=>$monthSale,'totalOrder'=>$totalOrder,'totalTax'=>$totalTax,'newProduct'=>$newProduct,'totalProduct'=>$totalProduct,
                                                        'totalSubscriber'=>$totalSubscriber,'totalCustomer'=>$totalCustomer]);
     }
 
    public function actionCategorie(){

        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        $pageControl = yii::$app->pageClass;
        ## ===*=== [C]ALLING CONTROLLER ===*=== ##

        $cp = 0;$text=0;$nod=0;$previous=0;$pageNumber=0;$next=0;

        ## ===*=== [G]ET PRODUCT DATA IN A CATEGORY PAGE BASED ON SUBCATEGORY ID ===*=== ##
        if(isset($_GET['id']))
        {
            #== CREATE A SESSION BASED ON REQUESTED ID
            $_SESSION['category_subcategory_id'] = $_GET['id'];
        }
        


        if(empty($_SESSION['category_subcategory_id']))
        {
            #== IF USER HIT URL DIRECTLY SO ON THE CATEGORY PAGE APPEARED BASED ON A STATIC SESSION DATA SUCH AS 1
            $_SESSION['category_subcategory_id'] = 1;
        }
        ## ===*=== [G]ET PRODUCT DATA IN A CATEGORY PAGE BASED ON SUBCATEGORY ID ===*=== ##

        ## ===*=== [F]ETCH PRODUCT DATA BASED ON SUBCATEGORY ===*=== ##	
        $categoryDetails = $pageControl->fetchData('products', 'subcategory_id', $_SESSION['category_subcategory_id']);

        if(!empty($categoryDetails))
        {
            #== (nod = Number of Data) COUNT HOW MANY DATA IS AVAILABLE IN THIS SUBCATEGORY
            $nod = count($categoryDetails);
            #== (rpp = Result Per Page) DEFINED HOW MANY RESULT PER PAGE WILL BE DISPLAYED
            if($nod > 8) {
                $rpp = 8;
                } else {
                $rpp = $nod;
            }
            #== (nop = Number of Page) DEFINE HOW MANY PAGE WILL BE APPEAR FOR PAGINATION
            $nop = ceil($nod/$rpp);
            
            #== IF THE PAGE IS NOT SET THEN ITS RENDERING FROM PAGE NO 1
            if(!isset($_GET['page'])) {
                $page = 1;
                } else {
                $page = $_GET['page'];
            }
            
            #== TEXT WILL BE RETURN THE CUMULATIVE VALUE OF DATA
            $text = 0;
            if($text >= $nod) {
                $text = $nod;
                } else if($text <= $nod) {
                $text = $rpp * $page;
            }
            
            #== (cp = Current Page) DEFINE THE DATA DISPLAYED LIMIT
            $cp = ($page -1)*$rpp;	
            $categoryDetails = $pageControl->paginateData('products', 'subcategory_id', $_SESSION['category_subcategory_id'], $cp, $rpp);
            
            #== BUTTON OPTION FOR NEXT OR PREVIOUS
            $previous = $page - 1;
            $next = $page + 1;
            
            #== EMPTY VARIABLE WHICH RETURNS THE NUMBER OF PAGES
            $pageNumber = '';														
            for($i = 1; $i <= $nop; $i++)
            {
                $pageNumber .= '	<li class="page-item">
                <a class="page-link active" href="category.php?page='.$i.'">
                '.$i.'<span class="sr-only">(current)</span>
                </a>
                </li>
                ';
            }
                }
        ## ===*=== [F]ETCH PRODUCT DATA BASED ON SUBCATEGORY ===*=== ##


        ## ===*=== [F]ETCH CATEGORY AND SUBCATEGORY DATA FOR BREADCRUMB AND TOGGLE FILTER ===*=== ##
        $columnName= $tableName= $whereValue= null;
        $columnName["1"] = "categories.id";
        $columnName["2"] = "categories.category_name";
        $columnName["3"] = "subcategories.subcategory_name";
        $columnName["4"] = "subcategories.subcategory_banner";

       $tableName["MAIN"] = "subcategories";
        $joinType = "INNER";
        $tableName["1"] = "categories";
        $onCondition["1"] = ["subcategories.category_id", "categories.id"];
        $value = $_SESSION['category_subcategory_id'];

        $categoryResult = $pageControl->categoryResult($value);
    
        ## ===*=== [F]ETCH CATEGORY AND SUBCATEGORY DATA FOR BREADCRUMB AND TOGGLE FILTER ===*=== ##
        return $this->render('/site/category.php',['categoryResult'=>$categoryResult,'categoryDetails'=>$categoryDetails,'cp'=>$cp,'text'=>$text,'nod'=>$nod,'previous'=>$previous,'pageNumber'=>$pageNumber,'next'=>$next]);
     }

     public function actionAcount(){

        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;

        if(isset($_POST['userRegistration']))
        {
            if(!empty($_POST['acc_fname']) && !empty($_POST['acc_lname']) && !empty($_POST['acc_email']) && !empty($_POST['acc_password']) && !empty($_POST['acc_mobile']) &&
            !empty($_POST['acc_address']))
            {
                $tableName = "customers";
                $columnValue["customer_name"] = $_POST['acc_fname'] . " " . $_POST['acc_lname'];
                $columnValue["customer_email"] = $_POST['acc_email'];
                $columnValue["customer_password"] = sha1($_POST['acc_password']);
                $columnValue["customer_mobile"] = $_POST['acc_mobile'];
                $columnValue["customer_address"] = $_POST['acc_address'];
                $columnValue["created_at"] = date("Y-m-d H:i:s");
                
                $registerUser = $eloquent->insertData($tableName, $columnValue);

            }
        }
        return $this->render('/site/acount.php');

   }


   public function actionCompte(){
 
    $control = yii::$app->controllerClass;
    $eloquent =  yii::$app->eloquantClass;
        ## ===*=== [O]BJECT DEFINED ===*=== ##
  
        $cstmrDetails='';
        $updatecustomerData = 0 ;

        ## ===*=== [U]PDATE CUSTOMER ACCOUNT INFORMATION ===*=== ##
        if(isset($_POST['update_accinfo']))
        {
            $tableName = "customers";
            $columnValue["customer_name"] = $_POST['upcstmr_name'];
            $columnValue["customer_email"] = $_POST['upcstmr_email'];
            $columnValue["customer_mobile"] = $_POST['upcstmr_phn'];
            $columnValue["customer_address"] = $_POST['upcstmr_add'];
            $whereValue["id"] = $_SESSION['SSCF_login_id'] ;
            $updatecustomerData = $eloquent->updateData($tableName, $columnValue, @$whereValue);
        }
        ## ===*=== [U]PDATE CUSTOMER ACCOUNT INFORMATION ===*=== ##


        ## ===*=== [F]ETCH SHIPPING DATA WHEN USER LOGED IN AND HAVE SUBMITTED ===*=== ##
        if(@$_SESSION['SSCF_login_id'] > 0)
        {
            $columnName = $tableName = $whereValue = null;
            $columnName = "*";
            $tableName = "shippings";
            $whereValue["shippings.customer_id"] = $_SESSION['SSCF_login_id'];
            $cstmrShipDetails = $eloquent->selectData($columnName, $tableName, @$whereValue);		
            
            $columnName = $tableName = $whereValue = null;
            $columnName = "*";
            $tableName = "customers";
            $whereValue["id"] = $_SESSION['SSCF_login_id'];
            $cstmrDetails = $eloquent->selectData($columnName, $tableName, @$whereValue);

        }
        return $this->render('/site/compte.php',['cstmrDetails'=>$cstmrDetails,'updatecustomerData'=>$updatecustomerData]);

   }

   public function actionChangepassword(){
     return $this->render('/site/changepass.php');
   }


   public function actionContact(){
    ## ===*=== [O]BJECT DEFINED ===*=== ##
     
    $control = yii::$app->controllerClass;
    $eloquent =  yii::$app->eloquantClass;
    $contactsData = 0;
        ## ===*=== [I]NSERT DATA TO CONTACTS ===*=== ##
        if(isset($_POST['user_contact']))
        {
            $tableName = "contacts";
            $columnValue["contacts_name"] = $_POST['contact_name'];
            $columnValue["contacts_email"] = $_POST['contact_email'];
            $columnValue["contacts_phone"] = $_POST['contact_phone'];
            $columnValue["contacts_overview"] = $_POST['contact_message'];
            $columnValue["created_at"] = date("Y-m-d H:i:s");
            $contactsData = $eloquent->insertData($tableName, $columnValue);
        }
        ## ===*=== [I]NSERT DATA TO CONTACTS == =*=== ##
            return $this->render('/site/contact.php',['contactsData'=>$contactsData]);
   }



   //deconnection
   public function actionDeconnection(){
    Yii::$app->getSession()->destroy();
    echo '<meta http-equiv="Refresh" content="0; url=index.php" />';

   }



    public function actionCommande(){
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;

        ## ===*=== [I]NSERT ORDER TABLE'S DATA FROM SHOPCART PAGE ===*=== ##
        if(isset($_POST['submit_order']))
        {
            #== CREATE ORDERS DATA WHEN SUBMIT PLACED TO ORDER
            $tableName = "orders";
            $columnValue["order_date"] = date("Y-m-d H:i:s");
            $columnValue["sub_total"] = $_POST['cartsub_total'];
            $columnValue["tax"] = $_POST['tax_total'];
            $columnValue["delivery_charge"] = $_POST['delivery_charge'];
            $columnValue["discount_amount"] = $_POST['discount_amount'];
            $columnValue["grand_total"] = $_POST['grand_total'];
            $columnValue["customer_id"] = @$_SESSION['SSCF_login_id'];
            $columnValue["created_at"] = date("Y-m-d H:i:s");
            $saveorderDetails = $eloquent->insertData($tableName, $columnValue);
        
            $_SESSION['LAST_ORDER_ID'] = $saveorderDetails['LAST_INSERT_ID'];
        
            if($saveorderDetails > 0)
            {
                
                $_SESSION['SSCF_orders_order_id'] = $saveorderDetails['LAST_INSERT_ID'];
            
                #== GET ALL DATA FROM SHOPCART PAGE FOR LOGGED IN USER OR CUSTOMER
                $columnName = $tableName = $joinType = $onCondition = $whereValue = $formatBy = $paginate = null;
                $columnName["1"] = "products.id";
                $columnName["2"] = "products.product_price";
                $columnName["3"] = "shopcarts.quantity";
                $tableName["MAIN"] = "shopcarts";
                $joinType = "INNER";
                $tableName["1"] = "products";
                $onCondition["1"] = ["shopcarts.product_id", "products.id"];
                $whereValue["shopcarts.customer_id"] = @$_SESSION['SSCF_login_id'];
                $formatBy["DESC"] = "shopcarts.id";
                $shopCartItems = $eloquent->selectJoinData($columnName, $tableName, $joinType, $onCondition, @$whereValue, @$formatBy, @$paginate);
                
                foreach($shopCartItems AS $eachOrderItems)
                {
                    #== INSERT DATA TO THE ORDER ITEMS TABLE
                    $columnValue = $tableName = null;
                    $tableName = "order_items";
                    $columnValue["customer_id"] = $_SESSION['SSCF_login_id'];
                    $columnValue["order_id"] = $_SESSION['SSCF_orders_order_id'];
                    $columnValue["product_id"] = $eachOrderItems['id'];
                    $columnValue["product_price"] = $eachOrderItems['product_price'];
                    $columnValue["prod_quantity"] = $eachOrderItems['quantity'];
                    $columnValue["created_at"] = date("Y-m-d H:i:s");
                    $saveorderItems = $eloquent->insertData($tableName, $columnValue);
                }
                
                #== NOW DELETE ALL THE SHOPCART ITEMS DATA AS THEY ARE STORED IN ORDER ITEMS TABLE
                if(@$saveorderItems['NO_OF_ROW_INSERTED'] > 0)
                {
                    $tableName = $whereValue = null;
                    $tableName = "shopcarts";
                    $whereValue["customer_id"] = $_SESSION['SSCF_login_id'];
                    $deleteshopcartData = $eloquent->deleteData($tableName, $whereValue);			
                    
                    $tableName = $whereValue = null;
                    $tableName = "deliveries";
                    $whereValue["customer_id"] = $_SESSION['SSCF_login_id'];
                    $deleteshopcartData = $eloquent->deleteData($tableName, $whereValue);
                }
            }
        }
        ## ===*=== [I]NSERT ORDER TABLE'S DATA FROM SHOPCART PAGE ===*=== ##


            ## ===*=== [W]HEN USER TRY TO LOG IN ===*=== ##
            if( isset($_POST['user_login']) )
            {
                $columnName = "*";
                $tableName = "customers";
                $whereValue["customer_email"] = $_POST['user_email'];
                $whereValue["customer_password"] = sha1($_POST['user_pass']);
                $userLogin = $eloquent->selectData($columnName, $tableName, @$whereValue);
                
                if($userLogin > 0)
                {
                    #== CREATE A SESSION FOR USER ENTIRE FRONT END APPLICATION
                    if(!empty($userLogin))
                    {
                        $_SESSION['SSCF_login_time'] = date("Y-m-d H:i:s");
                        $_SESSION['SSCF_login_id'] = $userLogin[0]['id'];
                        $_SESSION['SSCF_login_user_name'] = $userLogin[0]['customer_name'];
                        $_SESSION['SSCF_login_user_email'] = $userLogin[0]['customer_email'];
                        $_SESSION['SSCF_login_user_mobile'] = $userLogin[0]['customer_mobile'];
                        $_SESSION['SSCF_login_user_address'] = $userLogin[0]['customer_address'];
                    }
                }
            }
            ## ===*=== [W]HEN USER TRY TO LOG IN ===*=== ##


            ## ===*=== [I]NSERT DATA FOR NEW USER ===*=== ##
            if(isset($_POST['customerRegistration']))
            {
                if(!empty($_POST['acc_Firstname']) && !empty($_POST['acc_Lastname']) && !empty($_POST['acc_Emailadd']) && !empty($_POST['acc_Setpass']) && !empty($_POST['acc_Setmobile']) &&
                !empty($_POST['acc_Setaddress']))
                {
                    $tableName = $columnValue = null;
                    $tableName = "customers";
                    $columnValue["customer_name"] = $_POST['acc_Firstname'] . " " . $_POST['acc_Lastname'];
                    $columnValue["customer_email"] = $_POST['acc_Emailadd'];
                    $columnValue["customer_password"] = sha1($_POST['acc_Setpass']);
                    $columnValue["customer_mobile"] = $_POST['acc_Setmobile'];
                    $columnValue["customer_address"] = $_POST['acc_Setaddress'];
                    $columnValue["created_at"] = date("Y-m-d H:i:s");
                    
                    $registerCustomer = $eloquent->insertData($tableName, $columnValue);
                }
            }
            ## ===*=== [I]NSERT DATA FOR NEW USER ===*=== ##

            return $this->render('/site/order.php');
    }

    public function actionCard(){
        
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
            $deleteCart= 0;
        ## ===*=== [O]BJECT DEFINED ===*=== ##



        ## ===*=== [U]PDATE CART PRODUCT DATA ===*=== ##
        if(isset($_POST['update_cart']))
        {
            $columnValue = $tableName = $whereValue = null;
            $tableName = "shopcarts";
            $columnValue["quantity"] = $_POST['quantity'];
            $whereValue["id"] = $_POST['cart_id'];
            $updateCartItem = $eloquent->updateData($tableName, $columnValue, @$whereValue);
        }
        ## ===*=== [U]PDATE CART PRODUCT DATA ===*=== ##


        ## ===*=== [R]EMOVE CART PRODUCT DATA===*=== ##
        if(isset($_POST['remove_cart']))
        {
            $tableName = $whereValue = null;
            $tableName = "shopcarts";
            $whereValue["id"] = $_POST['remove_id'];
            $deleteCart = $eloquent->deleteData($tableName, @$whereValue);
            return $this->redirect(Yii::$app->request->referrer);

        }
        ## ===*=== [R]EMOVE CART PRODUCT DATA===*=== ##


        ## ===*=== [A]PPLY DISCOUNT AMOUNT DATA ===*=== ##
        if(isset($_POST['discount_amnt']))
        {
            #== FETCH DISCOUNT DATA IF AVAILABLE
            $columnValue = $tableName = null;
            $columnName = "*";
            $tableName = "discounts";
            $discountResult = $eloquent->selectData($columnName, $tableName);
            
            #== CHECK VALIDATION => AGAINST SUBMITTED VALUE
            if(!empty($_POST['dscnt_cd']))
            {
                $getDiscount;
                
                if($_POST['dscnt_cd'] === @$discountResult[0]['discount_code']) {
                    $getDiscount = @$discountResult[0]['price_discount_amount'];
                    } else {
                    $getDiscount = 0;
                }
                @$_SESSION['SSCF_DISCOUNT_AMOUNT'] = $getDiscount;
            }
        }
        ## ===*=== [A]PPLY DISCOUNT AMOUNT DATA ===*=== ##


        ## ===*=== [F]ETCH CART PRODUCTS DATA FOR USER'S VISUALIZATION ===*=== ##
        $columnName = $tableName = $joinType = $onCondition = $whereValue = $formatBy = $paginate = null;
        $columnName["1"] = "shopcarts.quantity";
        $columnName["2"] = "shopcarts.id";
        $columnName["3"] = "products.product_name";
        $columnName["4"] = "products.product_price";
        $columnName["5"] = "products.product_master_image";
        $tableName["MAIN"] = "shopcarts";
        $joinType = "INNER";
        $tableName["1"] = "products";
        $onCondition["1"] = ["shopcarts.product_id", "products.id"];
        $whereValue["shopcarts.customer_id"] = @$_SESSION['SSCF_login_id'];
        $formatBy["DESC"] = "shopcarts.id";
        $myShopcartItems = $eloquent->selectJoinData($columnName, $tableName, $joinType, $onCondition, @$whereValue, @$formatBy, @$paginate);
        ## ===*=== [F]ETCH CART PRODUCTS DATA FOR USER'S VISUALIZATION ===*=== ##


        ## ===*=== [I]NSERT DELIVERY CHARGE DATA ===*=== ##
        if(isset($_POST['fob']))
        {
            if(@$_SESSION['SSCF_login_id'] > 0)
            {
                #== FETCH DELIVERY CHARGE DATA
                $columnName = $tableName = $whereValue = null;
                $columnName = "*";
                $tableName = "deliveries";
                $whereValue["customer_id"] = $_SESSION['SSCF_login_id'];
                $availibilityCharge = $eloquent->selectData($columnName, $tableName, @$whereValue);
                
                #== IF NOT EMPTY THEN UPDATE DELIVERY CHARGE DATA 
                if(!empty($availibilityCharge))
                {
                    $columnValue = $tableName = $whereValue = null;
                    $tableName = "deliveries";
                    $columnValue["created_at"] = date("Y-m-d H:i:s");
                    $columnValue["shipping_charge"] = $_POST['shipping_method'];
                    $whereValue["customer_id"] = $_SESSION['SSCF_login_id'];
                    $updateCharge = $eloquent->updateData($tableName, $columnValue, @$whereValue);
                }
                
                #== IF EMPTY THEN INSERT DELIVERY CHARGE DATA 
                else
                {
                    $columnValue = $tableName = null;
                    $tableName = "deliveries";
                    $columnValue["created_at"] = date("Y-m-d H:i:s");
                    $columnValue["customer_id"] = $_SESSION['SSCF_login_id'];
                    $columnValue["shipping_charge"] = $_POST['shipping_method'];
                    $insertCharge = $eloquent->insertData($tableName, $columnValue, @$whereValue);
                }
            }
        }
            ## ===*=== [I]NSERT DELIVERY CHARGE DATA ===*=== ##


            ## ===*=== [F]ETCH DELIVERY CHARGE DATA ===*=== ##
            $columnName = $tableName = $whereValue = null;
            $columnName = "*";
            $tableName = "deliveries";
            $deliveryCharge = $eloquent->selectData($columnName, $tableName, @$whereValue);
        
            #== ASSIGN A VARIABLE WHICH HOLD THE UPDATE VALUE
            @$fobCost = $deliveryCharge[0]['shipping_charge'];
            ## ===*=== [F]ETCH DELIVERY CHARGE DATA ===*=== ##
        return $this->render('/site/card.php',['myShopcartItems'=>$myShopcartItems,'fobCost'=>$fobCost,'deleteCart'=>$deleteCart]);
    }



    public function actionProduit(){

                    
        ## ===*=== [O]BJECT DEFINED ===*=== ##


        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;


        ## ===*=== [G]ET PRODUCT ID ===*=== ##
        if(isset($_GET['id']))
        {
            $_SESSION['SSCF_product_product_id'] = $_GET['id'];
        }
        ## ===*=== [G]ET PRODUCT ID ===*=== ##


        ## ===*=== [F]ETCH PRODUCT DATA BASED ON SESSION ID ===*=== ##
        $columnName = $tableName = $whereValue = null;
        $columnName = "*";
        $tableName = "products";
        $whereValue["id"] = $_SESSION['SSCF_product_product_id'];
        $productResult = $eloquent->selectData($columnName, $tableName, @$whereValue);
        ## ===*=== [F]ETCH PRODUCT DATA BASED ON SESSION ID ===*=== ##


        ## ===*=== [F]ETCH PRODUCT DATA BASED ON SESSION ID ===*=== ##	
        $columnName = $tableName = $whereValue = $inColumn = $inValue = $formatBy = $paginate = null;
        $columnName[1] = "product_master_image";
        $tableName = "products";
        $whereValue["subcategory_id"] = $productResult[0]['subcategory_id'];
        $paginate["POINT"] = 0;
        $paginate["LIMIT"] = 4;
        $relatedResult = $eloquent->selectData($columnName, $tableName, @$whereValue, @$inColumn, @$inValue, @$formatBy, @$paginate);
        ## ===*=== [F]ETCH PRODUCT DATA BASED ON SESSION ID ===*=== ##


        ## ===*=== [F]ETCH PRODUCT DATA FOR RELEVANT PRODUCT SLIDER ===*=== ##
        $columnName = $tableName = $whereValue = $inColumn = $inValue = $formatBy = $paginate = null;
        $columnName = "*";
        $tableName = "products";
        $whereValue["subcategory_id"] = $productResult[0]['subcategory_id'];
        $paginate["POINT"] = 0;
        $paginate["LIMIT"] = 7;
        $relevantResult = $eloquent->selectData($columnName, $tableName, @$whereValue, @$inColumn, @$inValue, @$formatBy, @$paginate);
        ## ===*=== [F]ETCH PRODUCT DATA FOR RELEVANT PRODUCT SLIDER ===*=== ##


        ## ===*=== [F]ETCH PRODUCT DATA FOR FEATURED PRODUCT SLIDER ===*=== ##
        $columnName = $tableName = $whereValue = null;
        $columnName = "*";
        $tableName = "products";
        $whereValue["product_featured"] = "YES";
        $featuredResult = $eloquent->selectData($columnName, $tableName, @$whereValue);	

        #== FEATURE PRODUCT COUNT
        $totalProducts = count($featuredResult);
        ## ===*=== [F]ETCH PRODUCT DATA FOR FEATURED PRODUCT SLIDER ===*=== ##


        ## ===*=== [F]ETCH PRODUCT DATA FOR DYNAMIC BREADCRUMB ===*=== ##
        $columnName = $tableName = $whereValue = null;
        $columnName["1"] = "categories.id";
        $columnName["2"] = "categories.category_name";
        $columnName["3"] = "subcategories.id";
        $columnName["4"] = "subcategories.subcategory_name";
        $tableName["MAIN"] = "products";
        $joinType = "INNER";
        $tableName["1"] = "categories";
        $tableName["2"] = "subcategories";
        $onCondition["1"] = ["categories.id", "products.category_id"];
        $onCondition["2"] = ["subcategories.id", "products.subcategory_id"];
        $whereValue["products.id"] = $_SESSION['SSCF_product_product_id'];
        $breadcrumbName = $eloquent->breadcrumbName($columnName, $tableName, $joinType, $onCondition, @$whereValue,@$formatBy);
        ## ===*=== [F]ETCH PRODUCT DATA FOR DYNAMIC BREADCRUMB ===*=== ##

        return $this->render('/site/produit.php',['relatedResult'=>$relatedResult,'productResult'=>$productResult,'featuredResult'=>$featuredResult,'relevantResult'=>$relevantResult,'totalProducts'=>$totalProducts,'breadcrumbName'=>$breadcrumbName]);
        
    }


    public function actionPaiement(){
        $eloquent =  yii::$app->eloquantClass;

                ## ===*=== [U]PDATE SHIPPING DETAILS DATA ===*=== ##
                if(isset($_POST['update_shipping']))
                {
                    $tableName = $columnValue = $whereValue =  null;
                    $tableName = "shippings";
                    $columnValue["shipcstmr_name"] = $_POST['shipcstmr_name_upd'];
                    $columnValue["shipcstmr_mobile"] = $_POST['shipadd_phn_upd'];
                    $columnValue["shipcstmr_profession"] = $_POST['shipadd_prfsion_upd'];
                    $columnValue["shipcstmr_streetadd"] = $_POST['shipcstmr_streetadd_upd'];
                    $columnValue["shipcstmr_city"] = $_POST['shipcstmr_city_upd'];
                    $columnValue["shipcstmr_zip"] = $_POST['shipadd_zopc_upd'];
                    $columnValue["shipcstmr_country"] = $_POST['shipadd_cntry_upd'];
                    $columnValue["updated_at"] = date("Y-m-d H:i:s");
                    $whereValue["id"] = $_SESSION['SSC_last_shipadd_id'];
                    $updateResult = $eloquent->updateData($tableName, $columnValue, @$whereValue);	
                }
                ## ===*=== [U]PDATE SHIPPING DETAILS DATA ===*=== ##


                ## ===*=== [I]NSERT TO THE SHIPPING DATA ===*=== ##
                if(isset($_POST['proceed_to_payment']))
                {
                    if(@$_SESSION['SSCF_login_id'] > 0)
                    {
                        $tableName = $columnValue = null;
                        $tableName = "shippings";
                        $columnValue["shipcstmr_name"] = $_POST['shipadd_fname'] . " " . $_POST['shipadd_lname'];
                        $columnValue["customer_id"] = $_SESSION['SSCF_login_id'];
                        $columnValue["order_id"] = $_SESSION['SSCF_orders_order_id'];
                        $columnValue["shipcstmr_mobile"] = $_POST['shipadd_phn'];
                        $columnValue["shipcstmr_profession"] = $_POST['shipadd_cmpny']; 
                        $columnValue["shipcstmr_streetadd"] = $_POST['shipadd_stadd'];
                        $columnValue["shipcstmr_city"] = $_POST['shipadd_cty'];
                        $columnValue["shipcstmr_zip"] = $_POST['shipadd_zopc'];
                        $columnValue["shipcstmr_country"] = $_POST['shipadd_cntry'];
                        $columnValue["created_at"] = date("Y-m-d H:i:s");
                        $shipaddResult = $eloquent->insertData($tableName, $columnValue);
                        
                        $_SESSION['SSC_last_shipadd_id'] = $shipaddResult['LAST_INSERT_ID'];
                        $_SESSION['SSC_last_insert_id_no'] = $shipaddResult['NO_OF_ROW_INSERTED'];
                    }
                }
                ## ===*=== [I]NSERT TO THE SHIPPING DATA ===*=== ##


                ##===*=== #==================# GO FOR PAYMENT SECTION START #==================# ===*===##
                if(isset($_POST['proceed_to_payment']) || isset($_POST['update_shipping']))
                {
                    #== GET ORDER DETAILS FROM DATABASE
                    $columnName = $tableName = $whereValue = null;
                    $columnName = "*";
                    $tableName = "orders";
                    $whereValue['id'] = $_SESSION['SSCF_orders_order_id'];
                    $orderDetailsToPay = $eloquent->selectData($columnName, $tableName, $whereValue);
                    
                    $_SESSION['SSCF_orders_grand_total'] = $orderDetailsToPay[0]['grand_total'];

                    #== [I]NTEGRATE PAYMENT GATEWAY START
                    if ($_SERVER['SERVER_NAME'] == "localhost") 
                    {
                        $server_name = 'http://localhost/www.supershop.com/';
                    } 
                    else 
                    {
                        $server_name = 'http://www.supershop.com/';
                    }
                    
                    ##=*= ALL CUSTOMER DATA THAT YOU REQUIRE TO SEND TO PAYMENT GATEWAY =*=##
                    #== [P]AYMENT INFORMATION | REQUIRED
                    $post_data = array();
                    $post_data['total_amount'] = $orderDetailsToPay[0]['grand_total'];
                    $post_data['currency'] = "BDT";
                    $post_data['tran_id'] = $orderDetailsToPay[0]['id'];
                    $post_data['success_url'] = $server_name . "status.php";	#== SUCCESS CONFIRMATION PAGE
                    $post_data['fail_url'] = $server_name . "status.php";		#== FAILED CONFIRMATION PAGE
                    $post_data['cancel_url'] = $server_name . "status.php";		#== CANCELLED CONFIRMATION PAGE
                    
                    #== [C]USTOMER INFORMATION | REQUIRED
                    $post_data['cus_name'] = $_SESSION['SSCF_login_user_name'];
                    $post_data['cus_email'] = $_SESSION['SSCF_login_user_email'];
                    $post_data['cus_add1'] = $_SESSION['SSCF_login_user_address'];
                    $post_data['cus_add2'] = "";
                    $post_data['cus_city'] = "";
                    $post_data['cus_state'] = "";
                    $post_data['cus_postcode'] = "";
                    $post_data['cus_country'] = "Bangladesh";
                    $post_data['cus_phone'] = $_SESSION['SSCF_login_user_mobile'];
                    $post_data['cus_fax'] = "";
                    
                    #== [S]HIPMENT INFORMATION | REQUIRED
                    $post_data['ship_name'] = @$_SESSION['SSCF_ship_cstmr_name'];
                    $post_data['ship_add1 '] = @$_SESSION['SSCF_ship_cstmr_addr'];
                    $post_data['ship_add2'] = "";
                    $post_data['ship_city'] = @$_SESSION['SSCF_ship_cstmr_city'];
                    $post_data['ship_state'] = "";
                    $post_data['ship_postcode'] = @$_SESSION['SSCF_ship_cstmr_zip'];
                    $post_data['ship_country'] = @$_SESSION['SSCF_ship_cstmr_cntry'];
                    
                    #== [O]PTIONAL PARAMETERS | REQUIRED
                    $post_data['value_a'] = "ref001";
                    $post_data['value_b'] = "ref002";
                    $post_data['value_c'] = "ref003";
                    $post_data['value_d'] = "ref004";
                    
                    $_SESSION['payment_values'] = array();
                    $_SESSION['payment_values']['tran_id'] = $post_data['tran_id'];
                    $_SESSION['payment_values']['amount'] = $post_data['total_amount'];
                    $_SESSION['payment_values']['currency'] = $post_data['currency'];
                    #== [I]NTEGRATE PAYMENT GATEWAY END
                }
                ##===*=== #==================# GO FOR PAYMENT SECTION END #==================# ===*===##


                ## ===*=== [F]ETCH SHIPPING DATA ===*=== ##
                $tableName = $columnName = $whereValue =  null;
                $columnName = "*";
                $tableName = "shippings";
                $whereValue["id"] = $_SESSION['SSC_last_shipadd_id'];
                $shipcstmResult = $eloquent->selectData($columnName, $tableName, $whereValue);

                #== CREATE SESSION ON SHIPPING DATA WHICH IS USED ON PAYMENT GATEWAY INTEGRATION
                $_SESSION['SSCF_ship_cstmr_id'] = $shipcstmResult[0]['id'];
                $_SESSION['SSCF_ship_cstmr_order_id'] = $shipcstmResult[0]['order_id'];
                $_SESSION['SSCF_ship_cstmr_name'] = $shipcstmResult[0]['shipcstmr_name'];
                $_SESSION['SSCF_ship_cstmr_addr'] = $shipcstmResult[0]['shipcstmr_streetadd'];
                $_SESSION['SSCF_ship_cstmr_city'] = $shipcstmResult[0]['shipcstmr_city'];
                $_SESSION['SSCF_ship_cstmr_zip'] = $shipcstmResult[0]['shipcstmr_zip'];
                $_SESSION['SSCF_ship_cstmr_cntry'] = $shipcstmResult[0]['shipcstmr_country'];

                return $this->render('/site/paiement.php',['post_data'=>$post_data,'shipcstmResult'=>$shipcstmResult]);
           }

    public function actionStatuts(){
        ## ===*=== [O]BJECT DEFINED ===*=== ##
        $sslc = yii::$app->sslcommerzClass;
        $eloquent =  yii::$app->eloquantClass;

        $getAmount = yii::$app->commandeClass;





        ################### PAYMENT VERIFICATION ###################
        #== CREATE SESSION AGAINST NEW VARIBALES
        $tran_id = $_SESSION['payment_values']['tran_id'];						
        $amount = $_SESSION['payment_values']['amount'];
        $currency = $_SESSION['payment_values']['currency'];
        $fetch_data = $_POST;
        $validation = $sslc->orderValidate($tran_id, $amount, $currency, $fetch_data);
        $_SESSION['SSCF_transaction_id'] = @$fetch_data['bank_tran_id'];
        ################### PAYMENT VERIFICATION ###################


        ## ===*=== [I]NSERT DATA TO INVOICE TABLE FOR SSL-COMMERZ ===*=== ##
        if($validation > 0)
        {
            #== INSERT INVOICE TABLE DATA
            $tableName = $columnValue = null;
            $tableName = "invoices";
            $columnValue["invoice_id"] = @$fetch_data['val_id'];
            $columnValue["customer_id"] = @$_SESSION['SSCF_login_id'];
            $columnValue["shipping_id"] = @$_SESSION['SSCF_ship_cstmr_id'];
            $columnValue["order_id"] = @$fetch_data['tran_id'];
            $columnValue["transaction_amount"] = @$fetch_data['amount'];
            $columnValue["created_at"] = date("Y-m-d H:i:s");
            $invoicePG = $eloquent->insertData($tableName, $columnValue);
            
            if($invoicePG['LAST_INSERT_ID'] > 0)
            {
                #== FETCH INOVICE DATA FOR SSLCOMERZ INVOICE ID
                $columnName = $tableName = $whereValue =  null;
                $columnName = "*";
                $tableName = "invoices";
                $whereValue['id'] = $invoicePG['LAST_INSERT_ID'];
                $invoiceresultPG = $eloquent->selectData($columnName, $tableName, $whereValue);
                
                #== UPDATE ORDERS DATA
                $tableName = $columnValue = $whereValue =  null;
                $tableName = "orders";
                $columnValue["payment_method"] = "SSL COMMERZ";
                $columnValue["transaction_id"] = $fetch_data['bank_tran_id'];
                $columnValue["transaction_status"] = "Paid";
                $whereValue["id"] = $_SESSION['SSCF_orders_order_id'];
                $ordersUpdate = $eloquent->updateData($tableName, $columnValue, @$whereValue);
            }
        }
        ## ===*=== [I]NSERT DATA TO INVOICE TABLE FOR SSL-COMMERZ ===*=== ##


        ## ===*=== [I]NSERT DATA TO INVOICE TABLE FOR CASH ON DELIVERY ===*=== ##
        if(isset($_POST['cash_on_delivery']))
        {
            if($_POST['payment_values'] = 1)
            {
                #== INSERT INVOICE TABLE DATA
                $tableName = $columnValue = null;
                $tableName = "invoices";
                $columnValue["invoice_id"] = 'COD#' . rand(10000, 99999);
                $columnValue["customer_id"] = @$_SESSION['SSCF_login_id'];
                $columnValue["shipping_id"] = @$_SESSION['SSCF_ship_cstmr_id'];
                $columnValue["order_id"] = @$_SESSION['SSCF_orders_order_id'];
                $columnValue["transaction_amount"] = $_SESSION['SSCF_orders_grand_total'];
                $columnValue["created_at"] = date("Y-m-d H:i:s");
                $invoiceCOD = $eloquent->insertData($tableName, $columnValue);
                
                if($invoiceCOD['LAST_INSERT_ID'] > 0)
                {
                    #== FETCH INOVICE DATA FOR CASH ON DELIVERY INVOICE ID
                    $columnName = $tableName = $whereValue =  null;
                    $columnName = "*";
                    $tableName = "invoices";
                    $whereValue['id'] = $invoiceCOD['LAST_INSERT_ID'];
                    $invoiceresultCOD = $eloquent->selectData($columnName, $tableName, $whereValue);
                    
                    #== UPDATE ORDERS DATA
                    $tableName = $columnValue = $whereValue =  null;
                    $tableName = "orders";
                    $columnValue["payment_method"] = "Cash On Delivery";
                    $columnValue["transaction_id"] = 'COD#' . @$_SESSION['SSCF_login_id'];
                    $columnValue["transaction_status"] = "Unpaid";
                    $whereValue["id"] = $_SESSION['SSCF_orders_order_id'];
                    $ordersUpdate = $eloquent->updateData($tableName, $columnValue, @$whereValue);
                }
            }
        }
        ## ===*=== [I]NSERT DATA TO INVOICE TABLE FOR CASH ON DELIVERY ===*=== ##


        ## ===*=== [F]ETCH INVOICE TABLE DATA BY JOIN QUERY ===*=== ##
        $columnName = $tableName = $joinType = $onCondition = $whereValue = null;
        $columnName["1"] = "orders.transaction_id";
        $columnName["2"] = "orders.transaction_status";
        $columnName["3"] = "orders.sub_total";
        $columnName["4"] = "orders.tax";
        $columnName["5"] = "orders.discount_amount";
        $columnName["6"] = "orders.grand_total";
        $columnName["7"] = "products.product_name";
        $columnName["8"] = "products.product_summary";
        $columnName["9"] = "products.product_price";
        $columnName["10"] = "order_items.prod_quantity";
        $tableName["MAIN"] = "order_items";
        $joinType = "INNER";
        $tableName["1"] = "orders";
        $tableName["2"] = "products";
        $onCondition["1"] = ["order_items.order_id ", "orders.id"];
        $onCondition["2"] = ["order_items.product_id", "products.id"];
        $whereValue["order_items.order_id"] = $_SESSION['LAST_ORDER_ID'];
        $getdetailsResult = $eloquent->selectJoinData($columnName, $tableName, $joinType, $onCondition, @$whereValue);
        ## ===*=== [F]ETCH INVOICE TABLE DATA BY JOIN QUERY ===*=== ##


        ## ===*=== [F]ETCH SHIPPINGS DATA FOR INVOICE DETAILS ===*=== ##
        $tableName = $whereValue= null;
        $columnName = "*";
        $tableName = "shippings";
        $whereValue['id'] = $_SESSION['SSCF_ship_cstmr_id'];
        $shippingDetails = $eloquent->selectData($columnName, $tableName, $whereValue);
        ## ===*=== [F]ETCH SHIPPINGS DATA FOR INVOICE DETAILS ===*=== ##


        ## ===*=== [F]ETCH CUSTOMER DATA WHO IS CONFIRMED PRODUCT'S ORDER ===*=== ##
        $columnName = $tableName = $whereValue = null;
        $columnName = "*";
        $tableName = "customers";
        $whereValue["id"] = $_SESSION['SSCF_login_id'];
        $customerResult = $eloquent->selectData($columnName, $tableName, $whereValue);
        ## ===*=== [F]ETCH CUSTOMER DATA WHO IS CONFIRMED PRODUCT'S ORDER ===*=== ##


        ## ===*=== [F]ETCH SHIPPINGS DATA FOR INVOICE DETAILS ===*=== ##
        $tableName = $whereValue= null;
        $columnName = "*";
        $tableName = "invoices";
        $whereValue['customer_id'] = $_SESSION['SSCF_login_id'];
        $invoiceDetails = $eloquent->selectData($columnName, $tableName, $whereValue);
        ## ===*=== [F]ETCH SHIPPINGS DATA FOR INVOICE DETAILS ===*=== ##


        return $this->render('/site/status.php',['validation'=>$validation,'customerResult'=>$customerResult,'invoiceresultCOD'=>$invoiceresultCOD,'getdetailsResult'=>$getdetailsResult,'getAmount'=>$getAmount]);
    }

    }
