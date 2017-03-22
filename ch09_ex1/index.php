<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

//validate and process name
switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
	if (empty($first_name)) {
	    $message = 'You must enter your first and last name.';
	    break;
	}
	$name = ucwords($name);
	$i = strpos($name, ' ');
	if ($i === false) {
	    $message = 'No space were found in the name.';
	} else {
	    $first_name = substr($name, 0, $i);
	}

//validate and process the email address
	if (empty($email)) {
	    $message = 'You must enter an email address.';
	    break;
	}
	$i = strpos($email, '@');
	if ($i === false) {
	    $message = 'No @ found in email address.';
	    break;
	}
	$i = strpos($email, '.');
	if ($i === false) {
	    $message = 'No . found in email address.';
	    break;
	}

//validate and process the phone number
	$phone = str_replace('(', '', $phone);
	$phone = str_replace(')', '', $phone);
	$phone = str_replace('.', '', $phone);
	$phone = str_replace('-', '', $phone);
	$phone = str_replace(' ', '', $phone);
	
	if (strlen($phone) < 7) {
	    $message = 'Your phone number must have at least seven digits';
	    break;
	}

//message
        $message = "Hello $first_name,\n\n"
                   "Thank you for entering this data:\n\n";
		   "Name: $name\n"
		   "Email: $email\n"
		   "Phone: $phone\n"

        break;
}
include 'string_tester.php';
?>
