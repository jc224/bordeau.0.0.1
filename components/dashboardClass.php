<?php
    namespace app\components;
    use Yii;
    use yii\base\component;
    use yii\web\Controller;
    use yii\base\InvalidConfigException;

    Class dashboardClass extends Component {
		public $connect;
		
		### CONNECTION MANAGER
		public function __construct()
		{
            $this->connect = \Yii::$app->db;

		}
		public function chartData()
		{
			$sql1 = "
			SELECT DATE_FORMAT(created_at, '%m %Y') AS MONTH_YEAR,
			CONVERT(COUNT(id), UNSIGNED) AS NO_OF_ORDER,
			CONVERT(SUM(grand_total), UNSIGNED) AS TOTAL_SALE
			FROM orders
			WHERE created_at BETWEEN
			";
			$sql2 = " ' " . date("Y-m-" . "1", strtotime("-6 month")) . " ' AND ' " . date("Y-m-" . "1", strtotime("-0 month")) . " ' ";
			$sql3 = "GROUP BY DATE_FORMAT(created_at, '%Y-%m-01')";
			
			
            
            $sql1 = $sql1 . $sql2 . $sql3;
            $query = $this->connect->createCommand($sql1)
			->querryAll();
			
			return $query;
		}
		
		
		public function dateData($table, $column)
		{
			$sql = 'SELECT * FROM '. $table .' WHERE '. $column .' BETWEEN';
			$sql .= " ' " . date("Y-m-" . "1", strtotime("-30 day")) . " ' AND ' " . date("Y-m-" . "1", strtotime("-0 day")) . " ' ";
			
			$query =  $this->connect->createCommand($sql)
			->queryAll();
			
			return $query;
		}		
		
		
		public function sumByDate($table, $column1, $column2)
		{
			$sql = 'SELECT SUM('.$column1.') FROM '. $table .' WHERE '. $column2 .' BETWEEN';
			$sql .= " ' " . date("Y-m-" . "1", strtotime("-30 day")) . " ' AND ' " . date("Y-m-" . "1", strtotime("-0 day")) . " ' ";
			
			 $query = $this->connect->createCommand($sql)
		    ->queryAll();
			
			return $query;
		}		
		
		
		public function sumResult($table, $column)
		{
			$sql = 'SELECT SUM('.$column.') FROM '.$table;
			
			$query =  $this->connect->createCommand($sql)
			->queryAll();
			
			return $query;
		}		
		
		
		public function getData($table, $column, $value)
		{
			$sql = 'SELECT * FROM '. $table .' WHERE '. $column .' = "'. $value .'"';
			
			$query =  $this->connect->createCommand($sql)
		    ->queryOne();
			
			return $query;
		}
	
            
        }
	