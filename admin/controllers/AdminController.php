<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class AdminController extends Controller
{

  
    public function actionCrateslidbar(){
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        $pageControl = yii::$app->pageClass;
        $req ="";

            if( isset($_POST['create_slider']) )
                {
                    #== IMAGE FILE VALIDATION
                    if( $control->checkImage(@$_FILES['slider_file']['type'], @$_FILES['slider_file']['size'], @$_FILES['slider_file']['error']) == 1)
                    {
                        #== NEW IMAGE FILE NAME GENERATE
                        $filename = "SLIDER_" . date("YmdHis") . "_" . $_FILES['slider_file']['name'];
                        
                        $tableName = "slides";
                        $columnValue["slider_title"] = $_POST['slider_title'];
                        $columnValue["slider_file"] = $filename;
                        $columnValue["slider_status"] = $_POST['slider_status'];
                        $columnValue["slider_sequence"] = $_POST['slider_sequence'];
                        $createSliderData = $eloquent->insertData($tableName, $columnValue);
                        // die(var_dump($createSliderData));
                        if($createSliderData['LAST_INSERT_ID'] > 0)
                        {
                            #== ADD IMAGE TO THE DIRECTORY
                            move_uploaded_file($_FILES['slider_file']['tmp_name'], yii::$app->params['SLIDES_DIRECTORY'] . $filename);
                            $req = '1';
                        }else{
                            $req = '0';
                        }
                    }

                    return $this->redirect(Yii::$app->request->referrer);

                }
                return $this->render('/admin/slide/createslider.php',['req'=>$req]);
    }


   public function actionUpdateslider(){
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        ## ===*=== [U]PDATE SLIDER DATA===*=== ##
        if(isset($_POST['try_update']))
        {
            if(empty($_FILES['slider_file']['name']))
            {
                # IF UPADATE WIHTOUT SLIDER IMAGE
                $tableName = $columnValue = $whereValue = null;
                $tableName = "slides";
                $columnValue["slider_title"] = $_POST['slider_title'];
                $columnValue["slider_status"] = $_POST['slider_status'];
                $whereValue["slider_sequence"] = $_POST['slider_sequence'];
                $columnValue["slider_sequence"] = $_POST['slider_sequence'];
                $whereValue["id"] = $_SESSION['SMC_edit_slider_id'];
                $updatesliderData = $eloquent->updateData($tableName, $columnValue, @$whereValue);
            }
            else
            {
                # IF UPDATE WITH SLIDER IMAGE 
                if( $control->checkImage(@$_FILES['slider_file']['type'], @$_FILES['slider_file']['size'], @$_FILES['slider_file']['error']) == 1)
                {
                    $filename = "SLIDER_" . date("YmdHis") . "_" . $_FILES['slider_file']['name'];
                    
                    $tableName = $columnValue = $whereValue = null;
                    $tableName = "slides";
                    $columnValue["slider_title"] = $_POST['slider_title'];
                    $columnValue["slider_file"] = $filename;
                    $columnValue["slider_status"] = $_POST['slider_status'];
                    $whereValue["slider_sequence"] = $_POST['slider_sequence'];
                    $columnValue["slider_sequence"] = $_POST['slider_sequence'];
                    $whereValue["id"] = $_SESSION['SMC_edit_slider_id'];
                    $updatesliderData = $eloquent->updateData($tableName, $columnValue, @$whereValue);
                    
                    if($updatesliderData > 0)
                    {
                        move_uploaded_file($_FILES['slider_file']['tmp_name'], yii::$app->params['SLIDES_DIRECTORY'] . $filename);
                        unlink($_SESSION['SMC_edit_slider_slider_file_old']);
                    }
                }
            }
        }
        ## ===*=== [U]PDATE SLIDER DATA===*=== ##


        ## ===*=== [F]ETCH SLIDER DATA===*=== ##
        if( isset($_POST['try_edit']) )
        {
            #== CREATE A SESSION BASED ON ID
            $_SESSION['SMC_edit_slider_id'] = $_POST['id'];
            
            $tableName = $columnName = $whereValue = null;
            $columnName = "*";
            $tableName = "slides";
            $whereValue["id"] = $_SESSION['SMC_edit_slider_id'];
            $queryResult = $eloquent->selectData($columnName, $tableName, @$whereValue);
        }
        else
        {
            $tableName = $columnName = $whereValue = null;
            $columnName = "*";
            $tableName = "slides";
            $whereValue["id"] = $_SESSION['SMC_edit_slider_id'];
            $queryResult = $eloquent->selectData($columnName, $tableName, @$whereValue);
        }

        #== CREATE A SESSION FOR EXISTING SLIDER IMAGE
        $_SESSION['SMC_edit_slider_slider_file_old'] = yii::$app->params['SLIDES_DIRECTORY'] . $queryResult[0]['slider_file']; 
        ## ===*=== [F]ETCH SLIDER DATA===*=== ##

        return $this->render('/admin/slide/update.php',['queryResult'=>$queryResult]);

   }
    public function actionListeslidbar(){
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        $pageControl = yii::$app->pageClass;
        $tableName = $columnName = null;
        $columnName = "*";
        $tableName = "slides";
        $sliderList = $eloquent->selectData($columnName, $tableName);
        return $this->render('/admin/slide/listslider.php',['sliderList'=>$sliderList]);
    }

    public function actionClient(){
        
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        ## ===*=== [D]ELETE CUSTOMERS DATA ===*=== ##
        if(isset($_REQUEST['did']))
        {
            #== GET THE DELETE DATA INFORMATION
            $tableName = $columnName = $whereValue = null;
            $columnName = "*";
            $tableName = "customers";
            $whereValue["id"] = $_REQUEST['did'];
            $getcustomerData = $eloquent->selectData($columnName, $tableName, @$whereValue);
            
            #== DELETE THE DATA
            $tableName = $whereValue = null;
            $tableName = "customers";
            $whereValue["id"] = $_REQUEST['did'];
            $deletecustomerData = $eloquent->deleteData($tableName, $whereValue);
        }	
        ## ===*=== [D]ELETE CUSTOMERS DATA ===*=== ##


   

        ## ===*=== [F]ETCH CUSTOMER DATA ===*=== ##
        $columnName = $tableName = null;
        $columnName = "*";
        $tableName = "customers";
        $customerList = $eloquent->selectData($columnName, $tableName);
        ## ===*=== [F]ETCH CUSTOMER DATA ===*=== ##

        return $this->render('/admin/client/liste.php',['customerList'=>$customerList]);
    }
 
    public function actionSuivie(){
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        ## ===*=== [D]ELETE CUSTOMERS DATA ===*=== ##
        if(isset($_POST['customer_review']))
        {
            $tableName = $whereValue = null;
            $tableName = "contacts";
            $whereValue["id"] = $_POST['review_id'];
            $deleteReviewData = $eloquent->deleteData($tableName, $whereValue);
        }	
        ## ===*=== [D]ELETE CUSTOMERS DATA ===*=== ##


        ## ===*=== [L]IST OF CONTACTED USER ===*=== ##
        $columnName = $tableName = null;
        $columnName = "*";
        $tableName = "contacts";
        $reviewData = $eloquent->selectData($columnName, $tableName);
        ## ===*=== [L]IST OF CONTACTED USER ===*=== ##

        return $this->render('/admin/client/livreur.php',['reviewData'=>$reviewData]);

    }


    public function actionCreatcategorie(){

        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;

                
        ## ===*=== [I]NSERT CATEGORY DATA ===*=== ##
        if( isset($_POST['create_category']) )
        {
            if(!empty($_POST['category_name']) && !empty($_POST['category_status']))
            {
                $tableName = $columnValue = null;
                $tableName = "categories";
                $columnValue["category_name"] = $_POST['category_name'];
                $columnValue["category_status"] = $_POST['category_status'];
                $createCategory = $eloquent->insertData($tableName, $columnValue);

                return $this->redirect(Yii::$app->request->referrer);

            }
        }
        ## ===*=== [I]NSERT CATEGORY DATA ===*=== ##


        return $this->render('/admin/categorie/create.php');
    }

    public function actionListcategorie(){

        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        ## ===*=== [F]ETCH CATEGORY DATA ===*=== ##
        $tableName = $columnName = null;
        $columnName = "*";
        $tableName = "categories";
        $categoryList = $eloquent->selectData($columnName, $tableName);
        ## ===*=== [F]ETCH CATEGORY DATA ===*=== ##

        return $this->render('/admin/categorie/list.php',['categoryList'=>$categoryList]);


    }


    public function actionUpdatecat(){
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
        $updatecategoryData="";
        ## ===*=== [U]PDATE CATEGORY DATA ===*=== ##
        if(isset($_POST['try_update']))
        {
            $tableName = $columnValue = $whereValue = null;
            $tableName = "categories";
            $columnValue["category_name"] = $_POST['category_name'];
            $columnValue["category_status"] = $_POST['category_status'];
            $whereValue["id"] = $_SESSION['SMC_edit_category_id'];
            
            $updatecategoryData = $eloquent->updateData($tableName, $columnValue, @$whereValue);
        }
        ## ===*=== [U]PDATE CATEGORY DATA ===*=== ##


        ## ===*=== [F]ETCH CATEGORY DATA ===*=== ##
        if( isset($_POST['try_edit']) )
        {
            #== CREATE A SESSION BASED ON ID
            $_SESSION['SMC_edit_category_id'] = $_POST['category_id'];
            
            $tableName = $columnName = $whereValue = null;
            $columnName = "*";
            $tableName = "categories";
            $whereValue["id"] = $_SESSION['SMC_edit_category_id'];
            $getcategoryData = $eloquent->selectData($columnName, $tableName, @$whereValue);
        }
        else
        {
            $tableName = $columnName = $whereValue = null;
            $columnName = "*";
            $tableName = "categories";
            $whereValue["id"] = $_SESSION['SMC_edit_category_id'];
            $getcategoryData = $eloquent->selectData($columnName, $tableName, @$whereValue);
        }

        return $this->render('/admin/categorie/update.php',['getcategoryData'=>$getcategoryData]);

    }

    public function actionSubcategorie(){

        
        $control = yii::$app->controllerClass;
        $eloquent =  yii::$app->eloquantClass;
                ## ===*=== [F]ETCH CATEGORY DATA ===*=== ##
        $tableName = $columnName = null;
        $columnName = "*";
        $tableName = "categories";
        $categoryList = $eloquent->selectData($columnName, $tableName);
        ## ===*=== [F]ETCH CATEGORY DATA ===*=== ##


        ## ===*=== [I]NSERT SUBCATEGORY DATA ===*=== ##
        if (isset($_POST['create_subcategory'])) 
        {
            #== IMAGE FILE VALIDATION
            if( $control->checkImage(@$_FILES['subcategory_banner']['type'], @$_FILES['subcategory_banner']['size'], @$_FILES['subcategory_banner']['error']) == 1)
            {
                #== NEW IMAGE FILE NAME GENERATE
                $filename = "SUBCATBANNER_" . date("YmdHis") . "_" . $_FILES['subcategory_banner']['name'];
                
                $tableName = $columnValue = null;
                $tableName = "subcategories";
                $columnValue["subcategory_name"] = $_POST['subcategory_name'];
                $columnValue["category_id"] = $_POST['category_id'];
                $columnValue["subcategory_status"] = $_POST['subcategory_status'];
                $columnValue["subcategory_banner"] = $filename;
                $columnValue["created_at"] = date("Y-m-d H:i:s");
                $createSubcategory = $eloquent->insertData($tableName, $columnValue);
                
                if($createSubcategory > 0)
                {
                    #== ADD IMAGE TO THE DIRECTORY
                    move_uploaded_file($_FILES['subcategory_banner']['tmp_name'], yii::$app->params['BANNER_DIRECTORY'] . $filename);
                }

            }
            return $this->redirect(Yii::$app->request->referrer);

        }

        return $this->render('/admin/sub/cree.php',['categoryList'=>$categoryList]);
    }

    public function actionListesubcat(){

    }


    public function actionAddproduits(){

    }

    public function actionListeproduits(){

    }

}
