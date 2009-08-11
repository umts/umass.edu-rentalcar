<?
//print "Damn it feels good to be a gangstar <br>";

$vehicle_type = $_POST['vehicle_type'];
$days_in_trip = $_POST['days_in_trip'];
$destination = $_POST['dest'];
$use_round_trip = $_POST['use_distance_instead'];
$round_trip_distance = $_POST['distance'];
$cost_of_fuel = $_POST['cost_of_fuel'];
$reimbursment_rate = $_POST['reim_rate'];
$chosen_vehicle_rate = '0';
$chosen_vehicle_fuel_rating = '0';
$cost_of_fuel_used = '0';
$cost_of_rental = '0';
$final_cost = '0';
$reim_final_cost = '0';


//Assign Values to the Vehicle rental cost & the MPG rating of the car
switch($_POST['vehicle_type'])
  {
    case 'Compact':
      $chosen_vehicle_rate = '29.99';
      $chosen_vehicle_fuel_rating = '30';
      break;

    case 'Intermediate':
      break;

    case 'Standard':
      break;
    
    case 'Full Size':
      $chosen_vehicle_rate = '40.99';
      $chosen_vehicle_fuel_rating = '22';
      break;
    
    case 'Premium':
      break;
    
    case 'Pickup Truck':
      break;
    
    case 'Luxury':
      break;
    
    case 'Minivan':
      break;
    
    case 'SUV':
      $chosen_vehicle_rate = '59.99';
      $chosen_vehicle_fuel_rating = '19';
      break;
    
    case '12 Pax Van':
      break;
    
    case 'Cargo Van':
      break;

  }

//fucking doing the math (please do not get on my case about the lack of functions, this was just thrown together)
$cost_of_fuel_used = ($round_trip_distance / $chosen_vehicle_fuel_rating) * $cost_of_fuel;
$cost_of_rental = $chosen_vehicle_rate * $days_in_trip;
$final_cost = $cost_of_fuel_used + $cost_of_rental;
$final_cost = round($final_cost, 2);

$reim_final_cost = $reimbursment_rate * $round_trip_distance;
$reim_final_cost = round(reim_final_cost, 2);

//crappy print statements
print "Renting a $vehicle_type type vehicle, at $$cost_of_fuel a gallon, for $days_in_trip day(s), making a $round_trip_distance mile trip will cost your department approximately $$final_cost. <br> <br>";

print "Alternatively, it will cost your department $$reim_final_cost to use a personal verhicle with a federal reimbursment rate of $$reimbursment_rate per mile.";



?>
