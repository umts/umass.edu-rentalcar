<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html>
  <head>
    <title>Vehicle Rental Service</title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link href="stylesheets/base.css" rel="stylesheet" type="text/css">
<script src="javascript/prototype.js"></script>
<script type="text/javascript">
var typedSoFar = new String;
function konami(e) {
  //66 is keycode for B, 65 is keycode for A
  var konami = Event.KEY_UP + "" + Event.KEY_UP + "" + Event.KEY_DOWN + "" + Event.KEY_DOWN;
  konami += Event.KEY_LEFT + "" + Event.KEY_RIGHT + "" + Event.KEY_LEFT + "" + Event.KEY_RIGHT;
  konami += '6665';
  typedSoFar += e.keyCode;
  if(typedSoFar.include(konami)){
    window.location = "http://www.yougotrickrolled.com/";
  }
}

</script>
  </head>
  
  <body onkeydown="konami(event)">
    <div id="container" >
      <!-- Begin UMass Amherst top banner --> 
      <div id="topbanner"> 
        <a  href="http://umass.edu">
          <img id="banner_wordmark" src="images/informal_fff_on_000.gif" alt="UMass Amherst">
        </a>
          <form id="banner_search" action="http://googlebox.oit.umass.edu/search" method="get" name="gs" onsubmit="if (this.q.value=='Search UMass Amherst') return false;">
            <div>
              <label for="q">
              <input name="q" id="q" size="22" value="Search UMass Amherst" onfocus="if (this.value=='Search UMass Amherst') this.value=''" onblur="if (this.value=='') this.value='Search UMass Amherst'" type="text">
              </label>
              <input input="submit" name="sa" value="Go" type="submit">
              <input name="site" value="default_collection" type="hidden">
              <input name="client" value="default_frontend" type="hidden">
              <input name="proxystylesheet" value="default_frontend" type="hidden">
              <input name="output" value="xml_no_dtd" type="hidden">
            </div>
          </form>
      </div>
      
      <div id="banner">
        <!--Banner image rendered through css-->
        <a id="banner_link" href="index.html"></a>
      </div>
      
      <div id="topmenu"> 
        <a href="index.html">HOME</a>
        <a href="http://www.umass.edu/transit/buses.html">PVTA BUSES</a>
        <a href="http://www.umass.edu/transit/fieldtrip.html">FIELD TRIP</a>
        <a href="http://www.umass.edu/transit/meet_greet.html">MEET &amp; GREET</a>
        <a href="contactus.html">CONTACT US</a>
      </div>
      
      <table id="main_table">
        <tbody>
          <tr>
             <td id="left">
                
                

                
                <div class="left_menu_title">
                  Rental Information
                </div>
                <div id="left_services">
                
                  <a href="pdf/UMass_Car_Class_with_Rates_Flyer.pdf">Car Class Guide</a><br>

                  <a href="compare.html">Comparison / Calculator</a><br>

						      <a href="localoffice.html">Local Contact</a><br>

                  <a href="https://people.umass.edu/transit/rentalcar">Reservations & Rates</a><br>
                
                </div>
                



                <div class="left_menu_title">
                  UMass Travel Resources
                </div>
                <div id="left_enterprise_links"> 
                	
									<a href="http://www.umass.edu/travel/car.html">Auto Insurance</a><br><br>


                  <a href="http://www.umass.edu/travel/corpCard.html">Corporate Travel Card Program</a><br><br>

							
							    <a href="http://www.umass.edu/travel/files/mileage_rate.pdf">Mileage Reimbursement Rate</a><br><br>
            

                  <a href="http://www.umass.edu/travel/agencies.html">Travel Agency</a><br><br>
								
                </div>
                
                             
             </td>


            <!-- InstanceBeginEditable name="Content" -->
            <td id="right">
              <div id="page_title">Rental Cost Calculator</div>
              <div id="page_text_field">


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
$final_cost = number_format($final_cost, 2, '.', '');

$reim_final_cost = $reimbursment_rate * $round_trip_distance;
$reim_final_cost = round($reim_final_cost, 2);
$reim_final_cost = number_format($reim_final_cost, 2, '.', '');

//crappy print statements
print "Renting a $vehicle_type type vehicle, at $$cost_of_fuel a gallon, for $days_in_trip day(s), making a $round_trip_distance mile trip will cost your department approximately $$final_cost. <br> <br>";

print "Alternatively, it will cost your department $$reim_final_cost to use a personal vehicle with a federal reimbursment rate of $$reimbursment_rate per mile.";



?>

              </div>
            </td>   
          </tr>
        </tbody>
      </table>

      <table id="footer_table">
        <tbody>
          <tr>
            <td>
              <div id="footer">
                <p><br>
                  This page is maintained by <a href="index.html">UMass Transit Services</a>.<br>
                  &copy; 2009 <a href="http://www.umass.edu/">University of Massachusetts Amherst</a> &#8226; <a href="http://umass.edu/umhome/policies.html">Site Policies</a><br>
                  <br>
                  <img src="images/seal.jpg" id="seal" alt="Seal"></p>
              </div>
            </td>
          </tr>
      </tbody>
    </table>
  </div>
  </body>
</html>

