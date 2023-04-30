<?php
    namespace app\components;
    use Yii;
    use yii\base\component;
    use yii\web\Controller;
    use yii\base\InvalidConfigException;

    Class searchClass extends Component {
        public $connect;
		
		### CONNECTION MANAGER
		public function __construct()
		{
            $this->connect = \Yii::$app->db;


		}
	  public function searchProduct($htmlKeywords)
	{
		$arrayKeywords = explode(" ", $htmlKeywords);
		
		$sql1 = $sql2 = null;
		$sql1 = "
			SELECT * 
			FROM products 
			WHERE 
		";
		foreach($arrayKeywords AS $eachKey)
		{
			$sql2 .= "product_tags LIKE '%".$eachKey."%' OR ";
			}
		$sql2 = rtrim($sql2, " OR");
		
		$sql_code = $sql1 . $sql2; 
		
		$query = $this->connect->createCommand($sql_code);
		
		 
		
		$dataList = $query->queryAll();
		$totalRowSelected = sizeof($dataList);
		
		if($totalRowSelected > 0)
			return $dataList;
		else
			return 0;
	}	
	
	public function searchProductLimit($htmlKeywords, $start, $end)
	{
		$arrayKeywords = explode(" ", $htmlKeywords);
		
		$sql1 = $sql2 = null;
		$sql1 = "
			SELECT * 
			FROM products 
			WHERE 
		";
		foreach($arrayKeywords AS $eachKey)
		{
			$sql2 .= "product_tags LIKE '%".$eachKey."%' OR ";
			}
		$sql2 = rtrim($sql2, " OR");
		$sql3 = " LIMIT {$start}, {$end} ";
		
		$sql_code = $sql1 . $sql2 . $sql3; 
		
		$query = $this->connect->createCommand($sql_code);
		
		 
		
		$pageList = $query->queryAll();
		$totalRowSelected = sizeof($pageList);
		
		if($totalRowSelected > 0)
			return $pageList;
		else
			return 0;
	}
}

/*
public function searchProduct($htmlKeywords)
{
	$arrayKeywords = explode(" ", $htmlKeywords);
	
	$sql1 = $sql2 = null;
	$sql1 = "
		SELECT * 
		FROM products 
		WHERE 
	";
	foreach($arrayKeywords AS $eachKey)
	{
		$sql2 .= "product_tags LIKE '%".$eachKey."%' OR ";
		}
	$sql2 = rtrim($sql2, " OR");
	
	$sql_code = $sql1 . $sql2; 
	
	$query = $this->connect->createCommand($sql_code);
	
	 
	
	$dataList = $query->querryAll();
	$totalRowSelected = sizeof($dataList);
	
	if($totalRowSelected > 0)
		return $dataList;
	else
		return 0;
}	
*/

# PATTERN OF SEARCH QUERY
/*	
	SELECT * 
	FROM products 
	WHERE 
		tags LIKE '%key%' OR 
		tags LIKE '%key%' OR 
		tags LIKE '%key%' OR 
		tags LIKE '%key%' OR 
		tags LIKE '%key%' OR 
*/
