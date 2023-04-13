<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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


   
    public function actionIndex()
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


        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }



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
 
 
}
