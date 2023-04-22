<?php
    namespace app\components;
    use Yii;
    use yii\base\component;
    use yii\web\Controller;
    use yii\base\InvalidConfigException;

    Class commandeClass extends Component {
		public $connect ;
		
		### CONNECTION MANAGER
		public function __construct()
		{
            $this->connect = \Yii::$app->db;

		}
        
		public function inAwords($num)
		{
			$ones = array(
			0 =>"ZERO", 1 => "UN", 2 => "DEUX", 3 => "TROIS", 4 => "QUATRE", 5 => "CINQ", 6 => "SIX", 7 => "SEPT", 8 => "HUIT", 9 => "NEUF", 10 => "DIX", 11 => "ONZE", 12 => "DOUZE", 
			13 => "TREIZE", 14 => "QUARTOZE", 15 => "QUINZE", 16 => "SEIZ", 17 => "DIX-SEPT", 18 => "DIXT-HUIT", 19 => "DIX-NEUF", "014" => "QUARTOZE");
			
			$tens = array(0 =>"ZERO", 1 => "UN", 2 => "DEUX", 3 => "TROIS", 4 => "QUATRE", 5 => "CINQ", 6 => "SIX", 7 => "SEPT", 8 => "HUIT", 9 => "NEUF"); 
			
			$hundreds = array("CENT", "MILLE", "MILLION", "MILLIARD", "BILLION", "QUARDRILLION" ); // Limit to Quadrillion
			
			$num = number_format($num,2,".",",");
			$num_arr = explode(".",$num); 
			$wholenum = $num_arr[0]; 
			$decnum = $num_arr[1]; 
			$whole_arr = array_reverse(explode(",",$wholenum)); 
			krsort($whole_arr,1); 
			$rettxt = ""; 
			foreach($whole_arr as $key => $i)
			{
				while(substr($i,0,1)=="0")
				$i=substr($i,1,5);
				if($i < 20)
				{ 
					@$rettxt .= $ones[$i]; 
				}
				elseif($i < 100)
				{ 
					if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
					if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
				}
				else
				{ 
					if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
					if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
					if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
				} 
				if($key > 0)
				{ 
					$rettxt .= " ".$hundreds[$key]." "; 
				}
			}
			if($decnum > 0)
			{
				$rettxt .= " and ";
				if($decnum < 20)
				{
					$rettxt .= $ones[$decnum];
				}
				elseif($decnum < 100)
				{
					$rettxt .= $tens[substr($decnum,0,1)];
					$rettxt .= " ".$ones[substr($decnum,1,1)];
				}
			}
			return $rettxt;
		}
    
    }