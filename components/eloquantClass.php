<?php
    namespace app\components;
    use Yii;
    use yii\base\component;
    use yii\web\Controller;
    use yii\base\InvalidConfigException;

    Class eloquantClass extends Component {
		public $connect ;
		
		### CONNECTION MANAGER
		public function __construct()
		{
            $this->connect = \Yii::$app->db;

		}
    
        // ---------- ---------- ---------- INSERT FUNCTION SET ---------- ---------- ---------- //
        public function insertData($tableName, $columnValue)
        {
            try
            {
                $sql1 = "INSERT INTO `$tableName` SET ";
                
                foreach($columnValue AS $ca1Column => $ca1Value)
                {
                    $ca1ColumnUpper = strtoupper($ca1Column);
                    @$sql2 .= "`$ca1Column`=:$ca1ColumnUpper, ";
                }
              
                $sql2 = rtrim(@$sql2, ", ");
                
                $preSQL = $sql1 . $sql2; //
                $query =  $this->connect->createCommand($preSQL);
      

                foreach($columnValue AS $ca2Column => $ca2Value)
                {
                    $ca2ColumnUpper = strtoupper($ca2Column);
                    // $postSQL[$ca2ColumnUpper] = $ca2Value;
                    $query->bindValue($ca2ColumnUpper, $ca2Value);
                }
             
                // die(var_dump($query));

                $query->execute();
                $req =  $this->connect->createCommand("SELECT id FROM  $tableName  ORDER BY id DESC  LIMIT 1")->queryOne();
               
                $lastInsertId =  $req['id'];
			
                return array("NO_OF_ROW_INSERTED"=>1, "LAST_INSERT_ID"=>$lastInsertId);
            }
            catch(Exception $e) 
            {
                die($e->getMessage());
                return 0;
            }
        }
        
        // ---------- ---------- ---------- UPDATE FUNCTION SET ---------- ---------- ---------- //
        public function updateData($tableName, $columnValue, $whereValue = 0)
        {
            try
            {
                $sql1 = "UPDATE `$tableName` SET ";
                
                foreach($columnValue AS $ca1Column => $ca1Value)
                {
                    $ca1ColumnUpper = strtoupper($ca1Column);
                    @$sql2 .= "`$ca1Column`=:$ca1ColumnUpper, ";
                }
                $sql2 = rtrim(@$sql2, ", ");
                
                if($whereValue == 0)
                {
                    $preSQL = $sql1 . $sql2;
                }
                else
                {
                    $sql3 = " WHERE ";
                    foreach($whereValue AS $wa1Column => $wa1Value)
                    {
                        $wa1ColumnUpper = strtoupper($wa1Column);
                        @$sql4 .= "`$wa1Column`=:$wa1ColumnUpper AND ";
                    }
                    $sql4 = trim($sql4); $sql4 = rtrim($sql4, "AND"); $sql4 = trim($sql4); // NIRU //
                    
                    $preSQL = $sql1 . $sql2 . $sql3 . $sql4;
                }
                
                $query =  $this->connect->createCommand($preSQL);
                
                if($whereValue == 0)
                {
                    foreach($columnValue AS $ca2Column => $ca2Value)
                    {
                        $ca2ColumnUpper = strtoupper($ca2Column);
                        $query->bindValue($ca2ColumnUpper, $ca2Value);

                    }
                }
                else
                {
                    foreach($columnValue AS $ca2Column => $ca2Value)
                    {
                        $ca2ColumnUpper = strtoupper($ca2Column);
                        $query->bindValue($ca2ColumnUpper, $ca2Value);

                    }
                    
                    foreach($whereValue AS $wa2Column => $wa2Value)
                    {
                        $wa2WhereUpper = strtoupper($wa2Column);
                        $query->bindValue($wa2WhereUpper, $wa2Value);

                    }
                }
                $dataAdded=  $query->execute();
                
                return 10;
            }
            catch(Exception $e) 
            {
                return 0;
            }
        }
        
        // ---------- ---------- ---------- DELETE FUNCTION SET ---------- ---------- ---------- //
        public function deleteData($tableName, $whereValue = 0)
        {
            try
            {
                $sql1 = "DELETE FROM `$tableName`";
                
                if($whereValue != 0)
                {
                    $sql2 = " WHERE ";
                    foreach($whereValue AS $wa1Column => $wa1Value)
                    {
                        $wa1ColumnUpper = strtoupper($wa1Column);
                        @$sql2 .= "`$wa1Column`=:$wa1ColumnUpper AND ";
                    }
                    $sql2 = trim($sql2); $sql2 = rtrim($sql2, "AND"); $sql2 = trim($sql2); // NIRU //
                    
                    $preSQL = $sql1 . $sql2;
                    
                    $query =  $this->connect->createCommand($preSQL);
                    
                    foreach($whereValue AS $wa2Column => $wa2Value)
                    {
                        $wa2WhereUpper = strtoupper($wa2Column);
                        $query->bindValue($wa2WhereUpper, $wa2Value);

                    }
                    // die($preSQL);
                    $query->execute();
                }
                else
                {
                    $preSQL = $sql1;
                    $query =  $this->connect->createCommand($preSQL)
                    ->execute();
                }
              
                $dataAdded =2;
                
                return $dataAdded;
            }   
            catch(Exception $e) 
            {
                die($e->getMessage());
            }
        }
        
        // ---------- ---------- ---------- SELECT FUNCTION SET ---------- ---------- ---------- //
        public function selectData($columnName, $tableName, $whereValue = 0, $inColumn = 0, $inValue = 0, $formatBy = 0, $paginate = 0)
        {
            try
            {
                // -- SELECT FROM TABLE -- //
                if($columnName == "*")
                {
                    $sql1 = "SELECT ";
                    $sql2 = "*";
                }
                else
                {
                    $sql1 = "SELECT ";
                    foreach($columnName AS $ca1Column => $ca1Value)
                    {
                        # $ca1ColumnUpper = strtoupper($ca1Value);
                        @$sql2 .= "`$ca1Value`, ";
                    }
                    $sql2 = rtrim(@$sql2, ", ");
                }
                $sql3 = " FROM `$tableName`";
                // -- SELECT FROM TABLE -- //
                
                // -- FORMAT -- //
                if(@$formatBy['GROUP'])
                    $sql6 = " GROUP BY `" . $formatBy['GROUP'] . "`";
                else
                    $sql6 = "";
                
                if(@$formatBy['ASC'])
                    $sql7 = " ORDER BY `" . $formatBy['ASC'] . "` ASC";
                else if(@$formatBy['DESC'])
                    $sql7 = " ORDER BY `" . $formatBy['DESC'] . "` DESC";
                else
                    $sql7 = "";
                // -- FORMAT -- //
                
                if($inValue != 0)
                {
                    $sql4 = " WHERE `$inColumn` IN (";
                    #  ('ONE_VALUE', 'ANOTHER_VALUE');
                    foreach($inValue AS $in1Column => $in1Value)
                    {
                        @$sql5 .= "'$in1Value', ";
                    }
                    $sql5 = rtrim(@$sql5, ", ");
                    $sql5 = $sql5 . ")";
                }
                
                // -- PAGINATION HANDLER -- //
                if($paginate != 0)
                    $sql8 = " LIMIT " . $paginate['POINT'] . ", " . $paginate['LIMIT'];
                else
                    $sql8 = "";
                // -- PAGINATION HANDLER -- //
                
                // -- WHERE -- //
                if($whereValue != 0)
                {
                    $sql4 = " WHERE ";
                    
                    foreach($whereValue AS $wa1Column => $wa1Value)
                    {
                        @$sql5 .= $wa1Column . " = " . "'" . $wa1Value . "' AND ";
                    }
                    $sql5 = trim($sql5); $sql5 = rtrim($sql5, "AND"); $sql5 = trim($sql5); // NIRU //
                    
                    $preSQL = $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 . $sql8;
                }
                else
                {
                    if($inValue != 0)
                    {
                        $preSQL = $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 . $sql8;
                    }
                    else
                    {
                        $preSQL = $sql1 . $sql2 . $sql3 . $sql6 . $sql7 . $sql8;
                    }
                }
                // -- WHERE -- //
              
                $query =  $this->connect->createCommand($preSQL)
                ->queryAll();
                return $query;
            }
            catch(Exception $e) 
            {
                return 0;
            }
        }
        
        // ---------- ---------- ---------- SELECT FUNCTION SET ---------- ---------- ---------- //
        public function selectJoinData($columnName, $tableName, $joinType = "INNER", $onCondition, $whereValue = 0, $formatBy = 0, $paginate = 0)
        {
            try
            {
                // -- SELECT FROM TABLE -- //
                if($columnName == "*")
                {
                    $sql1 = "SELECT ";
                    $sql2 = "*";
                }
                else
                {
                    $sql1 = "SELECT ";
                    foreach($columnName AS $ca1Column => $ca1Value)
                    {
                        @$sql2 .= "$ca1Value, ";
                    }
                    $sql2 = rtrim(@$sql2, ", ");
                }
                // -- SELECT FROM TABLE -- //
                
                // -- FROM -- //
                $sql3 = " FROM `" . $tableName['MAIN'] . "`";
                // -- FROM -- //
                
                // -- JOIN QUERY -- //
                foreach($onCondition AS $on1Column => $on1Value)
                {
                    @$sql4 .= " " . $joinType . " JOIN `" . $tableName[$on1Column] . "` ON " . $on1Value[0] . " = " . $on1Value[1];
                }
                // -- JOIN QUERY -- //
                
                // -- FORMAT -- //
                if(@$formatBy['ASC'])
                    $sql7 = " ORDER BY " . $formatBy['ASC'] . " ASC";
                else if(@$formatBy['DESC'])
                    $sql7 = " ORDER BY " . $formatBy['DESC'] . " DESC";
                else
                    $sql7 = "";
                // -- FORMAT -- //
                
                // -- WHERE -- //
                if($whereValue != 0)
                {
                    $sql5 = " WHERE ";
                
                    foreach($whereValue AS $wa1Column => $wa1Value)
                    {
                        @$sql6 .= $wa1Column . " = " . "'" . $wa1Value . "' AND ";
                    }
                    $sql6 = trim($sql6); $sql6 = rtrim($sql6, "AND"); $sql6 = trim($sql6); // NIRU //
                    
                    $preSQL = $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7;
                }
                else
                {
                    $preSQL = $sql1 . $sql2 . $sql3 . $sql4 . $sql7;
                }
                // -- WHERE -- //
                
                // -- PAGINATION HANDLER -- //
                if($paginate != 0)
                    $preSQL = $preSQL . " LIMIT " . $paginate['POINT'] . ", " . $paginate['LIMIT'];
                // -- PAGINATION HANDLER -- //
                
                $query =  $this->connect->createCommand($preSQL)
                ->queryAll();
                
                return $query;
            }
            catch(Exception $e) 
            {
                return 0;
            }
        
        
        
        }



        	// ---------- ---------- ---------- SELECT FUNCTION SET ---------- ---------- ---------- //
        public function selectJoinDataprodu($columnName, $tableName, $joinType = "INNER", $onCondition, $whereValue = 0, $formatBy = 0, $paginate = 0)
        {
        
            try
            {
                // -- SELECT FROM TABLE -- //
                if($columnName == "*")
                {
                    $sql1 = "SELECT ";
                    $sql2 = "*";
                }
                else
                {
                    $sql1 = "SELECT ";
                    foreach($columnName AS $ca1Column => $ca1Value)
                    {
                        @$sql2 .= "$ca1Value, ";
                    }
                    $sql2 = rtrim(@$sql2, ", ");
                }
              
                // -- SELECT FROM TABLE -- //
                
                // -- FROM -- //
                $sql3 = " FROM `" . $tableName['MAIN'] . "`";
                // -- FROM -- //
               
                // -- JOIN QUERY -- //
                foreach($onCondition AS $on1Column => $on1Value)
                {
                    @$sql4 .= " " . $joinType . " JOIN `" . $tableName[$on1Column] . "` ON " . $on1Value[0] . " = " . $on1Value[1];
                }
                //  die($sql3);-- JOIN QUERY -- //
        
                // -- FORMAT -- //
                if(@$formatBy['ASC'])
                    $sql7 = " ORDER BY " . $formatBy['ASC'] . " ASC";
                else if(@$formatBy['DESC'])
                    $sql7 = " ORDER BY " . $formatBy['DESC'] . " DESC";
                else
                    $sql7 = "";
                // -- FORMAT -- //
               
                // -- WHERE -- //
                if($whereValue != 0)
                {
                    $sql5 = " WHERE ";
                
                    foreach($whereValue AS $wa1Column => $wa1Value)
                    {
                        @$sql6 .= $wa1Column . " = " . "'" . $wa1Value . "' AND ";
                    }
                    $sql6 = trim($sql6); $sql6 = rtrim($sql6, "AND"); $sql6 = trim($sql6); // NIRU //
                    
                    $preSQL = $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7;
                }

                
                else
                {
                    $preSQL = $sql1 . $sql2 . $sql3 . $sql4 . $sql7;
                }
                // -- WHERE -- //
             
                // -- PAGINATION HANDLER -- //
                if($paginate != 0)
                    $preSQL = $preSQL . " LIMIT " . $paginate['POINT'] . ", " . $paginate['LIMIT'];
                // -- PAGINATION HANDLER -- //
           
                $query =  $this->connect->createCommand($preSQL);
                $liste = $query->queryAll();
                return $liste;
            }
            catch(Exception $e) 
            {
                die($e->getMessage());
            }
        }
    
    
    //selection des produit
    public function breadcrumbName($columnName,$tableName,$joinType, $onCondition, $whereValue=0,$formatBy=''){
        try {
              // -- SELECT FROM TABLE -- //
              if($columnName == "*")
              {
                  $sql1 = "SELECT ";
                  $sql2 = "*";
              }
              else
              {
                  $sql1 = "SELECT ";
                  foreach($columnName AS $ca1Column => $ca1Value)
                  {
                      @$sql2 .= "$ca1Value, ";
                  }
                  $sql2 = rtrim(@$sql2, ", ");
              }

              $sql3 = " FROM `" . $tableName['MAIN'] . "`";
              
          
                // -- JOIN QUERY -- //
                foreach($onCondition AS $on1Column => $on1Value)
                {
                    @$sql4 .= " " . $joinType . " JOIN `" . $tableName[$on1Column] . "` ON " . $on1Value[0] . " = " . $on1Value[1];
                }
                // -- JOIN QUERY -- //
                
                   // -- FORMAT -- //
                   if(@$formatBy['ASC'])
                   $sql7 = " ORDER BY " . $formatBy['ASC'] . " ASC";
               else if(@$formatBy['DESC'])
                   $sql7 = " ORDER BY " . $formatBy['DESC'] . " DESC";
               else
                   $sql7 = "";
               // -- FORMAT -- //
            
              // -- WHERE -- //
              if($whereValue != 0)
              {
                  $sql5 = " WHERE ";
              
                  foreach($whereValue AS $wa1Column => $wa1Value)
                  {
                      @$sql6 .= $wa1Column . " = " . "'" . $wa1Value . "' AND ";
                  }
                  $sql6 = trim($sql6); $sql6 = rtrim($sql6, "AND"); $sql6 = trim($sql6); // NIRU //
                  
                  $preSQL = $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7;
              }
            


            $query =  $this->connect->createCommand($preSQL)
                        ->queryAll();
             return $query;
        } catch (\Throwable $th) {
           return 0;
        }
    }
}
        
   
     
	