<?php
    namespace app\components;
    use Yii;
    use yii\base\component;
    use yii\web\Controller;
    use yii\base\InvalidConfigException;

    Class pageClass extends Component {

		public $connect ;
		
		### CONNECTION MANAGER
		public function __construct()
		{
            $this->connect = \Yii::$app->db;

		}
		## [F]ETCH ALL THE DATA AS PER ID
		public function fetchData($table, $column, $id)
		{
			$sql_code = "SELECT * FROM {$table} WHERE {$column} = {$id}";
			$query = $this->connect->createCommand($sql_code);
			$dataList = $query->queryAll();
			$totalRowSelected = sizeof($dataList);
			
			if($totalRowSelected > 0)
				return $dataList;
			else
				return 0;
		}
		
		## [F]ETCH ALL THE DATA AS PER ID BASED ON LIMIT
		public function paginateData($table, $column, $id, $start, $end)
		{
			$sql_code1 = "SELECT * FROM {$table} WHERE {$column} = {$id} LIMIT {$start}, {$end}";
			$query = $this->connect->createCommand($sql_code1);
			$pageList = $query->queryAll();
			$totalPageSelected =sizeof($pageList);
			
			if($totalPageSelected > 0)
				return $pageList;
			else
				return 0;
		}		
		
		## [F]ETCH ALL THE DATA AS PER KEYWORD FOR SEARCH AUTOCOMPLETE
		public function searchAuto($table, $column,$keyword)
		{
			$sql_code1 = "SELECT DISTINCT {$column} FROM {$table} WHERE {$column} LIKE '%{$keyword}%' OR {$column} LIKE '%{$keyword}%' ORDER BY {$column} ASC";
			$query = $this->connect->createCommand($sql_code1);
			$dataList = $query->queryAll();
			$totalRowSelected = sizeof($dataList);
			
			if($totalRowSelected > 0)
				return $dataList;
			else
				return 0;
		}
			## [F]ETCH ALL THE DATA AS PER KEYWORD FOR SEARCH AUTOCOMPLETE
			public function categoryResult($value)
			{
				$sql_code1 = "SELECT categories.id ,categories.category_name,subcategories.subcategory_name,subcategories.subcategory_banner FROM  subcategories 
								INNER JOIN  categories WHERE  subcategories.category_id = categories.id
								AND subcategories.id = $value";
				$query = $this->connect->createCommand($sql_code1);
				$dataList = $query->queryAll();
				
				$totalRowSelected = sizeof($dataList);
				
				if($totalRowSelected > 0)
					return $dataList;
				else
					return 0;
			}
	}
?>