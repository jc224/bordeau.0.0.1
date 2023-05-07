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
                return $this->render('/admin/createslider.php',['req'=>$req]);
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

    public function actionListesclient(){
        
    }
 
    public function actionReview(){

    }

    public function actionCreatcategorie(){

    }

    public function actionListcategorie(){

    }

    public function actionSubcategorie(){

    }

    public function actionListesubcat(){

    }


    public function actionAddproduits(){

    }

    public function actionListeproduits(){

    }

}
