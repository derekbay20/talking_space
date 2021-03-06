<?php 
/*
* Redirect To Page 
*/
function redirect($page = FALSE, $message = NULL, $message_type = NULL) {
	if (is_string($page)) {
		$location = $page;
	} else {
		$location = $_SERVER ['SCRIPT_NAME'];
	}

	//check for message
	if ($message != NULL) {
		//SET Message 
		$_SESSION['message'] = $message;
	}
	//Check for type 
	if ($message_type != NULL) {
		//Set message type 
		$_SESSION ['message_type'] = $message_type;
	}

	//Redirect
	header('Location: ' . $location);
	exit;
}

/*
* Display message 
*/
function displayMessage(){
	if (!empty ($_SESSION['message'])) {
		
		//Assign Message var
		$message = $_SESSION['message'];

		if (!empty($_SESSION['message_type'])) {
			//Assign type var
			$message_type = $_SESSION['message_type'];
			//Create output
			if ($message_type == 'error') {
				echo '<div class="alert alert-danger">' . $message . '</div>';
			} else {
				echo '<div class="alert alert-success">' . $message . '</div>';
			}
		}
		//Unset Message 
		unset($_SESSION['message'] );
		unset($_SESSION['message_type'] ); 
	} else {
		echo '';
	}

}

/*
* Check if user is Logged In 
*/
function isLoggedIn(){
	if (isset($_SESSION['is_logged_in'])) {
		return true;
	} else {
		return false;
	}
}

/*
 * Get Logged in user info
*/
function getUser() {
	$userArray = array();
	$userArray['user_id'] = $_SESSION['user_id'];
	$userArray['username'] = $_SESSION['username'];
	$userArray['name'] = $_SESSION['name'];
	return $userArray; 
}


?>
