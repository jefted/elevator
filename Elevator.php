<?php
class Elevator 
{

 public $maxFloor=6;
 public $currentFloorA = 0;
 public $currentFloorB = 6;
 
 function elevator($request) 
 {
	 echo "Elevator A current floor is: ".$this->currentFloorA."\n";
 	 echo "Elevator B current floor is: ".$this->currentFloorB."\n";
	 //Get eleveators distance to requested floor
	 $shortestA = abs($this->currentFloorA - $request);
 	 $shortestB = abs($this->currentFloorB - $request);
	 echo "Shortest A=".$shortestA."\n";
	 echo "Shortest B=".$shortestB."\n";
		 if($shortestA < $shortestB)// Elevator A is closer to destination
		 {
			  
			  echo "Lift A is going ";
			  if ($this->currentFloorA < $request) 
			  {
				  echo "Up, through floors:";
			 	  $this->Up($this->currentFloorA,$request);
				  
			  }
			  else if ($this->currentFloorA > $request) 
			  {
				  echo "Down, through floors:";
			      $this->Down($this->currentFloorA,$request);
				  
			  }
			 $this->currentFloorA=$request;
		 }
		 else if($shortestA > $shortestB) //Elevator B is closer to destination
		 {
			 echo "Lift B is going : ";
			 if ($this->currentFloorB < $request) 
			 {
				 echo "Up, through floors:";
				  $this->Up($this->currentFloorB,$request);	
				 
			 }
			 else if ($this->currentFloorB > $request) 
			 {
				 echo "Down, through floors:";
			     $this->Down($this->currentFloorB, $request);
				 
			 }
			 $this->currentFloorB=$request;
		 }
		 else  if($shortestA == $shortestB)//Both elevators are at same distance to destination
		 {
			 //echo "Same! \n";
			 if($this->currentFloorA < $this->currentFloorB) // Elevator A is lower then elevator B
			 {
				 //Lift A is on lower floor the lift B
				 echo "Lift A is going ";
			  if ($this->currentFloorA < $request) 
			  {
				  echo "Up, through floors:";
			       $this->Up($this->currentFloorA,$request);
				  
			  }
			  else if ($this->currentFloorA > $request) 			  {
				  echo "Down, through floors:";
			      $this->Down($this->currentFloorA,$request);
				  
			  }
			 $this->currentFloorA=$request;
			 }
			 else // Elevator B is lower then elevator A
			 {
				 echo "Lift B is going : ";
			 if ($this->currentFloorB < $request) 
			 {
				 echo "Up, through floors:";
				 $this->Up($this->currentFloorB,$request);	
				 
			 }
			 else if ($this->currentFloorB > $request) 
			 {
				 echo "Down, through floors:";
			     $this->Down($this->currentFloorB,$request);
				 
			 }
			 $this->currentFloorB=$request;
			 }
		 }
 
 echo "---------------------------------------------------- \n";
 
 $this->selectFloor();
 }
 
 function selectFloor()
 {
	  echo " Enter your floor: ";
      $floor = readline();
	  if($floor <= $this->maxFloor) 
	 {
       	// Check if entered floor is not one of current floors
		if($floor == $this->currentFloorA || $floor == $this->currentFloorB) 
		{
			echo "Elevator is allready on " . $floor . " floor!\n";
			$this->selectFloor();
		} // Entered floor number is correct, sending to elevator function
		else $this->elevator($floor);
	 } 
	  
	  else 
	  {
		  echo "Incorrect floor number! \n";
		  $this->selectFloor();
	  }
	  
 }
 
 function Up($floor,$requested_floor)
 {
	 for( $a = $floor; $a < $requested_floor+1 ;$a ++)
					{
						echo $a."->";
						sleep(1.3);
					}
				echo "\n";
 }
 function Down($floor,$requested_floor)
 {
	 for( $b = $floor; $b > $requested_floor-1 ;$b --)
					{
						echo $b."->";
						sleep(1.3);
					}
				echo "\n";
 }
}
?>