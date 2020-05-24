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

function test_input($data) {
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



// this function is to validate the data of the submit form
function validateData() {
	$cust = array();
	$seats = array();
	$movie = array();

	$isValid = true;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$cust = $_POST['cust'];
		$seats = $_POST['seats'];
		$movie = $_POST['movie'];
		$nameErr = "";
		$emailErr = "";
		$mobileErr = "";
		$cardErr = "";
		$expiryErr = "";
		$seatErr = "";
		$movieErr = "";
		if (empty($cust["name"])) {
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
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "* Invalid email";
				$isValid = false;
			}
		}

		if (empty($cust["mobile"])) {
			$mobileErr = '* Mobile phone is required';
			$isValid = false;
		} else {
			$mobile = test_input($cust["mobile"]);
			if (!preg_match("/^(\(0\)|0|\+61)( ?\d){9}$/", $mobile)) {
				$mobileErr = "* Australian mobiles only";
				$isValid = false;
			}
		}

		if (empty($cust["card"])) {
			$cardErr = '* Credit card is required';
			$isValid = false;
		} else {
			$card = test_input($cust["card"]);
			if (!preg_match("/^( ?\d){14,19}$/", $card)) {
				$cardErr = "* Card contains from 14 to 19 digits";
				$isValid = false;
			}
		}

		if (empty($cust["expiry"])) {
			$expiryErr = '* Expiry date is required';
			$isValid = false;
		} else {
			$currentMonth = (int) date("m");
			$currentYear = (int) date("Y");
			$expiryYear = (int) substr($cust["expiry"], 0, 4);
			$expiryMonth = (int) substr($cust["expiry"], 5, 2);

			if (($currentYear > $expiryYear) || ($currentYear == $expiryYear && $currentMonth == 12)
				|| ($currentYear == $expiryYear && $currentMonth >= $expiryMonth)
			) {
				$expiryErr = "* Expiry must be at least one month after";
				$isValid = false;
			}
		}

		if ((empty($seats['STA']) && empty($seats['STP']) && empty($seats['STC']) && empty($seats['FCA']) && empty($seats['FCP']) && empty($seats['FCC']))
			|| (int) $seats['STA'] > 10 || (int) $seats['STA'] < 0
			|| (int) $seats['STP'] > 10 || (int) $seats['STA'] < 0
			|| (int) $seats['STC'] > 10 || (int) $seats['STA'] < 0
			|| (int) $seats['FCA'] > 10 || (int) $seats['STA'] < 0
			|| (int) $seats['FCP'] > 10 || (int) $seats['STA'] < 0
			|| (int) $seats['FCC'] > 10 || (int) $seats['STA'] < 0
		) {
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

		return [$cust, $nameErr, $emailErr, $mobileErr, $cardErr, $expiryErr, $seatErr, $movieErr];
	}
}


function getTotalAmount($booking) {
	if (isDiscounted($booking)) {
		$total = $booking['STA'] * 14.00 + $booking['STP'] * 12.50 + $booking['STC'] * 11.00
					+ $booking['FCA'] * 24.00 + $booking['FCP'] * 22.50 + $booking['FCC'] * 21.00; 
	} else {
		$total = $booking['STA'] * 19.80 + $booking['STP'] * 17.50 + $booking['STC'] * 15.30
					+ $booking['FCA'] * 30.00 + $booking['FCP'] * 27.00 + $booking['FCC'] * 24.00; 
	}
	return $total;
}

function getBookingData() {
	$booking = array();
	$booking['date'] = date("d/m/Y");
	$booking['name'] = $_SESSION['cart']['cust']['name'];
	$booking['email'] = $_SESSION['cart']['cust']['email'];
	$booking['mobile'] = $_SESSION['cart']['cust']['mobile'];
	$booking['movieId'] = $_SESSION['cart']['movie']['id'];
	$booking['movieDay'] = $_SESSION['cart']['movie']['day'];
	$booking['movieHour'] = $_SESSION['cart']['movie']['hour'];
	$booking['STA'] = (int) $_SESSION['cart']['seats']['STA'];
	$booking['STP'] = (int) $_SESSION['cart']['seats']['STP'];
	$booking['STC'] = (int) $_SESSION['cart']['seats']['STC'];
	$booking['FCA'] = (int) $_SESSION['cart']['seats']['FCA'];
	$booking['FCP'] = (int) $_SESSION['cart']['seats']['FCP'];
	$booking['FCC'] = (int) $_SESSION['cart']['seats']['FCC'];
	$booking['total'] = getTotalAmount($booking);
	return $booking;
}

function getMovieName($movieId) {
	switch($movieId) {
		case 'ACT': return 'Avengers: Endgame';
		case 'AHF': return 'Top End Wedding';
		case 'ANM': return 'Dumbo';
		case 'RMC': return 'The Happy Prince';
	}
}

function saveToBookingForm($booking) {
	$myfile = fopen("bookings.txt", "a"); 
	foreach ($booking as $line) 
	{ 
		fputcsv($myfile, $line, "\t"); 
	} 
	fclose($myfile); 
}

function saveBooking($booking) {
	$myfile = fopen("bookings.txt", "a");
	fputcsv($myfile, $booking, "\t"); 
	fclose($myfile); 
}

function processReceiptPage() {
	$booking = getBookingData();
	saveBooking($booking);
	$booking['movieName'] = getMovieName($booking['movieId']);
	php2js($booking, 'booking');
	return $booking;
}

function isDiscounted($booking) {
	if ($booking['movieDay'] == 'WED') {
		return true;
	} else if ($booking['movieHour'] == 'T12'){
		if ($booking['movieDay'] != 'SAT' && $booking['movieDay'] != 'SUN') {
			return true;
		}
	}
	return false;
}

function deleteStorage() {

	echo "<script>\n";

	echo "/* Generated with A4's php2js() function */";

	echo "sessionStorage.clear();";

	echo "</script>\n\n";

}

?>