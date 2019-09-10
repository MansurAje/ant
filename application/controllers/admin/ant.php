<?php
	class Ant{
		private $the_food;
		private $the_pheronome;
		private $startPoint;
		private $lastPoint;
		private $currentPoint;
		private $food_collected;
		private $food_storage;
		private $fitness_constraint;
		private $fitness_cost;
     
		public function __construct($food){
			$this->the_food = $food;
			$this->startPoint = rand(0, count($this->the_food));
			$this->currentPoint = $this->startPoint;
			$this->last_point = $this->startPoint;
			$this->food_collected = array();
		}
     
		public function setPheronome($pheronome){
			$this->the_pheronome = $pheronome;
		}
     
		function collectThatFood(){
			$eat = true;
			$eatCount = 0;
			while($eat){
				$collect = false;
					foreach($this->food_collected as $key){
						if ($key == $this->currentPoint){
							$collect = true;
						}
					}
					if(!$collect){
						$this->food_collected[]=$this->currentPoint;
						$this->the_pheronome->set($this->last_point,
						$this->currentPoint);
						$this->last_point = $this->currentPoint;
					}
					else{
						$collectCount++;
					}
					if($collectCount>=count($this->the_food)){
						$eat = false;}
						$this->currentPoint=rand(0,count($this>the_food));
			}
		}
     
		function putTheFoodOnStorage(){
			foreach($this->food_collected as $food){
					$size = $this->the_food[$food][2];
					list($day,$time)=$this->getEmptyStorage($size);
				if($day > -1 && $time > -1){
					for($sizeCheck=0;$sizeCheck<$size;$sizeCheck++){
						$this->food_storage[$day]
						[$time+$sizeCheck]= $food;
					}
				}
			}
		}
     
		function getEmptyStorage($size, $level = 0){
			$deepLevel = $level;
				if($deepLevel > 600){
					return array(-1,-1);
				}
			$randomSelectDaySlot = rand(0, count($this->food_storage));
			$randomSelectSlotTime = rand(0, count($this->food_storage[$randomSelectDaySlot]));
			$storageCanUse= true;
     
			for($sizeCheck=0; $sizeCheck<$size; $sizeCheck++){
				if(!isset($this->food_storage[$randomSelectDaySlot][$randomSelectSlotTime + $sizeCheck]) || $this->food_storage[$randomSelectDaySlot][$randomSelectSlotTime + $sizeCheck]!== "EMPTY"){
					$storageCanUse = false;
				}
			}
     
			if ($storageCanUse===true){
				return array($randomSelectDaySlot,$randomSelectSlotTime);
			}
			else{
				$deepLevel++;
				return $this->getEmptyStorage($size,$deepLevel);
			}
		}
     
		function set_storage($foodStore){
			$this->food_storage = $foodStore;
		}
     
		function get_storage(){
			return $this->food_storage;
		}
     
		function getTheFood(){
			return $this->food_collected;
		}
     
		function set_constraint($fitnessConstValue){
			$this->fitness_constraint = $fitnessConstValue;
		}
    }
     
?>
 

<?php
	class AntAlgorithm{
		private $ant_size;
		private $gen_limit;
		private $ant_food;
		private $ant_constraint;
		private $ant_colony;
		private $pheronome;
		private $food_storage;
     
			public function __construct(){
				$this->pheronome = new Pheronome();
			}
     
			public function set_antCount($antCount = 1){
				$this->ant_size = $antCount;
			}
     
			public function set_genLimit($genLimit = 1){
				$this->gen_limit = $genLimit;
				echo "Generasi di set " . $genLimit;
			}
     
			public function set_food($arrFood = array()){
				$this->ant_food = $arrFood;
			}
     
			public function set_storage($arrStorage = array()){
				$this->food_storage = $arrStorage;
			}
     
			public function set_constraint($arrConstraint = array()){
				$this->ant_constraint = $arrConstraint;
			}
     
			public function tellAntToCollectTheFood(){
				$this->orderTheAnt();
					for($gen=0;$gen<$this->gen_limit;$gen++){
						foreach($this->ant_colony as $antId => $ant){
							$ant->set_storage($this->food_storage[$gen][$antId]);
							$ant->collectThatFood();
							$ant->putTheFoodOnStorage();
							$this->food_storage[$gen][$antId] =
							$ant->get_storage();
						}
					}
			}
     
			public function getCollectedFood(){
				return $this->food_storage;
			}
     
			private function orderTheAnt(){
				for($i=0;$i<$this->ant_size;$i++){
					$myAnt = new Ant($this->ant_food);
					$myAnt->setPheronome($this->pheronome);
					$myAnt->set_constraint($this->ant_constraint);
					$this->ant_colony[] = $myAnt;
				}
			}
     
			public function fitnessCount(){
				foreach($this->food_storage as $gen => $antResult){
					foreach($antResult as $antId => $food_result){
						foreach($food_result as $dayId => $timeResult){
							foreach($timeResult as $timeId);
						}
					}
				}
			}
    }
?>