<?php
  	session_start();
  // helper function to print dât and shape-structure of data
  	function preShow( $arr, $returnAsString=false ) {
		$ret  = '<pre>' . print_r($arr, true) . '</pre>';

    if ($returnAsString)

        return $ret;

  	else 

        echo $ret; 

  }
// helper function to print the current's file source code
function printMyCode() {

  	$lines = file($_SERVER['SCRIPT_FILENAME']);

  	echo "<pre class='mycode'><ol>";

  	foreach ($lines as $line)

         echo '<li>'.rtrim(htmlentities($line)).'</li>';

 	 echo '</ol></pre>';

}

// helper function to convert multiple dimensional array to javascript ojbect
function php2js( $arr, $arrName ) {

  	$lineEnd="";

  	echo "<script>\n";

  	echo "/* Generated with A4's php2js() function */";

  	echo "  var $arrName = ".json_encode($arr, JSON_PRETTY_PRINT);

  	echo "</script>\n\n";

}

// this function to handle reset button in a form
if (isset($_POST['session-reset'])) {

  	foreach($_SESSION as $something => &$whatever) {

       unset($whatever);

  	}

}

// Put your PHP functions and modules here
$movie = [
  	"id" => "s1234567",
  	"day" => "Alice Liddell",
  	"hour" => "meh"
];

function test_input($data) {
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$cust = array();
$seats = array();
$movie = array();
$booking = array();

$isValid = true;

// this function is to validate the data of the submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cust = $_POST['cust'];
	$seats = $_POST['seats'];
	$movie = $_POST['movie'];

  	if(empty($cust["name"])) {
		$nameErr = '* Name is required';
		$isValid = false;
	} else {
		$name = test_input($cust["name"]);
		if (!preg_match("/^[a-zA-z ]*$/", $name)) {
			$nameErr = "* Name contains only letters and whitespaces";
			$isValid = false;
		}
	}

	if (empty($cust["email"])) {
		$emailErr = "* Email is required";
		$isValid = false;
	} else {
		$email = test_input($cust["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "* Invalid email";
			$isValid = false;
		}
	}

	if(empty($cust["mobile"])) {
		$mobileErr = '* Mobile phone is required';
		$isValid = false;
	} else {
		$mobile = test_input($cust["mobile"]);
		if (!preg_match("/^(\(0\)|0|\+61)( ?\d){9}$/", $mobile)) {
			$mobileErr = "* Australian mobiles only";
			$isValid = false;
		}
	}

	if(empty($cust["card"])) {
		$cardErr = '* Credit card is required';
		$isValid = false;
	} else {
		$card = test_input($cust["card"]);
		if (!preg_match("/^( ?\d){14,19}$/", $card)) {
			$cardErr = "* Card contains from 14 to 19 digits";
			$isValid = false;
		}
	}

	if(empty($cust["expiry"])) {
		$expiryErr = '* Expiry date is required';
		$isValid = false;
	} else {
		$currentMonth = (int) date("m");
		$currentYear = (int) date("Y");
		$expiryYear = (int) substr($cust["expiry"], 0, 4);
		$expiryMonth = (int) substr($cust["expiry"], 5, 2);

		if (($currentYear > $expiryYear) || ($currentYear == $expiryYear && $currentMonth == 12) 
		|| ($currentYear == $expiryYear && $currentMonth >= $expiryMonth)) {
			$expiryErr = "* Expiry must be at least one month after";
			$isValid = false;
		} 
	}

	if ( ( empty($seats['STA']) && empty($seats['STP']) && empty($seats['STC']) && empty($seats['FCA']) && empty($seats['FCP']) && empty($seats['FCC']) )
		|| (int) $seats['STA'] > 10 || (int) $seats['STA'] < 0 
		|| (int) $seats['STP'] > 10 || (int) $seats['STA'] < 0
		|| (int) $seats['STC'] > 10 || (int) $seats['STA'] < 0
		|| (int) $seats['FCA'] > 10 || (int) $seats['STA'] < 0
		|| (int) $seats['FCP'] > 10 || (int) $seats['STA'] < 0
		|| (int) $seats['FCC'] > 10 || (int) $seats['STA'] < 0 ) {
		$seatErr = 'Please select a seat';
		$isValid = false;
	}

	if ($movie['id'] != 'ACT' && $movie['id'] != 'AHF' && $movie['id'] != 'ANM' && $movie['id'] != 'RMC') {
		$movieErr = 'Stop hacking our website';
		$isValid = false;
	}

	if ($isValid) {
		$_SESSION['cart'] = $_POST;
		header("Location: receipt.php");
	} else {
		session_unset();
	}

}

function getBookingData() {
	$booking['date'] = date("d/m/Y");
	$booking['name'] = $_SESSION['cart']['cust']['name'];
	$booking['email'] = $_SESSION['cart']['cust']['email'];
	$booking['mobile'] = $_SESSION['cart']['cust']['mobile'];
	$booking['movieId'] = $_SESSION['cart']['movie']['id'];
	$booking['day'] = $_SESSION['cart']['movie']['day'];
	$booking['hour'] = $_SESSION['cart']['movie']['hour'];
	$booking['STA'] = (int) $_SESSION['cart']['seats']['STA'];
	$booking['STP'] = (int) $_SESSION['cart']['seats']['STP'];
	$booking['STC'] = (int) $_SESSION['cart']['seats']['STC'];
	$booking['FCA'] = (int) $_SESSION['cart']['seats']['FCA'];
	$booking['FCP'] = (int) $_SESSION['cart']['seats']['FCP'];
	$booking['FCC'] = (int) $_SESSION['cart']['seats']['FCC'];
	return $booking;
}

function saveToBookingForm($booking) {
	$myfile = fopen("bookings.txt", "a"); 
	foreach ($booking as $line) 
	{ 
		fputcsv($myfile, $line, "\t"); 
	} 
  
	fclose($myfile); 
}
function saveBooking() {
	$booking = getBookingData();
	$myfile = fopen("bookings.txt", "a");

	fputcsv($myfile, $booking, "\t"); 
  
	fclose($myfile); 

	echo 'right here: ' . print_r($booking, true) . '<br>';
	echo 'SESSION here = ' . $_SESSION['cart']['cust']['name'];
}




?>